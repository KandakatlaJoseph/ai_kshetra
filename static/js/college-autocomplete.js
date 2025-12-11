/**
 * College Autocomplete Component
 * Provides typeahead search with "Add New" functionality
 */

class CollegeAutocomplete {
    constructor(inputElement, options = {}) {
        this.input = inputElement;
        this.colleges = [];
        this.filteredColleges = [];
        this.highlightedIndex = -1;
        this.isOpen = false;
        this.currentValue = '';

        // Options with defaults
        this.options = {
            maxResults: options.maxResults || 10,
            minChars: options.minChars || 1,
            dataUrl: options.dataUrl || 'static/data/colleges.json',
            ...options
        };

        this.init();
    }

    async init() {
        await this.loadColleges();
        this.createDropdown();
        this.attachEventListeners();
    }

    async loadColleges() {
        try {
            const response = await fetch(this.options.dataUrl);
            const data = await response.json();
            this.colleges = data.colleges || [];
        } catch (error) {
            console.error('Failed to load colleges:', error);
            this.colleges = [];
        }
    }

    createDropdown() {
        // Wrap input in a container
        const wrapper = document.createElement('div');
        wrapper.className = 'autocomplete-wrapper';
        this.input.parentNode.insertBefore(wrapper, this.input);
        wrapper.appendChild(this.input);

        // Create dropdown
        this.dropdown = document.createElement('div');
        this.dropdown.className = 'autocomplete-dropdown';
        wrapper.appendChild(this.dropdown);

        this.wrapper = wrapper;
    }

    attachEventListeners() {
        // Input events
        this.input.addEventListener('input', (e) => this.onInput(e));
        this.input.addEventListener('focus', () => this.onFocus());
        this.input.addEventListener('keydown', (e) => this.onKeyDown(e));

        // Close dropdown when clicking outside
        document.addEventListener('click', (e) => {
            if (!this.wrapper.contains(e.target)) {
                this.closeDropdown();
            }
        });
    }

    onInput(e) {
        const query = e.target.value.trim();
        this.currentValue = query;

        if (query.length < this.options.minChars) {
            this.closeDropdown();
            return;
        }

        this.filterColleges(query);
        this.renderDropdown();
        this.openDropdown();
    }

    onFocus() {
        if (this.input.value.length >= this.options.minChars) {
            this.filterColleges(this.input.value);
            this.renderDropdown();
            this.openDropdown();
        }
    }

    onKeyDown(e) {
        if (!this.isOpen) return;

        const itemCount = this.dropdown.querySelectorAll('.autocomplete-item').length;

        switch (e.key) {
            case 'ArrowDown':
                e.preventDefault();
                this.highlightedIndex = Math.min(this.highlightedIndex + 1, itemCount - 1);
                this.updateHighlight();
                break;

            case 'ArrowUp':
                e.preventDefault();
                this.highlightedIndex = Math.max(this.highlightedIndex - 1, 0);
                this.updateHighlight();
                break;

            case 'Enter':
                e.preventDefault();
                if (this.highlightedIndex >= 0) {
                    const items = this.dropdown.querySelectorAll('.autocomplete-item');
                    if (items[this.highlightedIndex]) {
                        items[this.highlightedIndex].click();
                    }
                }
                break;

            case 'Escape':
                this.closeDropdown();
                break;
        }
    }

    filterColleges(query) {
        const lowerQuery = query.toLowerCase();

        this.filteredColleges = this.colleges
            .filter(college => {
                if (college === 'Other') return false; // Handle 'Other' separately
                return college.toLowerCase().includes(lowerQuery);
            })
            .slice(0, this.options.maxResults);
    }

    renderDropdown() {
        this.dropdown.innerHTML = '';
        this.highlightedIndex = -1;

        if (this.filteredColleges.length === 0 && this.currentValue.length > 0) {
            // No results - show "Add New" option only
            this.renderAddNewOption();
            return;
        }

        // Render matching colleges
        this.filteredColleges.forEach((college, index) => {
            const item = document.createElement('div');
            item.className = 'autocomplete-item';
            item.innerHTML = this.highlightMatch(college, this.currentValue);
            item.addEventListener('click', () => this.selectCollege(college));
            this.dropdown.appendChild(item);
        });

        // Check if exact match exists
        const exactMatch = this.colleges.some(
            c => c.toLowerCase() === this.currentValue.toLowerCase()
        );

        // Add "Add New" option if no exact match
        if (!exactMatch && this.currentValue.length > 0) {
            this.renderAddNewOption();
        }
    }

    renderAddNewOption() {
        const addNewItem = document.createElement('div');
        addNewItem.className = 'autocomplete-item add-new';
        addNewItem.textContent = `Add: "${this.currentValue}"`;
        addNewItem.addEventListener('click', () => this.selectCollege(this.currentValue));
        this.dropdown.appendChild(addNewItem);
    }

    highlightMatch(text, query) {
        if (!query) return text;

        const regex = new RegExp(`(${this.escapeRegex(query)})`, 'gi');
        return text.replace(regex, '<span class="match">$1</span>');
    }

    escapeRegex(string) {
        return string.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
    }

    selectCollege(college) {
        this.input.value = college;
        this.closeDropdown();

        // Trigger change event
        const event = new Event('change', { bubbles: true });
        this.input.dispatchEvent(event);
    }

    updateHighlight() {
        const items = this.dropdown.querySelectorAll('.autocomplete-item');
        items.forEach((item, index) => {
            item.classList.toggle('highlighted', index === this.highlightedIndex);
        });

        // Scroll into view
        if (items[this.highlightedIndex]) {
            items[this.highlightedIndex].scrollIntoView({
                block: 'nearest',
                behavior: 'smooth'
            });
        }
    }

    openDropdown() {
        this.dropdown.classList.add('active');
        this.isOpen = true;
    }

    closeDropdown() {
        this.dropdown.classList.remove('active');
        this.isOpen = false;
        this.highlightedIndex = -1;
    }
}

// Auto-initialize on page load
document.addEventListener('DOMContentLoaded', () => {
    // Find all college input fields and initialize autocomplete
    const collegeInputs = document.querySelectorAll('input[name*="college"]');

    collegeInputs.forEach(input => {
        new CollegeAutocomplete(input);
    });
});

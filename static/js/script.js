document.addEventListener('DOMContentLoaded', () => {
    console.log('AI Kshetra loaded');

    // Smooth scrolling
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

    // Intersection Observer for Scroll Animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: "0px 0px -50px 0px"
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target); // Only animate once
            }
        });
    }, observerOptions);

    // Observe elements
    document.querySelectorAll('.event-card, .section-title, .footer-content').forEach(el => {
        el.classList.add('fade-in-section');
        observer.observe(el);
    });
    const detailButtons = document.querySelectorAll('.event-details-btn');

    detailButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            const modalId = btn.getAttribute('data-modal');
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.style.display = 'block';
            }
        });
    });

    // Close modal when X is clicked
    document.querySelectorAll('.modal .close').forEach(closeBtn => {
        closeBtn.addEventListener('click', () => {
            const modal = closeBtn.closest('.modal');
            if (modal) {
                modal.style.display = 'none';
            }
        });
    });

    // Close modal when clicking outside content
    window.addEventListener('click', (e) => {
        const openModal = e.target.classList.contains('modal') ? e.target : null;
        if (openModal) {
            openModal.style.display = 'none';
        }
    });



    const carousel = document.getElementById('eventsCarousel');
    const prevBtn = document.getElementById('eventsPrev');
    const nextBtn = document.getElementById('eventsNext');

    if (carousel && prevBtn && nextBtn) {
        const scrollAmount = 400; // adjust based on card width

        nextBtn.addEventListener('click', () => {
            carousel.scrollBy({ left: scrollAmount, behavior: 'smooth' });
        });

        prevBtn.addEventListener('click', () => {
            carousel.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
        });
    }

});

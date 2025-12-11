// ===== Loading Screen Animation =====
(function () {
    const TOTAL_FRAMES = 37; // images 000 to 036
    const FRAME_DURATION = 100; // ms per frame (~10fps for slower, smoother animation)
    const loadingScreen = document.getElementById('loadingScreen');
    const loadingImage = document.getElementById('loadingImage');
    const loadingProgress = document.getElementById('loadingProgress');

    if (!loadingScreen || !loadingImage) return;

    // Detect if mobile/portrait mode (use vertical images)
    const isMobile = window.innerWidth <= 768 || window.innerHeight > window.innerWidth;

    // Preload all images first
    const images = [];
    let loadedCount = 0;

    function getImagePath(index) {
        const num = String(index).padStart(3, '0');
        if (isMobile) {
            // Use vertical images for mobile
            return `static/LoadingImgV/Untitled design.remuxed_${num}.webp`;
        } else {
            // Use horizontal images for desktop
            return `static/LoadingImg/ai kshetra_${num}.webp`;
        }
    }

    function preloadImages() {
        return new Promise((resolve) => {
            // Hide image during preloading - only show percentage
            loadingImage.style.display = 'none';

            for (let i = 0; i < TOTAL_FRAMES; i++) {
                const img = new Image();
                img.src = getImagePath(i);
                img.onload = () => {
                    loadedCount++;
                    if (loadingProgress) {
                        const percent = Math.round((loadedCount / TOTAL_FRAMES) * 100);
                        loadingProgress.textContent = `Loading... ${percent}%`;
                    }
                    if (loadedCount === TOTAL_FRAMES) {
                        resolve();
                    }
                };
                img.onerror = () => {
                    loadedCount++;
                    if (loadedCount === TOTAL_FRAMES) {
                        resolve();
                    }
                };
                images.push(img);
            }
        });
    }

    function playAnimation() {
        return new Promise((resolve) => {
            let currentFrame = 0;
            // Show image now that animation is starting
            loadingImage.style.display = 'block';
            loadingImage.src = images[0].src;
            if (loadingProgress) {
                loadingProgress.textContent = '';
            }

            const interval = setInterval(() => {
                currentFrame++;
                if (currentFrame >= TOTAL_FRAMES) {
                    clearInterval(interval);
                    resolve();
                } else {
                    loadingImage.src = images[currentFrame].src;
                }
            }, FRAME_DURATION);
        });
    }

    function hideLoadingScreen() {
        loadingScreen.classList.add('hidden');
        // Remove from DOM after transition
        setTimeout(() => {
            loadingScreen.style.display = 'none';
        }, 600);
    }

    // Start the loading sequence
    preloadImages()
        .then(() => playAnimation())
        .then(() => hideLoadingScreen());
})();

document.addEventListener('DOMContentLoaded', () => {
    console.log('AI Kshetra loaded');

    // Smooth scrolling
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const targetId = this.getAttribute('href');
            const targetEl = document.querySelector(targetId);
            if (!targetEl) return; // allow normal if no target

            e.preventDefault();
            targetEl.scrollIntoView({
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

    // Event detail modals
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

    // === Events Carousel ===
    const carousel = document.getElementById('eventsCarousel');
    const prevBtn = document.getElementById('eventsPrev');
    const nextBtn = document.getElementById('eventsNext');

    // Manual left/right arrows (desktop & large screens)
    if (carousel && prevBtn && nextBtn) {
        const scrollAmount = 400; // adjust based on card width

        nextBtn.addEventListener('click', () => {
            carousel.scrollBy({ left: scrollAmount, behavior: 'smooth' });
        });

        prevBtn.addEventListener('click', () => {
            carousel.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
        });
    }

    // === Mobile auto-scroll with stop-on-interaction ===
    if (carousel) {
        const cards = carousel.querySelectorAll('.event-card');
        if (cards.length > 1) {
            const mobileMedia = window.matchMedia('(max-width: 768px)');
            let autoScrollTimer = null;
            let currentIndex = 0;
            let userInteracted = false;

            function scrollToCard(index) {
                const card = cards[index];
                if (!card) return;
                const left = card.offsetLeft;
                carousel.scrollTo({
                    left,
                    behavior: 'smooth'
                });
            }

            function startAutoScroll() {
                // Only on mobile & only if user hasn't touched it yet
                if (!mobileMedia.matches || userInteracted) return;

                if (autoScrollTimer) {
                    clearInterval(autoScrollTimer);
                }

                autoScrollTimer = setInterval(() => {
                    currentIndex = (currentIndex + 1) % cards.length;
                    scrollToCard(currentIndex);
                }, 3000); // 3 seconds per card
            }

            function stopAutoScroll() {
                if (autoScrollTimer) {
                    clearInterval(autoScrollTimer);
                    autoScrollTimer = null;
                }
                userInteracted = true;
            }

            // Stop auto-scroll on any **direct** user interaction with the carousel
            ['touchstart', 'wheel', 'mousedown'].forEach(evt => {
                carousel.addEventListener(evt, stopAutoScroll, { passive: true });
            });

            // Also stop if user clicks arrows (desktop)
            if (prevBtn) prevBtn.addEventListener('click', stopAutoScroll);
            if (nextBtn) nextBtn.addEventListener('click', stopAutoScroll);

            // Handle media query changes (e.g., orientation change)
            if (mobileMedia.addEventListener) {
                mobileMedia.addEventListener('change', (e) => {
                    if (e.matches) {
                        // entering mobile
                        if (!userInteracted) startAutoScroll();
                    } else {
                        // leaving mobile
                        stopAutoScroll();
                    }
                });
            } else if (mobileMedia.addListener) {
                // for older browsers
                mobileMedia.addListener((e) => {
                    if (e.matches) {
                        if (!userInteracted) startAutoScroll();
                    } else {
                        stopAutoScroll();
                    }
                });
            }

            // Initial start (if already on mobile)
            startAutoScroll();
        }
    }
    // === Stats Animation ===
    const statsSection = document.querySelector('.hero-stats');
    if (statsSection) {
        const statsObserver = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counters = entry.target.querySelectorAll('.stat-number');
                    counters.forEach(counter => {
                        const target = +counter.getAttribute('data-target');
                        const prefix = counter.getAttribute('data-prefix') || '';
                        const suffix = counter.getAttribute('data-suffix') || '';

                        // Fallback if target is invalid
                        if (!target && target !== 0) return;

                        const duration = 1500; // 1.5 seconds
                        const incrementTime = 20; // update every 20ms
                        const totalSteps = duration / incrementTime;
                        let currentStep = 0;

                        const timer = setInterval(() => {
                            currentStep++;
                            const progress = Math.min(currentStep / totalSteps, 1);

                            // Cubic ease-out
                            const ease = 1 - Math.pow(1 - progress, 3);
                            const current = Math.floor(ease * target);

                            counter.innerText = prefix + current + suffix;

                            if (progress >= 1) {
                                clearInterval(timer);
                                counter.innerText = prefix + target + suffix; // Ensure final value
                            }
                        }, incrementTime);
                    });
                    obs.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });
        statsObserver.observe(statsSection);
    }
});

document.addEventListener('DOMContentLoaded', () => {
    const track = document.querySelector('.carousel-track');
    const slides = document.querySelectorAll('.carousel-slide');
    const dotsContainer = document.querySelector('.carousel-dots');

    let currentIndex = 0;
    const getSlideHeight = () => slides[0].offsetHeight + 30; // Include gap
    let isAnimating = false;

    // Clone first slide twice - one for top and one for bottom
    const firstSlideCloneTop = slides[0].cloneNode(true);
    const firstSlideCloneBottom = slides[0].cloneNode(true);
    const lastSlideClone = slides[slides.length - 1].cloneNode(true);
    
    track.appendChild(firstSlideCloneTop);
    track.appendChild(firstSlideCloneBottom);
    track.insertBefore(lastSlideClone, track.firstChild);

    // Adjust initial position to show first real slide
    track.style.transform = `translateY(-${getSlideHeight()}px)`;

    // Create dots
    slides.forEach((_, index) => {
        const dot = document.createElement('div');
        dot.classList.add('carousel-dot');
        if (index === 0) dot.classList.add('active');
        dot.addEventListener('click', () => goToSlide(index));
        dotsContainer.appendChild(dot);
    });

    const dots = document.querySelectorAll('.carousel-dot');

    function updateDots() {
        dots.forEach((dot, index) => {
            dot.classList.toggle('active', index === currentIndex);
        });
    }

    function updateSlides() {
        const allSlides = document.querySelectorAll('.carousel-slide');
        allSlides.forEach((slide, index) => {
            // Account for the cloned slides in the index calculation
            const normalizedIndex = (index - 1 + slides.length) % slides.length;
            slide.classList.toggle('active', normalizedIndex === currentIndex);
        });
    }

    function goToSlide(index, smooth = true) {
        if (isAnimating) return;
        isAnimating = true;
        currentIndex = index;
        // Account for the extra clone at the bottom
        const offset = currentIndex === 0 ? -getSlideHeight() : -(currentIndex + 1) * getSlideHeight();
        track.style.transition = smooth ? 'transform 0.8s ease-in-out' : 'none';
        track.style.transform = `translateY(${offset}px)`;
        updateDots();
        updateSlides();
        
        setTimeout(() => {
            isAnimating = false;
        }, 800);
    }

    function nextSlide() {
        if (isAnimating) return;
        currentIndex = (currentIndex + 1) % slides.length;
        goToSlide(currentIndex);

        // When reaching the last slide
        if (currentIndex === slides.length - 1) {
            setTimeout(() => {
                track.style.transition = 'none';
                // Move to the bottom clone of first slide
                const offset = -(slides.length + 1) * getSlideHeight();
                track.style.transform = `translateY(${offset}px)`;
                setTimeout(() => {
                    track.style.transition = 'transform 0.8s ease-in-out';
                    // Then animate to the real first slide
                    currentIndex = 0;
                    goToSlide(0);
                }, 50);
            }, 800);
        }
    }

    // Handle the transition end
    track.addEventListener('transitionend', () => {
        // If we're at the clone of the last slide, jump to the real last slide
        if (currentIndex === -1) {
            track.style.transition = 'none';
            currentIndex = slides.length - 1;
            const offset = -(currentIndex + 1) * getSlideHeight();
            track.style.transform = `translateY(${offset}px)`;
            setTimeout(() => {
                track.style.transition = 'transform 0.8s ease-in-out';
            }, 50);
        }
        // If we're at the bottom clone, jump to the real first slide
        else if (currentIndex === 0 && track.style.transform.includes(`${-(slides.length + 1) * getSlideHeight()}`)) {
            track.style.transition = 'none';
            const offset = -getSlideHeight();
            track.style.transform = `translateY(${offset}px)`;
            setTimeout(() => {
                track.style.transition = 'transform 0.8s ease-in-out';
            }, 50);
        }
    });

    // Initialize first slide as active
    slides[0].classList.add('active');

    // Auto-advance slides
    const autoAdvance = setInterval(nextSlide, 4000);

    // Pause auto-advance on hover
    track.addEventListener('mouseenter', () => clearInterval(autoAdvance));
    track.addEventListener('mouseleave', () => setInterval(nextSlide, 4000));

    // Initial positioning
    updateSlides();

    // Handle resize
    window.addEventListener('resize', () => {
        goToSlide(currentIndex, false);
    });

    // Scroll indicator
    const scrollIndicator = document.querySelector('.scroll-indicator');
    
    window.addEventListener('scroll', () => {
        const maxScroll = document.documentElement.scrollHeight - window.innerHeight;
        const currentScroll = window.scrollY;
        const scrollPercentage = (currentScroll / maxScroll) * 100;
        scrollIndicator.style.transform = `scaleX(${scrollPercentage / 100})`;
    });

    // Smooth reveal animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('reveal');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    document.querySelectorAll('.work-box, .work-box-web, .edu, .skill').forEach(el => {
        el.classList.add('hidden');
        observer.observe(el);
    });
}); 
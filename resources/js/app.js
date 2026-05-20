import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

const setupScrollProgress = () => {
    if (!document.querySelector('.progress-line')) {
        const progressLine = document.createElement('div');
        progressLine.className = 'progress-line';
        document.body.append(progressLine);
    }

    let ticking = false;

    const updateProgress = () => {
        const scrollTop = window.scrollY;
        const maxScroll = document.documentElement.scrollHeight - window.innerHeight;
        const progress = maxScroll > 0 ? (scrollTop / maxScroll) * 100 : 0;
        document.body.style.setProperty('--scroll-progress', `${progress}%`);
        ticking = false;
    };

    const requestProgressUpdate = () => {
        if (ticking) {
            return;
        }

        ticking = true;
        window.requestAnimationFrame(updateProgress);
    };

    updateProgress();
    window.addEventListener('scroll', requestProgressUpdate, { passive: true });
    window.addEventListener('resize', requestProgressUpdate);
};

const setupRevealAnimations = () => {
    if (prefersReducedMotion) {
        return;
    }

    const candidates = document.querySelectorAll('[data-reveal]');
    candidates.forEach((element, index) => {
        if (element.closest('nav')) {
            return;
        }

        element.classList.add('ui-reveal');
        element.style.transitionDelay = `${Math.min(index * 45, 240)}ms`;
    });

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.14 });

    document.querySelectorAll('.ui-reveal').forEach((element) => observer.observe(element));
};

document.addEventListener('DOMContentLoaded', () => {
    setupScrollProgress();
    setupRevealAnimations();
});

/**
 * Forseti Management System - Global Interactions
 * Handles mobile navigation, scroll animations, and smooth scroll
 */

(function() {
  'use strict';

  // ---------------------------------------------------
  // Mobile Navigation Toggle
  // ---------------------------------------------------
  const navToggle = document.querySelector('.fms-nav-toggle');
  const navLinks = document.querySelector('.fms-nav-links');

  if (navToggle && navLinks) {
    navToggle.addEventListener('click', function() {
      this.classList.toggle('open');
      navLinks.classList.toggle('open');
      document.body.classList.toggle('nav-open');
    });

    // Close menu when clicking a link
    navLinks.querySelectorAll('a').forEach(function(link) {
      link.addEventListener('click', function() {
        navToggle.classList.remove('open');
        navLinks.classList.remove('open');
        document.body.classList.remove('nav-open');
      });
    });
  }

  // ---------------------------------------------------
  // Navbar scroll effect
  // ---------------------------------------------------
  const nav = document.querySelector('.fms-nav');
  let lastScroll = 0;

  function handleScroll() {
    const currentScroll = window.pageYOffset || document.documentElement.scrollTop;

    if (nav) {
      if (currentScroll > 50) {
        nav.classList.add('scrolled');
      } else {
        nav.classList.remove('scrolled');
      }
    }

    lastScroll = currentScroll;
  }

  window.addEventListener('scroll', handleScroll, { passive: true });
  handleScroll();

  // ---------------------------------------------------
  // Scroll Reveal Animation (IntersectionObserver)
  // ---------------------------------------------------
  const revealElements = document.querySelectorAll('.reveal');

  if (revealElements.length > 0) {
    const revealObserver = new IntersectionObserver(function(entries) {
      entries.forEach(function(entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          revealObserver.unobserve(entry.target);
        }
      });
    }, {
      threshold: 0.1,
      rootMargin: '0px 0px -50px 0px'
    });

    revealElements.forEach(function(el) {
      revealObserver.observe(el);
    });
  }

  // ---------------------------------------------------
  // Active nav link highlighting
  // ---------------------------------------------------
  const currentPath = window.location.pathname.split('/').pop() || 'index.html';
  document.querySelectorAll('.fms-nav-link').forEach(function(link) {
    const href = link.getAttribute('href');
    if (href === currentPath || (currentPath === '' && href === 'index.html')) {
      link.classList.add('active');
    }
  });

  // ---------------------------------------------------
  // Smooth scroll for anchor links
  // ---------------------------------------------------
  document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
    anchor.addEventListener('click', function(e) {
      const targetId = this.getAttribute('href');
      if (targetId === '#') return;
      const target = document.querySelector(targetId);
      if (target) {
        e.preventDefault();
        target.scrollIntoView({
          behavior: 'smooth',
          block: 'start'
        });
      }
    });
  });

  // ---------------------------------------------------
  // Form focus enhancements
  // ---------------------------------------------------
  document.querySelectorAll('.fms-input, .fms-textarea, .fms-select').forEach(function(input) {
    input.addEventListener('focus', function() {
      this.closest('.fms-form-group')?.classList.add('focused');
    });
    input.addEventListener('blur', function() {
      this.closest('.fms-form-group')?.classList.remove('focused');
    });
  });

  // ---------------------------------------------------
  // Button ripple effect
  // ---------------------------------------------------
  document.querySelectorAll('.fms-btn').forEach(function(btn) {
    btn.addEventListener('click', function(e) {
      const rect = this.getBoundingClientRect();
      const ripple = document.createElement('span');
      const size = Math.max(rect.width, rect.height);
      const x = e.clientX - rect.left - size / 2;
      const y = e.clientY - rect.top - size / 2;

      ripple.style.cssText = `
        position: absolute;
        border-radius: 50%;
        background: rgba(255,255,255,0.3);
        width: ${size}px;
        height: ${size}px;
        left: ${x}px;
        top: ${y}px;
        pointer-events: none;
        transform: scale(0);
        animation: rippleEffect 0.6s ease-out;
      `;

      this.style.position = 'relative';
      this.style.overflow = 'hidden';
      this.appendChild(ripple);

      setTimeout(function() {
        ripple.remove();
      }, 600);
    });
  });

  // Add ripple keyframes dynamically if not present
  if (!document.getElementById('ripple-style')) {
    const style = document.createElement('style');
    style.id = 'ripple-style';
    style.textContent = `
      @keyframes rippleEffect {
        to {
          transform: scale(2);
          opacity: 0;
        }
      }
    `;
    document.head.appendChild(style);
  }

})();

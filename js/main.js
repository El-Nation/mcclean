/* ============================================================
   McClean Elite Servicing — Main JavaScript
   ============================================================ */

document.addEventListener('DOMContentLoaded', () => {

  /* ── Navbar scroll effect ── */
  const navbar = document.getElementById('navbar');
  const scrollTop = document.getElementById('scroll-top');

  window.addEventListener('scroll', () => {
    if (window.scrollY > 60) {
      navbar.classList.add('scrolled');
      scrollTop.classList.add('visible');
    } else {
      navbar.classList.remove('scrolled');
      scrollTop.classList.remove('visible');
    }

    // Scroll to top button visibility only
  }, { passive: true });

  /* ── Scroll to top ── */
  scrollTop.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));

  /* ── Hamburger mobile menu ── */
  const hamburger  = document.querySelector('.hamburger');
  const mobileNav  = document.querySelector('.mobile-nav');

  hamburger.addEventListener('click', () => {
    mobileNav.classList.toggle('open');
    const spans = hamburger.querySelectorAll('span');
    if (mobileNav.classList.contains('open')) {
      spans[0].style.transform = 'rotate(45deg) translate(5px, 5px)';
      spans[1].style.opacity   = '0';
      spans[2].style.transform = 'rotate(-45deg) translate(5px, -5px)';
    } else {
      spans.forEach(s => { s.style.transform = ''; s.style.opacity = ''; });
    }
  });

  document.querySelectorAll('.mobile-nav a').forEach(a => {
    a.addEventListener('click', () => {
      mobileNav.classList.remove('open');
      hamburger.querySelectorAll('span').forEach(s => { s.style.transform = ''; s.style.opacity = ''; });
    });
  });

  /* ── Scroll reveal ── */
  const revealEls = document.querySelectorAll('.reveal');
  const revealObs = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) { e.target.classList.add('visible'); revealObs.unobserve(e.target); }
    });
  }, { threshold: 0.1 });
  revealEls.forEach(el => revealObs.observe(el));



  /* ── FAQ accordion ── */
  document.querySelectorAll('.faq-question').forEach(btn => {
    btn.addEventListener('click', () => {
      const item = btn.closest('.faq-item');
      const isOpen = item.classList.contains('open');
      document.querySelectorAll('.faq-item').forEach(i => i.classList.remove('open'));
      if (!isOpen) item.classList.add('open');
    });
  });

  /* ── Booking modal ── */
  const modal      = document.getElementById('booking-modal');
  const openBtns   = document.querySelectorAll('[data-open-modal]');
  const closeModal = document.getElementById('close-modal');

  openBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      modal.classList.add('open');
      document.body.style.overflow = 'hidden';
      // Pre-fill service if data attribute
      if (btn.dataset.service) {
        const sel = document.getElementById('book-service');
        if (sel) sel.value = btn.dataset.service;
      }
    });
  });

  function closeBookingModal() {
    modal.classList.remove('open');
    document.body.style.overflow = '';
  }

  closeModal.addEventListener('click', closeBookingModal);
  modal.addEventListener('click', e => { if (e.target === modal) closeBookingModal(); });
  document.addEventListener('keydown', e => { if (e.key === 'Escape') closeBookingModal(); });

  /* ── Booking form submission ── */
  const bookingForm = document.getElementById('booking-form');
  if (bookingForm) {
    bookingForm.addEventListener('submit', async (e) => {
      e.preventDefault();
      const btn = bookingForm.querySelector('[type="submit"]');
      const msg = document.getElementById('booking-message');
      btn.textContent = 'Scheduling...';
      btn.disabled = true;

      try {
        const res = await fetch('php/booking_handler.php', {
          method: 'POST',
          body: new FormData(bookingForm)
        });
        const data = await res.json();
        msg.className = 'form-message ' + (data.success ? 'success' : 'error');
        msg.textContent = data.message;
        if (data.success) {
          bookingForm.reset();
          setTimeout(closeBookingModal, 3500);
        }
      } catch {
        msg.className = 'form-message error';
        msg.textContent = 'Network error. Please try again.';
      } finally {
        btn.textContent = 'Schedule Pickup';
        btn.disabled = false;
      }
    });
  }

  /* ── Contact form submission ── */
  const contactForm = document.getElementById('contact-form');
  if (contactForm) {
    contactForm.addEventListener('submit', async (e) => {
      e.preventDefault();
      const btn = contactForm.querySelector('[type="submit"]');
      const msg = document.getElementById('contact-message');
      const origText = btn.textContent;
      btn.textContent = 'Sending…';
      btn.disabled = true;

      try {
        const res = await fetch('php/contact_handler.php', {
          method: 'POST',
          body: new FormData(contactForm)
        });
        const data = await res.json();
        msg.className = 'form-message ' + (data.success ? 'success' : 'error');
        msg.textContent = data.message;
        if (data.success) contactForm.reset();
      } catch {
        msg.className = 'form-message error';
        msg.textContent = 'Network error. Please try again.';
      } finally {
        btn.textContent = origText;
        btn.disabled = false;
      }
    });
  }

  /* ── Counter animation ── */
  function animateCount(el, target, duration = 1800) {
    let start = 0;
    const step = target / (duration / 16);
    const timer = setInterval(() => {
      start += step;
      if (start >= target) { el.textContent = target.toLocaleString(); clearInterval(timer); }
      else { el.textContent = Math.floor(start).toLocaleString(); }
    }, 16);
  }

  const counters = document.querySelectorAll('[data-count]');
  const counterObs = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        animateCount(e.target, parseInt(e.target.dataset.count));
        counterObs.unobserve(e.target);
      }
    });
  }, { threshold: 0.5 });
  counters.forEach(c => counterObs.observe(c));



  /* ── Smooth nav link scroll ── */
  document.querySelectorAll('a[href^="#"]').forEach(a => {
    a.addEventListener('click', (e) => {
      const target = document.querySelector(a.getAttribute('href'));
      if (target) {
        e.preventDefault();
        window.scrollTo({ top: target.offsetTop - 72, behavior: 'smooth' });
      }
    });
  });

});

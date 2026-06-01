/**
 * MyPlace Cleans — front-end JS.
 * Keep this lean: progressive enhancement only.
 */
(function () {
  'use strict';

  // Mobile nav toggle.
  var toggle = document.querySelector('.nav-toggle');
  var nav    = document.getElementById('mobile-nav');
  if (toggle && nav) {
    var openIcon  = toggle.querySelector('.nav-toggle__open');
    var closeIcon = toggle.querySelector('.nav-toggle__close');

    toggle.addEventListener('click', function () {
      var isOpen = nav.classList.toggle('is-open');
      toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
      if (openIcon && closeIcon) {
        openIcon.hidden  = isOpen;
        closeIcon.hidden = !isOpen;
      }
    });

    // Close on link click (mobile UX).
    nav.addEventListener('click', function (e) {
      if (e.target.closest('a')) {
        nav.classList.remove('is-open');
        toggle.setAttribute('aria-expanded', 'false');
        if (openIcon && closeIcon) { openIcon.hidden = false; closeIcon.hidden = true; }
      }
    });
  }

  // Smooth-scroll for in-page hash links.
  document.addEventListener('click', function (e) {
    var link = e.target.closest('a[href^="#"]');
    if (!link) return;
    var id = link.getAttribute('href');
    if (!id || id === '#') return;
    var target = document.querySelector(id);
    if (target) {
      e.preventDefault();
      target.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
  });
}());

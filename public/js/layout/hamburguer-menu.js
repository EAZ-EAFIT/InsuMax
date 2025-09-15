document.addEventListener('DOMContentLoaded', function () {
  const hamburgerBtn = document.getElementById('hamburger-btn');
  const navMenu = document.getElementById('nav-menu');

  function toggleMenu() {
    navMenu.classList.toggle('show');
    navMenu.classList.toggle('collapsed');
  }

  hamburgerBtn.addEventListener('click', toggleMenu);

  function checkScreenSize() {
    if (window.innerWidth <= 870) {
      navMenu.classList.add('collapsed');
      navMenu.classList.remove('show');
    } else {
      navMenu.classList.remove('collapsed');
      navMenu.classList.remove('show');
    }
  }

  checkScreenSize();
  window.addEventListener('resize', checkScreenSize);
});
var swiper = new Swiper(".slide-content", {
  slidesPerView: 1,
  spaceBetween: 30,
  loop: true,
  
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  
  },

 
  
});

document.addEventListener('DOMContentLoaded', function() {
  var navLinks = document.querySelectorAll('.navbar .nav-link');

  // Function to set the active link
  function setActiveLink(link) {
      navLinks.forEach(function(navLink) {
          navLink.classList.remove('active');
      });
      link.classList.add('active');
      localStorage.setItem('activeNavLink', link.getAttribute('href'));
  }

  // Check local storage for the active link
  var activeNavLink = localStorage.getItem('activeNavLink');
  if (activeNavLink) {
      var activeLink = document.querySelector('.navbar .nav-link[href="' + activeNavLink + '"]');
      if (activeLink) {
          activeLink.classList.add('active');
      }
  }

  // Add click event listeners to nav links
  navLinks.forEach(function(navLink) {
      navLink.addEventListener('click', function() {
          setActiveLink(this);
      });
  });
});

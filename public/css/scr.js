// Initialisation du Swiper
var swiper = new Swiper(".slide-content", {
  slidesPerView: 1,  // Nombre de slides visibles à la fois
  spaceBetween: 30,  // Espace entre les slides
  loop: true,  // Bouclage du carrousel
  loopAdditionalSlides: true,  // Nombre de slides supplémentaires ajoutés pour le défilement continu
  
  pagination: {  // Configuration de la pagination
    el: ".swiper-pagination",  // Sélecteur de l'élément de pagination
    clickable: true,  // Permet de cliquer sur les boutons de pagination
  },
  navigation: {  // Configuration de la navigation (boutons précédent et suivant)
    nextEl: ".swiper-button-next",  // Sélecteur du bouton suivant
    prevEl: ".swiper-button-prev",  // Sélecteur du bouton précédent
  },
});

// Événement chargement du DOM
document.addEventListener('DOMContentLoaded', function() {
  var navLinks = document.querySelectorAll('.navbar .nav-link');  // Sélection de tous les liens de navigation dans la barre de navigation

  // Fonction pour définir le lien actif
  function setActiveLink(link) {
      navLinks.forEach(function(navLink) {  // Parcours de tous les liens de navigation
          navLink.classList.remove('active');  // Retrait de la classe 'active' pour tous les liens
      });
      link.classList.add('active');  // Ajout de la classe 'active' au lien cliqué
      localStorage.setItem('activeNavLink', link.getAttribute('href'));  // Stockage du lien actif dans le stockage local
  }

  // Vérification du stockage local pour le lien actif
  var activeNavLink = localStorage.getItem('activeNavLink');
  if (activeNavLink) {
      var activeLink = document.querySelector('.navbar .nav-link[href="' + activeNavLink + '"]');
      if (activeLink) {
          activeLink.classList.add('active');  // Ajout de la classe 'active' au lien actif récupéré depuis le stockage local
      }
  }

  // Ajout d'écouteurs d'événements de clic sur les liens de navigation
  navLinks.forEach(function(navLink) {
      navLink.addEventListener('click', function() {
          setActiveLink(this);  // Appel de la fonction pour définir le lien actif au clic
      });
  });
});

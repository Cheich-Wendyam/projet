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

document.addEventListener('DOMContentLoaded', function() {
  // Récupérer les favoris du stockage local
  const favorites = JSON.parse(localStorage.getItem('favorites')) || [];

  // Mettre à jour les icônes de favoris en fonction du stockage local
  document.querySelectorAll('.card').forEach(function(card) {
      const id = card.getAttribute('data-id');
      const icon = card.querySelector('.favorite-icon');
      if (favorites.includes(id)) {
          icon.classList.add('favorited');
      }
      // Ajouter l'événement click à chaque icône
      icon.addEventListener('click', function() {
          this.classList.toggle('favorited');
          updateFavorites(id);
      });
  });

  // Fonction pour mettre à jour les favoris dans le stockage local
  function updateFavorites(id) {
      const favorites = JSON.parse(localStorage.getItem('favorites')) || [];
      if (favorites.includes(id)) {
          // Supprimer des favoris
          const index = favorites.indexOf(id);
          favorites.splice(index, 1);
      } else {
          // Ajouter aux favoris
          favorites.push(id);
      }
      localStorage.setItem('favorites', JSON.stringify(favorites));
  }
});

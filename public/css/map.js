document.addEventListener('DOMContentLoaded', function () {
    // Récupérer l'élément de la carte et les données JSON des espaces, restos et sites
    var mapElement = document.getElementById('map');
    var spaces = JSON.parse(mapElement.getAttribute('data-spaces'));
    var restos = JSON.parse(mapElement.getAttribute('data-restos'));
    var sites = JSON.parse(mapElement.getAttribute('data-sites'));

    // Initialiser la carte Leaflet centrée sur Ouagadougou
    var map = L.map('map').setView([12.3714, -1.5197], 13);

    // Ajouter la couche de tuiles OpenStreetMap à la carte
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 18,
        attribution: '© OpenStreetMap'
    }).addTo(map);

    var userLocation; // Variable pour stocker la position de l'utilisateur

    // Fonction pour obtenir l'icône en fonction du type d'établissement
    function getIconByType(type) {
        var iconUrl = '';
        var iconSize = [32, 32];
        var iconAnchor = [16, 32];
        var popupAnchor = [0, -32];

        // Définir les icônes différentes en fonction du type
        switch (type) {
            case 'space':
                iconUrl = '/images/loisirs.png';
                break;
            case 'resto':
                iconUrl = '/images/restos.png';
                break;
            case 'site':
                iconUrl = '/images/monuments.png';
                break;
            default:
                iconUrl = '/images/default-icon.png';
                break;
        }

        return L.icon({
            iconUrl: iconUrl,
            iconSize: iconSize,
            iconAnchor: iconAnchor,
            popupAnchor: popupAnchor
        });
    }

    // Fonction pour calculer et afficher l'itinéraire
    function calculateRoute(start, destination) {
        L.Routing.control({
            waypoints: [
                L.latLng(start),        // Point de départ (position de l'utilisateur)
                L.latLng(destination)   // Point de destination (marqueur cliqué)
            ],
            routeWhileDragging: true,   // Mettre à jour l'itinéraire lors du déplacement de la carte
            router: new L.Routing.OSRMv1({
                serviceUrl: 'https://router.project-osrm.org/route/v1'
            })
        }).addTo(map);
    }

    // Fonction pour ajouter des marqueurs pour chaque type d'établissement
    function addMarkersForType(spaces, iconType) {
        spaces.forEach(function(space) {
            var icon = getIconByType(iconType);

            var marker = L.marker([space.latitude, space.longitude], { icon: icon })
                .addTo(map)
                .bindPopup("<b>" + space.Titre + "</b><br>" + space.description);

            // Ajouter un écouteur d'événement de clic pour afficher l'itinéraire lorsque le marqueur est cliqué
            marker.on('click', function(e) {
                if (userLocation) {
                    calculateRoute(userLocation, [space.latitude, space.longitude]);
                } else {
                    alert('Votre position n\'a pas été trouvée. Veuillez activer la géolocalisation.');
                }
            });
        });
    }

    // Ajouter des marqueurs pour chaque type (espaces, restos, sites)
    addMarkersForType(spaces, 'space');
    addMarkersForType(restos, 'resto');
    addMarkersForType(sites, 'site');

    // Utiliser l'API de géolocalisation du navigateur pour obtenir la position de l'utilisateur
    if (navigator.geolocation) {
        console.log('Géolocalisation est supportée.');
        navigator.geolocation.getCurrentPosition(function (position) {
            console.log('Position obtenue:', position);
            userLocation = [position.coords.latitude, position.coords.longitude];
            map.setView(userLocation, 13); // Centrer la carte sur la position de l'utilisateur

            // Ajouter un marqueur pour la position de l'utilisateur
            L.marker(userLocation).addTo(map).bindPopup("Vous êtes ici").openPopup();
        }, function (error) {
            console.error('Erreur de géolocalisation:', error);
            alert('La géolocalisation a échoué. Veuillez vérifier vos paramètres de localisation.');
        });
    } else {
        console.error('Géolocalisation n\'est pas supportée par ce navigateur.');
        alert('Votre navigateur ne supporte pas la géolocalisation.');
    }


   // Ajouter un bouton pour activer/désactiver la localisation
   var locationButton = L.control({ position: 'topright' });
   locationButton.onAdd = function (map) {
       var button = L.DomUtil.create('button', 'location-button');
       button.innerHTML = '<i class="fas fa-location-arrow"></i>';
       button.addEventListener('click', function() {
           if (userLocation) {
               map.setView(userLocation, 13);
               L.marker(userLocation).addTo(map).bindPopup("Vous êtes ici").openPopup();
           } else {
               alert('Votre position n\'a pas été trouvée. Veuillez activer la géolocalisation.');
           }
       });
       return button;
   };
   locationButton.addTo(map);

   // Ajouter un bouton pour ajuster le zoom
   var zoomButton = L.control({ position: 'topright' });
   zoomButton.onAdd = function (map) {
       var button = L.DomUtil.create('button', 'zoom-button');
       button.innerHTML = '<i class="fas fa-search-plus"></i>';
       button.addEventListener('click', function() {
           // Par exemple, ajuster le zoom à 15
           map.setZoom(15);
       });
       return button;
   };
   zoomButton.addTo(map);
});

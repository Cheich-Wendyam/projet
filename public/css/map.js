document.addEventListener('DOMContentLoaded', function () {
    // Récupérer l'élément de la carte et les données JSON des espaces, restos et sites
    var mapElement = document.getElementById('map');
    var spaces = JSON.parse(mapElement.getAttribute('data-spaces'));
    var restos = JSON.parse(mapElement.getAttribute('data-restos'));
    var sites = JSON.parse(mapElement.getAttribute('data-sites'));
    var event = JSON.parse(mapElement.getAttribute('data-event'));
    var hotels = JSON.parse(mapElement.getAttribute('data-hotels'));
    var restaurantData = JSON.parse(mapElement.getAttribute('data-restaurant'));
    var currentRoute = null; // Variable pour stocker l'itinéraire actuellement affiché

    // Initialiser la carte Leaflet centrée sur Ouagadougou
    var map = L.map('map').setView([12.3714, -1.5197], 13);

    var searchResults = L.layerGroup().addTo(map);

    // Ajouter la couche de tuiles OpenStreetMap à la carte
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 18,
        attribution: '© OpenStreetMap'
    }).addTo(map);

    var userLocation; // Variable pour stocker la position de l'utilisateur
    var userMarker; // Variable pour le marqueur de la position de l'utilisateur

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
            case 'event':
                iconUrl = '/images/even.png';
                break;
            case 'hotel':
                iconUrl = '/images/hote.png';
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
        // Supprimer l'itinéraire précédent s'il existe
        if (currentRoute) {
            map.removeControl(currentRoute);
        }

        currentRoute = L.Routing.control({
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
                .bindPopup("<b>" + space.Titre + "</b><br><img src='" + space.image + "' alt='Image'/><br>" + space.description);

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
    addMarkersForType(event, 'event');
    addMarkersForType(hotels, 'hotel');

    // Utiliser l'API de géolocalisation du navigateur pour obtenir la position de l'utilisateur
    if (navigator.geolocation) {
        console.log('Géolocalisation est supportée.');
        navigator.geolocation.getCurrentPosition(function (position) {
            console.log('Position obtenue:', position);
            userLocation = [position.coords.latitude, position.coords.longitude];
            map.setView(userLocation, 13); // Centrer la carte sur la position de l'utilisateur

            // Ajouter un marqueur pour la position de l'utilisateur
            userMarker = L.marker(userLocation).addTo(map).bindPopup("Vous êtes ici").openPopup();
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
                if (userMarker) {
                    userMarker.setLatLng(userLocation).bindPopup("Vous êtes ici").openPopup();
                } else {
                    userMarker = L.marker(userLocation).addTo(map).bindPopup("Vous êtes ici").openPopup();
                }
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
    
    // bouton de recherche et champ de saisi pour rechercher un element peu importe l'element sur la carte
    var searchButton = L.control({ position: 'topright' });
    searchButton.onAdd = function (map) {
        var div = L.DomUtil.create('div', 'search-container');
        var button = L.DomUtil.create('button', 'search-button', div);
        button.innerHTML = '<i class="fas fa-search"></i>';
        var searchInput = L.DomUtil.create('input', 'search-input', div);
        searchInput.type = 'text';
        searchInput.placeholder = 'Rechercher...';
        searchInput.style.display = 'none';

        button.addEventListener('click', function () {
            if (searchInput.style.display === 'none') {
                searchInput.style.display = 'block';
                searchInput.focus();
            } else {
                var searchText = searchInput.value.toLowerCase();
                if (searchText) {
                    searchResults.clearLayers();

                    if (searchText === 'restaurants' || searchText === 'restos' || searchText === 'resto' || searchText === 'nourriture' || searchText === 'food') {
                        restos.forEach(function (resto) {
                            var marker = L.marker([resto.latitude, resto.longitude]).addTo(searchResults);
                            marker.bindPopup("<b>" + resto.Titre + "</b><br>" + resto.description);
                        });
                    } else if (searchText === 'sites' || searchText === 'site' || searchText === 'loisirs' || searchText === 'parks' || searchText === 'loisir' || searchText === 'detente')  {
                        sites.forEach(function (site) {
                            var marker = L.marker([site.latitude, site.longitude]).addTo(searchResults);
                            marker.bindPopup("<b>" + site.Titre + "</b><br>" + site.description);
                        });
                    } else if(searchText === 'événements' || searchText === 'events' || searchText === 'event' || searchText === 'festivals' || searchText === 'festivale' || searchText === 'festivales' || searchText === 'evenements' || searchText === 'evenement' || searchText === 'évènements') {
                        events.forEach(function (event) {
                            var marker = L.marker([event.latitude, event.longitude]).addTo(searchResults);
                            marker.bindPopup("<b>" + event.Titre + "</b><br>" + event.description);
                        });
                    }
                    else if (searchText === 'hotels' || searchText === 'hotel' || searchText === 'chambres' || searchText === 'chambre' || searchText === 'logements' || searchText === 'lodges' || searchText === 'hôtels' || searchText === 'hôtel') {
                        hotels.forEach(function (hotel) {
                            var marker = L.marker([hotel.latitude, hotel.longitude]).addTo(searchResults);
                            marker.bindPopup("<b>" + hotel.Titre + "</b><br>" + hotel.description);
                        });
                    } else if (searchText === 'espaces') {
                        spaces.forEach(function (space) {
                            var marker = L.marker([space.latitude, space.longitude]).addTo(searchResults);
                            marker.bindPopup("<b>" + space.Titre + "</b><br>" + space.description);
                        });
                    } else {
                        spaces.forEach(function (space) {
                            if (space.Titre.toLowerCase().includes(searchText)) {
                                var marker = L.marker([space.latitude, space.longitude]).addTo(searchResults);
                                marker.bindPopup("<b>" + space.Titre + "</b><br>" + space.description);
                            }
                        });

                        restos.forEach(function (resto) {
                            if (resto.Titre.toLowerCase().includes(searchText)) {
                                var marker = L.marker([resto.latitude, resto.longitude]).addTo(searchResults);
                                marker.bindPopup("<b>" + resto.Titre + "</b><br>" + resto.description);
                            }
                        });

                        hotels.forEach(function (hotel) {
                            if (hotel.Titre.toLowerCase().includes(searchText)) {
                                var marker = L.marker([hotel.latitude, hotel.longitude]).addTo(searchResults);
                                marker.bindPopup("<b>" + hotel.Titre + "</b><br>" + hotel.description);
                            }
                        });

                        events.forEach(function (event) {
                            if (event.Titre.toLowerCase().includes(searchText)) {
                                var marker = L.marker([event.latitude, event.longitude]).addTo(searchResults);
                                marker.bindPopup("<b>" + event.Titre + "</b><br>" + event.description);
                            }
                        });

                        sites.forEach(function (site) {
                            if (site.Titre.toLowerCase().includes(searchText)) {
                                var marker = L.marker([site.latitude, site.longitude]).addTo(searchResults);
                                marker.bindPopup("<b>" + site.Titre + "</b><br>" + site.description);
                            }
                        });
                    }

                    map.addLayer(searchResults);
                } else {
                    alert('Veuillez entrer quelque chose dans la zone de recherche.');
                }
            }
        });

        L.DomEvent.on(searchInput, 'keydown', function (e) {
            if (e.key === 'Enter') {
                var searchText = searchInput.value.toLowerCase();
                if (searchText) {
                    searchResults.clearLayers();

                    if (searchText === 'restaurants') {
                        restos.forEach(function (resto) {
                            var marker = L.marker([resto.latitude, resto.longitude]).addTo(searchResults);
                            marker.bindPopup("<b>" + resto.Titre + "</b><br>" + resto.description);
                        });
                    } else if (searchText === 'sites') {
                        sites.forEach(function (site) {
                            var marker = L.marker([site.latitude, site.longitude]).addTo(searchResults);
                            marker.bindPopup("<b>" + site.Titre + "</b><br>" + site.description);
                        });
                    } else if (searchText === 'hotels') {
                        
                        hotels.forEach(function (hotel) {
                            var marker = L.marker([hotel.latitude, hotel.longitude]).addTo(searchResults);
                            marker.bindPopup("<b>" + hotel.Titre + "</b><br>" + hotel.description);
                        });
                    } else if (searchText === 'evenements' || searchText === 'event' || searchText === 'festivals' || searchText === 'festivale' || searchText === 'festivales' || searchText === 'evenements' || searchText === 'evenement' || searchText === 'évènements') {
                        events.forEach(function (event) {
                            var marker = L.marker([event.latitude, event.longitude]).addTo(searchResults);
                            marker.bindPopup("<b>" + event.Titre + "</b><br>" + event.description);
                        });
                    } 
                    else if (searchText === 'espaces') {
                        spaces.forEach(function (space) {
                            var marker = L.marker([space.latitude, space.longitude]).addTo(searchResults);
                            marker.bindPopup("<b>" + space.Titre + "</b><br>" + space.description);
                        });
                    } else {
                        spaces.forEach(function (space) {
                            if (space.Titre.toLowerCase().includes(searchText)) {
                                var marker = L.marker([space.latitude, space.longitude]).addTo(searchResults);
                                marker.bindPopup("<b>" + space.Titre + "</b><br>" + space.description);
                            }
                        });

                        restos.forEach(function (resto) {
                            if (resto.Titre.toLowerCase().includes(searchText)) {
                                var marker = L.marker([resto.latitude, resto.longitude]).addTo(searchResults);
                                marker.bindPopup("<b>" + resto.Titre + "</b><br>" + resto.description);
                            }
                        });

                        hotels.forEach(function (hotel) {
                            if (hotel.Titre.toLowerCase().includes(searchText)) {
                                var marker = L.marker([hotel.latitude, hotel.longitude]).addTo(searchResults);
                                marker.bindPopup("<b>" + hotel.Titre + "</b><br>" + hotel.description);
                            }
                        });

                        events.forEach(function (event) {
                            if (event.Titre.toLowerCase().includes(searchText)) {
                                var marker = L.marker([event.latitude, event.longitude]).addTo(searchResults);
                                marker.bindPopup("<b>" + event.Titre + "</b><br>" + event.description);
                            }
                        });

                        sites.forEach(function (site) {
                            if (site.Titre.toLowerCase().includes(searchText)) {
                                var marker = L.marker([site.latitude, site.longitude]).addTo(searchResults);
                                marker.bindPopup("<b>" + site.Titre + "</b><br>" + site.description);
                            }
                        });
                    }

                    map.addLayer(searchResults);
                } else {
                    alert('Veuillez entrer quelque chose dans la zone de recherche.');
                }
            }
        });

        return div;
    };
    searchButton.addTo(map);


   

    function showOnMap(latitude, longitude, Titre, description) {
        var destination = [latitude, longitude];
        var marker = L.marker(destination)
            .addTo(map)
            .bindPopup("<b>" + Titre + "</b><br>" + description)
            .openPopup();
        map.setView(destination, 15);
    }

    if (restaurantData) {
        showOnMap(restaurantData.latitude, restaurantData.longitude, restaurantData.Titre, restaurantData.description);
    }

    // Corriger les erreurs potentielles dans les noms des variables et ajouter la condition pour les données des sites et des restos
    if (sites) {
        sites.forEach(function(site) {
            showOnMap(site.latitude, site.longitude, site.Titre, site.description);
        });
    }

    if (restos) {
        restos.forEach(function(resto) {
            showOnMap(resto.latitude, resto.longitude, resto.Titre, resto.description);
        });
    }

    if (hotels) {
        hotels.forEach(function(hotel) {
            showOnMap(hotel.latitude, hotel.longitude, hotel.Titre, hotel.description);
        });
    }

    if (events) {
        events.forEach(function(event) {
            showOnMap(event.latitude, event.longitude, event.Titre, event.description);
        });
    }


   
});

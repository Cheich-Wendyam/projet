document.addEventListener('DOMContentLoaded', function () {
    var mapElement = document.getElementById('map');
    var spaces = JSON.parse(mapElement.getAttribute('data-spaces'));
    var restos = JSON.parse(mapElement.getAttribute('data-restos'));
    var sites = JSON.parse(mapElement.getAttribute('data-sites'));

    var map = L.map('map').setView([12.3714, -1.5197], 13); // Centrer la carte sur Ouagadougou

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 18,
        attribution: '© OpenStreetMap'
    }).addTo(map);

    var userLocation;

    // Function to determine icon based on type
    function getIconByType(type) {
        var iconUrl = '';
        var iconSize = [32, 32];
        var iconAnchor = [16, 32];
        var popupAnchor = [0, -32];

        // Set different icons based on type
        switch (type) {
            case 'space':
                iconUrl = '/images/cinemas.png';
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

    // Function to add markers for each type of establishment
    function addMarkersForType(spaces, iconType) {
        spaces.forEach(function(space) {
            var icon = getIconByType(iconType);

            var marker = L.marker([space.latitude, space.longitude], { icon: icon })
                .addTo(map)
                .bindPopup("<b>" + space.Titre + "</b><br>" + space.description);

            // Add click event listener to show route when marker is clicked
            marker.on('click', function(e) {
                if (userLocation) {
                    calculateRoute(userLocation, [space.latitude, space.longitude]);
                } else {
                    alert('Votre position n\'a pas été trouvée. Veuillez activer la géolocalisation.');
                }
            });
        });
    }

    // Add markers for each type
    addMarkersForType(spaces, 'space');
    addMarkersForType(restos, 'resto');
    addMarkersForType(sites, 'site');

    // Function to calculate and display route
    function calculateRoute(start, destination) {
        L.Routing.control({
            waypoints: [
                L.latLng(start),     // Start point (user location)
                L.latLng(destination) // Destination point (clicked marker)
            ],
            routeWhileDragging: true // Update route while dragging the map
        }).addTo(map);
    }

    // Use the browser's geolocation API to get user's location
    if (navigator.geolocation) {
        console.log('Géolocalisation est supportée.');
        navigator.geolocation.getCurrentPosition(function (position) {
            console.log('Position obtenue:', position);
            userLocation = [position.coords.latitude, position.coords.longitude];
            map.setView(userLocation, 13); // Center the map on the user's location

            // Add a marker for the user's location
            L.marker(userLocation).addTo(map).bindPopup("Vous êtes ici").openPopup();
        }, function (error) {
            console.error('Erreur de géolocalisation:', error);
            alert('La géolocalisation a échoué. Veuillez vérifier vos paramètres de localisation.');
        });
    } else {
        console.error('Géolocalisation n\'est pas supportée par ce navigateur.');
        alert('Votre navigateur ne supporte pas la géolocalisation.');
    }
});


document.addEventListener('DOMContentLoaded', function () {
    var mapElement = document.getElementById('map');
    var spaces = JSON.parse(mapElement.getAttribute('data-spaces'));

    var map = L.map('map').setView([12.3714, -1.5197], 13); // Centrer la carte sur Ouagadougou

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 18,
        attribution: '© OpenStreetMap'
    }).addTo(map);

    // Use the spaces data to add markers to the map
    spaces.forEach(function(space) {
        L.marker([space.latitude, space.longitude])
            .addTo(map)
            .bindPopup("<b>" + space.Titre + "</b><br>" + space.Description);
    });
});
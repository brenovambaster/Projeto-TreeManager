mapboxgl.accessToken = 'coloque aqui a chave da api'; // criar chave no site da mapbox. 
var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/brenocardoso12/ckbs0cpyw0d5t1iqwp17iuear?optimize=true',
    center: [-42.2863, -16.1569],
    zoom: 13.35,
    pitch: 60
});
map.addControl(new mapboxgl.NavigationControl());
map.addControl(new mapboxgl.GeolocateControl({
    positionOptions: {
        enableHighAccuracy: true
    },
    trackUserLocation: true,
    showAccuracyCircle: false,
    showUserLocation: true
}));


map.on('load', function() {
    map.loadImage(
        "https://img.icons8.com/emoji/33/000000/deciduous-tree-emoji.png",
        function(error, image) {
            map.addImage('tree', image);
            map.addSource('places', {
                'type': 'geojson',
                'data': json
            });
            // Add a layer showing the places.
            map.addLayer({
                'id': 'places',
                'type': 'symbol',
                'source': 'places',
                'layout': {
                    'icon-image': 'tree',
                    'icon-allow-overlap': true
                }
            });

            // When a click event occurs on a feature in the places layer, open a popup at the
            // location of the feature, with description HTML from its properties.
            map.on('click', 'places', function(e) {
                var coordinates = e.features[0].geometry.coordinates.slice();
                var description = e.features[0].properties.description;

                // Ensure that if the map is zoomed out such that multiple
                // copies of the feature are visible, the popup appears
                // over the copy being pointed to.
                while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
                    coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
                }

                new mapboxgl.Popup()
                    .setLngLat(coordinates)
                    .setHTML(description)
                    .setMaxWidth("300px")
                    .addTo(map);
            });

            // Change the cursor to a pointer when the mouse is over the places layer.
            map.on('mouseenter', 'places', function() {
                map.getCanvas().style.cursor = 'pointer';
            });

            // Change it back to a pointer when it leaves.
            map.on('mouseleave', 'places', function() {
                map.getCanvas().style.cursor = '';
            });
        }
    );


});
@extends('app')

@section('header', 'PETA KUA-KUA KABUPATEN PULAU MOROTAI')

@section('css')
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css' rel='stylesheet' />
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css"
        type="text/css">

    <style>
        #map {
            width: 950px;
            height: 500px;
        }
    </style>
@endsection

@section('content')
    <div id='map'></div>
@endsection

@push('scripts')
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js'></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>

    <script>
        mapboxgl.accessToken = `{{ env('MAPBOX_TOKEN') }}`;
        var map = new mapboxgl.Map({
            container: 'map',
            center: [128.40546, 2.19924],
            style: 'mapbox://styles/mapbox/streets-v12',
            zoom: 10.5,
        });

        var features;

        $.get('/api/kantor-urusan-agama', function(data) {
            data.forEach(function(kua) {

                features = data.map(kua => ({
                    type: 'Feature',
                    properties: {
                        description: `<strong>${kua.kecamatan}</strong><p>${kua.alamat} - ${kua.jumlah_penghulu}</p>`,
                    },
                    geometry: {
                        type: 'Point',
                        coordinates: [parseFloat(kua.longitude), parseFloat(kua.latitude)]
                    }
                }));

                new mapboxgl.Marker({
                        color: "#da4234",
                        draggable: true
                    })
                    .setLngLat([kua.longitude, kua.latitude])
                    .addTo(map);
            });

            const geojson = {
                type: 'FeatureCollection',
                features: features
            };

            console.log(geojson);

            map.on('load', () => {
                map.addSource('places', {
                    type: 'geojson', //geojson,video,image,canvas
                    data: geojson, //json data
                });

                map.addLayer({
                    'id': 'places',
                    'type': 'circle',
                    'source': 'places',
                    'paint': {
                        'circle-color': '#4264fb',
                        'circle-radius': 6,
                        'circle-stroke-width': 2,
                        'circle-stroke-color': '#ffffff'
                    }
                });
            });

            const popup = new mapboxgl.Popup({
                closeButton: false,
                closeOnClick: false
            });

            map.on('mouseenter', 'places', (e) => {
                // Change the cursor style as a UI indicator.
                map.getCanvas().style.cursor = 'pointer';

                // Copy coordinates array.
                const coordinates = e.features[0].geometry.coordinates.slice();
                const description = e.features[0].properties.description;

                // Ensure that if the map is zoomed out such that multiple
                // copies of the feature are visible, the popup appears
                // over the copy being pointed to.
                while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
                    coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
                }

                // Populate the popup and set its coordinates
                // based on the feature found.
                popup.setLngLat(coordinates).setHTML(description).addTo(map);
            });

            map.on('mouseleave', 'places', () => {
                map.getCanvas().style.cursor = '';
                popup.remove();
            });

            console.log(data);
        });

        // Add the control to the map.
        map.addControl(
            new MapboxGeocoder({
                accessToken: mapboxgl.accessToken,
                mapboxgl: mapboxgl
            })
        );
    </script>
@endpush

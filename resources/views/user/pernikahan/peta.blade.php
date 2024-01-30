@extends('app')

@section('header', 'PETA KUA-KUA KABUPATEN PULAU MOROTAI')

@section('css')
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.1/mapbox-gl-directions.css"
        type="text/css">

    <style>
        #map {
            width: 100%;
            min-height: 900px;
        }
    </style>
@endsection

@section('content')
    <div id='map'></div>
@endsection

@push('scripts')
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.1/mapbox-gl-directions.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.js"></script>

    <script>
        mapboxgl.accessToken = `{{ env('MAPBOX_TOKEN') }}`;
        var map = new mapboxgl.Map({
            container: 'map',
            center: [128.40546, 2.19924],
            style: 'mapbox://styles/mapbox/outdoors-v12',
            zoom: 10.5,
        });

        const directions = new MapboxDirections({
            language: 'id',
            accessToken: mapboxgl.accessToken,
            geocoder: false,
        });

        map.addControl(
            directions,
            'top-left'
        );

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                directions.setOrigin([position.coords.longitude, position.coords.latitude]);
            });
        }

        // let latitude = $('#map').data('latitude');
        // let longitude = $('#map').data('longitude');

        // const destinationCoordinates = [latitude,longitude]; // Koordinat lokasi tujuan
        const destinationCoordinates = [128.40546, 2.19924]; // Koordinat lokasi tujuan
        directions.setDestination(destinationCoordinates);
    </script>
@endpush

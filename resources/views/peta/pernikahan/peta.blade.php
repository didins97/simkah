@extends('app')

@section('header', 'Peta Pernikahan')

@section('css')
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.1/mapbox-gl-directions.css"
        type="text/css">
    <style>
        #map {
            width: 950px;
            height: 500px;
        }
    </style>
@endsection

@section('content')
    <div id="map" data-latitude="{{$pernikahan->latitude}}" data-longitude="{{$pernikahan->longitude}}"></div>
@endsection

@push('scripts')
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.1/mapbox-gl-directions.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.js"></script>
    <script>
        mapboxgl.accessToken = `{{ env('MAPBOX_TOKEN') }}`;
        const map = new mapboxgl.Map({
            container: 'map',
            // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
            style: 'mapbox://styles/mapbox/streets-v12',
            center: [128.40546, 2.19924],
            zoom: 13
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

        let latitude = $('#map').data('latitude');
        let longitude = $('#map').data('longitude');

        const destinationCoordinates = [latitude,longitude]; // Koordinat lokasi tujuan
        directions.setDestination(destinationCoordinates);
    </script>
@endpush

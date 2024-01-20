@extends('app')

@section('header', 'Daftar Kecamatan')

@section('css')
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css" rel="stylesheet">
    <style>
        #map {
            width: 600px;
            height: 500px;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>Info</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Nama Kecamatan : {{ $data->nama }}</li>
                        <li class="list-group-item">Luas Wilayah : -</li>
                        <li class="list-group-item">Pernikahan Terdaftar : {{ count($data->pernikahan) }}</li>
                        <li class="list-group-item">Vendor Terdaftar : {{ count($data->vendor) }}</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Map</h4>
                </div>
                <div class="card-body">
                    <div id='map' data-id="{{ $data->id }}"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.js"></script>

    <script>
        var data = @json($data)

        mapboxgl.accessToken = `{{ env('MAPBOX_TOKEN') }}`;
        var map = new mapboxgl.Map({
            container: 'map',
            center: data.lokasi['coordinates'],
            style: 'mapbox://styles/mapbox/streets-v12',
            zoom: 10.4,
        });

        var dataId = $('#map').data('id');

        console.log(data.lokasi['coordinates']);

        map.on('load', () => {
            map.addSource('kecamatanID', {
                type: 'geojson', //geojson,video,image,canvas
                data: data.borderline
            });

            // Add a black outline around the polygon.
            map.addLayer({
                'id': 'outline',
                'type': 'line',
                'source': 'kecamatanID',
                'layout': {},
                'paint': {
                    'line-color': '#fc544b',
                    'line-width': 3
                }
            });
        })
    </script>
@endpush

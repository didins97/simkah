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
        mapboxgl.accessToken = `{{ env('MAPBOX_TOKEN') }}`;
        var map = new mapboxgl.Map({
            container: 'map',
            center: [128.40546, 2.19924],
            style: 'mapbox://styles/mapbox/light-v11',
            zoom: 10.5,
        });

        var dataId = $('#map').data('id');

        fetch(`/api/geojson/kecamatan/${dataId}`)
            .then(response => response.json())
            .then(data => {
                console.log(data);
                // Tambahkan sumber data GeoJSON
                map.addSource('kecamatan', {
                    type: 'geojson',
                    data: data
                });
                map.addLayer({
                    'id': 'outline',
                    'type': 'line',
                    'source': 'kecamatan',
                    'layout': {},
                    'paint': {
                        'line-color': '#000',
                        'line-width': 3
                    }
                });
                map.addLayer({
                    'id': 'maine',
                    'type': 'fill',
                    'source': 'kecamatan', // reference the data source
                    'layout': {},
                    'paint': {
                        'fill-color': '#0080ff', // blue color fill
                        'fill-opacity': 0.5
                    }
                });

                // map.addLayer({
                //     'id': 'choropleth-labels',
                //     'type': 'symbol',
                //     'source': 'kecamatan',
                //     'layout': {
                //         'text-field': ['get', 'nama'], // Ini akan mengambil nilai dari properti 'nama'
                //         'text-size': 15,
                //         'text-anchor': 'top',
                //         'text-font': [
                //             'Open Sans Bold',
                //             'Arial Unicode MS Bold'
                //         ],
                //         'text-transform': 'uppercase',
                //         'text-letter-spacing': 0.05,
                //         'text-offset': [0, 1.5]
                //     }
                // });
            });
    </script>
@endpush

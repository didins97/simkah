@extends('app')

@section('header', 'Daftar KUA')

@section('css')
<link href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css' rel='stylesheet' />
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css"
        type="text/css">
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
                        <li class="list-group-item">Kecamatan : {{$data->kecamatan}}</li>
                        <li class="list-group-item">Alamat : {{$data->alamat}}</li>
                        <li class="list-group-item">Informasi Kontak : {{$data->informasi_kontak}}</li>
                        <li class="list-group-item">Jumlah Penghulu : {{$data->jumlah_penghulu}}</li>
                        <li class="list-group-item">Total Pernikahan : -</li>
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
                  <div id='map' data-id="{{$data->id}}"></div>
                </div>
              </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js'></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>

    <script>
        var dataId = $('#map').data('id');
        console.log(dataId);

        $.get(`/api/kantor-urusan-agama/${dataId}`, function(data) {
            console.log(data);
            mapboxgl.accessToken = `{{ env('MAPBOX_TOKEN') }}`;
            var map = new mapboxgl.Map({
                container: 'map',
                center: [Number(data.longitude), Number(data.latitude)],
                style: 'mapbox://styles/mapbox/outdoors-v12',
                zoom: 12.5,
            });

            new mapboxgl.Marker({
                        color: "#da4234",
                        draggable: true
                    })
                    .setLngLat([data.longitude, data.latitude])
                    .addTo(map);

            // Add the control to the map.
            map.addControl(
                new MapboxGeocoder({
                    accessToken: mapboxgl.accessToken,
                    mapboxgl: mapboxgl
                })
            );
        });
    </script>
@endpush

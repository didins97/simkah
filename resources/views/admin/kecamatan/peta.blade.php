@extends('app')

@section('header', 'PETA KECAMATAN KABUPATEN PULAU MOROTAI')

@section('css')
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css" rel="stylesheet">

    <style>
        #map {
            width: 950px;
            height: 500px;
        }

        /* .mapboxgl-popup {
                            max-width: 400px;
                            font: 12px/20px 'Helvetica Neue', Arial, Helvetica, sans-serif;
                        } */
    </style>
@endsection

@section('content')
    <div class="alert alert-info">Silakan Klik nama kecamatan jika ingin mengetahui info lebih lanjut</div>
    <div id='map'></div>
@endsection

@section('modal')
    <div class="modal fade" tabindex="-1" role="dialog" id="fire-modal-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nama Kecamatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span
                            aria-hidden="true">×</span> </button>
                </div>
                <div class="modal-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item luas-wilayah">Luas Wilayah</li>
                        <li class="list-group-item pernikahan">Total Pernikahan</li>
                        <li class="list-group-item vendor">Total Layanan Terdaftar</li>
                    </ul>
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
            zoom: 9,
        });

        fetch('/api/geojson/kecamatan')
            .then(response => response.json())
            .then(data => {
                // console.log(data);
                // Tambahkan sumber data GeoJSON
                map.addSource('kecamatan', {
                    type: 'geojson',
                    data: data
                });

                // map.addLayer({
                //     'id': 'maine',
                //     'type': 'fill',
                //     'source': 'kecamatan', // reference the data source
                //     'layout': {},
                //     'paint': {
                //         'fill-color': '#0080ff', // blue color fill
                //         'fill-opacity': 0.3
                //     }
                // });
                // Add a black outline around the polygon.
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
                    'id': 'choropleth-labels',
                    'type': 'symbol',
                    'source': 'kecamatan',
                    'layout': {
                        'text-field': ['get', 'nama'], // Ini akan mengambil nilai dari properti 'nama'
                        'text-size': 15,
                        'text-anchor': 'top',
                        'text-font': [
                            'Open Sans Bold',
                            'Arial Unicode MS Bold'
                        ],
                        'text-transform': 'uppercase',
                        'text-letter-spacing': 0.05,
                        'text-offset': [0, 1.5]
                    }
                });

                map.on('click', 'choropleth-labels', (e) => {
                    const properties = e.features[0].properties;
                    const nama = properties.nama;
                    const totalPenikahan = properties.total_pernikahan;
                    const totalVendor = properties.total_vendor_terdaftar;

                    $('.modal-title').text(nama);
                    $('.luas-wilayah').text(`Luas Wilayah: -`);
                    $('.pernikahan').text(`Total Pernikahan: ${totalPenikahan}`);
                    $('.vendor').text(`Total Layanan Terdaftar: ${totalVendor}`);
                    $('#fire-modal-1').modal('show');
                });

                map.on('mouseenter', 'choropleth-labels', () => {
                    map.getCanvas().style.cursor = 'pointer';
                });

                map.on('mouseleave', 'choropleth-labels', () => {
                    map.getCanvas().style.cursor = '';
                });
            });
    </script>
@endpush

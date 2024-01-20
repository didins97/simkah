@extends('app')

@section('header', 'Dashboard')

@section('css')
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css" rel="stylesheet">
    <style>
        #map {
            width: 900px;
            height: 500px;
        }

        .legend {
            background-color: #fff;
            border-radius: 3px;
            bottom: 30px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            font: 12px/20px 'Helvetica Neue', Arial, Helvetica, sans-serif;
            padding: 8px;
            position: absolute;
            right: 30px;
            z-index: 1;
        }

        .legend h4 {
            margin: 0 0 10px;
        }

        .legend div span {
            border-radius: 50%;
            display: inline-block;
            height: 10px;
            margin-right: 5px;
            width: 10px;
        }

        .mapboxgl-popup {
            max-width: 400px;
            font: 12px/20px 'Helvetica Neue', Arial, Helvetica, sans-serif;
        }

        .custom-popup {
            max-width: 300px;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            background-color: #fff;
        }

        .popup-header {
            background-color: #6677EF;
            color: #fff;
            padding: 8px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .list-group-item {
            border: none;
            padding: 8px;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>User</h4>
                    </div>
                    <div class="card-body">
                        {{ $countUser }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Kecamatan</h4>
                    </div>
                    <div class="card-body">
                        {{ $countKecamatan }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Pernikahan</h4>
                    </div>
                    <div class="card-body">
                        {{ $countPendaftaranNikah }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Vendor Aktif</h4>
                    </div>
                    <div class="card-body">
                        {{ $countLayananVendor }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Peta Kepadatan Pernikahan: Wilayah Terbanyak dan Terendah Perkecamatan</h4>
                </div>
                <div class="card-body">
                    <div id="map"></div>
                    <div id="state-legend" class="legend">
                        <h4>Keterangan</h4>
                        <div><span style="background-color: #47C363"></span>Ringan</div>
                        <div><span style="background-color: #FFA427"></span>Sedang</div>
                        <div><span style="background-color: #ff0c00"></span>Berat</div>
                    </div>


                    <div id="county-legend" class="legend" style="display: none">
                        <h4>Keterangan</h4>
                        <div><span style="background-color: #47C363"></span>Ringan</div>
                        <div><span style="background-color: #FFA427"></span>Sedang</div>
                        <div><span style="background-color: #ff0c00"></span>Berat</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Jumlah Pendaftaran Pernikahan</h4>
                </div>
                <div class="card-body">
                    <div class="chartjs-size-monitor"
                        style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                        <div class="chartjs-size-monitor-expand"
                            style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                            <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink"
                            style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                            <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                        </div>
                    </div>
                    <canvas id="myChart" height="860" style="display: block; width: 710px; height: 430px;"
                        width="1420" class="chartjs-render-monitor"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Vendor terpopuler</h4>
                    <div class="card-header-action">
                        <a href="{{ route('vendor.index') }}" class="btn btn-danger">Lihat Semua <i
                                class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive table-invoice">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th scope="col">Pemilik</th>
                                    <th scope="col">Layanan</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                                @foreach ($mostPopularVendor as $item)
                                    <tr>
                                        <td><a
                                                href="{{ route('users.show', $item->user->id) }}">{{ $item->user->nama_lengkap }}</a>
                                        </td>
                                        <td class="font-weight-600">{{ $item->jenis_layanan }}</td>
                                        <td>{{ $item->harga }}</td>
                                        <td>{{ $item->transaksi_count }}</td>
                                        <td>
                                            <a href="#" class="btn btn-primary">Detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets') }}/modules/chart.min.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.js"></script>
    <script>
        var statistics_chart = document.getElementById("myChart").getContext('2d');

        // Lakukan permintaan API untuk mengambil data
        fetch('/api/total/pendaftaran-nikah')
            .then(response => response.json())
            .then(data => {
                var labels = data.map(function(item) {
                    return item.nama_bulan;
                });

                var values = data.map(function(item) {
                    return item.total;
                });

                var myChart = new Chart(statistics_chart, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Statistics',
                            data: values,
                            borderWidth: 5,
                            borderColor: '#6777ef',
                            backgroundColor: 'transparent',
                            pointBackgroundColor: '#fff',
                            pointBorderColor: '#6777ef',
                            pointRadius: 4
                        }]
                    },
                    options: {
                        legend: {
                            display: false
                        },
                        scales: {
                            yAxes: [{
                                gridLines: {
                                    display: false,
                                    drawBorder: false,
                                },
                                ticks: {
                                    min: 0, // Atur nilai terendah ke -150
                                    stepSize: 150
                                }
                            }],
                            xAxes: [{
                                gridLines: {
                                    color: '#fbfbfb',
                                    lineWidth: 2
                                }
                            }]
                        }
                    }
                });
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });



        // PETA CLUSTER
        mapboxgl.accessToken = `{{ env('MAPBOX_TOKEN') }}`;
        const map = new mapboxgl.Map({
            container: 'map',
            // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
            style: 'mapbox://styles/mapbox/streets-v12',
            center: [128.441445160133, 2.3397525114082125],
            minZoom: 2,
            zoom: 9
        });

        const zoomThreshold = 4;

        fetch('/api/geojson/kecamatan/polygon')
            .then(response => response.json())
            .then(data => {
                // Tambahkan sumber data GeoJSON
                map.addSource('polygon', {
                    type: 'geojson',
                    data: data
                });

                // Tambahkan lapisan peta choropleth
                map.addLayer({
                    'id': 'choropleth-layer',
                    'type': 'fill',
                    'source': 'polygon',
                    'paint': {
                        'fill-color': {
                            property: 'total_pernikahan',
                            type: 'exponential',
                            stops: [
                                [0, '#47C363'],
                                [50, '#FFA427'],
                                [100, '#ff0c00'],
                            ]
                        },
                        'fill-opacity': 0.50
                    }
                });

                // outline kecamatan
                map.addLayer({
                    'id': 'kecamatan-outline',
                    'type': 'line',
                    'source': 'polygon',
                    'layout': {},
                    'paint': {
                        'line-color': '#888',
                        'line-width': 1.5
                    },
                    'layout': {
                        'visibility': 'none' // Set visibility awal ke 'none'
                    }
                })

                map.on('click', 'choropleth-layer', (e) => {
                    var features = e.features;
                    var popupContent = `<div class="custom-popup">
                            <div class="popup-header">
                                <h6>Informasi Wilayah</h6>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Provinsi:</strong> Maluku Utara</li>
                                <li class="list-group-item"><strong>Kabupaten/Kota:</strong> Pulau Morotai</li>
                                <li class="list-group-item"><strong>Kecamatan:</strong> ${features[0].properties.nama_kec}</li>
                                <li class="list-group-item"><strong>Luas Wilayah KM<sup>2</sup>:</strong> ${features[0].properties.SHAPE_Area}</li>
                                <li class="list-group-item"><strong>Total Pernikahan:</strong> ${features[0].properties.total_pernikahan}</li>
                            </ul>
                        </div>`;

                    new mapboxgl.Popup()
                        .setLngLat(e.lngLat)
                        .setHTML(popupContent)
                        .addTo(map);
                });

                map.on('mouseenter', 'choropleth-layer', (e) => {
                    map.getCanvas().style.cursor = 'pointer';
                    map.setLayoutProperty('kecamatan-outline', 'visibility', 'visible');
                });

                map.on('mouseleave', 'choropleth-layer', () => {
                    map.getCanvas().style.cursor = '';
                    map.setLayoutProperty('kecamatan-outline', 'visibility', 'none');
                });
            });

        fetch('/api/geojson/kecamatan/point')
            .then(response => response.json())
            .then(data => {
                map.addSource('points', {
                    type: 'geojson',
                    data: data
                });

                map.addLayer({
                    'id': 'kecamatan',
                    'type': 'symbol',
                    'source': 'points',
                    'layout': {
                        'icon-image': 'custom-marker',
                        'text-field': [
                            'concat',
                            ['get', 'nama'],
                            '\n(',
                            ['get', 'total_pernikahan'],
                            ')'
                        ],
                        'text-font': [
                            'Open Sans Semibold',
                            'Arial Unicode MS Bold'
                        ],
                        'text-offset': [0, 1.25],
                        'text-anchor': 'top'
                    }
                });
            });
    </script>
@endpush

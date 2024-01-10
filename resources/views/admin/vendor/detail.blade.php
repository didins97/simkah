@extends('app')

@section('header', 'Detail Vendor')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets') }}/modules/chocolat/dist/css/chocolat.css">
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css" rel="stylesheet">
    <style>
        #map {
            width: 500px;
            height: 150px;
        }
    </style>
@endsection

@section('content')
    <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-5">
            <div class="card profile-widget">
                <div class="profile-widget-header">
                    <img class="preview mb-3 text-center"
                        src="{{ asset('storage/images/vendor/thumbnail/' . $vendor->gambar) }}" width="100%" />
                    {{-- <img class="preview mb-3 text-center" src="{{ asset('assets/img/noimage.jpg') }}" width="100%" /> --}}
                </div>
                <div class="profile-widget-description pb-0">
                    <div class="profile-widget-name">{{ $vendor->nama }}
                        <div class="text-muted d-inline font-weight-normal">
                            <div class="slash"></div>
                            @php
                                $status = $vendor->jenis_layanan;
                                switch ($status) {
                                    case 'foto_video':
                                        $status = 'Fotografi & Videografi';
                                        break;
                                    case 'katering':
                                        $status = 'Katering';
                                        break;
                                    case 'dekorasi':
                                        $status = 'Dekorasi';
                                        break;
                                    case 'rias':
                                        $status = 'Rias Pengantin dan Tatanan Rambut';
                                        break;
                                    case 'busana':
                                        $status = 'Busana Pengantin';
                                        break;
                                    case 'undagan':
                                        $status = 'Undangan dan Desain Grafis';
                                        break;
                                    case 'kord_pernikahan':
                                        $status = 'Koordinator Pernikahan';
                                        break;
                                }
                            @endphp
                            {{ $status }}
                        </div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Harga : {{ $vendor->harga }}</li>
                        <li class="list-group-item">Kontak : {{ $vendor->keterangan }}</li>
                        <li class="list-group-item">Dibuat : {{ $vendor->user->nama_lengkap }}</li>
                        <li class="list-group-item">Status : {{ $vendor->status }}</li>
                    </ul>
                    <p class="mt-4 mb-4">Paragraph — Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                        sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                </div>
                <div class="card-footer text-center pt-0">
                    <div class="profile-widget-items">
                        <div class="profile-widget-item">
                            <div class="profile-widget-item-label">Total Penjualan</div>
                            <div class="profile-widget-item-value">
                                {{ $vendor->transaksi->where('status', 'selesai')->count() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-7">
            <div class="card profile-widget">
                <div class="card-header">
                    <h4>Galeri</h4>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        @for ($i = 0; $i < count(unserialize($vendor->galeri_foto)); $i++)
                            <li class="media mt-3">
                                <img class="mr-3"
                                    src="{{ asset('storage/images/vendor/galeri/' . unserialize($vendor->galeri_foto)[$i]) }}"
                                    alt="Generic placeholder image" width="30%">
                                <div class="media-body">
                                    <h5 class="mt-0 mb-1">{{ unserialize($vendor->caption_galeri)[$i] }}</h5>
                                    <p>{{ unserialize($vendor->caption_galeri)[$i] }}</p>
                                </div>
                            </li>
                        @endfor
                    </ul>
                </div>
            </div>
            <div class="card profile-widget">
                <div class="card-header">
                    <h4>Peta</h4>
                    <div class="card-header-action">
                        <a href="{{ route('admin.vendor.peta', $vendor->id) }}" class="btn btn-info">Petunjuk Arah <i
                                class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div id="map" data-latitude="{{$vendor->latitude}}" data-longitude="{{$vendor->longitude}}"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets') }}/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.js"></script>
    <script>
        let latitude = $('#map').data('latitude');
        let longitude = $('#map').data('longitude');

        mapboxgl.accessToken =
            'pk.eyJ1IjoiZGlkaW5zaWJ1YSIsImEiOiJjbGtwbHV0NWYwODY2M3B1a25pYWk1cmR3In0.4Og7lpjnLXSkMoIOOLG1Vg';
        const map = new mapboxgl.Map({
            container: 'map', // container ID
            // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
            style: 'mapbox://styles/mapbox/outdoors-v12', // style URL
            center: [latitude, longitude], // starting position
            zoom: 8 // starting zoom
        });

        new mapboxgl.Marker({
                color: "#da4234",
                draggable: true
            })
            .setLngLat([latitude, longitude])
            .addTo(map);

        map.addControl(new mapboxgl.FullscreenControl());
    </script>
@endpush

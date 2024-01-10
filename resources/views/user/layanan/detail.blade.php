@extends('app')

@section('header', 'Detail Vendor')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets') }}/modules/chocolat/dist/css/chocolat.css">
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css" rel="stylesheet">
    <style>
        #map {
            width: 600px;
            height: 150px;
        }
    </style>
@endsection

@section('content')
    <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-5">
            <div class="card profile-widget">
                <div class="profile-widget-header">
                    <img class="preview mb-3 text-center" src="{{ asset('storage/images/vendor/thumbnail/' . $vendor->gambar) }}" width="100%" />
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
                                        $nama = 'Fotografi & Videografi';
                                        break;
                                    case 'katering':
                                        $nama = 'Katering';
                                        break;
                                    case 'dekorasi':
                                        $nama = 'Dekorasi';
                                        break;
                                    case 'rias':
                                        $nama = 'Rias Pengantin dan Tatanan Rambut';
                                        break;
                                    case 'busana':
                                        $nama = 'Busana Pengantin';
                                        break;
                                    case 'undagan':
                                        $nama = 'Undangan dan Desain Grafis';
                                        break;
                                    case 'kord_pernikahan':
                                        $nama = 'Koordinator Pernikahan';
                                        break;
                                }
                            @endphp
                            {{ $nama }}
                        </div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Harga : {{ $vendor->harga }}</li>
                        <li class="list-group-item">Kontak : {{ $vendor->keterangan }}</li>
                        <li class="list-group-item">Dibuat Oleh : {{ $vendor->user->nama_lengkap }}</li>
                        <li class="list-group-item">Status : <a href="#" class="badge badge-success">Ready</a> </li>
                    </ul>
                    <p class="mt-4 mb-4">Paragraph — Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                        sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                </div>
                <div class="card-footer text-center pt-0">
                    <div class="profile-widget-items">
                        <div class="profile-widget-item">
                            <button type="button" class="btn  btn-lg btn-primary" id="transaksi">Pesan</button>
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
                    </ul>
                </div>
            </div>
            <div class="card profile-widget">
                <div class="card-header">
                    <h4>Peta</h4>
                    <div class="card-header-action">
                        <a href="{{ route('user.vendor.peta', $vendor->id) }}" class="btn btn-info">Petunjuk Arah <i
                                class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div id="map" data-latitude="{{ $vendor->latitude }}" data-longitude="{{ $vendor->longitude }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal')
    <div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="{{ route('user.transaksi.create', $vendor->id) }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="statusModalLabel">Pesan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Informasi Pribadi -->
                                    <div class="form-group">
                                        <label for="nama">Pesanan Atas Nama</label>
                                        <input type="text" name="nama_penerima" id="nama" class="form-control"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Alamat Email</label>
                                        <input type="email" name="email_penerima" id="email" class="form-control"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Kordinat Lokasi Pernikahan</label>
                                        <input maxlength="100" type="text" class="form-control" name="kordinat_lokasi"
                                            id="kordinatLokasi" placeholder="Masukkan alamat atau nama tempat" />
                                        <div id="suggestionBox"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="telepon">Nomor Telepon</label>
                                        <input type="text" name="nohp" id="telepon" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="waktu-acara">Dari Kecamatan</label>
                                        <select class="form-control" name="kecamatan" required>
                                            <option value="morotai_selatan">morotai selatan</option>
                                            <option value="morotai_selatan_barat">morotai selatan barat</option>
                                            <option value="morotai_jaya">morotai jaya</option>
                                            <option value="morotai_utara">morotai utara</option>
                                            <option value="morotai_timur">morotai timur</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="waktu-acara">Latidude & Longitude</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="input-lat" placeholder="Latitude" name="latitude">
                                            <input type="text" class="form-control" id="input-lng" placeholder="Longitude" name="longitude">
                                          </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tanggal-acara">Tanggal Acara</label>
                                <input type="datetime-local" name="tanggal_acara" id="tanggal-acara"
                                    class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat Pengiriman</label>
                                <textarea name="alamat" id="alamat" class="form-control" style="height: 100px" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="catatan">Catatan Tambahan</label>
                                <textarea name="catatan_tambahan" id="catatan" class="form-control" style="height: 100px"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <!-- Tombol untuk menyimpan perubahan status -->
                        <button type="submit" class="btn btn-primary" id="saveStatus">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets') }}/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.js"></script>
    <script>
        $(document).ready(function() {
            // Ketika tombol "Ubah Status" ditekan
            $('#transaksi').click(function() {
                $('#statusModal').modal('show'); // Tampilkan modal
            });

            // Ketika tombol "Simpan" di dalam modal ditekan
            $('#saveStatus').click(function() {
                // Lakukan sesuatu untuk menyimpan perubahan status
                // Misalnya, Anda bisa mengirim permintaan AJAX ke server.
                // Setelah selesai, Anda dapat menutup modal.
                $('#statusModal').modal('hide');
            });

            var typingTimer; // Timer untuk menunggu sebelum mengirim permintaan AJAX
            var doneTypingInterval = 1000; // Waktu penundaan (misalnya, 1 detik)
            $("#kordinatLokasi").on('input', function() {
                clearTimeout(typingTimer); // Hapus timer yang ada, jika ada

                // Set timer baru untuk menunggu sebelum mengirim permintaan AJAX
                typingTimer = setTimeout(function() {
                    var selectOption = $("#kordinatLokasi").val();

                    $.ajax({
                        type: "GET",
                        url: "/api/search-location",
                        data: {
                            selectOption,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            console.log(response);
                            var suggestionBox = $("#suggestionBox");
                            suggestionBox.empty(); // Kosongkan suggestionBox

                            response.forEach(function(result) {
                                var suggestionItem = $(
                                    '<div class="suggestion-item">' + result
                                    .place_name + '</div>');
                                suggestionItem.click(function() {
                                    $("#kordinatLokasi").val(result
                                        .place_name);
                                    suggestionBox.empty();
                                    // $("#latitude").val(result.center[0]);
                                    // $("#longitude").val(result.center[1]);

                                    // console.log(result.center[0]);
                                    // console.log($("#latitude").val());

                                    $('input[name="latitude"]').val(
                                        result.center[0]);
                                    $('input[name="longitude"]').val(
                                        result.center[1]);
                                });

                                suggestionBox.append(suggestionItem);
                            });
                        }
                    });
                }, doneTypingInterval);
            });

            $('.input-doc').click(function(e) {
                e.preventDefault();
            });
        });

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

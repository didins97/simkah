@extends('app')

@section('header', 'Pendaftaran Nikah')

@section('content')
    @if ($pernikahanCount > 0)
    <div class="alert alert-primary">
        Lihat Pernikahan Yang Sudah Terdaftar <a href="{{ route('user.pernikahan.index') }}"><b>Disini</b></a>
      </div>
    @endif
    <div class="card">
        <div class="card-body">
            <div class="row mt-4">
                <div class="col-12 col-lg-12 offset-lg-12">
                    @include('user.pernikahan.wizzard')
                </div>
            </div>
            <form action="{{ route('user.pernikahan.step-one.store') }}" class="wizard-content mt-2" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="panel panel-primary setup-content" id="step-1">
                    <div class="panel-body" id="panel1">
                        <div class="form-group">
                            <label class="control-label">Kordinat Lokasi Pernikahan</label>
                            <input maxlength="100" type="text" class="form-control" name="kordinat_lokasi"
                                id="kordinatLokasi" placeholder="Masukkan alamat atau nama tempat" disabled />
                            <div id="suggestionBox"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kecamatan</label>
                            <select class="form-control" name="kecamatan_id" required>
                                @foreach ($kecamatan as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label">Nikah Di</label>
                                    <select class="form-control" name="nikah_id" id="nikahDi" required>
                                        <option value="dikua">DI KUA/KANTOR</option>
                                        <option value="diluar">DI LUAR KUA</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Penikahan</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-calendar"></i>
                                            </div>
                                        </div>
                                        <input type="datetime-local" class="form-control daterange-cus" name="tanggal_nikah"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label">Longitude</label>
                                    <input maxlength="100" type="text" class="form-control" name="longitude"/>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Latitude</label>
                                    <input maxlength="100" type="text" class="form-control" name="latitude"/>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <button class="btn btn-primary nextBtn pull-right" type="submit">Next</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/custom/validation.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
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
    </script>
@endpush


@extends('app')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css" rel="stylesheet">
@endsection

@section('header', 'Daftar KUA')

@section('content')
    <div class="row">
        <div class="col-12 col-md-8 col-lg-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Daftar Data KUA</h4>
                    <div class="card-header-action">
                        <a href="#" class="btn btn-warning"><i class="far fa-circle"></i>Lihat Peta</a>
                        <a href="#" class="btn btn-secondary"><i class="far fa-file"></i>Cetak</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-md">
                            <tbody>
                                <tr>
                                    <th>No</th>
                                    <th>Kecamatan</th>
                                    <th>Jumlah Penghulu</th>
                                    <th>Aksi</th>
                                </tr>
                                <tr>
                                    @foreach ($kua as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->kecamatan }}</td>
                                    <td>{{ $item->jumlah_penghulu }}</td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm btn-edit"
                                            data-id="{{ $item->id }}">Edit</button>
                                        <button type="button" class="btn btn-danger btn-sm btn-delete"
                                            data-id="{{ $item->id }}">Delete</button>
                                        <a href="{{ route('kantor-urusan-agama.show', $item->id) }}" class="btn btn-secondary btn-sm">Detail</a>
                                    </td>
                                </tr>
                                @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 col-lg-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Form Tambah KUA</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('kantor-urusan-agama.store') }}" method="POST" id="kuaForm">
                        @csrf
                        <div class="form-group">
                            <label for="kecamatanInput" class="form-label">Kecamatan</label>
                            <input type="text" name="kecamatan" class="form-control" id="kecamatanInput"
                                placeholder="Masukkan nama kecamatan" required>
                        </div>
                        <div class="form-group">
                            <label for="alamatInput" class="form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="alamatInput"
                                placeholder="Masukkan alamat" required>
                        </div>
                        <div class="form-group">
                            <label for="kontakInput" class="form-label">Informasi Kontak</label>
                            <input type="text" name="informasi_kontak" class="form-control" id="kontakInput"
                                placeholder="Masukkan informasi kontak" required>
                        </div>
                        <div class="form-group">
                            <label for="penghuluInput" class="form-label">Jumlah Penghulu</label>
                            <input type="number" name="jumlah_penghulu" class="form-control" id="penghuluInput"
                                placeholder="Masukkan jumlah penghulu" required>
                        </div>
                        <div class="form-group">
                            <label for="latitudeInput" class="form-label">Latitude</label>
                            <input type="text" name="latitude" class="form-control" id="latitudeInput"
                                placeholder="Masukkan latitude" required>
                        </div>
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="longitudeInput" class="form-label">Longitude</label>
                                <input type="text" name="longitude" class="form-control" id="longitudeInput"
                                    placeholder="Masukkan longitude" required>
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <button class="btn btn-primary mr-1" type="submit">Submit</button>
                            <button class="btn btn-secondary" type="reset">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('.btn-edit').click(function(e) {
            e.preventDefault();
            let id = $(this).data('id');
            $.ajax({
                url: `/admin/kantor-urusan-agama/${id}/edit`,
                method: 'GET',
                success: function(response) {
                    console.log(response.id);
                    $('#kecamatanInput').val(response.kecamatan);
                    $('#alamatInput').val(response.alamat);
                    $('#kontakInput').val(response.informasi_kontak);
                    $('#penghuluInput').val(response.jumlah_penghulu);
                    $('#latitudeInput').val(response.latitude);
                    $('#longitudeInput').val(response.longitude);

                    $('#kuaForm').attr('action', `/admin/kantor-urusan-agama/${response.id}`);
                    $('#kuaForm').append('<input type="hidden" name="_method" value="PATCH">');
                }
            });
        });

        $('.btn-delete').click(function(e) {
            var dataId = $(this).data('id');
            Swal.fire({
                title: 'Apa anda yakin untuk menghapus ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#6777ef',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'DELETE',
                        url: `/admin/kantor-urusan-agama/${dataId}`,
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(results) {

                            if (results.success === true) {
                                swal("Done!", results.message, "success");
                                location.reload();
                            } else {
                                swal("Error!", results.message, "error");
                            }
                        }
                    });
                }
            })
        })

        // $(document).ready(function() {
        //     $('#simpanKua').click(function(e) {
        //         console.log('didin');
        //         var kecamatan = document.getElementById('kecamatanInput').value;
        //         var alamat = document.getElementById('alamatInput').value;
        //         var kontak = document.getElementById('kontakInput').value;
        //         var penghulu = document.getElementById('penghuluInput').value;
        //         var latitude = document.getElementById('latitudeInput').value;
        //         var longitude = document.getElementById('longitudeInput').value;

        //         $.ajax({
        //             type: 'POST',
        //             url: "{{ route('kantor-urusan-agama.store') }}",
        //             data: {
        //                 kecamatan: kecamatan,
        //                 alamat: alamat,
        //                 informasi_kontak: kontak,
        //                 jumlah_penghulu: penghulu,
        //                 latitude: latitude,
        //                 longitude: longitude,
        //                 _token: '{{ csrf_token() }}'
        //             },
        //             dataType: 'json',
        //             success: function(response) {
        //                 $('#largeModal').modal('hide');
        //                 location.reload()
        //             }
        //         });
        //     });

        //     $('.btn-edit').click(function(e) {
        //         var dataId = $(this).data('id');
        //         console.log(dataId);
        //         $.ajax({
        //             url: `/admin/kantor-urusan-agama/${dataId}/edit`,
        //             method: 'GET',
        //             data: {
        //                 _token: '{{ csrf_token() }}'
        //             },
        //             success: function(response) {
        //                 $("#kecamatanEditInput").val(response.kecamatan);
        //                 $("#alamatEditInput").val(response.alamat);
        //                 $("#kontakEditInput").val(response.informasi_kontak);
        //                 $("#penghuluEditInput").val(response.jumlah_penghulu);
        //                 $("#latitudeEditInput").val(response.latitude);
        //                 $("#longitudeEditInput").val(response.longitude);
        //                 // $("#imagesEdit").html(
        //                 //     `<img src="{{ asset('storage/${response.image}') }}" width="100" class="img-fluid img-thumbnail">`
        //                 // );
        //                 $("#idEdit").val(response.id);

        //                 $('#modalEdit').modal('show');
        //             }
        //         });
        //     })

        //     $('#btnUpdate').click(function(e) {
        //         var dataId = document.getElementById('idEdit').value;
        //         var kecamatan = document.getElementById('kecamatanEditInput').value;
        //         var alamat = document.getElementById('alamatEditInput').value;
        //         var kontak = document.getElementById('kontakEditInput').value;
        //         var penghulu = document.getElementById('penghuluEditInput').value;
        //         var latitude = document.getElementById('latitudeEditInput').value;
        //         var longitude = document.getElementById('longitudeEditInput').value;

        //         $.ajax({
        //             type: 'PUT',
        //             url: `/admin/kantor-urusan-agama/${dataId}`,
        //             data: {
        //                 kecamatan: kecamatan,
        //                 alamat: alamat,
        //                 informasi_kontak: kontak,
        //                 jumlah_penghulu: penghulu,
        //                 latitude: latitude,
        //                 longitude: longitude,
        //                 _token: '{{ csrf_token() }}'
        //             },
        //             success: function(response) {
        //                 // console.log(response);
        //                 $('#modalEdit').modal('hide');
        //                 location.reload()
        //             }
        //         });
        //     })
    </script>
@endpush

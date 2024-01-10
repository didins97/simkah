@extends('app')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css" rel="stylesheet">
@endsection

@section('header', 'Daftar Kecamatan')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Daftar Data Kecamatan</h4>
        <div class="card-header-action">
            <a href="{{ route('kecamatan.peta') }}" class="btn btn-warning"><i class="far fa-circle"></i>Lihat Peta</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-md">
                <tbody>
                    <tr>
                        <th>No</th>
                        <th>Nama Kecamatan</th>
                        <th>Aksi</th>
                    </tr>
                    <tr>
                        @foreach ($kecamatan as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->nama }}</td>
                        <td>
                            <a href="{{ route('kecamatan.show', $item->id) }}" class="btn btn-secondary btn-sm">Detail</a>
                        </td>
                    </tr>
                    @endforeach
                    </tr>
                </tbody>
            </table>
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
                url: `/admin/kecamatan/${id}/edit`,
                method: 'GET',
                success: function(response) {
                    console.log(response.id);
                    $('#namaInput').val(response.nama);
                    $('#latitudeInput').val(response.latitude);
                    $('#longitudeInput').val(response.longitude);

                    $('#kuaForm').attr('action', `/admin/kecamatan/${response.id}`);
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
        //         var kecamatan = document.getElementById('namaInput').value;
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

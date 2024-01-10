@extends('app')

@section('header', 'Daftar Admin')

@section('content')
    <div class="row">
        <div class="col-12 col-md-8 col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4>Daftar Data Admin</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                                @foreach ($users as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $item->nama_lengkap }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                            <button type="button" class="btn btn-warning btn-edit" data-id="{{$item->id}}">Edit</button>
                                            <button type="button" class="btn btn-danger btn-delete" data-id="{{$item->id}}">Hapus</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4>Form Tambah Admin</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.store') }}" method="POST" id="adminForm">
                        @csrf
                        <div class="form-group">
                            <label for="namaDepan" class="form-label">Nama Depan</label>
                            <input type="text" name="nama_depan" class="form-control" id="namaDepan"
                                placeholder="Masukkan nama depan" required>
                        </div>
                        <div class="form-group">
                            <label for="namaBelakang" class="form-label">Nama Belakang</label>
                            <input type="text" name="nama_belakang" class="form-control" id="namaBelakang"
                                placeholder="Masukkan nama belakang" required>
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email"
                                placeholder="Masukkan email" required>
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password"
                                placeholder="Masukkan password">
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
            console.log(id);
            $.ajax({
                url: `/admin/admin/${id}/edit`,
                method: 'GET',
                success: function(response) {
                    console.log(response);
                    $('#namaDepan').val(response.nama_depan);
                    $('#namaBelakang').val(response.nama_belakang);
                    $('#email').val(response.email);
                    $('#password').val(response.password);

                    $('#adminForm').attr('action', `/admin/admin/${response.id}`);
                    $('#adminForm').append('<input type="hidden" name="_method" value="PATCH">');
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
                        method: 'DELETE',
                        url: `/admin/admin/${dataId}/delete`,
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(results) {

                            if (results.success === true) {
                                new swal("Done!", 'Berhasil dihapus', "success");
                                location.reload();
                            } else {
                                new swal("Error!", 'Gagal dihapus', "error");
                            }
                        }
                    });
                }
            })
        })
    </script>
@endpush

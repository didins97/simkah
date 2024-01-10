@extends('app')

@section('header', "Daftar Pengguna")

@section('content')
<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="float-right">
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                            <div class="input-group-append">
                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="clearfix mb-3"></div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Level</th>
                                <th scope="col">Email</th>
                                <th scope="col">Aksi</th>
                            </tr>
                            @foreach ($users as $item)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$item->nama_lengkap}}</td>
                                <td class="cell">
                                    @php
                                        $status = $item->level;
                                        switch ($status) {
                                            case 'user':
                                                $badgeClass = 'badge-primary';
                                                break;
                                            case 'vendor':
                                                $badgeClass = 'badge-success';
                                                break;
                                            case 'admin':
                                                $badgeClass = 'badge-secondary';
                                                break;
                                            case 'staff':
                                                $badgeClass = 'badge-info';
                                                break;
                                            default:
                                                $badgeClass = 'badge-info'; // Default class jika status tidak cocok dengan yang lain.
                                        }
                                    @endphp

                                    <span class="badge {{ $badgeClass }}">{{ $status }}</span>
                                </td>
                                <td>{{$item->email}}</td>
                                <td>
                                    <a href="{{ route('users.show', $item->id) }}" class="btn btn-primary">Detail</a>
                                    <a href="#" class="btn btn-danger btn-delete" data-id="{{$item->id}}">Hapus</a>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
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
                        url: `/admin/users/${dataId}/delete`,
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(results) {
                            // console.log(results.success);
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

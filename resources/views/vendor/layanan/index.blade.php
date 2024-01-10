@extends('app')

@section('header', 'Daftar Vendor');

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
                                    <th scope="col">Layanan</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                                @foreach ($vendor as $item)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{$item->nama}}</td>
                                        <td class="cell">
                                            @php
                                                $status = $item->jenis_layanan;
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
                                            <a href="#">{{ $nama }}</a>
                                        </td>
                                        <td class="cell">
                                            @php
                                                $status = $item->status;
                                                switch ($status) {
                                                    case 'disetujui':
                                                        $badgeClass = 'badge-success';
                                                        break;
                                                    case 'menunggu_persetujuan':
                                                        $badgeClass = 'badge-warning';
                                                        $status = 'menunggu persetujuan';
                                                        break;
                                                    default:
                                                        $badgeClass = 'badge-info'; // Default class jika status tidak cocok dengan yang lain.
                                                }
                                            @endphp

                                            <span class="badge {{ $badgeClass }}">{{ $status }}</span>
                                        </td>
                                        <td>
                                            <a href="{{ route('layanan.edit', $item->id) }}" class="btn btn-primary">Detail</a>
                                            <a href="#" class="btn btn-danger btn-hapus" data-id="{{$item->id}}">Hapus</a>
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
        $('.btn-hapus').click(function(e) {
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
                            type: "DELETE",
                            url: `/vendor/layanan/${dataId}`,
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                if (response.success == true) {
                                    new swal("Done!", 'Data Terhapus', "success");
                                    location.reload();
                                } else {
                                    new swal("Error!", 'Gagal Terhapus', "error");
                                }
                            }
                        });
                    }
                })
            });
    </script>
@endpush

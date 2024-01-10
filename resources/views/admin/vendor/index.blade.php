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
                    <div class="text-left">
                        <div class="btn-group">
                            <a href="{{ route('vendor.index', ['status' => 'all']) }}" class="btn {{ request('status') !== 'disetujui' ? ' btn-primary' : '' }}">Semua</a>
                            <a href="{{ route('vendor.index', ['status' => 'disetujui']) }}" class="btn {{ request('status') === 'disetujui' ? ' btn-primary' : '' }}">Disetujui</a>
                        </div>
                    </div>
                    <div class="clearfix mb-3"></div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Layanan</th>
                                    <th scope="col">Pendaftar</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                                @foreach ($vendor as $item)
                                    <tr>
                                        <th scope="row">{{ ($vendor->currentPage() - 1)  * $vendor->count() + $loop->iteration }}</th>
                                        <td>{{ $item->nama }}</td>
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
                                                    case 'undangan':
                                                        $nama = 'Undangan dan Desain Grafis';
                                                        break;
                                                    case 'kord_pernikahan':
                                                        $nama = 'Koordinator Pernikahan';
                                                        break;
                                                }
                                            @endphp
                                            <a href="#">{{ $nama }}</a>
                                        </td>
                                        <td>
                                            {{ $item->user->nama_lengkap }}
                                        </td>
                                        <td class="cell">
                                            <select class="form-control form-control-sm status-select" name="status"
                                                data-id="{{ $item->id }}">
                                                <option value="disetujui"
                                                    {{ $item->status == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
                                                <option value="ditolak" {{ $item->status == 'ditolak' ? 'selected' : '' }}>
                                                    Ditolak</option>
                                                <option value="menunggu_persetujuan"
                                                    {{ $item->status == 'menunggu_persetujuan' ? 'selected' : '' }}>Menunggu
                                                </option>
                                            </select>
                                        </td>
                                        <td>
                                            {{-- <a href="{{ route('vendor.show', $item->id) }}" class="btn btn-primary">Detail</a>
                                            <a href="{{ route('vendor.delete', $item->id) }}" class="btn btn-danger">Hapus</a> --}}
                                            <div class="btn-group">
                                                <button class="btn btn-primary dropdown-toggle" type="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Aksi
                                                </button>
                                                <div class="dropdown-menu" x-placement="top-start"
                                                    style="position: absolute; transform: translate3d(0px, -217px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                    <a class="dropdown-item" href="{{ route('vendor.show', $item->id) }}">Detail</a>
                                                    <a class="dropdown-item btn-hapus" href="#"
                                                        data-id="{{ $item->id }}">Hapus</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="float-right">
                            {{ $vendor->appends(['status' => session('vendor_status')])->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('.status-select').change(function(e) {
                var selectedStatus = $(this).val();
                var dataId = $(this).data('id');

                $.ajax({
                    type: "POST",
                    url: `/admin/vendor/${dataId}/status`,
                    data: {
                        status: selectedStatus,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        location.reload();
                    }
                });
            });

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
                            url: `/admin/vendor/delete/${dataId}`,
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
        });
    </script>
@endpush

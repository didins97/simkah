@extends('app')

@section('header', 'Daftar Transaksi')

@section('content')
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="float-right">
                        <form>
                            <div class="input-group">
                                <input type="text" name="q" class="form-control" placeholder="Search" id="search">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-primary"><i class="fas fa-search"></i></button>
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
                                    <th scope="col">Invoice</th>
                                    <th scope="col">Pesanan</th>
                                    <th scope="col">Vendor</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                                @foreach ($transaksi as $item)
                                    <tr>
                                        <th scope="row">
                                            {{ ($transaksi->currentPage() - 1) * $transaksi->count() + $loop->iteration }}
                                        </th>
                                        <td>{{ $item->invoice }}</td>
                                        <td>{{ $item->user->nama_lengkap }}</td>
                                        <td>{{ $item->vendor->nama }}</td>
                                        <td class="cell">
                                            @php
                                                $status = $item->status;
                                                switch ($status) {
                                                    case 'menunggu_pembayaran':
                                                        $badgeClass = 'badge-warning';
                                                        break;
                                                    case 'dibayar':
                                                        $badgeClass = 'badge-info';
                                                        break;
                                                    case 'selesai':
                                                        $badgeClass = 'badge-success';
                                                        break;
                                                    case 'dibatalkan':
                                                        $badgeClass = 'badge-danger';
                                                        break;
                                                    default:
                                                        $badgeClass = 'badge-info'; // Default class jika status tidak cocok dengan yang lain.
                                                }
                                            @endphp

                                            <span class="badge {{ $badgeClass }}">{{ $status }}</span>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-primary dropdown-toggle" type="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Aksi
                                                </button>
                                                <div class="dropdown-menu" x-placement="top-start"
                                                    style="position: absolute; transform: translate3d(0px, -217px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                    <a class="dropdown-item"
                                                        href="{{ route('transaksi.detail', $item->id) }}">Detail</a>
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
                            {{ $transaksi->links('pagination::bootstrap-4') }}
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
            $('#search').on('input', function() {
                var query = $(this).val();
                $.ajax({
                    type: 'GET',
                    url: '',
                    data: {
                        query: query
                    },
                    success: function(data) {
                        $('#searchResults').html(data);
                    }
                });
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
                        url: `/admin/transaksi/delete/${dataId}`,
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

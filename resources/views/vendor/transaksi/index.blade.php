@extends('app')

@section('header', 'Daftar Transaksi')

@section('content')
<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Invoice</th>
                                <th scope="col">Penerima</th>
                                <th scope="col">Vendor</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                            @foreach ($transaksi as $item)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$item->invoice}}</td>
                                <td>{{$item->nama_penerima}}</td>
                                <td>{{$item->vendor->nama}}</td>
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
                                            case 'dalam_proses':
                                                $badgeClass = 'badge-primary';
                                                break;
                                            default:
                                                $badgeClass = 'badge-info'; // Default class jika status tidak cocok dengan yang lain.
                                        }
                                    @endphp

                                    <span class="badge {{ $badgeClass }}">{{ $status }}</span>
                                </td>
                                <td>
                                    <a href="{{ route('vendor.transaksi.detail', $item->id) }}" class="btn btn-primary">Detail</a>
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

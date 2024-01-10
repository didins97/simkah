@extends('app')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets') }}/modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/modules/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/modules/owlcarousel2/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/modules/owlcarousel2/dist/assets/owl.theme.default.min.css">
@endsection

@section('header', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Layanan</h4>
                    </div>
                    <div class="card-body">
                        {{ $countLayananVendor }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Transaksi Selesai</h4>
                    </div>
                    <div class="card-body">
                        {{ $countCompletedTransaksi }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Transaksi Menunggu</h4>
                    </div>
                    <div class="card-body">
                        {{ $countCompletedPending }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Layanan Terlaris</h4>
                    <div class="card-header-action">
                        <a href="{{ route('layanan.index') }}" class="btn btn-danger">Lihat Semua <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive table-invoice">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th>Layanan</th>
                                    <th>Harga</th>
                                    <th>Total</th>
                                    <th>Aksi</th>
                                </tr>
                                @foreach ($mostPopularVendor as $item)
                                    <tr>
                                        <td><a href="#">{{ $item->jenis_layanan }}</a></td>
                                        <td class="font-weight-600">{{$item->harga}}</td>
                                        <td>{{$item->transaksi_count}}</td>
                                        {{-- <td>July 21, 2018</td> --}}
                                        <td>
                                            <a href="{{ route('layanan.index') }}" class="btn btn-primary">Detail</a>
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
    <!-- JS Libraies -->
    <script src="{{ asset('assets') }}/modules/jquery.sparkline.min.js"></script>
    <script src="{{ asset('assets') }}/modules/chart.min.js"></script>
    <script src="{{ asset('assets') }}/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
    <script src="{{ asset('assets') }}/modules/summernote/summernote-bs4.js"></script>
    <script src="{{ asset('assets') }}/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets') }}/js/page/index.js"></script>
@endpush

@extends('app')

@section('header', 'Detail Transaksi')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets') }}/modules/chocolat/dist/css/chocolat.css">
@endsection

@section('content')
    <div class="alert alert-primary">
        Jika ingin melihat Lokasi Penerima <a href="{{ route('admin.transaksi.peta', $transaksi->id) }}"><b>Klik Disini</b></a>
    </div>
    <div class="invoice">
        <div class="invoice-print">
            <div class="row">
                <div class="col-lg-12">
                    <div class="invoice-title">
                        <h2>Invoice</h2>
                        <div class="invoice-number">{{ $transaksi->invoice }}</div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <address>
                                <strong>Vendor Pernikahan:</strong><br>
                                {{ $transaksi->vendor->nama }}<br>
                                {{ $transaksi->vendor->jenis_layanan }}<br>
                                {{ $transaksi->vendor->kontak }}<br>
                                Morotai, Maluku Utara, Indonesia
                            </address>
                        </div>
                        <div class="col-md-6 text-md-right">
                            <address>
                                <strong>Pelanggan:</strong><br>
                                {{ $transaksi->user->nama_lengkap }}<br>
                                {{ $transaksi->user->email }}<br>
                                {{ $transaksi->user->nohp }}<br>
                                Morotai, Maluku Utara, Indonesia
                            </address>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <address>
                                <strong>Metode Pembayaran:</strong>
                                <br>Transfer No REK **** 4242<br>
                            </address>
                        </div>
                        <div class="col-md-6 text-md-right">
                            <address>
                                <strong>Tanggal Pemesanan:</strong><br>
                                {{ $transaksi->created_at->format('F d, Y') }}<br><br>
                            </address>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="gallery">
                        @if ($transaksi->bukti_pembayaran_1)
                            <div class="gallery-item" data-image="{{ asset('assets') }}/img/news/img01.jpg"
                                data-title="Image 1" href="{{ asset('assets') }}/img/news/img01.jpg" title="Image 1"
                                style="background-image: url(&quot;{{ asset('assets') }}/img/news/img01.jpg&quot;);"></div>
                        @endif
                        @if ($transaksi->bukti_pembayaran_2)
                            <div class="gallery-item" data-image="{{ asset('assets') }}/img/news/img01.jpg"
                                data-title="Image 1" href="{{ asset('assets') }}/img/news/img01.jpg" title="Image 1"
                                style="background-image: url(&quot;{{ asset('assets') }}/img/news/img01.jpg&quot;);"></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="text-md-right">
            <div class="mb-lg-0 mb-3">
                @php
                    $status = $transaksi->status;
                    switch ($status) {
                        case 'menunggu_pembayaran':
                            $textClass = 'text-warning';
                            $name = 'Menunggu Pembayaran';
                            break;
                        case 'dibayar':
                            $textClass = 'text-info';
                            $name = 'Dibayar';
                            break;
                        case 'selesai':
                            $textClass = 'text-success';
                            $name = 'Selesai';
                            break;
                        case 'dibatalkan':
                            $textClass = 'text-danger';
                            $name = 'Dibatalkan';
                            break;
                        default:
                            $textClass = 'text-info'; // Default class jika status tidak cocok dengan yang lain.
                    }
                @endphp
                <h3 class="{{ $textClass }}">{{ $name }}</h3>
            </div>
            {{-- <button class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</button> --}}
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
@endpush

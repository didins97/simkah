@extends('app')

@section('header', 'Detail Transaksi')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets') }}/modules/chocolat/dist/css/chocolat.css">
@endsection

@section('content')
    <div class="alert alert-primary">
        Jika ingin melihat Lokasi Penerima <a href="{{ route('vendor.transaksi.peta', $transaksi->id) }}"><b>Klik Disini</b></a>
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
                                <strong>Penerima:</strong><br>
                                {{ $transaksi->nama_penerima }}<br>
                                {{ $transaksi->email_penerima }}<br>
                                {{ $transaksi->nohp }}<br>
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
                        @if ($transaksi->bukti_pembayaran_1 != null)
                            <div class="gallery-item"
                                data-image="{{ asset('storage/images/transaksi/bukti_pembayaran/' . $transaksi->bukti_pembayaran_1) }}"
                                data-title="Image 1"
                                href="{{ asset('storage/images/transaksi/bukti_pembayaran/' . $transaksi->bukti_pembayaran_1) }}"
                                title="Image 1"
                                style="background-image: url(&quot;{{ asset('storage/images/transaksi/bukti_pembayaran/' . $transaksi->bukti_pembayaran_1) }}&quot;);">
                            </div>
                        @endif

                        @if ($transaksi->bukti_pembayaran_2 != null)
                            <div class="gallery-item"
                                data-image="{{ asset('storage/images/transaksi/bukti_pembayaran/' . $transaksi->bukti_pembayaran_2) }}"
                                data-title="Image 2"
                                href="{{ asset('storage/images/transaksi/bukti_pembayaran/' . $transaksi->bukti_pembayaran_2) }}"
                                title="Image 2"
                                style="background-image: url(&quot;{{ asset('storage/images/transaksi/bukti_pembayaran/' . $transaksi->bukti_pembayaran_2) }}&quot;);">
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="text-md-right">
            <div class="float-lg-left mb-lg-0 mb-3">
                @php
                    $status = $transaksi->status;
                    switch ($status) {
                        case 'menunggu_pembayaran':
                            $textClass = 'text-warning';
                            $name = 'Menunggu Pembayaran';
                            break;
                        case 'menunggu_persetujuan':
                            $textClass = 'text-info';
                            $name = 'Menunggu Persetujuan';
                            break;
                        case 'selesai':
                            $textClass = 'text-success';
                            $name = 'Selesai';
                            break;
                        case 'dibatalkan':
                            $textClass = 'text-danger';
                            $name = 'Dibatalkan';
                            break;
                        case 'uang_muka_dibayar':
                            $textClass = 'text-dark';
                            $name = 'UANG MUKA DIBAYAR';
                            break;
                        case 'dalam_proses':
                            $textClass = 'text-primary';
                            $name = 'Dalam Proses';
                            break;
                        default:
                            $textClass = 'text-info'; // Default class jika status tidak cocok dengan yang lain.
                            $name = $status;
                    }
                @endphp
                <h3 class="{{ $textClass }}">{{ $name }}</h3>
            </div>
            <button class="btn btn-info btn-icon icon-left" id="changeStatus"><i class="fas fa-print"></i> Ubah
                Status</button>
            <button class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</button>
        </div>
    </div>
@endsection

@section('modal')
    <div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('vendor.transaksi.status', $transaksi->id) }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="statusModalLabel">Ubah Status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Isi modal di sini -->
                        <div class="form-group">
                            <label>Ubah Status Transaksi</label>
                            <select class="form-control" name="status">
                                <option value="menunggu_pembayaran"
                                    {{ $transaksi->status == 'menunggu_pembayaran' ? 'selected' : '' }}>MENUNGGU PEMBAYARAN
                                </option>
                                <option value="uang_muka_dibayar"
                                    {{ $transaksi->status == 'uang_muka_dibayar' ? 'selected' : '' }}>UANG MUKA DIBAYAR
                                </option>
                                <option value="dalam_proses" {{ $transaksi->status == 'dalam_proses' ? 'selected' : '' }}>
                                    PROSES</option>
                                <option value="selesai" {{ $transaksi->status == 'selesai' ? 'selected' : '' }}>SELESAI
                                </option>
                                <option value="dibatalkan" {{ $transaksi->status == 'dibatalkan' ? 'selected' : '' }}>
                                    BATALKAN</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <!-- Tombol untuk menyimpan perubahan status -->
                        <button type="submit" class="btn btn-primary" id="saveStatus">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            // Ketika tombol "Ubah Status" ditekan
            $('#changeStatus').click(function() {
                $('#statusModal').modal('show'); // Tampilkan modal
            });

            // Ketika tombol "Simpan" di dalam modal ditekan
            $('#saveStatus').click(function() {
                // Lakukan sesuatu untuk menyimpan perubahan status
                // Misalnya, Anda bisa mengirim permintaan AJAX ke server.
                // Setelah selesai, Anda dapat menutup modal.
                $('#statusModal').modal('hide');
            });
        });
    </script>
@endpush

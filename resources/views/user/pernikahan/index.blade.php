@extends('app')

@section('header', 'Pendaftaran Nikah')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets') }}/modules/jquery-selectric/selectric.css">
@endsection

@section('content')
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="float-right">
                        <a href="{{ route('user.pernikahan.index') }}" class="btn btn-primary">Tambah</a>
                    </div>
                    <div class="clearfix mb-3"></div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kode Pendaftar</th>
                                    <th scope="col">Tgl.Pendaftar</th>
                                    <th scope="col">Nama Suami</th>
                                    <th scope="col">Nama Istri</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                                @foreach ($registrasiNikah as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{$item->kode_pendaftar}}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d F Y') }}</td>
                                        <td>{{ $item->calpenPria->nama }}</td>
                                        <td>{{ $item->calpenWanita->nama }}</td>
                                        <td class="cell">
                                            @php
                                                $status = $item->status;
                                                switch ($status) {
                                                    case 'belum_diproses':
                                                        $badgeClass = 'badge-warning';
                                                        break;
                                                    case 'diterima':
                                                        $badgeClass = 'badge-success';
                                                        break;
                                                    default:
                                                        $badgeClass = 'badge-info'; // Default class jika status tidak cocok dengan yang lain.
                                                }
                                            @endphp

                                            <span class="badge {{ $badgeClass }}">{{ $status }}</span>
                                        </td>
                                        <td>
                                            <a href="{{ route('user.pendaftaran-nikah.show', $item->id) }}" class="btn btn-primary">Detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="float-right">
                            {{ $registrasiNikah->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets') }}/modules/jquery-selectric/jquery.selectric.min.js"></script>
@endpush

@extends('app')

@section('header', 'Pendaftaran Nikah')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Detail Pendaftaran Pernikahan</h4>
                <div class="card-header-action">
                    {{-- <a href="{{ route('registrasi-nikah.pdf', $pernikahan->id) }}" class="btn btn-info"> <i class="fas fa-map-marker-alt"></i> Peta</a> --}}
                    <a href="{{ route('user.pernikahan.peta', $pernikahan->id) }}" class="btn btn-info"> <i class="fas fa-map-marker-alt"></i> Petunjuk Arah</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row ml-2">
                    <div class="col-md-6">
                        <p class=""><b><i class="fas fa-user"></i> Kode Pendaftar:</b> {{ $pernikahan->kode_pendaftar }}
                        </p>
                        <p class=""><b><i class="fas fa-calendar"></i> Tanggal Nikah:</b>
                            {{ \Carbon\Carbon::parse($pernikahan->tanggal_nikah)->format('d F Y') }}</p>
                        {{-- <p class=""><b><i class="fas fa-user"></i> Alamat KUA:</b> {{ $pernikahan->kua->alamat }}</p> --}}
                        <p class=""><b><i class="fas fa-users"></i> Kecamatan:</b> {{ $pernikahan->kecamatan->nama }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class=""><b><i class="fas fa-link"></i> Nikah Di:</b> DiLuar</p>
                        <p class=""><b><i class="fas fa-id-card"></i> Desa/Kelurahan/Wali Nagari:</b> Belum DiTau</p>
                    </div>

                </div>
                <div class="row mt-4">
                    <div class="col-lg-12">
                        <div id="accordion">
                            <div class="accordion">
                                <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-1"
                                    aria-expanded="true">
                                    <h4>Calon Pengantin Pria</h4>
                                </div>
                                <div class="accordion-body collapse show" id="panel-body-1" data-parent="#accordion"
                                    style="">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item"><b>Nama :</b> {{ $pernikahan->calpenPria->nama }}
                                                </li>
                                                <li class="list-group-item"><b>Tempat Lahir :</b>
                                                    {{ $pernikahan->calpenPria->tempat_lahir }}</li>
                                                <li class="list-group-item"><b>Tempat Lahir :</b>
                                                    {{ $pernikahan->calpenPria->umur }}</li>
                                                <li class="list-group-item"><b>Tanggal Lahir :</b>
                                                    {{ \Carbon\Carbon::parse($pernikahan->calpenPria->tgl_lahir)->format('d F Y') }}
                                                </li>
                                                <li class="list-group-item"><b>Umur :</b> {{ $pernikahan->calpenPria->umur }}
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item"><b>Nama Ibu :</b> {{ $pernikahan->calpenPria->nama_ibu }}
                                                </li>
                                                <li class="list-group-item"><b>Nama Ayah :</b>
                                                    {{ $pernikahan->calpenPria->nama_ayah }}</li>
                                                <li class="list-group-item"><b>Pekerjaan Ibu : {{$pernikahan->calpenPria->pekerjaan_ibu == null ? '-' : $pernikahan->calpenPria->pekerjaan_ibu}}</b></li>
                                                <li class="list-group-item"><b>Pekerjaan Ayah : {{$pernikahan->calpenPria->pekerjaan_ayah == null ? '-' : $pernikahan->calpenPria->pekerjaan_ayah}}</b></li>
                                                {{-- <li class="list-group-item"><b>Tanggal Lahir :</b>
                                                    {{ \Carbon\Carbon::parse($pernikahan->calpenPria->tgl_lahir)->format('d F Y') }}
                                                </li> --}}
                                                <li class="list-group-item"><b>Alamat :</b> {{ $pernikahan->calpenPria->alamat }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion">
                                <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-2">
                                    <h4>Calon Pengantin Wanita</h4>
                                </div>
                                <div class="accordion-body collapse" id="panel-body-2" data-parent="#accordion">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item"><b>Nama :</b> {{ $pernikahan->calpenWanita->nama }}
                                                </li>
                                                <li class="list-group-item"><b>Tempat Lahir :</b>
                                                    {{ $pernikahan->calpenWanita->tempat_lahir }}</li>
                                                <li class="list-group-item"><b>Tempat Lahir :</b>
                                                    {{ $pernikahan->calpenWanita->umur }}</li>
                                                <li class="list-group-item"><b>Tanggal Lahir :</b>
                                                    {{ \Carbon\Carbon::parse($pernikahan->calpenWanita->tgl_lahir)->format('d F Y') }}
                                                </li>
                                                <li class="list-group-item"><b>Umur :</b> {{ $pernikahan->calpenWanita->umur }}
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item"><b>Nama Ibu :</b> {{ $pernikahan->calpenWanita->nama_ibu }}
                                                </li>
                                                <li class="list-group-item"><b>Nama Ayah :</b>
                                                    {{ $pernikahan->calpenWanita->nama_ayah }}</li>
                                                <li class="list-group-item"><b>Pekerjaan Ibu : {{$pernikahan->calpenWanita->pekerjaan_ibu == null ? '-' : $pernikahan->calpenWanita->pekerjaan_ibu}}</b></li>
                                                <li class="list-group-item"><b>Pekerjaan Ayah : {{$pernikahan->calpenWanita->pekerjaan_ayah == null ? '-' : $pernikahan->calpenWanita->pekerjaan_ayah}}</b></li>
                                                {{-- <li class="list-group-item"><b>Tanggal Lahir :</b>
                                                    {{ \Carbon\Carbon::parse($pernikahan->calpenWanita->tgl_lahir)->format('d F Y') }}
                                                </li> --}}
                                                <li class="list-group-item"><b>Alamat :</b> {{ $pernikahan->calpenWanita->alamat }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion">
                                <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-3">
                                    <h4>Persyaratan Dokumen</h4>
                                </div>
                                <div class="accordion-body collapse" id="panel-body-3" data-parent="#accordion">
                                    <div class="row mt-3">
                                        <div class="col">
                                            <h5 class="mt-2">Persyaratan Dokumen Suami</h5>
                                            <ul>
                                                <li>Surat Keterangan Untuk Nikah (Didapat dari Kelurahan)</li>
                                                <li>Persetujuan Calon Mempelai</li>
                                                <li>FotoKopi Akta Kelahiran</li>
                                                <li>FotoKopi KTP</li>
                                                <li>FotoKopi Kartu Keluarga</li>
                                                <li> Paspoto 2x3 4 Lembar</li>
                                                <li> Paspoto 4x6 4 Lembar</li>
                                                <li> Surat Izin Orang Tua</li>
                                                @foreach ($pernikahan->dokumen as $dokumen)
                                                    @if ($dokumen->pivot->status_calpen_pria == 1)
                                                        <li>{{ $dokumen->nama }}</li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="col">
                                            <h5 class="mt-2">Persyaratan Dokumen Istri</h5>
                                            <ul>
                                                <li>Surat Keterangan Untuk Nikah (Didapat dari Kelurahan)</li>
                                                <li>Persetujuan Calon Mempelai</li>
                                                <li>FotoKopi Akta Kelahiran</li>
                                                <li>FotoKopi KTP</li>
                                                <li>FotoKopi Kartu Keluarga</li>
                                                <li> Paspoto 2x3 4 Lembar</li>
                                                <li> Paspoto 4x6 4 Lembar</li>
                                                <li> Surat Izin Orang Tua</li>
                                                @foreach ($pernikahan->dokumen as $dokumen)
                                                    @if ($dokumen->pivot->status_calpen_wanita == 1)
                                                        <li>{{ $dokumen->nama }}</li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-md-right mt-3">
                    <div class="float-lg-left mb-lg-0 mb-3">
                        <span class="badge
                        @switch($pernikahan->status)
                            @case('belum_diproses')
                                badge-warning
                                @break
                            @case('diproses')
                                badge-primary
                                @break
                            @case('ditolak')
                                badge-danger
                                @break
                            @case('diterima')
                                badge-info
                                @break
                            @case('selesai')
                                badge-success
                                @break
                            @default

                        @endswitch
                        ">{{$pernikahan->status}}</span>
                      </div>
                    {{-- <button type="button" class="btn btn-primary btn-icon icon-left" id="changeStatus"><i class="fas fa-credit-card"></i> Ubah Status</button> --}}
                    <a href="{{ route('user.pendaftaran-nikah.pdf', $pernikahan->id) }}" class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

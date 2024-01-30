@extends('app')

@section('header', 'Pendaftaran Nikah')

@section('css')
    <style>
        .required {
            color: red;
            margin-left: 5px;
        }
    </style>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row mt-4">
                <div class="col-12 col-lg-12 offset-lg-12">
                    @include('user.pernikahan.wizzard')
                </div>
            </div>
            <form action="{{ route('user.pernikahan.step-four.store') }}" class="wizard-content mt-2"
                enctype="multipart/form-data" method="POST">
                @csrf
                <div class="panel panel-primary setup-content" id="step-4">
                    <div class="panel-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" id="pribadi-tab" data-toggle="tab" href="#pribadi"
                                    role="tab" aria-controls="pribadi" aria-selected="true">Suami</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="ayah-tab" data-toggle="tab" href="#ayah" role="tab"
                                    aria-controls="ayah" aria-selected="false">Ayah Suami</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="ibu-tab" data-toggle="tab" href="#ibu" role="tab"
                                    aria-controls="ibu" aria-selected="false">Ibu Suami</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" id="pribadi" role="tabpanel"
                                aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="control-label">Warga Negara</label>
                                            <select name="warga_negara" class="form-control" id="warga_negara">
                                                <option value="wni">WNI</option>
                                                <option value="wna">WNA</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="control-label">Negara Asal</label>
                                            <input maxlength="100" type="text" class="form-control" name="negara_asal"
                                                id="negara_asal" value="{{ old('negara_asal') }}" disabled />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="control-label">No. Paspor</label>
                                            <input maxlength="100" type="text" class="form-control" name="passpor"
                                                id="passpor" value="{{ old('passpor') }}" disabled />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="control-label">NIK<span class="required">*</span></label>
                                            <input maxlength="100" type="text" class="form-control" name="nik"
                                                id="nik" value="{{ old('nik') }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Nama<span class="required">*</span></label>
                                            <input type="text" name="nama" class="form-control"
                                                value="{{ old('nama') }}" />
                                            @error('nama')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="control-label">Tempat Lahir<span class="required">*</span></label>
                                            <input maxlength="100" type="text" class="form-control" name="tempat_lahir"
                                                value="{{ old('tempat_lahir') }}" />
                                            @error('tempat_lahir')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Lahir<span class="required">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-calendar"></i>
                                                </div>
                                            </div>
                                            <input type="date" class="form-control daterange-cus" id="tgl_lahir"
                                                name="tgl_lahir" value="{{ old('tgl_lahir') }}">
                                        </div>
                                        @error('tgl_lahir')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="umur" class="control-label">Umur<span
                                                    class="required">*</span></label>
                                            <input maxlength="100" type="number" class="form-control" name="umur"
                                                value="{{ old('umur') }}" id="umur" />
                                            @error('umur')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">Status<span
                                                    class="required">*</span></label>
                                            <select class="form-control" name="status">
                                                <option value="bk">Belum Kawin</option>
                                                <option value="k">Kawin</option>
                                                <option value="ch">Cerai Hidup</option>
                                                <option value="cm">Cerai Meninggal</option>
                                            </select>
                                            @error('status')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="agama" class="control-label">Agama<span
                                                    class="required">*</span></label>
                                            <select name="agama" id="agama" class="form-control">
                                                <option value="Islam">Islam</option>
                                                <option value="Kristen Prostestan">Kristen Protestan</option>
                                                <option value="Kristen Katolik">Kristen Katolik</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Budha">Budha</option>
                                                <option value="Konghucu">Konghucu</option>
                                            </select>
                                            @error('agama')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="pendidikan" class="control-label">Pendidikan<span
                                                    class="required">*</span></label>
                                            <select name="pendidikan" id="pendidikan" class="form-control">
                                                <option value="TIDAK/BELUM SEKOLAH">TIDAK/BELUM SEKOLAH</option>
                                                <option value="TIDAK TAMAT SD/SEDERAJATNYA">TIDAK TAMAT SD/SEDERAJATNYA
                                                </option>
                                                <option value="SLTP/SEDEREJAT">SLTP/SEDEREJAT</option>
                                                <option value="DIPLOMA I/II">DIPLOMA I/II</option>
                                                <option value="AKADEMIK/DIPLOMA III/S.MUDA">AKADEMIK/DIPLOMA III/S.MUDA
                                                </option>
                                                <option value="STRATA II">STRATA II</option>
                                                <option value="STRATA III">STRATA III</option>
                                            </select>
                                            @error('pendidikan')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="pekerjaan" class="control-label">Pekerjaan<span
                                                    class="required">*</span></label>
                                            <select name="pekerjaan" id="pekerjaan" class="form-control">
                                                <option value="">Pilih Pekerjaan</option>
                                                <option value="Pegawai Swasta">Pegawai Swasta</option>
                                                <option value="Wiraswasta">Wiraswasta</option>
                                                <option value="Pegawai Negeri Sipil">Pegawai Negeri Sipil (PNS)</option>
                                                <option value="Petani">Petani</option>
                                                <option value="Guru">Guru</option>
                                                <option value="Dokter">Dokter</option>
                                                <option value="Mahasiswa">Mahasiswa</option>
                                                <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                                                <option value="Pensiunan">Pensiunan</option>
                                                <option value="Tentara">Tentara</option>
                                                <option value="Polisi">Polisi</option>
                                                <option value="Lainnya">Lainnya</option>
                                            </select>
                                            @error('pekerjaan')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="pekerjaan_lain" class="control-label">Jika Pekerjaan lainya</label>
                                            <input type="text" class="form-control" name="pekerjaan_lain"
                                                id="pekerjaan_lain" value="{{ old('pekerjaan_lain') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="nohp" class="control-label">No Hp<span
                                                    class="required">*</span></label>
                                            <input type="text" class="form-control" name="nohp"
                                                value="{{ old('nohp') }}">
                                            @error('nohp')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="email" class="control-label">Email<span
                                                    class="required">*</span></label>
                                            <input type="email" class="form-control" name="email"
                                                value="{{ old('email') }}">
                                            @error('email')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="alamat" class="control-label">Alamat<span
                                            class="required">*</span></label>
                                    <textarea name="alamat" id="" cols="30" rows="10" class="form-control" style="height: 100px">{{ old('alamat') }}</textarea>
                                    @error('alamat')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="foto" class="control-label">Foto<span
                                            class="required">*</span></label>
                                    <input type="file" class="form-control" name="foto">
                                    @error('foto')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="tab-pane fade" id="ayah" role="tabpanel" aria-labelledby="ayah-tab">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="nik_ayah" class="control-label">NIK</label>
                                            <input type="text" class="form-control ayah" name="nik_ayah"
                                                id="nik_ayah" value="{{ old('nik_ayah') }}">
                                            @error('nik_ayah')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="status_ayah" class="control-label">Ceklis<span
                                                    class="required">*</span></label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="status_ayah"
                                                    name="status_ayah" value="1"
                                                    @if (old('status_ayah') == 1 || old('status_ayah') == true) checked @endif>
                                                <label class="form-check-label" for="gridCheck1">
                                                    Jika Meninggal/Tidak Diketahui
                                                </label>
                                                @error('status_ayah')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="wn_ayah" class="control-label">Warga Negara</label>
                                            <select name="wn_ayah" class="form-control ayah" id="wn_ayah">
                                                <option value="wni">WNI</option>
                                                <option value="wna">WNA</option>
                                            </select>
                                            @error('wn_ayah')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="negsal_ayah" class="control-label">Negara Asal</label>
                                            <input type="text" class="form-control ayah" name="negsal_ayah"
                                                id="negsal_ayah" disabled value="{{ old('negsal_ayah') }}">
                                            @error('negsal_ayah')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="passpor_ayah" class="control-label">No. Paspor</label>
                                            <input type="text" class="form-control ayah" name="passpor_ayah"
                                                id="passpor_ayah" disabled value="{{ old('paspor_ayah') }}">
                                            @error('passpor_ayah')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="nama_ayah" class="control-label">Nama<span
                                                    class="required">*</span></label>
                                            <input type="text" class="form-control ayah" name="nama_ayah"
                                                value="{{ old('nama_ayah') }}">
                                            @error('nama_ayah')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="tlahir_ayah" class="control-label">Tempat Lahir</label>
                                            <input type="text" class="form-control ayah" name="tlahir_ayah"
                                                value="{{ old('tlahir_ayah') }}">
                                            @error('tlahir_ayah')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="tgl_lahir_ayah" class="control-label">Tanggal Lahir</label>
                                            <input type="date" class="form-control ayah" name="tgl_lahir_ayah"
                                                value="{{ old('tgl_lahir_ayah') }}">
                                            @error('tgl_lahir_ayah')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="agama_ayah" class="control-label">Agama</label>
                                            <select name="agama_ayah" id="agama_ayah" class="form-control ayah">
                                                <option value="Islam">Islam</option>
                                                <option value="Kristen Prostestan">Kristen Protestan</option>
                                                <option value="Kristen Katolik">Kristen Katolik</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Budha">Budha</option>
                                                <option value="Konghucu">Konghucu</option>
                                            </select>
                                            @error('agama_ayah')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="pekerjaan_ayah" class="control-label">Pekerjaan</label>
                                            <select name="pekerjaan_ayah" id="pekerjaan_ayah" class="form-control ayah">
                                                <option value="">Pilih Pekerjaan</option>
                                                <option value="Pegawai Swasta">Pegawai Swasta</option>
                                                <option value="Wiraswasta">Wiraswasta</option>
                                                <option value="Pegawai Negeri Sipil">Pegawai Negeri Sipil (PNS)
                                                </option>
                                                <option value="Petani">Petani</option>
                                                <option value="Guru">Guru</option>
                                                <option value="Dokter">Dokter</option>
                                                <option value="Mahasiswa">Mahasiswa</option>
                                                <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                                                <option value="Pensiunan">Pensiunan</option>
                                                <option value="Tentara">Tentara</option>
                                                <option value="Polisi">Polisi</option>
                                                <option value="Lainnya">Lainnya</option>
                                            </select>
                                            @error('pekerjaan_ayah')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="pekerl_ayah" class="control-label">Jika Pekerjaan Lainya</label>
                                            <input type="text" class="form-control ayah" name="pekerl_ayah"
                                                value="{{ old('pekerl_ayah') }}">
                                            @error('pekerl_ayah')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="alamat_ayah" class="control-label">Alamat</label>
                                    <textarea name="alamat_ayah" id="" cols="30" rows="10" style="height: 100px"
                                        class="form-control ayah">{{ old('alamat_ayah') }}</textarea>
                                    @error('alamat_ayah')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="tab-pane fade" id="ibu" role="tabpanel" aria-labelledby="ibu-tab">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="nik_ibu" class="control-label">NIK</label>
                                            <input type="text" class="form-control ibu" name="nik_ibu" id="nik_ibu"
                                                value="{{ old('nik_ibu') }}">
                                            @error('nik_ibu')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="status_ibu" class="control-label">Ceklis<span
                                                    class="required">*</span></label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="status_ibu"
                                                    name="status_ibu" value="1"
                                                    @if (old('status_ibu') == 1 || old('status_ibu') == true) checked @endif>
                                                <label class="form-check-label" for="gridCheck1">
                                                    Jika Meninggal/Tidak Diketahui
                                                </label>
                                                @error('status_ibu')
                                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="wn_ibu" class="control-label">Warga Negara</label>
                                            <select name="wn_ibu" class="form-control ibu" id="wn_ibu">
                                                <option value="wni">WNI</option>
                                                <option value="wna">WNA</option>
                                            </select>
                                            @error('wn_ibu')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="negsal_ibu" class="control-label">Negara Asal</label>
                                            <input type="text" class="form-control ibu" name="negsal_ibu"
                                                id="negsal_ibu" disabled value="{{ old('negsal_ibu') }}">
                                            @error('negsal_ibu')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="passpor_ibu" class="control-label">No. Paspor</label>
                                            <input type="text" class="form-control ibu" name="passpor_ibu"
                                                id="passpor_ibu" disabled value="{{ old('paspor_ibu') }}">
                                            @error('passpor_ibu')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="nama_ibu" class="control-label">Nama<span
                                                    class="required">*</span></label>
                                            <input type="text" class="form-control ibu" name="nama_ibu"
                                                value="{{ old('nama_ibu') }}">
                                            @error('nama_ibu')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="tlahir_ibu" class="control-label">Tempat Lahir</label>
                                            <input type="text" class="form-control ibu" name="tlahir_ibu"
                                                value="{{ old('tlahir_ibu') }}">
                                            @error('tlahir_ibu')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="tgl_lahir_ibu" class="control-label">Tanggal Lahir</label>
                                            <input type="date" class="form-control ibu" name="tgl_lahir_ibu"
                                                value="{{ old('tgl_lahir_ibu') }}">
                                            @error('tgl_lahir_ibu')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="agama_ibu" class="control-label">Agama</label>
                                            <select name="agama_ibu" id="agama_ibu" class="form-control ibu">
                                                <option value="Islam">Islam</option>
                                                <option value="Kristen Prostestan">Kristen Protestan</option>
                                                <option value="Kristen Katolik">Kristen Katolik</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Budha">Budha</option>
                                                <option value="Konghucu">Konghucu</option>
                                            </select>
                                            @error('agama_ibu')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="pekerjaan_ibu" class="control-label">Pekerjaan</label>
                                            <select name="pekerjaan_ibu" id="pekerjaan_ibu" class="form-control ibu">
                                                <option value="">Pilih Pekerjaan</option>
                                                <option value="Pegawai Swasta">Pegawai Swasta</option>
                                                <option value="Wiraswasta">Wiraswasta</option>
                                                <option value="Pegawai Negeri Sipil">Pegawai Negeri Sipil (PNS)
                                                </option>
                                                <option value="Petani">Petani</option>
                                                <option value="Guru">Guru</option>
                                                <option value="Dokter">Dokter</option>
                                                <option value="Mahasiswa">Mahasiswa</option>
                                                <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                                                <option value="Pensiunan">Pensiunan</option>
                                                <option value="Tentara">Tentara</option>
                                                <option value="Polisi">Polisi</option>
                                                <option value="Lainnya">Lainnya</option>
                                            </select>
                                            @error('pekerjaan_ibu')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="pekerl_ibu" class="control-label">Jika Pekerjaan Lainya</label>
                                            <input type="text" class="form-control ibu" name="pekerl_ibu"
                                                value="{{ old('pekerl_ibu') }}">
                                            @error('pekerl_ibu')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="alamat_ibu" class="control-label">Alamat</label>
                                    <textarea name="alamat_ibu" id="" cols="30" rows="10" style="height: 100px"
                                        class="form-control ibu">{{ old('alamat_ibu') }}</textarea>
                                    @error('alamat_ibu')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <button class="btn btn-primary nextBtn pull-right" data-step="3"
                                type="submit">Next</button>
                        </div>
                        <div class="text-left">
                            <button class="btn btn-primary prevBtn pull-right" data-step="6"
                                type="button">Back</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/custom/validation.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush

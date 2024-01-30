@extends('app')

@section('header', 'Pendaftaran Nikah')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row mt-4">
                <div class="col-12 col-lg-12 offset-lg-12">
                    @include('user.pernikahan.wizzard')
                </div>
            </div>
            <form action="{{ route('user.pernikahan.step-five.store') }}" class="wizard-content mt-2"
                enctype="multipart/form-data" method="POST">
                @csrf
                <div class="panel panel-primary setup-content" id="step-5">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label">Warga Negara</label>
                                    <select name="wn_wali" class="form-control input-wali" id="wn_wali" required>
                                        <option value="wni">WNI</option>
                                        <option value="wna">WNA</option>
                                    </select>
                                    @error('wn_wali')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label">Negara Asal</label>
                                    <input maxlength="100" type="text" required="required"
                                        class="form-control input-wali" name="negsal_wali" id="negsal_wali"
                                        disabled value="{{ old('negsal_wali') }}"/>
                                    @error('negsal_wali')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label">No. Paspor Wali</label>
                                    <input maxlength="100" type="text" required="required"
                                        class="form-control input-wali" name="passpor_wali" id="passpor_wali" disabled value="{{ old('passpor_wali') }}"/>
                                    @error('passpor_wali')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label">Status Wali</label>
                                    <select name="status_wali" id="status_wali" class="form-control" required>
                                        <option value="nasab" {{ old('status_wali') == 'nasab' ? 'selected' : '' }}>NASAB</option>
                                        <option value="hakim" {{ old('status_wali') == 'hakim' ? 'selected' : '' }}>HAKIM</option>
                                    </select>
                                    @error('status_wali')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label">Hubungan Wali</label>
                                    <select name="hubungan_wali" id="hubungan_wali" class="form-control input-wali">
                                        <option value="kakek">KAKEK (AYAH DARI AYAH KANDUNG)</option>
                                        <option value="ayah">AYAH AYAH DARI KAKEK (BUYUT)</option>
                                        <option value="saubakib">SAUDARA LAKI-LAKI SEBAPAK SEIBU</option>
                                        <option value="saubak">SAUDARA LAKI-LAKI SEBAPAK</option>
                                        <option value="anaksaubakib">ANAK LAKI-LAKI DARI SAUDARA LAKI-LAKI SEBAPAK SEIBU</option>
                                        <option value="anaksaubak">ANAK LAKI-LAKI DARI SAUDARA LAKI-LAKI SEBAPAK</option>
                                        <option value="pamanbakib">PAMAN (SAUDARA LAKI-LAKI BAPAK SEBAPAK SEIBU)</option>
                                        <option value="pamanbak">PAMAN (SAUDARA LAKI-LAKI BAPAK SEBAPAK)</option>
                                        <option value="anakpamanbakib">ANAK PAMAN SEBAPAK SEIBU</option>
                                        <option value="anakpamanbak">ANAK PAMAN SEBAPAK</option>
                                        <option value="cucupamanbakib">CUCU PAMAN SEBAPAK SEIBU</option>
                                        <option value="cucupamanbak">CUCU PAMAN SEBAPAK</option>
                                        <option value="pamanbapakbakib">PAMAN BAPAK SEBAPAK SEIBU</option>
                                        <option value="pamanbapakbak">PAMAN BAPAK SEBAPAK</option>
                                        <option value="anakpamanbapakbakib">ANAK PAMAN BAPAK SEBAPAK SEIBU</option>
                                        <option value="anakpamanbapakbak">ANAK PAMAN BAPAK SEBAPAK</option>
                                    </select>
                                    @error('hubungan_wali')
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
                                    <label for="nik_nip_wali" class="control-label">NIK/NIP</label>
                                    <input type="text" class="form-control input-wali" name="nik_nip_wali"
                                        id="nik_nip_wali" value="{{ old('nik_nip_wali') }}">
                                        @error('nik_nip_wali')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="nama_wali" class="control-label">Nama Wali</label>
                                    <input type="text" class="form-control input-wali" name="nama_wali" id="nama_wali" value="{{ old('nama_wali') }}">
                                    @error('nama_wali')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="" class="control-label">Nama Ayah Wali</label>
                                    <input type="text" class="form-control input-wali" name="nama_ayah_wali" value="{{ old('nama_ayah_wali') }}">
                                    @error('nama_ayah_wali')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="" class="control-label">Sebab Alasan Wali Hakim</label>
                                <select name="alasan_wali_hakim" id="alasan_wali_hakim" class="form-control input-wali" disabled>
                                    <option value="wali_nasab_tidak_ada">WALI NASAB TIDAK ADA</option>
                                    <option value="wali_adhal">WALI ADHAL</option>
                                    <option value="wali_tidak_diketahui">WALI TIDAK DIKETAHUI KEBERADAANNYA</option>
                                    <option value="wali_dipenjara">WALI DIPENJARA</option>
                                    <option value="wali_tidak_beragama_islam">WALI TIDAK ADA YANG BERAGAMA ISLAM</option>
                                    <option value="wali_sakit">WALI SAKIT PITAM/AYAN/EPILEPSI</option>
                                    <option value="wali udzur">WALI UDZUR</option>
                                    <option value="wali_sembunyi">WALI SEMBUNYI/TAWARRO</option>
                                    <option value="hak_wali_dicabut">HAK WALI DI CABUT NEGARA</option>
                                    <option value="wali_berihram">WALI SEDANG BERIHRAM</option>
                                    <option value="wali_hilang_ingatan">WALI HILANG INGATAN/GILA</option>
                                    <option value="wali_nasab_menjadi_pengantin">WALI NASAB MENJADI PENGANTIN</option>
                                </select>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="tmpt_lahir_wali" class="control-label">Tempat Lahir</label>
                                    <input type="text" class="form-control input-wali" name="tmpt_lahir_wali" value="{{ old('tmpt_lahir_wali') }}">
                                    @error('tmpt_lahir_wali')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group"></div>
                                <label for="tgl_lahir_wali" class="control-label">Tanggal Lahir</label>
                                <input type="date" class="form-control input-wali" name="tgl_lahir_wali" value="{{ old('tgl_lahir_wali') }}">
                                @error('tgl_lahir_wali')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="pekerjaan_wali" class="control-label">Pekerjan</label>
                                    <select name="pekerjaan_wali" id="pekerjaan_wali" class="form-control input-wali">
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
                                    @error('pekerjaan_wali')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="pekerl_wali" class="control-label">Jika Pekerjaan Lainya</label>
                                    <input type="text" class="form-control input-wali" name="pekerl_wali" value="{{ old('pekerl_wali') }}">
                                    @error('pekerl_wali')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="no_hp_wali" class="control-label">No Hp</label>
                                    <input type="text" class="form-control input-wali" name="no_hp_wali" value="{{ old('no_hp_wali') }}">
                                    @error('no_hp_wali')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="agama_wali" class="control-label">Agama</label>
                                    <select name="agama_wali" id="agama_wali" class="form-control input-wali">
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen Prostestan">Kristen Protestan</option>
                                        <option value="Kristen Katolik">Kristen Katolik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Konghucu">Konghucu</option>
                                    </select>
                                    @error('agama_wali')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alamat_wali" class="control-label">Alamat</label>
                            <textarea name="alamat_wali" id="" cols="30" rows="10" class="form-control input-wali"
                                style="height: 100px">{{ old('alamat_wali') }}</textarea>
                                @error('alamat_wali')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                        </div>
                        <div class="text-left">
                            <button class="btn btn-primary prevBtn pull-right" data-step="6"
                                type="button">Back</button>
                        </div>
                        <div class="text-right">
                            <button class="btn btn-primary nextBtn pull-right" data-step="5"
                                type="submit">Next</button>
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


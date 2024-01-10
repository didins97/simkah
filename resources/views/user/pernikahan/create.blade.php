@extends('app')

@section('header', 'Pendaftaran Nikah')

@section('content')
    @if ($pernikahanCount > 0)
    <div class="alert alert-primary">
        Lihat Pernikahan Yang Sudah Terdaftar <a href="{{ route('user.pernikahan.index') }}"><b>Disini</b></a>
      </div>
    @endif
    <div class="card">
        <div class="card-body">
            <div class="row mt-4">
                <div class="col-12 col-lg-12 offset-lg-12">
                    <div class="wizard-steps">
                        <div class="wizard-step wizard-step-active">
                            <div class="wizard-step-icon">
                                <i class="far fa-calendar"></i>
                            </div>
                            <div class="wizard-step-label">
                                Jadwal
                            </div>
                        </div>
                        <div class="wizard-step">
                            <div class="wizard-step-icon">
                                <i class="fas fa-box-open"></i>
                            </div>
                            <div class="wizard-step-label">
                                Lokasi
                            </div>
                        </div>
                        <div class="wizard-step">
                            <div class="wizard-step-icon">
                                <i class="fas fa-male"></i>
                            </div>
                            <div class="wizard-step-label">
                                Calon Suami
                            </div>
                        </div>
                        <div class="wizard-step">
                            <div class="wizard-step-icon">
                                <i class="fas fa-female"></i>
                            </div>
                            <div class="wizard-step-label">
                                Calon Istri
                            </div>
                        </div>
                        <div class="wizard-step">
                            <div class="wizard-step-icon">
                                <i class="fas fa-handshake"></i>
                            </div>
                            <div class="wizard-step-label">
                                Wali Nikah
                            </div>
                        </div>
                        <div class="wizard-step">
                            <div class="wizard-step-icon">
                                <i class="fas fa-file"></i>
                            </div>
                            <div class="wizard-step-label">
                                Data Dokumen
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <form class="wizard-content mt-2" enctype="multipart/form-data">
                <div class="panel panel-primary setup-content" id="step-1">
                    <div class="panel-body" id="panel1">
                        <div class="form-group">
                            <label class="control-label">Kordinat Lokasi Pernikahan</label>
                            <input maxlength="100" type="text" class="form-control" name="kordinat_lokasi"
                                id="kordinatLokasi" placeholder="Masukkan alamat atau nama tempat" disabled />
                            <div id="suggestionBox"></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kecamatan</label>
                            <select class="form-control" name="kecamatan" required>
                                @foreach ($kecamatan as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label">Nikah Di</label>
                                    <select class="form-control" name="nikah_di" id="nikahDi" required>
                                        <option value="di_kua">DI KUA/KANTOR</option>
                                        <option value="di_luar">DI LUAR KUA</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Penikahan</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-calendar"></i>
                                            </div>
                                        </div>
                                        <input type="datetime-local" class="form-control daterange-cus" name="tgl_nikah"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label">Longitude</label>
                                    <input maxlength="100" type="text" class="form-control" name="longitude"/>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Latitude</label>
                                    <input maxlength="100" type="text" class="form-control" name="latitude"/>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <label class="control-label">Nomor Surat Dispensasi Kecamatan</label>
                            <input maxlength="100" type="text" class="form-control" name="surat_dispen_s" />
                        </div> --}}
                        <div class="text-right">
                            <button class="btn btn-primary nextBtn pull-right" type="button" data-step="1">Next</button>
                        </div>
                    </div>
                </div>

                <div class="panel panel-primary setup-content" id="step-2">
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="control-label">Desa/Kelurahan/Wali Nagari</label>
                            <input maxlength="100" type="text" required="required" name="deskel_nikah"
                                class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Alamat Lokasi Akad</label>
                            <textarea class="form-control" name="alamat_akad" style="height: 100px" required></textarea>
                        </div>
                        <div class="text-left">
                            <button class="btn btn-primary prevBtn pull-right" data-step="6"
                                type="button">Back</button>
                        </div>
                        <div class="text-right">
                            <button class="btn btn-primary nextBtn pull-right" type="button"
                                data-step="2">Next</button>
                        </div>
                    </div>
                </div>

                <div class="panel panel-primary setup-content" id="step-3">
                    <div class="panel-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" id="suami-tab" data-toggle="tab" href="#suami"
                                    role="tab" aria-controls="suami" aria-selected="true">Suami</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="asuami-tab" data-toggle="tab" href="#asuami" role="tab"
                                    aria-controls="asuami" aria-selected="false">Ayah Suami</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="isuami-tab" data-toggle="tab" href="#isuami" role="tab"
                                    aria-controls="isuami" aria-selected="false">Ibu Suami</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" id="suami" role="tabpanel"
                                aria-labelledby="home-tab">
                                <div class="row" id="ayahSuami">
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="control-label">Warga Negara</label>
                                            <select name="wn_s" class="form-control" id="waSuami" required>
                                                <option value="wni">WNI</option>
                                                <option value="wna">WNA</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="control-label">Negara Asal</label>
                                            <input maxlength="100" type="text" class="form-control"
                                                name="negara_asal_s" id="naSuami" disabled />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="control-label">No. Paspor</label>
                                            <input maxlength="100" type="text" class="form-control"
                                                name="no_paspor_s" id="paspor" disabled />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="control-label">NIK</label>
                                            <input maxlength="100" type="text" required="required"
                                                class="form-control" name="nik_s" id="nik" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Nama</label>
                                            <input type="text" name="nama_s" class="form-control" required />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="control-label">Tempat Lahir</label>
                                            <input maxlength="100" type="text" required="required"
                                                class="form-control" name="tempat_lahir_s" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-calendar"></i>
                                                </div>
                                            </div>
                                            <input type="date" class="form-control daterange-cus" id="tanggal_lahir_suami"
                                                name="tgl_lahir_s" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="control-label">Umur</label>
                                            <input maxlength="100" type="number" required="required"
                                                class="form-control" name="umur_s" disabled id="umur_suami"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">Status</label>
                                            <select class="form-control" name="status_s" required="required">
                                                <option value="bk">Belum Kawin</option>
                                                <option value="k">Kawin</option>
                                                <option value="ch">Cerai Hidup</option>
                                                <option value="cm">Cerai Meninggal</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">Agama</label>
                                            <select name="agama_s" id="agama_s" class="form-control">
                                                <option value="Islam">Islam</option>
                                                <option value="Kristen Prostestan">Kristen Protestan</option>
                                                <option value="Kristen Katolik">Kristen Katolik</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Budha">Budha</option>
                                                <option value="Konghucu">Konghucu</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="pend_s" class="control-label">Pendidikan</label>
                                            <select name="pend_s" id="pend_s" class="form-control" required>
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
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">Pekerjaan</label>
                                            <select name="peker_s" id="pekerSuami" class="form-control" required>
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
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">Jika Pekerjaan lainya</label>
                                            <input type="text" class="form-control" name="pakerl_s"
                                                id="pekerjaanLain" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">No Hp</label>
                                            <input type="text" class="form-control" name="nohp_s" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">Email</label>
                                            <input type="email" class="form-control" name="email_s" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label">Alamat</label>
                                    <textarea name="alamat_s" id="" cols="30" rows="10" class="form-control" style="height: 100px"
                                        required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label">Foto</label>
                                    <input type="file" class="form-control" name="foto_s" required>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="asuami" role="tabpanel" aria-labelledby="asuami-tab">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">NIK</label>
                                            <input type="text" class="form-control ayah-suami" name="nik_ayah_s"
                                                id="nikAyahSuami">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">Ceklis</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="statusAyahS"
                                                    name="status_ayah_s" value="1">
                                                <label class="form-check-label" for="gridCheck1">
                                                    Jika Meninggal/Tidak Diketahui
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">Warga Negara</label>
                                            <select name="wn_ayah_s" class="form-control ayah-suami" id="wnAyahSuami">
                                                <option value="wni">WNI</option>
                                                <option value="wna">WNA</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">Negara Asal</label>
                                            <input type="text" class="form-control ayah-suami"
                                                name="negara_asal_ayah_s" id="naAyahSuami" disabled>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">No. Paspor</label>
                                            <input type="text" class="form-control ayah-suami" name="no_paspor_ayah_s"
                                                id="pasporAyahSuami" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">Nama</label>
                                            <input type="text" class="form-control ayah-suami" name="nama_ayah_s"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">Tempat Lahir</label>
                                            <input type="text" class="form-control ayah-suami" name="tmpt_lhr_ayah_s">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">Tanggal Lahir</label>
                                            <input type="date" class="form-control ayah-suami" name="tgl_lhr_ayah_s">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">Agama</label>
                                            <select name="agama_ayah_s" id="" class="form-control ayah-suami">
                                                <option value="Islam">Islam</option>
                                                <option value="Kristen Prostestan">Kristen Protestan</option>
                                                <option value="Kristen Katolik">Kristen Katolik</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Budha">Budha</option>
                                                <option value="Konghucu">Konghucu</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">Pekerjaan</label>
                                            <select name="peker_ayah_s" id="" class="form-control ayah-suami"
                                                required>
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
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">Jika Pekerjaan Lainya</label>
                                            <input type="text" class="form-control ayah-suami" name="pekerl_ayah_s">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label">Alamat</label>
                                    <textarea name="alamat_ayah_s" id="" cols="30" rows="10" style="height: 100px"
                                        class="form-control ayah-suami"></textarea>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="isuami" role="tabpanel" aria-labelledby="isuami-tab">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">NIK</label>
                                            <input type="text" class="form-control ibu-suami" name="nik_ibu_s"
                                                id="nikIbuSuami">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">Ceklis</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="statusIbuS"
                                                    name="status_ibu_s" value="1">
                                                <label class="form-check-label" for="gridCheck1">
                                                    Jika Meninggal/Tidak Diketahui
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">Warga Negara</label>
                                            <select name="wn_ibu_s" class="form-control ibu-suami" id="wnIbuSuami">
                                                <option value="wni">WNI</option>
                                                <option value="wna">WNA</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">Negara Asal</label>
                                            <input type="text" class="form-control ibu-suami" name="negara_asal_ibu_s"
                                                id="naIbuSuami" disabled>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">Passpor</label>
                                            <input type="text" class="form-control ibu-suami" name="no_paspor_ibu_s"
                                                id="pasporIbuSuami" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">Nama</label>
                                            <input type="text" class="form-control ibu-suami" name="nama_ibu_s"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">Tempat Lahir</label>
                                            <input type="text" class="form-control ibu-suami" name="tmpt_lhr_ibu_s">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">Tanggal Lahir</label>
                                            <input type="date" class="form-control ibu-suami" name="tgl_lhr_ibu_s">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">Agama</label>
                                            <select name="agama_ibu_s" id="" class="form-control ibu-suami">
                                                <option value="Islam">Islam</option>
                                                <option value="Kristen Prostestan">Kristen Protestan</option>
                                                <option value="Kristen Katolik">Kristen Katolik</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Budha">Budha</option>
                                                <option value="Konghucu">Konghucu</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">Pekerjaan</label>
                                            <select name="peker_ibu_s" id="" class="form-control ibu-suami"
                                                required>
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
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">Jika Pekerjaan Lainya</label>
                                            <input type="text" class="form-control ibu-suami" name="pekerl_ibu_s">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label">Alamat</label>
                                    <textarea name="alamat_ibu_s" id="" cols="30" rows="10" class="form-control ibu-suami"
                                        style="height: 100px"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <button class="btn btn-primary nextBtn pull-right" data-step="3"
                                type="button">Next</button>
                        </div>
                        <div class="text-left">
                            <button class="btn btn-primary prevBtn pull-right" data-step="6"
                                type="button">Back</button>
                        </div>
                    </div>
                </div>

                <div class="panel panel-primary setup-content" id="step-4">
                    <div class="panel-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" id="istri-tab" data-toggle="tab" href="#istri"
                                    role="tab" aria-controls="istri" aria-selected="true">Istri</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="aistri-tab" data-toggle="tab" href="#aistri" role="tab"
                                    aria-controls="aistri" aria-selected="false">Ayah Istri</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="iistri-tab" data-toggle="tab" href="#iistri" role="tab"
                                    aria-controls="iistri" aria-selected="false">Ibu Istri</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" id="istri" role="tabpanel"
                                aria-labelledby="istri-tab">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="control-label">Warga Negara</label>
                                            <select name="wn_i" class="form-control" id="waIstri">
                                                <option value="wni">WNI</option>
                                                <option value="wna">WNA</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="control-label">Negara Asal</label>
                                            <input maxlength="100" type="text" class="form-control"
                                                name="negara_asal_i" id="naIstri" disabled />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="control-label">No. Paspor</label>
                                            <input maxlength="100" type="text" id="pasporIstri" class="form-control"
                                                name="no_paspor_i" disabled />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="control-label">NIK</label>
                                            <input maxlength="100" type="text" id="nikIstri" class="form-control"
                                                name="nik_i" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Nama</label>
                                            <input type="text" class="form-control" name="nama_i">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="control-label">Tempat Lahir</label>
                                            <input maxlength="100" type="text" required="required"
                                                class="form-control" name="tempat_lahir_i" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-calendar"></i>
                                                </div>
                                            </div>
                                            <input type="date" class="form-control daterange-cus" name="tgl_lahir_i" id="tanggal_lahir_istri"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="control-label">Umur</label>
                                            <input maxlength="100" type="text" id="umur_istri" required="required" disabled
                                                class="form-control" name="umur_i" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">Status</label>
                                            <select class="form-control" name="status_i" required="required">
                                                <option value="bk">Belum Kawin</option>
                                                <option value="k">Kawin</option>
                                                <option value="ch">Cerai Hidup</option>
                                                <option value="cm">Cerai Meninggal</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">Agama</label>
                                            <select name="agama_i" id="agama_i" class="form-control" required>
                                                <option value="Islam">Islam</option>
                                                <option value="Kristen Prostestan">Kristen Protestan</option>
                                                <option value="Kristen Katolik">Kristen Katolik</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Budha">Budha</option>
                                                <option value="Konghucu">Konghucu</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="pend_s" class="control-label">Pendidikan</label>
                                            <select name="pend_i" id="pend_i" class="form-control" required>
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
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">Pekerjaan</label>
                                            <select name="peker_i" id="" class="form-control" required>
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
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">Jika Pekerjaan lainya</label>
                                            <input type="text" class="form-control" name="pakerl_i">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">No Hp</label>
                                            <input type="text" class="form-control" name="nohp_i" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">Email</label>
                                            <input type="email" class="form-control" name="email_i" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label">Alamat</label>
                                    <input type="text" class="form-control" name="alamat_i" style="height: 100px"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label">Foto</label>
                                    <input type="file" class="form-control" name="foto_i" required>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="aistri" role="tabpanel" aria-labelledby="aistri-tab">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">NIK</label>
                                            <input type="text" class="form-control ayah-istri" name="nik_ayah_i"
                                                id="nikAyahIstri">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">Ceklis</label>
                                            <div class="form-check">
                                                <input class="form-check-input" name="status_ayah_i" type="checkbox"
                                                    value="1" id="statusAyahI">
                                                <label class="form-check-label" for="gridCheck1">
                                                    Jika Meninggal/Tidak Diketahui
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">Warga Negara</label>
                                            <select name="wn_ayah_i" class="form-control ayah-istri" id="wnAyahIstri">
                                                <option value="wni">WNI</option>
                                                <option value="wna">WNA</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">Negara Asal</label>
                                            <input type="text" class="form-control ayah-istri" name="negsal_ayah_i"
                                                id="naAyahIstri" disabled>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">Paspor</label>
                                            <input type="text" class="form-control ayah-istri" name="pas_ayah_i"
                                                id="pasporAyahIstri" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">Nama</label>
                                            <input type="text" class="form-control ayah-istri" name="nama_ayah_i"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">Tempat Lahir</label>
                                            <input type="text" class="form-control ayah-istri" name="tmpt_lhr_ayah_i">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">Tanggal Lahir</label>
                                            <input type="date" class="form-control ayah-istri" name="tgl_lhr_ayah_i">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">Agama</label>
                                            <select name="agama_ayah_i" id="" class="form-control ayah-istri">
                                                <option value="Islam">Islam</option>
                                                <option value="Kristen Prostestan">Kristen Protestan</option>
                                                <option value="Kristen Katolik">Kristen Katolik</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Budha">Budha</option>
                                                <option value="Konghucu">Konghucu</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">Pekerjan</label>
                                            <select name="peker_ayah_i" id="" class="form-control ayah-istri">
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
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">Jika Pekerjaan Lainya</label>
                                            <input type="text" class="form-control ayah-istri"
                                                name="peker_lain_ayah_i">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label">Alamat</label>
                                    <textarea name="alamat_ayah_i" id="" cols="30" rows="10" class="form-control ayah-istri"
                                        style="height: 100px"></textarea>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="iistri" role="tabpanel" aria-labelledby="iistri-tab">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">NIK</label>
                                            <input type="text" class="form-control ibu-istri" name="nik_ibu_i"
                                                id="nikIbuIstri">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">Ceklis</label>
                                            <div class="form-check">
                                                <input class="form-check-input" value="1" type="checkbox"
                                                    id="statusIbuI" name="status_ibu_i">
                                                <label class="form-check-label" for="gridCheck1">
                                                    Jika Meninggal/Tidak Diketahui
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">Warga Negara</label>
                                            <select name="wn_ibu_i" class="form-control ibu-istri" id="wnIbuIstri">
                                                <option value="wni">WNI</option>
                                                <option value="wna">WNA</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">Negara Asal</label>
                                            <input type="text" class="form-control ibu-istri" name="negsal_ibu_i"
                                                id="naIbuIstri" disabled>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">Paspor</label>
                                            <input type="text" class="form-control ibu-istri" name="pas_ibu_i"
                                                id="pasporIbuIstri" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">Nama</label>
                                            <input type="text" class="form-control ibu-istri" name="nama_ibu_i"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">Tempat Lahir</label>
                                            <input type="text" class="form-control ibu-istri" name="tmpt_lhr_ibu_i">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">Tanggal Lahir</label>
                                            <input type="date" class="form-control ibu-istri" name="tgl_lhr_ibu_i">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">Agama</label>
                                            <select name="agama_ibu_i" id="" class="form-control ibu-istri">
                                                <option value="Islam">Islam</option>
                                                <option value="Kristen Prostestan">Kristen Protestan</option>
                                                <option value="Kristen Katolik">Kristen Katolik</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Budha">Budha</option>
                                                <option value="Konghucu">Konghucu</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">Pekerjan</label>
                                            <select name="peker_ibu_i" id="" class="form-control ibu-istri">
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
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="" class="control-label">Jika Pekerjaan Lainya</label>
                                            <input type="text" class="form-control ibu-istri" name="peker_lain_ibu_i">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label">Alamat</label>
                                    <textarea name="alamat_ibu_i" id="" cols="30" rows="10" class="form-control ibu-istri"
                                        style="height: 100px"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="text-left">
                            <button class="btn btn-primary prevBtn pull-right" data-step="6"
                                type="button">Back</button>
                        </div>
                        <div class="text-right">
                            <button class="btn btn-primary nextBtn pull-right" data-step="4"type="button">Next</button>
                        </div>
                    </div>
                </div>

                <div class="panel panel-primary setup-content" id="step-5">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label">Warga Negara</label>
                                    <select name="wn_w" class="form-control input-wali" id="wnWali" required>
                                        <option value="wni">WNI</option>
                                        <option value="wna">WNA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label">Negara Asal</label>
                                    <input maxlength="100" type="text" required="required"
                                        class="form-control input-wali" name="negara_asal_w" id="naWali"
                                        disabled />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label">No. Paspor Wali</label>
                                    <input maxlength="100" type="text" required="required"
                                        class="form-control input-wali" name="no_paspor_w" id="pasporWali" disabled />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label">Status Wali</label>
                                    <select name="status_w" id="statusWali" class="form-control" required>
                                        <option value="nasab">NASAB</option>
                                        <option value="hakim">HAKIM</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="control-label">Hubungan Wali</label>
                                    <select name="hubungan_w" id="" class="form-control input-wali">
                                        <option value="kakek">KAKEK (AYAH DARI AYAH KANDUNG)</option>
                                        <option value="ayah">AYAH AYAH DARI KAKEK (BUYUT)</option>
                                        <option value="saubakib">SAUDARA LAKI-LAKI SEBAPAK SEIBU</option>
                                        <option value="saubak">SAUDARA LAKI-LAKI SEBAPAK</option>
                                        <option value="anaksaubakib">ANAK LAKI-LAKI DARI SAUDARA LAKI-LAKI SEBAPAK SEIBU
                                        </option>
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
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="" class="control-label">NIK/NIP</label>
                                    <input type="text" class="form-control input-wali" name="niknip_w"
                                        id="nikWali">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="" class="control-label">Nama Wali</label>
                                    <input type="text" class="form-control input-wali" name="nama_w">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="" class="control-label">Nama Ayah Wali</label>
                                    <input type="text" class="form-control input-wali" name="nama_ayah_w">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="" class="control-label">Sebab Alasan Wali Hakim</label>
                                <select name="alasan_w_hakim" id="sebabAlasanHakim" class="form-control input-wali">
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
                                    <label for="" class="control-label">Tempat Lahir</label>
                                    <input type="text" class="form-control input-wali" name="tempat_lahir_w">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group"></div>
                                <label for="" class="control-label">Tanggal Lahir</label>
                                <input type="date" class="form-control input-wali" name="tgl_lahir_w">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="" class="control-label">Pekerjan</label>
                                    <select name="peker_w" id="" class="form-control input-wali">
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
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="" class="control-label">Jika Pekerjaan Lainya</label>
                                    <input type="text" class="form-control input-wali" name="pekerl_w">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="" class="control-label">No Hp</label>
                                    <input type="text" class="form-control input-wali" name="nohp_w">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="" class="control-label">Agama</label>
                                    <select name="agama_w" id="agama_w" class="form-control input-wali">
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen Prostestan">Kristen Protestan</option>
                                        <option value="Kristen Katolik">Kristen Katolik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Konghucu">Konghucu</option>
                                    </select>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Alamat</label>
                            <textarea name="alamat_w" id="" cols="30" rows="10" class="form-control input-wali"
                                style="height: 100px"></textarea>
                        </div>
                        <div class="text-left">
                            <button class="btn btn-primary prevBtn pull-right" data-step="6"
                                type="button">Back</button>
                        </div>
                        <div class="text-right">
                            <button class="btn btn-primary nextBtn pull-right" data-step="5"
                                type="button">Next</button>
                        </div>
                    </div>
                </div>

                <div class="panel panel-primary setup-content" id="step-6">
                    <div class="card-header"></div>
                    <div class="panel-body">
                        <h4 class="text-center">Dokumen Yang Harus Dibawa</h4>
                        <div class="row mt-3">
                            <div class="col">
                                <h5 class="mt-2">Persyaratan Dokumen Suami</h5>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1"
                                        name="surat_keterangan_nikah" id="flexCheckCheckedDisabled" checked>
                                    <label class="form-check-label" for="flexCheckCheckedDisabled">
                                        Surat Keterangan Untuk Nikah (Didapat dari Kelurahan)
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1"
                                        name="surat_persetujuan_mempelai" id="flexCheckCheckedDisabled" checked>
                                    <label class="form-check-label" for="flexCheckCheckedDisabled">
                                        Persetujuan Calon Mempelai
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1"
                                        name="akta_kelahiran" id="flexCheckCheckedDisabled" checked>
                                    <label class="form-check-label" for="flexCheckCheckedDisabled">
                                        FotoKopi Akta Kelahiran
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1"
                                        name="ktp" id="flexCheckCheckedDisabled" checked>
                                    <label class="form-check-label" for="flexCheckCheckedDisabled">
                                        FotoKopi KTP
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1"
                                        name="kk" id="flexCheckCheckedDisabled" checked>
                                    <label class="form-check-label" for="flexCheckCheckedDisabled">
                                        FotoKopi Kartu Keluarga
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1"
                                        name="foto2x3" id="flexCheckCheckedDisabled" checked>
                                    <label class="form-check-label" for="flexCheckCheckedDisabled">
                                        Paspoto 2x3 4 Lembar
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1"
                                        name="foto4x6" id="flexCheckCheckedDisabled" checked>
                                    <label class="form-check-label" for="flexCheckCheckedDisabled">
                                        Paspoto 4x6 2 Lembar
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1"
                                        name="surat_izin_orang_tua" id="flexCheckCheckedDisabled" checked>
                                    <label class="form-check-label" for="flexCheckCheckedDisabled">
                                        Surat Izin Orang Tua
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1"
                                        name="surat_dispen_dibawah_umur_s" id="flexCheckCheckedDisabled">
                                    <label class="form-check-label" for="flexCheckCheckedDisabled">
                                        Surat Dispensasi Pengadilan Agama Bagi Calon Berusia dibawah 19 tahun
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1"
                                        name="surat_akta_cerai_s" id="flexCheckCheckedDisabled">
                                    <label class="form-check-label" for="flexCheckCheckedDisabled">
                                        Surat Akta Cerai (Jika Calon Pengantin Sudah Cerai)
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1"
                                        name="surat_izin_komandan_s" id="flexCheckCheckedDisabled">
                                    <label class="form-check-label" for="flexCheckCheckedDisabled">
                                        Surat Izin Komandan (Jika Calon Pengantin TNI atau POLRI)
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1"
                                        name="surat_akta_kematian_s" id="flexCheckCheckedDisabled">
                                    <label class="form-check-label" for="flexCheckCheckedDisabled">
                                        Surat Akta Kematian (Jika Calon Pengantin duda/janda Ditinggal Mati) & N6
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1"
                                        name="surat_izin_kedutaan_wna_s" id="flexCheckCheckedDisabled">
                                    <label class="form-check-label" for="flexCheckCheckedDisabled">
                                        Surat Izin Kedutaan Bagi WNA
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1"
                                        name="surat_rekom_nikah_s" id="flexCheckCheckedDisabled">
                                    <label class="form-check-label" for="flexCheckCheckedDisabled">
                                        Surat Rekomendasi Nikah Dari KUA Setempat (JIka Pernikahan Diluar Wilayah KUA)
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                                <h5 class="mt-2">Persyaratan Dokumen Istri</h5>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1"
                                        name="surat_keterangan_i" id="flexCheckCheckedDisabled" checked>
                                    <label class="form-check-label" for="flexCheckCheckedDisabled">
                                        Surat Keterangan Untuuk Nikah (Didapat dari Kelurahan)
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1"
                                        name="persetujuan_mempelai_i" id="flexCheckCheckedDisabled" checked>
                                    <label class="form-check-label" for="flexCheckCheckedDisabled">
                                        Persetujuan Calon Mempelai
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1"
                                        name="akta_kelahiran_i" id="flexCheckCheckedDisabled" checked>
                                    <label class="form-check-label" for="flexCheckCheckedDisabled">
                                        FotoKopi Akta Kelahiran
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1"
                                        name="fotokopi_ktp_i" id="flexCheckCheckedDisabled" checked>
                                    <label class="form-check-label" for="flexCheckCheckedDisabled">
                                        FotoKopi KTP
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1"
                                        name="fotokopi_kk_i" id="flexCheckCheckedDisabled" checked>
                                    <label class="form-check-label" for="flexCheckCheckedDisabled">
                                        FotoKopi Kartu Keluarga
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1"
                                        name="pasfoto_2x3_i" id="flexCheckCheckedDisabled" checked>
                                    <label class="form-check-label" for="flexCheckCheckedDisabled">
                                        Paspoto 2x3 4 Lembar
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1"
                                        name="pasfoto_4x6_i" id="flexCheckCheckedDisabled" checked>
                                    <label class="form-check-label" for="flexCheckCheckedDisabled">
                                        Paspoto 4x6 2 Lembar
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1"
                                        name="surat_izin_ortu_i" id="flexCheckCheckedDisabled" checked>
                                    <label class="form-check-label" for="flexCheckCheckedDisabled">
                                        Surat Izin Orang Tua
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1"
                                        name="surat_dispen_dibawah_umur_i" id="flexCheckCheckedDisabled">
                                    <label class="form-check-label" for="flexCheckCheckedDisabled">
                                        Surat Dispensasi Pengadilan Agama Bagi Calon Berusia dibawah 19 tahun
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1"
                                        name="surat_akta_cerai_i" id="flexCheckCheckedDisabled">
                                    <label class="form-check-label" for="flexCheckCheckedDisabled">
                                        Surat Akta Cerai (Jika Calon Pengantin Sudah Cerai)
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1"
                                        name="surat_izin_komandan_i" id="flexCheckCheckedDisabled">
                                    <label class="form-check-label" for="flexCheckCheckedDisabled">
                                        Surat Izin Komandan (Jika Calon Pengantin TNI atau POLRI)
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1"
                                        name="surat_akta_kematian_i" id="flexCheckCheckedDisabled">
                                    <label class="form-check-label" for="flexCheckCheckedDisabled">
                                        Surat Akta Kematian (Jika Calon Pengantin duda/janda Ditinggal Mati) & N6
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1"
                                        name="surat_izin_kedutaan_wna_i" id="flexCheckCheckedDisabled">
                                    <label class="form-check-label" for="flexCheckCheckedDisabled">
                                        Surat Izin Kedutaan Bagi WNA
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1"
                                        name="surat_rekom_nikah_i" id="flexCheckCheckedDisabled">
                                    <label class="form-check-label" for="flexCheckCheckedDisabled">
                                        Surat Rekomendasi Nikah Dari KUA Setempat (JIka Pernikahan Diluar Wilayah KUA)
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="custom-control custom-checkbox mt-5">
                            <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                            <label class="custom-control-label" for="agree">PERHATIAN! Sebelum mensubmit data, anda
                                wajib mempedomani hal berikut.1. Data yang dimasukkan valid dan bisa dipertanggungjawabkan,
                                kesalahan penginputan bukan menjadi tanggungjawab KUA karena pengisian dilakukan secara
                                online2. Jika ada perbedaan data pada saat validasi berkas di KUA, maka anda wajib melakukan
                                pembaruan data terlebih dahulu di Dinas Dukcapil daerah setempat;3. Berdasarkan Peraturan
                                Menteri Agama No. 20 Tahun 2019 Tentang Pencatatan Pernikahan, bagi calon pengantin yang
                                sudah mendaftar secara online segera membawa berkas fisik ke Kantor Urusan Agama yang dituju
                                terkait Pemeriksaan Nikah MAKSIMAL 15 hari kerja setelah pendaftaran online. Jika tidak,
                                maka calon pengantin harus MENGULANG mendaftar online kembali.Dengan mengklik ceklis ini,
                                maka anda SETUJU dan MEMPEDOMANI hal ini.</label>
                        </div>
                    </div>
                    <div class="text-right">
                        <button class="btn btn-primary nextBtn pull-right" data-step="7" type="button">Next</button>
                    </div>
                    <div class="text-left">
                        <button class="btn btn-primary prevBtn pull-right" data-step="7" type="button">Back</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/custom/validation.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            var currentStep = 1;

            // Hide all steps except the first one
            $('.setup-content').hide();
            $('#step-' + currentStep).show();
            updateWizardSteps(currentStep);

            // Next button click event
            $('.nextBtn').click(function() {
                var inputElements = $(
                    `#step-${currentStep} .form-control, #step-${currentStep} .form-check-input`)
                var formData = {};
                var validationErrors = [];

                formData['currentStep'] = currentStep

                // add data ini formData
                inputElements.each(function() {
                    var inputName = $(this).attr("name")
                    var inputValue = $(this).val()

                    if ($(this).is(":checkbox")) {
                        inputValue = $(this).is(":checked") ? 1 :
                            0; // Ubah ke 1 jika dicentang, 0 jika tidak
                    } else {
                        inputValue = $(this).val();
                    }

                    formData[inputName] = inputValue
                })

                // console.log(formData);

                $.ajax({
                    type: 'POST',
                    url: '/user/pendaftaran-nikah',
                    data: {
                        formData,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(data) {
                        var nextStep = currentStep + 1;
                        $('#step-' + currentStep).hide();
                        $('#step-' + nextStep).show();
                        currentStep = nextStep;
                        updateWizardSteps(currentStep);

                        console.log(data);

                        if (currentStep === 6) {
                            const validationRules = {
                                "1": {
                                    "nikah_di": {
                                        value: (value) => value === 'di_luar',
                                        elementsToCheck: ["surat_rekom_nikah_i",
                                            "surat_rekom_nikah_s"
                                        ],
                                    },
                                },
                                "3": {
                                    "status_s": {
                                        value: (value) => value === 'ch',
                                        elementsToCheck: ["surat_akta_cerai_s"],
                                    },
                                    "status_s": {
                                        value: (value) => value === 'cm' || value === 'ch',
                                        elementsToCheck: (value) => {
                                            if (value === 'ch') {
                                                return ["surat_akta_cerai_s"];
                                            } else if (value === 'cm') {
                                                return ["surat_akta_kematian_s"];
                                            } else {
                                                return [];
                                            }
                                        },
                                    },
                                    "umur_s": {
                                        value: (value) => value < 19,
                                        elementsToCheck: ["surat_dispen_dibawah_umur_s"],
                                    },
                                    "peker_s": {
                                        value: (value) => value === 'Polisi' || value ===
                                            'Tentara',
                                        elementsToCheck: ["surat_izin_komandan_s"],
                                    },
                                    "wn_s": {
                                        value: (value) => value === 'wna',
                                        elementsToCheck: ["surat_izin_kedutaan_wna_s"],
                                    },
                                },
                                "4": {
                                    "status_i": {
                                        value: (value) => value === 'ch' || value === 'cm',
                                        elementsToCheck: (value) => {
                                            if (value === 'ch') {
                                                return ["surat_akta_cerai_i"];
                                            } else if (value === 'cm') {
                                                return ["surat_akta_kematian_i"];
                                            } else {
                                                return [];
                                            }
                                        },
                                    },
                                    "umur_i": {
                                        value: (value) => value < 19,
                                        elementsToCheck: ["surat_dispen_dibawah_umur_i"],
                                    },
                                    "peker_i": {
                                        value: (value) => value === 'Polisi' || value ===
                                            'Tentara',
                                        elementsToCheck: ["surat_izin_komandan_i"],
                                    },
                                    "wn_i": {
                                        value: (value) => value === 'wna',
                                        elementsToCheck: ["surat_izin_kedutaan_wna_i"],
                                    },
                                },
                            };

                            for (const key in validationRules) {
                                const fields = validationRules[key];
                                for (const field in fields) {
                                    const {
                                        value,
                                        elementsToCheck
                                    } = fields[field];
                                    const fieldValue = data[key][field];

                                    if (value(fieldValue)) {
                                        const elementsToCheckForValue = Array.isArray(
                                                elementsToCheck) ? elementsToCheck :
                                            elementsToCheck(fieldValue);
                                        elementsToCheckForValue.forEach(fieldName => {
                                            $(`input[name="${fieldName}"]`).prop(
                                                'checked', true);
                                        });
                                    }
                                }
                            }
                        }

                        if (currentStep === 7) {
                            fetch('/clear-cache', {
                                    method: 'GET'
                                })
                                .then(response => response.json())
                                .then(data => {
                                    Swal.fire({
                                        title: "Sukses!",
                                        text: "Data berhasil divalidasi.",
                                        icon: "success",
                                        timer: 2000, // Tampilkan pesan selama 2 detik
                                        showConfirmButton: false, // Sembunyikan tombol OK
                                        onClose: () => {
                                            window.location.replace('http://127.0.0.1:8000/user/pendaftaran-nikah');
                                        }
                                    });
                                })
                                .catch(error => {
                                    console.error('Gagal menghapus cache: ' + error);
                                });
                        }

                        const stepData = data[currentStep];
                        for (const key in stepData) {
                            const value = stepData[key];
                            const element = $(`[name="${key}"]`)
                            if (element.length > 0) {
                                if (element.is(':checkbox')) {
                                    element.prop('checked', Boolean(value));
                                } else if (element.is('textarea')) {
                                    element.val(value);
                                } else if (element.is('select')) {
                                    element.val(value);
                                } else if (element.is('input[type="file"]')) {

                                } else {
                                    element.val(value);
                                }
                            }
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);

                        if (xhr.status === 422) {
                            // Menguraikan respons JSON yang berisi pesan-pesan validasi
                            var response = JSON.parse(xhr.responseText);
                            console.log(response.errors);

                            // Iterate melalui pesan-pesan validasi
                            $.each(response.errors, function(key, value) {
                                // Menampilkan pesan error langsung di bawah input yang sesuai
                                var inputName = key.replace('formData.', '');
                                var inputElement = $(`input[name="${inputName}"]`);

                                console.log(inputElement);

                                inputElement.addClass("is-invalid");
                                inputElement.parent().find(".invalid-feedback")
                                    .remove();
                                inputElement.after(
                                    `<div class="invalid-feedback">${value[0]}</div>`
                                );
                            });
                        }
                    }
                });
            });

            // Previous button click event
            $('.prevBtn').click(function() {
                var prevStep = currentStep - 1;
                $('#step-' + currentStep).hide();
                $('#step-' + prevStep).show();
                currentStep = prevStep;
                updateWizardSteps(currentStep);
            });

            function updateWizardSteps(step) {
                $('.wizard-step').removeClass('wizard-step-active');
                $('.wizard-step').eq(step - 1).addClass('wizard-step-active');
            }

            var typingTimer; // Timer untuk menunggu sebelum mengirim permintaan AJAX
            var doneTypingInterval = 1000; // Waktu penundaan (misalnya, 1 detik)

            $("#kordinatLokasi").on('input', function() {
                clearTimeout(typingTimer); // Hapus timer yang ada, jika ada

                // Set timer baru untuk menunggu sebelum mengirim permintaan AJAX
                typingTimer = setTimeout(function() {
                    var selectOption = $("#kordinatLokasi").val();

                    $.ajax({
                        type: "GET",
                        url: "/api/search-location",
                        data: {
                            selectOption,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            console.log(response);
                            var suggestionBox = $("#suggestionBox");
                            suggestionBox.empty(); // Kosongkan suggestionBox

                            response.forEach(function(result) {
                                var suggestionItem = $(
                                    '<div class="suggestion-item">' + result
                                    .place_name + '</div>');
                                suggestionItem.click(function() {
                                    $("#kordinatLokasi").val(result
                                        .place_name);
                                    suggestionBox.empty();
                                    // $("#latitude").val(result.center[0]);
                                    // $("#longitude").val(result.center[1]);

                                    // console.log(result.center[0]);
                                    // console.log($("#latitude").val());

                                    $('input[name="latitude"]').val(
                                        result.center[0]);
                                    $('input[name="longitude"]').val(
                                        result.center[1]);
                                });

                                suggestionBox.append(suggestionItem);
                            });
                        }
                    });
                }, doneTypingInterval);
            });

            $('.input-doc').click(function(e) {
                e.preventDefault();
            });

        });
    </script>
@endpush

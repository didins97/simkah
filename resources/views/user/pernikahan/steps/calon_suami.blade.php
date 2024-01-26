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

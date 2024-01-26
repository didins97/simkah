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

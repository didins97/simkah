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

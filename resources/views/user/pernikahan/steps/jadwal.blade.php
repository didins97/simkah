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

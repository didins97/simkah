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
            <form action="{{ route('user.pernikahan.step-six.store') }}" class="wizard-content mt-2" method="POST">
                @csrf
                <div class="panel panel-primary setup-content" id="step-6">
                    <div class="card-header"></div>
                    <div class="panel-body">
                        <h4 class="text-center">Dokumen Yang Harus Dibawa</h4>
                        <div class="row mt-3">
                            <div class="col">
                                <h5 class="mt-2">Persyaratan Dokumen Suami</h5>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1"
                                        name="surat_keterangan_nikah_suami" id="sknSuami" checked>
                                    <label class="form-check-label" for="sknSuami">
                                        Surat Keterangan Untuk Nikah (Didapat dari Kelurahan)
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1"
                                        name="surat_persetujuan_mempelai_suami" id="spmSuami" checked>
                                    <label class="form-check-label" for="spmSuami">
                                        Persetujuan Calon Mempelai
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1"
                                        name="akta_kelahiran_suami" id="aktaSuami" checked>
                                    <label class="form-check-label" for="aktaSuami">
                                        FotoKopi Akta Kelahiran
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1" name="ktp_suami"
                                        id="ktpSuami" checked>
                                    <label class="form-check-label" for="ktpSuami">
                                        FotoKopi KTP
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1" name="kk_suami"
                                        id="kkSuami" checked>
                                    <label class="form-check-label" for="kkSuami">
                                        FotoKopi Kartu Keluarga
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1" name="foto2x3_suami"
                                        id="foto23Suami" checked>
                                    <label class="form-check-label" for="foto23Suami">
                                        Paspoto 2x3 4 Lembar
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1" name="foto4x6_suami"
                                        id="foto46Suami" checked>
                                    <label class="form-check-label" for="foto46Suami">
                                        Paspoto 4x6 2 Lembar
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1"
                                        name="surat_izin_orang_tua_suami" id="siOrtuSuami" checked>
                                    <label class="form-check-label" for="siOrtuSuami">
                                        Surat Izin Orang Tua
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1"
                                        name="surat_dispen_dibawah_umur_suami" id="dispenUmurSuami" {{ $calpen_pria->umur < 19 ? 'checked' : ''}}>
                                    <label class="form-check-label" for="dispenUmurSuami">
                                        Surat Dispensasi Pengadilan Agama Bagi Calon Berusia dibawah 19 tahun
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1"
                                        name="surat_akta_cerai_suami" id="aktaCeraiSuami" {{ $calpen_pria->status == 'ch' ? 'checked' : ''}}>
                                    <label class="form-check-label" for="aktaCeraiSuami">
                                        Surat Akta Cerai (Jika Calon Pengantin Sudah Cerai)
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1"
                                        name="surat_izin_komandan_suami" id="siKomandanSuami" {{ $calpen_pria->pekerjaan == 'Polisi' || $calpen_pria->pekerjaan == 'Tentara' ? 'checked' : ''}}>
                                    <label class="form-check-label" for="siKomandanSuami">
                                        Surat Izin Komandan (Jika Calon Pengantin TNI atau POLRI)
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1"
                                        name="surat_akta_kematian_suami" id="akteKematianSuami" {{ $calpen_pria->status == 'cm' ? 'checked' : ''}}>
                                    <label class="form-check-label" for="akteKematianSuami">
                                        Surat Akta Kematian (Jika Calon Pengantin duda/janda Ditinggal Mati) & N6
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1"
                                        name="surat_izin_kedutaan_wna_suami" id="suratKedutaanSUami" {{ $calpen_pria->warga_negara == 'wna' ? 'checked' : ''}}>
                                    <label class="form-check-label" for="suratKedutaanSUami">
                                        Surat Izin Kedutaan Bagi WNA
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1"
                                        name="nikah_diluar" id="nikahDiluar" {{ $pernikahan->nikah_id == 'di_luar' ? 'checked' : ''}}>
                                    <label class="form-check-label" for="nikahDiluar">
                                        Surat Rekomendasi Nikah Dari KUA Setempat (JIka Pernikahan Diluar Wilayah KUA)
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                                <h5 class="mt-2">Persyaratan Dokumen Istri</h5>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1"
                                        name="surat_keterangan_nikah_istri" id="sknIstri" checked>
                                    <label class="form-check-label" for="sknIstri">
                                        Surat Keterangan Untuuk Nikah (Didapat dari Kelurahan)
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1"
                                        name="surat_persetujuan_mempelai_istri" id="spmIstri" checked>
                                    <label class="form-check-label" for="spmIstri">
                                        Persetujuan Calon Mempelai
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1"
                                        name="akta_kelahiran_istri" id="aktaIstri" checked>
                                    <label class="form-check-label" for="aktaIstri">
                                        FotoKopi Akta Kelahiran
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1"
                                        name="ktp_istri" id="ktpIstri" checked>
                                    <label class="form-check-label" for="ktpIstri">
                                        FotoKopi KTP
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1"
                                        name="kk_istri" id="kkIstri" checked>
                                    <label class="form-check-label" for="kkIstri">
                                        FotoKopi Kartu Keluarga
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1"
                                        name="foto2x3_istri" id="foto23Istri" checked>
                                    <label class="form-check-label" for="foto23Istri">
                                        Paspoto 2x3 4 Lembar
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1"
                                        name="foto4x6_istri" id="foto46Istri" checked>
                                    <label class="form-check-label" for="foto46Istri">
                                        Paspoto 4x6 2 Lembar
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1"
                                        name="surat_izin_orang_tua_istri" id="siOrtuIstri" checked>
                                    <label class="form-check-label" for="siOrtuIstri">
                                        Surat Izin Orang Tua
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1"
                                        name="surat_dispen_dibawah_umur_istri" id="dispenUmurIstri" {{ $calpen_wanita->umur < 19 ? 'checked' : ''}}>
                                    <label class="form-check-label" for="dispenUmurIstri">
                                        Surat Dispensasi Pengadilan Agama Bagi Calon Berusia dibawah 19 tahun
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1"
                                        name="akta_kelahiran_istri" id="aktaIstri" {{ $calpen_wanita->status == 'ch' ? 'checked' : ''}}>
                                    <label class="form-check-label" for="aktaIstri">
                                        Surat Akta Cerai (Jika Calon Pengantin Sudah Cerai)
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1"
                                        name="surat_izin_komandan_istri" id="siKomandanIstri" {{ $calpen_wanita->pekerjaan == 'Polisi' || $calpen_wanita->pekerjaan == 'Tentara' ? 'checked' : ''}}>
                                    <label class="form-check-label" for="siKomandanIstri">
                                        Surat Izin Komandan (Jika Calon Pengantin TNI atau POLRI)
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1"
                                        name="surat_akta_kematian_istri" id="akteKematianIstri" {{ $calpen_wanita->status == 'cm' ? 'checked' : ''}}>
                                    <label class="form-check-label" for="akteKematianIstri">
                                        Surat Akta Kematian (Jika Calon Pengantin duda/janda Ditinggal Mati) & N6
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1"
                                        name="surat_izin_kedutaan_wna_istri" id="suratKedutaanIstri" {{ $calpen_wanita->warga_negara == 'wna' ? 'checked' : ''}}>
                                    <label class="form-check-label" for="suratKedutaanIstri">
                                        Surat Izin Kedutaan Bagi WNA
                                    </label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input input-doc" type="checkbox" value="1"
                                        name="nikah_diluar" id="nikahDiluar" {{ $pernikahan->nikah_id == 'di_luar' ? 'checked' : ''}}>
                                    <label class="form-check-label" for="nikahDiluar">
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
                        <button class="btn btn-primary nextBtn pull-right" data-step="7" type="submit">Next</button>
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
@endpush

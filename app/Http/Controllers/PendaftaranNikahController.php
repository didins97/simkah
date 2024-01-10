<?php

namespace App\Http\Controllers;

use App\Models\CalonPengantin;
use App\Models\DokumenPersetujuan;
use App\Models\KantorUrusanAgama;
use App\Models\Kecamatan;
use App\Models\PendaftaranNikah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use DB;
use PDF;

class PendaftaranNikahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->level == 'user'){
            $registrasiNikah = PendaftaranNikah::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->paginate(10);
            return view('user.pernikahan.index', compact('registrasiNikah'));
        } else {
            $registrasiNikah = PendaftaranNikah::orderBy('created_at', 'desc')->paginate(10);
            return view('admin.pernikahan.index', compact('registrasiNikah'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_kua = KantorUrusanAgama::all();
        $kecamatan = Kecamatan::all();
        $pernikahanCount = PendaftaranNikah::where('user_id', auth()->user()->id)->count();
        return view('user.pernikahan.create', compact('list_kua', 'kecamatan', 'pernikahanCount'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Cache::forget('dataPendaftar');
        // kelola cache wizzard
        $data = $request->except('_token');

        $step = $data['formData']['currentStep'];
        // return $request->all();

        $validationRules = $this->getValidationRulesForStep($step);
        $request->validate($validationRules);

        $this->addToDataPendaftarCache($data['formData'], $step);

        if ($step == 6) {
            $cache = Cache::get('dataPendaftar');

            $dataCalpenPria = $this->getCalonPengantinData($cache[3]);
            if ($dataCalpenPria['foto']) {
                // $file = $dataCalpenPria['foto'];
                // $filename = time() . '.' . $file->getClientOriginalExtension();
                // $file->storeAs('public/images/calpen/pria/' . $filename);
                $dataCalpenPria['foto'] = 'filename.png';
            }


            $dataCalpenWanita = $this->getCalonPengantinData($cache[4]);
            if ($dataCalpenWanita['foto']) {
                // $file = $dataCalpenWanita['foto'];
                // $filename = time() . '.' . $file->getClientOriginalExtension();
                // $file->storeAs('public/images/calpen/wanita/' . $filename);
                $dataCalpenWanita['foto'] = 'filename.png';
            }

            DB::beginTransaction();

            try {
                // create pengantin
                $calpenPria = CalonPengantin::create($dataCalpenPria);
                $calpenWanita = CalonPengantin::create($dataCalpenWanita);

                // create pendaftaran nikah
                $PendaftaranNikah = PendaftaranNikah::create([
                    'calpen_pria_id' => $calpenPria->id,
                    'calpen_wanita_id' => $calpenWanita->id,
                    // 'kua_id' => $cache[1]['kua'],
                    'tanggal_nikah' => $cache[1]['tgl_nikah'],
                    'nama_wali' => $cache[5]['nama_w'],
                    'warga_negara' => $cache[5]['wn_w'],
                    'hubungan_wali' => $cache[5]['hubungan_w'],
                    'nik_nip_wali' => $cache[5]['niknip_w'],
                    'pekerjaan_wali' => $cache[5]['peker_w'],
                    'alasan_wali_hakim' => $cache[5]['alasan_w_hakim'],
                    'nama_ayah_wali' => $cache[5]['nama_ayah_w'],
                    'tmpt_lahir_wali' => $cache[5]['tempat_lahir_w'],
                    'tgl_lahir_wali' => $cache[5]['tgl_lahir_w'],
                    'no_hp' => $cache[5]['nohp_w'],
                    'agama' => $cache[5]['agama_w'],
                    'status_wali' => $cache[5]['status_w'],
                    'longitude' => $cache[1]['longitude'],
                    'latitude' => $cache[1]['latitude'],
                    'status' => 'belum_diproses',
                    'user_id' => auth()->user()->id
                ]);

                // create dokumen persyaratan
                $dataDokumen = $cache[6];

                $dokumen_pernikahan = \DB::table('dokumen_pernikahan')->get();
                foreach ($dokumen_pernikahan as $dp) {
                    $pd = new DokumenPersetujuan;
                    $pd->pernikahan_id = $PendaftaranNikah->id;
                    $pd->dokumen_id = $dp->id;
                    switch ($dp->kode) {
                        case 'SDDU':
                            $pd->status_calpen_wanita = $dataDokumen['surat_dispen_dibawah_umur_i'];
                            $pd->status_calpen_pria = $dataDokumen['surat_dispen_dibawah_umur_s'];
                            break;
                        case 'SAC':
                            $pd->status_calpen_wanita = $dataDokumen['surat_akta_cerai_i'];
                            $pd->status_calpen_pria = $dataDokumen['surat_akta_cerai_s'];
                            break;
                        case 'SIC':
                            $pd->status_calpen_wanita = $dataDokumen['surat_izin_komandan_i'];
                            $pd->status_calpen_pria = $dataDokumen['surat_izin_komandan_s'];
                            break;
                        case 'SAK':
                            $pd->status_calpen_wanita = $dataDokumen['surat_akta_kematian_i'];
                            $pd->status_calpen_pria = $dataDokumen['surat_akta_kematian_s'];
                            break;
                        case 'SIK':
                            $pd->status_calpen_wanita = $dataDokumen['surat_izin_kedutaan_wna_i'];
                            $pd->status_calpen_pria = $dataDokumen['surat_izin_kedutaan_wna_s'];
                            break;
                        case 'SRN':
                            $pd->status_calpen_wanita = $dataDokumen['surat_rekom_nikah_i'];
                            $pd->status_calpen_pria = $dataDokumen['surat_rekom_nikah_s'];
                            break;
                    }
                    $pd->save();
                }
                DB::commit();
            } catch (\Throwable $th) {
                DB::rollback();
                throw $th;
            }
        }

        return Cache::get('dataPendaftar');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pernikahan = PendaftaranNikah::with('dokumen')->findOrFail($id);
        if (auth()->user()->level == 'user')
        {
            return view('user.pernikahan.detail', compact('pernikahan'));
        }
        return view('admin.pernikahan.detail', compact('pernikahan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getPetaPendaftaranNikahById($id)
    {
        $pernikahan = PendaftaranNikah::where('id', $id)->first();
        return view('peta.pernikahan.peta', compact('pernikahan'));
    }

    private function getValidationRulesForStep($step)
    {
        switch ($step) {
            case 1:
                return [
                    // 'formData.kua' => 'required',
                    'formData.kordinat_lokasi' => 'required_if:formData.nikah_di,di_luar',
                    'formData.nikah_di' => 'required|in:di_kua,di_luar',
                    'formData.tgl_nikah' => 'required',
                    'formData.longitude' => 'required_if:formData.nikah_di,di_luar',
                    'formData.latitude' => 'required_if:formData.nikah_di,di_luar'
                ];
            case 2:
                return [
                    'formData.deskel_nikah' => 'required|string',
                    'formData.alamat_akad' => 'required|string',
                ];
            case 3:
                return [
                    'formData.wn_s' => 'required|in:wni,wna',
                    'formData.negara_asal_s' => 'required_if:formData.wn_s,wna',
                    'formData.no_paspor_s' => 'required_if:formData.wn_s,wna',
                    'formData.nik_s' => 'required_if:formData.wn_s,wni',
                    'formData.nama_s' => 'required|string',
                    'formData.tempat_lahir_s' => 'required',
                    'formData.tgl_lahir_s' => 'required',
                    'formData.umur_s' => 'required|numeric',
                    'formData.status_s' => 'required|in:bk,k,ch,cm',
                    'formData.agama_s' => 'required|string',
                    'formData.peker_s' => 'required|string',
                    'formData.pend_s' => 'required|string',
                    'formData.nohp_s' => 'required|string',
                    'formData.email_s' => 'required',
                    'formData.alamat_s' => 'required|string',
                    'formData.foto_s' => 'required|string',
                    'formData.wn_ayah_s' => 'required|in:wni,wna',
                    'formData.status_ayah_s' => 'sometimes',
                    // 'formData.nik_ayah_s' => 'required_if:formData.status_ayah_s,!=,on|required_if:formData.wn_ayah_s,wni',
                    'formData.nik_ayah_s' => 'required_if:formData.status_ayah_s,1',
                    'formData.nama_ayah_s' => 'required|string',
                    'formData.no_paspor_ayah_s' => 'required_if:formData.status_ayah_s,1|required_if:formData.wn_ayah_s,wna',
                    'formData.negara_asal_ayah_s' => 'required_if:formData.status_ayah_s,1|required_if:formData.wn_ayah_s,wna',
                    'formData.tmpt_lhr_ayah_s' => 'required_if:formData.status_ayah_s,1',
                    'formData.tgl_lhr_ayah_s' => 'required_if:formData.status_ayah_s,1',
                    'formData.agama_ayah_s' => 'required_if:formData.status_ayah_s,1',
                    'formData.peker_ayah_s' => 'required_if:formData.status_ayah_s,1',
                    'formData.alamat_ayah_s' => 'required_if:formData.status_ayah_s,1',
                    'formData.wn_ibu_s' => 'required|in:wni,wna',
                    // 'formData.nik_ibu_s' => 'required_if:formData.status_ibu_s,1|required_if:formData.wn_ibu_s,wni',
                    'formData.nik_ibu_s' => 'required_if:formData.status_ibu_s,1',
                    'formData.nama_ibu_s' => 'required|string',
                    'formData.no_paspor_ibu_s' => 'required_if:formData.status_ibu_s,1|required_if:formData.wn_ibu_s,wna',
                    'formData.negara_asal_ibu_s' => 'required_if:formData.status_ibu_s,1|required_if:formData.wn_ibu_s,wna',
                    'formData.tmpt_lhr_ibu_s' => 'required_if:formData.status_ibu_s,1',
                    'formData.tgl_lhr_ibu_s' => 'required_if:formData.status_ibu_s,1',
                    'formData.agama_ibu_s' => 'required_if:formData.status_ibu_s,1',
                    'formData.peker_ibu_s' => 'required_if:formData.status_ibu_s,1',
                    'formData.alamat_ibu_s' => 'required_if:formData.status_ibu_s,1',
                ];
            case 4:
                return [
                    'formData.wn_i' => 'required|in:wni,wna',
                    'formData.negara_asal_i' => 'required_if:formData.wn_i,wna',
                    'formData.no_paspor_i' => 'required_if:formData.wn_i,wna',
                    'formData.nik_i' => 'required_if:formData.wn_i,wni',
                    'formData.nama_i' => 'required|string',
                    'formData.tempat_lahir_i' => 'required',
                    'formData.tgl_lahir_i' => 'required',
                    'formData.umur_i' => 'required|numeric',
                    'formData.status_i' => 'required|in:bk,k,ch,cm',
                    'formData.agama_i' => 'required|string',
                    'formData.peker_i' => 'required|string',
                    'formData.pend_i' => 'required|string',
                    'formData.nohp_i' => 'required|string',
                    'formData.email_i' => 'required',
                    'formData.alamat_i' => 'required|string',
                    'formData.foto_i' => 'required|string',
                    'formData.wn_ayah_i' => 'required|in:wni,wna',
                    // 'formData.nik_ayah_i' => 'required_if:formData.status_ayah_i,1|required_if:formData.wn_ayah_i,wni',
                    'formData.status_ayah_i' => 'sometimes',
                    'formData.nik_ayah_i' => 'required_if:formData.status_ayah_i,1',
                    'formData.nama_ayah_i' => 'required|string',
                    'formData.no_paspor_ayah_i' => 'required_if:formData.status_ayah_i,1|required_if:formData.wn_ayah_i,wna',
                    'formData.negara_asal_ayah_i' => 'required_if:formData.status_ayah_i,1|required_if:formData.wn_ayah_i,wna',
                    'formData.tmpt_lhr_ayah_i' => 'required_if:formData.status_ayah_i,1',
                    'formData.tgl_lhr_ayah_i' => 'required_if:formData.status_ayah_i,1',
                    'formData.agama_ayah_i' => 'required_if:formData.status_ayah_i,1',
                    'formData.peker_ayah_i' => 'required_if:formData.status_ayah_i,1',
                    'formData.alamat_ayah_i' => 'required_if:formData.status_ayah_i,1',
                    'formData.wn_ibu_i' => 'required|in:wni,wna',
                    // 'formData.nik_ibu_i' => 'required_if:formData.status_ibu_i,1|required_if:formData.wn_ibu_i,wni',
                    'formData.nik_ibu_i' => 'required_if:formData.status_ibu_i,1',
                    'formData.nama_ibu_i' => 'required|string',
                    'formData.no_paspor_ibu_i' => 'required_if:formData.status_ibu_i,1|required_if:formData.wn_ibu_i,wna',
                    'formData.negara_asal_ibu_i' => 'required_if:formData.status_ibu_i,1|required_if:formData.wn_ibu_i,wna',
                    'formData.tmpt_lhr_ibu_i' => 'required_if:formData.status_ibu_i,1',
                    'formData.tgl_lhr_ibu_i' => 'required_if:formData.status_ibu_i,1',
                    'formData.agama_ibu_i' => 'required_if:formData.status_ibu_i,1',
                    'formData.peker_ibu_i' => 'required_if:formData.status_ibu_i,1',
                    'formData.alamat_ibu_i' => 'required_if:formData.status_ibu_i,1',
                ];
            case 5:
                return [
                    'formData.wn_w' => 'required_if:formData.status_w,hakim',
                    'formData.no_paspor_w' => 'required_if:formData.status_w,nasab|required_if:formData.wn_w,wna',
                    'formData.negara_asal_w' => 'required_if:formData.status_w,nasab|required_if:formData.wn_w,wna',
                    'formData.status_w' => 'required|in:hakim,nasab',
                    'formData.hubungan_w' => 'required_if:formData.status_w,nasab',
                    // 'formData.niknip_w' => 'required_if:formData.status_w,nasab|required_if:formData.wn_w,wni',
                    'formData.nama_w' => 'required|string',
                    'formData.nama_ayah_w' => 'required_if:formData.status_w,nasab',
                    'formData.alasan_w_hakim' => 'required_if:formData.status_w,hakim',
                    'formData.tempat_lahir_w' => 'required_if:formData.status_w,nasab',
                    'formData.tgl_lahir_w' => 'required_if:formData.status_w,nasab',
                    'formData.peker_w' => 'required_if:formData.status_w,nasab',
                    'formData.agama_w' => 'required_if:formData.status_w,nasab',
                    'formData.alamat_w' => 'required_if:formData.status_w,nasab'
                ];
                break;
            default:
                // Tambahkan validasi jika diperlukan untuk langkah-langkah lainnya
                return [];
        }
    }


    private function addToDataPendaftarCache($formData, $step)
    {
        $cachedData = Cache::get('dataPendaftar', []);
        $cachedData[$step] = $formData;
        Cache::put('dataPendaftar', $cachedData);
    }

    private function getCalonPengantinData($formData)
    {
        $dataKey = $formData['currentStep'] == 3 ? 's' : 'i';

        $dataMapping = [
            "nama" => 'nama',
            "tempat_lahir" => 'tempat_lahir',
            'tgl_lahir' => 'tgl_lahir',
            "umur" => 'umur',
            "warga_negara" => 'wn',
            "negara_asal" => 'negara_asal',
            "passpor" => 'no_paspor',
            "agama" => 'agama',
            "nohp" => 'nohp',
            "status" => 'status',
            "pekerjaan" => 'peker',
            "email" => 'email',
            "alamat" => 'alamat',
            "pendidikan" => 'pend',
            "foto" => 'foto',
            "nama_ayah" => 'nama_ayah',
            "nama_ibu" => 'nama_ibu',
            "tlahir_ayah" => 'tmpt_lhr_ayah',
            "tlahir_ibu" => 'tmpt_lhr_ibu',
            "alamat_ayah" => 'alamat_ayah',
            "alamat_ibu" => 'alamat_ayah',
            "status_ayah" => 'status_ayah',
            "status_ibu" => 'status_ibu'
        ];

        $result = [];

        foreach ($dataMapping as $resultKey => $dataField) {
            $result[$resultKey] = $formData["{$dataField}_{$dataKey}"];
        }

        return $result;
    }

    public function printPdf($id){
        $pernikahan = PendaftaranNikah::with('dokumen')->findOrFail($id);
        $pdf = PDF::loadView('admin.pernikahan.print_pdf', ['pernikahan' => $pernikahan]);
        return $pdf->stream('pernikahan.pdf');
    }

    public function changeStatus(Request $request, $id){
        $request->validate([
            'status' => 'required'
        ]);

        $pernikahan = PendaftaranNikah::findOrFail($id);
        $pernikahan->update([
            'status' => $request->status
        ]);

        return redirect()->back();
    }
}

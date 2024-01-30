<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalonPengantinRequest;
use App\Http\Requests\WaliNikahRequest;
use App\Models\CalonPengantin;
use App\Models\DokumenPersetujuan;
use App\Models\KantorUrusanAgama;
use App\Models\Kecamatan;
use App\Models\PendaftaranNikah;
use Illuminate\Http\Request;
use DB;
use PDF;

class PernikahanController extends Controller
{
    public function index()
    {
        $pernikahan = PendaftaranNikah::orderBy('created_at', 'desc');

        if (auth()->user()->level == 'user'){
            $pernikahan = $pernikahan->where('user_id', auth()->user()->id)->paginate(10);
            return view('user.pernikahan.index', compact('pernikahan'));
        }

        $pernikahan = PendaftaranNikah::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.pernikahan.index', compact('pernikahan'));
    }

    public function create()
    {
        $list_kua = KantorUrusanAgama::all();
        $kecamatan = Kecamatan::all();
        $pernikahanCount = PendaftaranNikah::where('user_id', auth()->user()->id)->count();
        return view('user.pernikahan.create', compact('list_kua', 'kecamatan', 'pernikahanCount'));
    }

    public function show($id)
    {
        $pernikahan = PendaftaranNikah::with('dokumen')->findOrFail($id);
        if (auth()->user()->level == 'user')
        {
            return view('user.pernikahan.detail', compact('pernikahan'));
        }
        return view('admin.pernikahan.detail', compact('pernikahan'));
    }

    public function stepOne()
    {
        $list_kua = KantorUrusanAgama::all();
        $kecamatan = Kecamatan::all();
        $pernikahanCount = PendaftaranNikah::where('user_id', auth()->user()->id)->count();
        return view('user.pernikahan.steps.step-one', compact('list_kua', 'kecamatan', 'pernikahanCount'));
    }

    public function storeStepOne(Request $request)
    {
        $data = $request->validate([
            'kordinat_lokasi' => 'required_if:nikah_id,di_luar',
            'nikah_id' => 'required|in:dikua,diluar',
            'tanggal_nikah' => 'required',
            'longitude' => 'required_if:nikah_id,di_luar',
            'latitude' => 'required_if:nikah_id,di_luar',
            'kecamatan_id' => 'required'
        ]);

        $pernikahan = $request->session()->get('pernikahan') ?? new PendaftaranNikah;
        $pernikahan->fill($data);
        $request->session()->put('pernikahan', $pernikahan);

        return redirect()->route('user.pernikahan.step-two');
    }

    public function stepTwo()
    {
        return view('user.pernikahan.steps.step-two');
    }

    public function storeStepTwo(Request $request)
    {
        $data = $request->validate([
            'deskel' => 'required',
            'alamat' => 'required',
        ]);

        $pernikahan = $request->session()->get('pernikahan');
        $pernikahan->fill($data);
        $request->session()->put('pernikahan', $pernikahan);

        return redirect()->route('user.pernikahan.step-three');
    }

    public function stepThree()
    {
        return view('user.pernikahan.steps.step-three');
    }

    public function storeStepThree(CalonPengantinRequest $request)
    {
        $data = $request->validated();

        $data['jenis_kelamin'] = 'L';
        $data['status_ayah'] = $request->status_ayah ?? 0;
        $data['status_ibu'] = $request->status_ibu ?? 0;
        $data['foto'] = upload_file('app/public/images/calpen', $data['foto']);

        $calpen_pria = $request->session()->get('calpen_pria') ?? new CalonPengantin;
        $calpen_pria->fill($data);
        $request->session()->put('calpen_pria', $calpen_pria);

        return redirect()->route('user.pernikahan.step-four');
    }

    public function stepFour()
    {
        return view('user.pernikahan.steps.step-four');
    }

    public function storeStepFour(CalonPengantinRequest $request)
    {
        $data = $request->validated();

        $data['jenis_kelamin'] = 'P';
        $data['status_ayah'] = $request->status_ayah ?? 0;
        $data['status_ibu'] = $request->status_ibu ?? 0;
        $data['foto'] = upload_file('app/public/images/calpen', $data['foto']);

        $calpen_wanita = $request->session()->get('calpen_wanita') ?? new CalonPengantin;
        $calpen_wanita->fill($data);
        $request->session()->put('calpen_wanita', $calpen_wanita);

        return redirect()->route('user.pernikahan.step-five');
    }

    public function stepFive()
    {
        return view('user.pernikahan.steps.step-five');
    }

    public function storeStepFive(WaliNikahRequest $request)
    {
        $data = $request->validated();

        $pernikahan = $request->session()->get('pernikahan') ?? new PendaftaranNikah;
        $pernikahan->fill($data);
        $request->session()->put('pernikahan', $pernikahan);

        return redirect()->route('user.pernikahan.step-six');
    }

    public function stepSix(Request $request)
    {
        $pernikahan = $request->session()->get('pernikahan');
        $calpen_pria = $request->session()->get('calpen_pria');
        $calpen_wanita = $request->session()->get('calpen_wanita');

        return view('user.pernikahan.steps.step-six', compact('pernikahan', 'calpen_pria', 'calpen_wanita'));
    }

    public function storeStepSix(Request $request)
    {
        $request->validate([
            'agree' => 'required'
        ]);

        $calpen_pria = $request->session()->get('calpen_pria');
        $calpen_wanita = $request->session()->get('calpen_wanita');
        $pernikahan = $request->session()->get('pernikahan');

        $pernikahan->user_id = auth()->user()->id;

        DB::beginTransaction();

        try {
            // save calpen
            $calpen_pria->save();
            $calpen_wanita->save();

            // save pernikahan
            $pernikahan->calpen_pria_id = $calpen_pria->id;
            $pernikahan->calpen_wanita_id = $calpen_wanita->id;
            $pernikahan->save();

            // save dokumen
            $dokumen_pernikahan = \DB::table('dokumen_pernikahan')->get();
            foreach($dokumen_pernikahan as $dokumen) {

                $persyaratan = DokumenPersetujuan::createWithStatusCalpenFields(
                    $pernikahan->id,
                    $dokumen->id,
                    $dokumen->kode,
                    $request
                );

                $pernikahan->dokumenPersetujuan()->save($persyaratan);
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }

        $request->session()->forget('calpen_pria');
        $request->session()->forget('calpen_wanita');
        $request->session()->forget('pernikahan');

        return redirect()->route('user.pernikahan.index');
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

    public function getPetaPendaftaranNikahById($id)
    {
        $pernikahan = PendaftaranNikah::where('id', $id)->first();
        return view('peta.pernikahan.peta', compact('pernikahan'));
    }
}

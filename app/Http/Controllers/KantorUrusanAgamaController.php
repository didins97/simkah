<?php

namespace App\Http\Controllers;

use App\Models\KantorUrusanAgama;
use Illuminate\Http\Request;

class KantorUrusanAgamaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kua = KantorUrusanAgama::all();
        return view('admin.kua.index', compact('kua'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kecamatan' => 'required|string|max:255',
            'alamat' => 'required|string',
            'informasi_kontak' => 'required',
            'jumlah_penghulu' => 'required|numeric',
            'latitude' => 'required',
            'longitude' => 'required'
        ]);

        KantorUrusanAgama::create($request->all());

        return redirect()->route('kantor-urusan-agama.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = KantorUrusanAgama::find($id);
        return view('admin.kua.detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = KantorUrusanAgama::where('id', $id)->first();
        return response()->json($data);
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
        $request->validate([
            'kecamatan' => 'required|string|max:255',
            'alamat' => 'required|string',
            'informasi_kontak' => 'required',
            'jumlah_penghulu' => 'required|numeric',
            'latitude' => 'required',
            'longitude' => 'required'
        ]);

        $data = KantorUrusanAgama::where('id', $id)->first();

        $data->update($request->all());

        return redirect()->route('kantor-urusan-agama.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = KantorUrusanAgama::where('id', $id)->first();

        $data->delete();

        return response()->json(['message' => 'Data berhasil dihapus'], 200);
    }

    public function getPetaKua()
    {
        return view('admin.kua.peta', );
    }
}

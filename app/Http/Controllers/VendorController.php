<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $vendor = Vendor::with('user');

        $status = $request->query('status');

        if ($request->status == 'disetujui') {
            $vendor = $vendor->where('status', 'disetujui');
        }

        if ($user->level == 'user') {
            if ($request->has('layanan')) {
                $vendor = $vendor->where('jenis_layanan', $request->layanan)->where('status', 'disetujui')->orderBy('created_at', 'desc')->get();
                return response()->json($vendor);
            }
            $vendor = $vendor->where('status', 'disetujui')->orderBy('created_at', 'desc')->paginate(10);
            return view('user.layanan.index', compact('vendor'));
        }

        if ($user->level == 'vendor') {
            $vendor = $vendor->where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(10);
            return view('vendor.layanan.index', compact('vendor'));
        }

        $vendor = $vendor->orderByRaw("FIELD(status, 'menunggu_persetujuan', 'disetujui', 'ditolak')")
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        session()->put('vendor_status', $status);

        return view('admin.vendor.index', compact('vendor', 'status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.layanan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();

        $this->validate($request, [
            'nama' => 'required',
            'jenis_layanan' => 'required',
            'gambar' => 'required|max:10000|mimes:png,jpg,jpeg',
            'galleries_foto' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'harga' => 'required'
        ]);

        $user = Auth::user();

        // THUMBNAIL
        $fileThumbnail = $request->gambar;
        $filenameGambar = upload_file('app/public/images/vendor/thumbnail', $fileThumbnail);

        $galleries_foto_array = [];
        foreach ($request->file('galleries_foto') as $galleries_foto) {
            $fileNameGalleri = upload_file('app/public/images/vendor/galeri', $galleries_foto);
            $galleries_foto_array[] = $fileNameGalleri;
        }

        $galleries_foto_array = serialize($galleries_foto_array);

        $data = [
            'nama' => $request->nama,
            'jenis_layanan' => $request->jenis_layanan,
            'gambar' => $filenameGambar,
            'letak' => $request->letak,
            'keterangan' => $request->keterangan,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'galeri_foto' => $galleries_foto_array,
            'kontak' => $request->kontak,
            'harga' => $request->harga,
            'user_id' => $user->id,
            'caption_galeri' => serialize($request->caption_galleries_foto)
        ];

        Vendor::create($data);

        return redirect()->route('layanan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(Vendor $vendor)
    {
        $user = Auth::user();

        if ($user->level == 'user') {
            $vendor = $vendor->with('user')
            ->where('status', 'disetujui')
            ->where('id', $vendor->id)
            ->first();
            return view('user.layanan.detail', compact('vendor'));
        }

        $vendor = $vendor->with('user')->where('id', $vendor->id)->first();
        return view('admin.vendor.detail', compact('vendor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendor $vendor)
    {
        return view('vendor.layanan.edit', compact('vendor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vendor $vendor)
    {
        $this->validate($request, [
            'nama' => 'required',
            'harga' => 'required',
        ]);

        // return $request->all();

        // THUMBNAIL
        if ($request->has('gambar')) {
            $fileThumbnail = $request->gambar;
            $filenameGambar = upload_file('app/public/images/vendor/thumbnail', $fileThumbnail);
        } else {
            $filenameGambar = $vendor->gambar;
        }

        $galleries_foto_array = [];

        for( $i = 0; $i < 11; $i++ ) {
            if( isset($request->caption_galleries_foto[$i]) && !isset($request->galleries_foto[$i]) ) {
                $galleries_foto_array[] = unserialize($vendor->galeri_foto)[$i];
            } else if( isset($request->caption_galleries_foto[$i]) && isset($request->galleries_foto[$i]) ) {
                $galleries_foto = $request->file('galleries_foto')[$i];
                $fileNameGalleri = upload_file('app/public/images/vendor/galeri', $galleries_foto);
                $galleries_foto_array[] = $fileNameGalleri;
            } else if( !isset($request->caption_galleries_foto[$i]) && !isset($request->galleries_foto[$i]) ) {
                unset($galleries_foto_array[$i]);
            }
        }
        $galleries_foto_array = serialize($galleries_foto_array);

        $vendor->update([
            'nama' => $request->nama,
            'jenis_layanan' => $request->jenis_layanan,
            'gambar' => $filenameGambar,
            'letak' => $request->letak,
            'keterangan' => $request->keterangan,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'galeri_foto' => $galleries_foto_array,
            'kontak' => $request->kontak,
            'harga' => $request->harga,
            'caption_galeri' => serialize($request->caption_galleries_foto)
        ]);

        return redirect()->route('layanan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $vendor = Vendor::findOrFail($id);

        if( $vendor->gambar != null ) {
            File::delete(storage_path('app/public/images/vendor/thumbnail', $vendor->gambar));
        }

        if ($vendor->galeri_foto) {
            foreach( unserialize($vendor->galeri_foto) as $sf_lama ) {
                File::delete(storage_path('app/public/images/vendor/galeri', $sf_lama));
            }
        }

        $vendor->delete();

        return ['success' => true];
    }

    public function getLayananByVendor(){
        $user = Auth::user();
        return view('vendor.layanan.index', ['vendor' => Vendor::where('user_id', $user->id)->get()]);
    }

    public function getPetaVendorById($id){
        $vendor = Vendor::findOrFail($id);
        return view('peta.vendor.peta', compact('vendor'));
    }

    public function changeStatus(Request $request, $id){
        $request->validate([
            'status' => 'required|in:disetujui,menunggu_persetujuan,ditolak'
        ]);

        $vendor = Vendor::findOrFail($id);

        $vendor->update([
            'status' => $request->status
        ]);
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $userId = $user->id;
        $transaksi = Transaksi::with('user', 'vendor')->orderByRaw("FIELD(status, 'menunggu_persetujuan', 'menunggu_pembayaran', 'uang_muka_dibayar', 'dalam_proses', 'selesai', 'dibatalkan')");

        if ($request->query('q')) {
            $transaksi->search($request->q);
        }

        if ($user->level == 'vendor') {
            $transaksi = $transaksi->whereHas('vendor', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })->paginate(10);
            return view('vendor.transaksi.index', compact('transaksi'));
        }

        if ($user->level == 'user') {
            $transaksi = $transaksi->where('user_id', $userId)->paginate(10);
            return view('user.transaksi.index', compact('transaksi'));
        }

        $transaksi = $transaksi->paginate(10);
        return view('admin.transaksi.index', compact('transaksi'));
    }


    public function detail($id)
    {
        $user = Auth::user();
        $userId = $user->id;

        $transaksi = Transaksi::with('user', 'vendor')->where('id', $id);

        if ($user->level == 'vendor') {
            $transaksi = $transaksi->whereHas('vendor', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })->first();

            return view('vendor.transaksi.detail', compact('transaksi'));
        }

        if ($user->level == 'user') {
            $transaksi = $transaksi->where('user_id', $userId)->first();
            return view('user.transaksi.detail', compact('transaksi'));
        }

        $transaksi = $transaksi->first();
        return view('admin.transaksi.detail', compact('transaksi'));
    }

    public function changeStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required'
        ]);

        $transaksi = Transaksi::where('id', $id)->first();

        $transaksi->update([
            'status' => $request->status
        ]);

        return redirect()->route('vendor.transaksi.detail', $transaksi->id);
    }

    public function create(Request $request, $id)
    {
        $request->validate([
            'nama_penerima' => 'required',
            'nohp' => 'required',
            'email_penerima' => 'required',
            // 'kecamatan' => 'required',
            'tanggal_acara' => 'required',
            'alamat' => 'required',
            'catatan_tambahan' => 'required'
        ]);

        $userId = Auth::user()->id;

        $data = [
            'nama_penerima' => $request->nama_penerima,
            'nohp' => $request->nohp,
            'email_penerima' => $request->email_penerima,
            // 'kecamatan' => $request,
            'tanggal_acara' => $request->tanggal_acara,
            'alamat' => $request->alamat,
            'keterangan' => $request->catatan_tambahan,
            'user_id' => $userId,
            'vendor_id' => $id,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude
        ];

        $transaksi = Transaksi::create($data);

        return redirect()->route('user.transaksi.detail', $transaksi->id);
    }

    public function uploadBuktiPembayaram(Request $request, $id)
    {
        $request->validate([
            'bukti_pembayaran' => 'required'
        ]);

        $file = $request->bukti_pembayaran;
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/images/transaksi/bukti_pembayaran/', $filename);

        $transaksi = Transaksi::findOrFail($id);

        if ($transaksi->status == 'menunggu_pembayaran' && $transaksi->bukti_pembayaran_1 == null) {
            $transaksi->update([
                'bukti_pembayaran_1' => $filename,
                'status' => 'menunggu_persetujuan'
            ]);
        } else {
            $transaksi->update([
                'bukti_pembayaran_2' => $filename,
                'status' => 'menunggu_persetujuan'
            ]);
        }

        return redirect()->route('user.transaksi.detail', $id);
    }

    public function getPetaTransaksiById($id)
    {
        $transaksi = Transaksi::with('kecamatan')->where('id', $id)->first();
        return view('peta.transaksi.peta', compact('transaksi'));
    }

    public function delete($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return ['success' => true];
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\PendaftaranNikah;
use App\Models\Transaksi;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function adminDashboard()
    {
        $countUser = User::count();
        $countLayananVendor = Vendor::where('status', 'disetujui')->count();
        $countPendaftaranNikah = PendaftaranNikah::count();
        $countKecamatan = Kecamatan::count();

        $mostPopularVendor = Vendor::with('user')
        ->withCount('transaksi')
        ->orderBy('transaksi_count', 'desc')
        ->take(3)
        ->get();

        return view('admin.dashboard.index', compact('countUser','countLayananVendor','countPendaftaranNikah', 'mostPopularVendor', 'countKecamatan'));
    }

    public function vendorDashboard()
    {
        $user = Auth::user();
        $countLayananVendor = Vendor::where('user_id', $user->id)->count();
        $countCompletedTransaksi = $user->vendor()->where('status', 'selesai')->count();
        $countCompletedPending = $user->vendor()->where('status', 'menunggu_pembayaran')->count();
        $mostPopularVendor = $user->vendor()->withCount('transaksi')->having('transaksi_count', '!=', 0)->take(3)->get();

        return view('vendor.dashboard.index', compact('countLayananVendor', 'countCompletedTransaksi', 'countCompletedPending', 'mostPopularVendor'));
    }

    public function userDashboard()
    {
        $user = Auth::user();
        $countPendaftaranNikah = PendaftaranNikah::where('id', auth()->user()->id)->count();
        return view('user.dashboard.index', compact('countPendaftaranNikah', 'user'));
    }
}

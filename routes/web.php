<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KantorUrusanAgamaController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\PernikahanController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;
use App\Models\Vendor;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/clear-cache', function (){
    Cache::forget('dataPendaftar');
    return response()->json(['message' => 'Cache dataPendaftar telah dihapus.']);
});

Route::get('/', function (){
    return view('landing_page', [
        'vendor' => Vendor::where('status', 'disetujui')->take(3)->get()
    ]);
})->name('landing_page');

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->middleware('userLevel:admin')->group(function () {
        # DASHBOARD
        Route::get('/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');

        # MAPS
        Route::get('/kantor-urusan-agama/maps', [KantorUrusanAgamaController::class, 'getPetaKua']);
        Route::get('/registrasi-nikah/{id}/maps', [PernikahanController::class, 'getPetaPendaftaranNikahById'])->name('admin.pernikahan.peta');
        Route::get('/vendor/{id}/maps', [VendorController::class, 'getPetaVendorById'])->name('admin.vendor.peta');
        Route::get('/transaksi/{id}/maps', [TransaksiController::class, 'getPetaTransaksiById'])->name('admin.transaksi.peta');

        # LIST, DETAIL, CHANGE STATUS VENDOR
        Route::get('/vendor', [VendorController::class, 'index'])->name('vendor.index');
        Route::get('/vendor/{vendor}', [VendorController::class, 'show'])->name('vendor.show');
        Route::post('/vendor/{id}/status', [VendorController::class, 'changeStatus'])->name('vendor.status');
        Route::delete('/vendor/delete/{id}', [VendorController::class, 'destroy'])->name('vendor.delete');

        # CRUD ADMIN
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/admin/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
        Route::post('/admin', [AdminController::class, 'store'])->name('admin.store');
        Route::patch('/admin/{id}', [AdminController::class, 'update'])->name('admin.update');
        Route::delete('/admin/{id}/delete', [AdminController::class, 'delete'])->name('admin.delete');

        # LIST, DETAIL, CHANGE STATUS PENDAFTARAN NIKAH
        Route::get('/registrasi-nikah', [PernikahanController::class, 'index'])->name('registrasi-nikah.index');
        Route::get('/registrasi-nikah/{id}', [PernikahanController::class, 'show'])->name('registrasi-nikah.show');
        Route::get('/registrasi-nikah/print/{id}', [PernikahanController::class, 'printPdf'])->name('registrasi-nikah.pdf');
        Route::post('/registrasi-nikah/status/{id}', [PernikahanController::class, 'changeStatus'])->name('registrasi-nikah.status');
        // Route::resource('registrasi-nikah', PernikahanController::class);

        # TRANSAKSI LIST, DETAIL
        Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
        Route::get('/transaksi/{id}', [TransaksiController::class, 'detail'])->name('transaksi.detail');
        Route::delete('/transaksi/delete/{id}', [TransaksiController::class, 'delete'])->name('transaksi.delete');

        Route::get('/kecamatan/maps', [KecamatanController::class, 'getPetaKecamatan'])->name('kecamatan.peta');

        # CRUD KUA, USERS, KECAMATAN
        Route::resource('kecamatan', KecamatanController::class);
        Route::resource('kantor-urusan-agama', KantorUrusanAgamaController::class);
        // Route::resource('users', UserController::class);

        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
        // Route::post('/user', [UserController::class, 'store'])->name('user.store');
        Route::patch('/users/{id}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{id}/delete', [UserController::class, 'destroy'])->name('users.delete');
    });

    Route::prefix('vendor')->middleware('userLevel:vendor')->group(function (){
        Route::get('/transaksi/{id}/maps', [TransaksiController::class, 'getPetaTransaksiById'])->name('vendor.transaksi.peta');

        # DASHBOARD
        Route::get('/dashboard', [DashboardController::class, 'vendorDashboard'])->name('vendor.dashboard');

        # TRANSAKSI LIST, DETAIL, CHANGE STATUS
        Route::get('/transaksi', [TransaksiController::class, 'index'])->name('vendor.transaksi.index');
        Route::get('/transaksi/{id}', [TransaksiController::class, 'detail'])->name('vendor.transaksi.detail');
        Route::post('/transaksi/{id}/status', [TransaksiController::class, 'changeStatus'])->name('vendor.transaksi.status');

        # LAYANAN CRUD
        // Route::get('/layanan', [VendorController::class, 'getLayananByVendor'])->name('layanan.index');
        Route::get('/layanan', [VendorController::class, 'index'])->name('layanan.index');
        Route::get('/layanan/create', [VendorController::class, 'create'])->name('layanan.create');
        Route::get('/layanan/{vendor}', [VendorController::class, 'edit'])->name('layanan.edit');
        Route::post('/layanan', [VendorController::class, 'store'])->name('layanan.store');
        Route::patch('/layanan/{vendor}', [VendorController::class, 'update'])->name('layanan.update');
        Route::delete('/layanan/{vendor}', [VendorController::class, 'destroy'])->name('layanan.delete');
    });

    Route::prefix('user')->middleware('userLevel:user')->group(function (){

        Route::get('/vendor/{id}/maps', [VendorController::class, 'getPetaVendorById'])->name('user.vendor.peta');
        Route::get('/registrasi-nikah/{id}/maps', [PernikahanController::class, 'getPetaPendaftaranNikahById'])->name('user.pernikahan.peta');

        Route::get('/dashboard', [DashboardController::class, 'userDashboard'])->name('user.dashboard');

        Route::patch('/users/{id}', [UserController::class, 'update'])->name('user.users.update');

        # LAYANAN LIST, DETAIL
        Route::get('/layanan', [VendorController::class, 'index'])->name('user.layanan.index');
        Route::get('/layanan/{vendor}', [VendorController::class, 'show'])->name('user.layanan.detail');

        Route::get('/transaksi', [TransaksiController::class, 'index'])->name('user.transaksi.index');
        Route::get('/transaksi/{id}', [TransaksiController::class, 'detail'])->name('user.transaksi.detail');
        Route::post('/transaksi/{id}', [TransaksiController::class, 'create'])->name('user.transaksi.create');
        Route::post('/transaksi/{id}/bukti-pembayaran', [TransaksiController::class, 'uploadBuktiPembayaram'])->name('user.transaksi.bukti');

        Route::get('/pendaftaran-nikah', [PernikahanController::class, 'index'])->name('user.pernikahan.index');
        Route::get('/pendaftaran-nikah/create', [PernikahanController::class, 'create'])->name('user.pernikahan.create');
        Route::post('/pendaftaran-nikah', [PernikahanController::class, 'store'])->name('user.pernikahan.store');
        Route::get('/pendaftaran-nikah/{id}', [PernikahanController::class, 'show'])->name('user.pendaftaran-nikah.show');
        Route::get('/pendaftaran-nikah/print/{id}', [PernikahanController::class, 'printPdf'])->name('user.pendaftaran-nikah.pdf');

        Route::get('/pendaftaran/step-one', [PernikahanController::class, 'stepOne'])->name('user.pernikahan.step-one');
        Route::post('/pendaftaran/step-one', [PernikahanController::class, 'storeStepOne'])->name('user.pernikahan.step-one.store');

        Route::get('/pendaftaran/step-two', [PernikahanController::class, 'stepTwo'])->name('user.pernikahan.step-two');
        Route::post('/pendaftaran/step-two', [PernikahanController::class, 'storeStepTwo'])->name('user.pernikahan.step-two.store');

        Route::get('/pendaftaran/step-three', [PernikahanController::class, 'stepThree'])->name('user.pernikahan.step-three');
        Route::post('/pendaftaran/step-three', [PernikahanController::class, 'storeStepThree'])->name('user.pernikahan.step-three.store');

        Route::get('/pendaftaran/step-four', [PernikahanController::class, 'stepFour'])->name('user.pernikahan.step-four');
        Route::post('/pendaftaran/step-four', [PernikahanController::class, 'storeStepFour'])->name('user.pernikahan.step-four.store');

        Route::get('/pendaftaran/step-five', [PernikahanController::class, 'stepFive'])->name('user.pernikahan.step-five');
        Route::post('/pendaftaran/step-five', [PernikahanController::class, 'storeStepFive'])->name('user.pernikahan.step-five.store');

        Route::get('/pendaftaran/step-six', [PernikahanController::class, 'stepSix'])->name('user.pernikahan.step-six');
        Route::post('/pendaftaran/step-six', [PernikahanController::class, 'storeStepSix'])->name('user.pernikahan.step-six.store');


        Route::get('/session', function(){
            // session()->flush();
            return session()->all();
        });
    });
});

// Route::get('/', function () { return view('admin.dashboard.index'); });

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', function(){
    return redirect('/'.Auth::user()->level.'/dashboard');
});

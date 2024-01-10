<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/kantor-urusan-agama', [ApiController::class, 'getKuaLocation']);
Route::get('/kantor-urusan-agama/{id}', [ApiController::class, 'getDetailKua']);

Route::get('/geojson/kecamatan/point', [ApiController::class, 'getGeoJSONKecamatanPoint']);
Route::get('/geojson/kecamatan/polygon', [ApiController::class, 'getGeoJSONKecamatanPolygon']);
Route::get('/geojson/kecamatan/{id}', [ApiController::class, 'getGeoJSONKecamatanById']);

Route::get('/pendaftaran-nikah', [ApiController::class, 'getKuaLocation']);
Route::get('/search-location', [ApiController::class, 'searchLokasiPernikahan']);
Route::get('/total/pendaftaran-nikah', [ApiController::class, 'getJumlahPendaftaranNikah']);
Route::get('/geojson/pernikahan/{id}', [ApiController::class, 'getGeoJSONPernikahanById']);

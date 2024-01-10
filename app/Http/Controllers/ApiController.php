<?php

namespace App\Http\Controllers;

use App\Models\KantorUrusanAgama;
use App\Models\Kecamatan;
use App\Models\PendaftaranNikah;
use App\Models\Vendor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function getKuaLocation()
    {
        $kuaData = KantorUrusanAgama::all();
        return response()->json($kuaData);
    }

    public function searchKuaLocation(Request $request)
    {
        $keyword = $request->input('keyword');

        $kuaResults = KantorUrusanAgama::where('kecamatan', 'like', '%' . $keyword . '%')
            ->orWhere('alamat', 'like', '%' . $keyword . '%')
            ->get();

        return response()->json($kuaResults);
    }

    public function getPernikahanLokasi()
    {
        $pernikahan = PendaftaranNikah::all();
        return response()->json($pernikahan);
    }

    public function searchLokasiPernikahan(Request $request)
    {
        $query = $request->input('selectOption');
        $token = env('MAPBOX_TOKEN');
        $bbox = '127.7710,1.8824,129.0482,2.7442';

        $baseUrl = 'https://api.mapbox.com/geocoding/v5/mapbox.places/' . urlencode($query) . '.json?bbox=' . $bbox . '?country=indonesia';

        $response = Http::get($baseUrl, [
            'access_token' => $token,
        ]);

        $data = $response->json();
        $locations = $data['features'];

        return response()->json($locations);
    }

    public function getDetailKua($id){
        $kua = KantorUrusanAgama::find($id);
        return response()->json($kua);
    }

    public function getJumlahPendaftaranNikah(Request $request){
        $year = date('Y');

        // Query untuk mengambil total pernikahan per bulan
        $monthlyData = \DB::table('pendaftaran_pernikahan')
            // ->where('status', 'selesai')
            ->select(
                \DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'),
                \DB::raw('COUNT(*) as total')
            )
            ->whereYear('created_at', $year)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Daftar nama bulan lengkap dalam bahasa Indonesia
        $monthNames = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        // Membuat array asosiatif dengan nama bulan lengkap dan total pernikahan
        $monthlyResults = [];

        foreach ($monthNames as $index => $monthName) {
            $monthYear = "$year-" . str_pad($index + 1, 2, '0', STR_PAD_LEFT);
            $total = 0;

            // Mencari total pernikahan berdasarkan bulan
            foreach ($monthlyData as $data) {
                if ($data->month === $monthYear) {
                    $total = $data->total;
                    break;
                }
            }

            $monthlyResults[] = [
                'nama_bulan' => $monthName,
                'total' => $total,
            ];
        }

        return response()->json($monthlyResults);
    }

    public function getGeoJSONKecamatanPoint() // POINT
    {
        $kecamatans = Kecamatan::with('pernikahan')->get();

        $features = [];

        foreach ($kecamatans as $kecamatan) {
            $totalPernikahan = $kecamatan->pernikahan->count();
            $feature = [
                'type' => 'Feature',
                'properties' => [
                    'nama' => $kecamatan->nama,
                    'total_pernikahan' => $totalPernikahan,
                ],
                'geometry' => $kecamatan->lokasi,
            ];

            $features[] = $feature;
        }

        $geoJSONData = [
            'type' => 'FeatureCollection',
            'features' => $features,
        ];

        return response()->json($geoJSONData);
    }

    public function getGeoJSONKecamatanPolygon() // POLYGON
    {
        $kecamatans = Kecamatan::withCount('pernikahan', 'vendor')->get();

        $features = [];

        foreach ($kecamatans as $kecamatan) {
            $dataJson = $kecamatan->borderline;
            $dataJson['properties']['total_pernikahan'] = $kecamatan->pernikahan_count;
            $dataJson['properties']['nama_kec'] = $kecamatan->nama;

            $features[] = $dataJson;
        }

        $geoJSONData = [
            'type' => 'FeatureCollection',
            'features' => $features,
        ];

        return response()->json($geoJSONData);
    }

    public function getGeoJSONKecamatanById($id) // POLYGON
    {
        $kecamatan = Kecamatan::where('id', $id)->first();

        $feature = [
            'type' => 'Feature',
            'properties' => [
                'nama' => $kecamatan->nama,
            ],
            'geometry' => $kecamatan->area,
        ];

        $geoJSONData = [
            'type' => 'FeatureCollection',
            'features' => $feature,
        ];

        return response()->json($geoJSONData);
    }
}

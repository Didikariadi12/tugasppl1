<?php

namespace App\Http\Controllers;

use App\Models\Akar;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AkarController;


class AkarController extends Controller
{
    public function index()
    {
        $hasil_akar = Akar::latest('id')->paginate(5);  // Mengambil semua data dari tabel items
        return view('akar-kuadrat', ['hasil_akar'=> $hasil_akar]);
    }

    public function hitung(Request $request){
        $start_time = microtime(true); 
        $request->validate([
            'billangan' => 'required|numeric|min:1',
        ]);

        

    if ($request->has('billangan')) {
        $billangan = $request->input('billangan');

        // Waktu awal penghitungan
        $startTime = microtime(true);

        $result = sqrt($billangan);

        // Waktu akhir penghitungan
        $endTime = microtime(true);

        // Hitung waktu yang diperlukan untuk penghitungan dalam milidetik
        $executionTime = ($endTime - $startTime) * 1000;

        // Simpan hasil ke dalam database
      
        $akar = new Akar();
        $akar->input = $billangan;
        $akar->angka = $result;
        $akar->waktu = $executionTime;
        $akar->jenis = 'API';
        $akar->save();

        $end_time = microtime(true); // Selesai mengukur waktu proses
        $executionTime = ($end_time - $start_time); 
        $hasil_akar = Akar::latest('id')->first();

        $hasil_akar->waktu = $executionTime;
        
        $hasil_akar->update();
        // Jika 'number' tidak diberikan, kembalikan pesan kesalahan atau nilai default jika perlu
        return redirect()->route('akar-kuadrat-index')->withInput();

    }
}
    public function hitungPLSQL(Request $request){

        $start_time = microtime(true); 
        
        $request->validate([
            'bilangan' => 'required|numeric|min:1',
        ]);
        // dd($request->bilangann);
        
        DB::select('CALL hitung(?)',array($request->bilangan));
        $end_time = microtime(true); // Selesai mengukur waktu proses
        $executionTime = ($end_time - $start_time); 
        $hasil_akar = Akar::latest('id')->first();

        $hasil_akar->waktu = $executionTime;
        
        $hasil_akar->update();
        
        return redirect()->route('akar-kuadrat-index')->withInput();
    }
}

//     public function bandingkanWaktu()
//     {
//         // Mengambil waktu rata-rata API
//         $rataRataAPI = Akar::where('jenis', 'API')->avg('waktu');
    
//         // Mengambil waktu rata-rata PL-SQL
//         $rataRataPLSQL = Akar::where('jenis', 'PL-SQL')->avg('waktu');
    
//         // Ambil hasil inputan terbaru dari PL-SQL
//         $hasil_akar = Akar::latest('id')->first();
//         $inputPLSQL = $hasil_akar->input;
//         $angkaAPI = $hasil_akar->angka;
//         $waktuEksekusiAPI = $hasil_akar->waktu;
    
//         return view('bandingkan-waktu', [
//             'inputPLSQL' => $inputPLSQL,
//             'angkaAPI' => $angkaAPI,
//             'waktuEksekusiAPI' => $waktuEksekusiAPI,
//             'angkaPLSQL' => $hasil_akar->angka,
//             'waktuEksekusiPLSQL' => $rataRataPLSQL,
//             'rataRataAPI' => $rataRataAPI,
//             'rataRataPLSQL' => $rataRataPLSQL,
//         ]);
//     }
// }

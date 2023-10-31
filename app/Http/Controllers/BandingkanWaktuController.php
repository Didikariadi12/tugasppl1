<?php

namespace App\Http\Controllers;

use App\Models\Akar;
use Illuminate\Http\Request;

class BandingkanWaktuController extends Controller
{
    //
    public function index()
{
    // Mengambil data hasil PL-SQL
    $hasilPLSQL = Akar::where('jenis', 'PL-SQL')->latest()->first();

    // Mengambil data hasil API
    $hasilAPI = Akar::where('jenis', 'API')->latest()->first();

    return view('bandingkan-waktu', [
        'inputPLSQL' => $hasilPLSQL->input,
        'angkaPLSQL' => $hasilPLSQL->angka,
        'waktuEksekusiPLSQL' => $hasilPLSQL->waktu,
        'inputAPI' => $hasilAPI->input, // Menambahkan angka inputan API
        'angkaAPI' => $hasilAPI->angka,
        'waktuEksekusiAPI' => $hasilAPI->waktu,
        'rataRataAPI' => Akar::where('jenis', 'API')->avg('waktu'),
        'rataRataPLSQL' => Akar::where('jenis', 'PL-SQL')->avg('waktu'),
    ]);
}
}

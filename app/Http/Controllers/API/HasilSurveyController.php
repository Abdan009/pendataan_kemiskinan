<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\HasilSurvei;
use App\Models\OpsiJawaban;
use App\Models\Penduduk;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HasilSurveyController extends Controller
{



    public function store(Request $request)
    {

        $hasil = HasilSurvei::with('opsiJawaban', 'penduduk')->create([
            'id_penduduk' => $request->id_penduduk,
            'id_opsi_jawaban' => $request->id_opsi_jawaban,
            'tanggal' => $request->tanggal,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,

        ]);
        $isi = $request->id_opsi_jawaban;
        DB::insert('insert into clustering ( X1, X2, X3, X4, X5, X6,X7,X8,X9,X10,X11,X12,X13,X14) values ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$isi[0], $isi[1], $isi[2], $isi[3], $isi[4], $isi[5], $isi[6], $isi[7], $isi[8], $isi[9], $isi[10], $isi[11], $isi[12], $isi[13]]);
        return response()->json(['opsi jawaban created successfully.', ($hasil)]);
    }
}

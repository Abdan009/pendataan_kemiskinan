<?php

namespace App\Http\Controllers;

use App\Models\HasilSurvei;
use App\Models\OpsiJawaban;
use App\Models\Penduduk;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HasilSurveyController extends Controller
{
    public function index()
    {
        return view('hasilsurvey.index');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penduduk = Penduduk::all();
        $pertanyaan = Pertanyaan::with(['opsiJawaban'])->get();

        // dd($pertanyaan);

        return view('hasilsurvey.create', compact('penduduk', 'pertanyaan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(implode(", ", $request->id_opsi_jawaban));
        $this->validate($request, [
            'id_penduduk' => 'required',
            'id_opsi_jawaban' => 'required',
            'tanggal' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',


        ]);
        $data = array(
            'id_penduduk'     =>  $request->id_penduduk,
            'id_opsi_jawaban'     =>   implode(", ", $request->id_opsi_jawaban),
            'tanggal'     =>  $request->tanggal,
            'longitude'     =>  $request->longitude,
            'latitude'     =>  $request->latitude,

        );
        $isi = $request->id_opsi_jawaban;
        DB::insert('insert into clustering ( X1, X2, X3, X4, X5, X6,X7,X8,X9,X10,X11,X12,X13,X14) values ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$isi[0], $isi[1], $isi[2], $isi[3], $isi[4], $isi[5], $isi[6], $isi[7], $isi[8], $isi[9], $isi[10], $isi[11], $isi[12], $isi[13]]);
        HasilSurvei::insert($data);
    }

    public function read()
    {
        $hasil = HasilSurvei::with(['opsiJawaban'])->orderBy('id', 'DESC')->get();
        return view('hasilsurvey.read')->with([

            'hasil' => $hasil

        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $opsiJawaban = OpsiJawaban::all();
        $hasil = HasilSurvei::findOrFail($id);
        return view('hasilsurvey.edit')->with([
            'opsiJawaban' => $opsiJawaban,
            'hasil' => $hasil
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $data = HasilSurvei::findOrFail($id);
        $data->id_penduduk = $request->id_penduduk;
        $data->id_opsi_jawaban = $request->id_opsi_jawaban;
        $data->tanggal = $request->tanggal;
        $data->longitude = $request->longitude;
        $data->latitude = $request->latitude;
        $data->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = HasilSurvei::findOrFail($id);
        $data->delete();
    }
}

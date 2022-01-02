<?php

namespace App\Http\Controllers;

use App\absensi;
use App\Kelas;
use Illuminate\Http\Request;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function keluar()
    {
        return view('front.absensi.absensiKeluar');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('Y-m-d');
        $localtime = $date->format('H:i:s');
        $absensi = absensi::where([
                ['users_id', '=', auth()->user()->id],
                ['tanggal', '=', $tanggal],
        ])->first(); 
            absensi::create([
                'users_id' => auth()->user()->id,
                'kelas_id' => Crypt::decrypt($id),
                'tanggal' => $tanggal,
                'jam_masuk' => $localtime,
            ]);
        return redirect('kelas')->with('status', 'Terimakasih Sudah Absen hari ini!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function absensipulang($id)
    {
        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('Y-m-d');
        $localtime = $date->format('H:i:s');


        $absensi = absensi::where([
                ['users_id', '=', auth()->user()->id],
                ['tanggal', '=', $tanggal],
        ])->first();

        $dt=[
            'jam_keluar' => $localtime,
            'kelas_id' => Crypt::decrypt($id),
            'lama_jam' => date('H:i:s', strtotime($localtime) - strtotime($absensi->jam_masuk))
        ];

        if ($absensi->jam_keluar == ""){
            $absensi->update($dt);
            return redirect('kelas')->with('status', 'Sampai Jumpa Lagi :)');
        }else{
            dd("sudah ada");
        }
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
        //
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
    }
}
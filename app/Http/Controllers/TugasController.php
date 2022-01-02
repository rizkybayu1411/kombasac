<?php

namespace App\Http\Controllers;

use App\kirimtugas;
use App\nilai;
use App\tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use DB;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $data = [
            'title' => 'Semua Tugas',
            'kirimtugas1' => kirimtugas::all(),
        ];
        return view('admin.tugas.index', $data);
    }


    
    public function detail($id)
    {
        $dec_id = Crypt::decrypt($id);
        $data = [
            'title' => 'Detail Tugas terkumpul',
            'kirimtugas1' => kirimtugas::find($dec_id)
        ];
        return view('admin.tugas.detail', $data);
    }


    public function cekdownload($id)
    {
        $file=kirimtugas::findOrFail($id);
        return Storage::download('kirimtugas/'. $file->kirim_tugas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kirim_tugas' => 'required'
        ]);
        
        $filenameWithExt = $request->file('kirim_tugas')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);  
        $extension = $request->file('kirim_tugas')->getClientOriginalExtension();
        $filenameSimpan = $filename.'_'.time().'.'.$extension;
        $file = $request->file('kirim_tugas')->storeAs('kirimtugas',$filenameSimpan);
        if ($validator->fails()) {
            return redirect('kelas.detail')->withErrors($validator)->withInput();
        } else {
            $obj = [
                'users_id' => Auth::user()->id,
                'tugas_id' => $request->tugas_id,
                'kelas_id' => $request->kelas_id,
                'kirim_tugas' => $filenameSimpan,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
            DB::table('kirimtugas')->insert($obj);
            return redirect()->route('kelas')->with('status', 'Berhasil Upload tugas');
        }
    }
    public function nilai(Request $request,$id)
    {   
        $request->validate([
            'nama' => 'required',
            'keterangan' => 'required',
            'nilai' => 'required'
        ]);
        $z = [
            'users_id' => Auth::user()->id,
            'nilai' => $request->nilai,
            'keterangan' => $request->keterangan,
            'kelas_id' => $request->kelas_id,
            'kirimtugas_id' => Crypt::decrypt($id),
        ];
        nilai::create($z);
        return redirect()->route('admin.nilai')->with('status', 'Berhasil Menambah Nilai');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
       
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
use App\Kelas;
use DB;
use Carbon\Carbon;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Data Nilai Siswa',
            'nilai' => nilai::all()
        ];
        return view('admin.nilai.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Data Nilai Siswa',
            'kelas' => Kelas::all()
        ];
        return view('admin.nilai.tambah', $data);
    }

    public function pilihtugas(Request $request){
        $list = '<option value="">Pilih Tugas</option>';
        $error = false;
        $kirimtugas = DB::table('kirimtugas')->select('kirimtugas.*', 'users.name', 'tugas.judul')->join('users', 'users.id', 'kirimtugas.users_id')->join('tugas', 'tugas.id', 'kirimtugas.tugas_id')->where('kirimtugas.kelas_id', $request->kelas_id)->get();
        foreach ($kirimtugas as $key) {
            $list .= '<option value="'.$key->id.'">'.$key->judul.' - '.$key->name.'</option>';
        }
        print json_encode(array('error'=>false, 'list'=>$list));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $obj = [
                'users_id' => Auth::user()->id,
                'nilai' => $request->nilai,
                'keterangan' => $request->keterangan,
                'kirim_tugas' => $filenameSimpan,
                'kelas_id' => $request->kelas_id,
                'kirimtugas_id' => $request->kirimtugas_id
        ];
        DB::table('nilai')->insert($obj);
        return redirect()->route('kelas')->with('status', 'Berhasil Upload tugas');
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
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Transaksi;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use DB;

class TransaksiController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Semua Transaksi',
            'transaksis' =>  DB::table('transaksi')->select('transaksi.*', 'kelas.name_kelas', 'users.name')->join('kelas', 'transaksi.kelas_id', 'kelas.id')->join('users', 'transaksi.users_id', 'users.id')->get()
        ];
        return view('admin.transaksi.index', $data);
    }

    public function belumdicek()
    {
        $data = [
            'title' => 'Transaksi Belum Dicek ',
            'transaksis' => Transaksi::where(['status' => 0])->get(),
        ];
        return view('admin.transaksi.index', $data);
    }

    public function disetujui()
    {
        $data = [
            'title' => 'Transaksi Disetujui',
            'transaksis' => Transaksi::where(['status' => 1])->get(),
        ];
        return view('admin.transaksi.index', $data);
    }

    public function ditolak()
    {
        $data = [
            'title' => 'Transaksi Ditolak',
            'transaksis' => Transaksi::where(['status' => 2])->get(),
        ];
        return view('admin.transaksi.index', $data);
    }

    public function detail($id)
    {
        $dec_id = Crypt::decrypt($id);
        $data = [
            'title' => 'Detail Transaksi',
            'transaksi' => DB::table('transaksi')->select('transaksi.*', 'kelas.name_kelas', 'users.name')->join('kelas', 'transaksi.kelas_id', 'kelas.id')->join('users', 'transaksi.users_id', 'users.id')->where('transaksi.id', $dec_id)->first()
        ];
        return view('admin.transaksi.detail', $data);
    }

    public function ubah(Request $request,$id)
    {
        $dec_id = Crypt::decrypt($id);
        $transaksi = Transaksi::find($dec_id);
        if($request->status == 1){
            $transaksi->status = 1;
            Transaksi::where('users_id','=',$transaksi->users_id)->where('kelas_id','=',$transaksi->kelas_id)->update(['status' => '1']);
        }else{
            $transaksi->status = 2;
            Transaksi::where('users_id','=',$transaksi->users_id)->where('kelas_id','=',$transaksi->kelas_id)->update(['status' => '2']);
        }
        $transaksi->save();
        return redirect()->route('admin.transaksi.detail',$id)->with('status','Berhasil Memperbaharui Status');
    }
}


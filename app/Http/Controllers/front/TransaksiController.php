<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Rekening;
use App\Transaksi;
use App\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use DB;

class TransaksiController extends Controller
{
    public function index($id = '')
    {
        if($id == ''){
            $data = [
                'transaksi' => DB::table('transaksi')->select('transaksi.*', 'kelas.name_kelas')->join('kelas', 'transaksi.kelas_id', 'kelas.id')->where('transaksi.users_id', Auth::user()->id)->get()
            ];
            return view('front.transaksi.transaksi',$data);
        }
        else {
            $dec_id = Crypt::decrypt($id);
            $data = [
                'kelas' => Kelas::find($dec_id),
                'rekening' => Rekening::all()
            ];
            return view('front.transaksi.index',$data);
        }
    }

    public function indexUlang($id = '')
    {
        $dec_id = Crypt::decrypt($id);
            $data = [
                'kelas' => Kelas::find($dec_id),
                'rekening' => Rekening::all()
            ];
            return view('front.transaksi.indexulang',$data);
    }

    public function uploadbukti(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'bukti' => 'required|mimes:png,jpg,jpeg'
        ]);
        $dec_id = Crypt::decrypt($request->kelas_id);
        if ($validator->fails()) {
            return redirect()->route('transaksi.filter', $request->kelas_id)->withErrors($validator)->withInput();
        }else{
            
            $file = $request->file('bukti')->store('buktitf','public');
            $obj = [
                'users_id' => Auth::user()->id,
                'kelas_id' => $dec_id,
                'status' => '0',
                'bukti_transfer' => $file
            ];

            Transaksi::create($obj);
            return redirect()->route('transaksi')->with('status','Berhasil Mengirim Bukti Transfer');
        }
    }

    public function uploadulang(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'bukti' => 'required|mimes:png,jpg,jpeg'
        ]);
        $dec_id = Crypt::decrypt($request->kelas_id);
        if ($validator->fails()) {
            return redirect('transaksi.filter.ulang')->withErrors($validator)->withInput();
        }else{
            
            $file = $request->file('bukti')->store('buktitf','public');
            $obj = [
                'users_id' => Auth::user()->id,
                'kelas_id' => $dec_id,
                'status' => '0',
                'bukti_transfer' => $file
            ];

            Transaksi::where('id','=',Auth::user()->id)->where('kelas_id','=',$dec_id)->update($obj);
            return redirect('transaksi')->with('status','Berhasil Mengirim Ulang Transfer');
        }
    }
}

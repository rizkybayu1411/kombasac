<?php

namespace App\Http\Controllers\front;

use App\absensi;
use App\Http\Controllers\Controller;
use App\Kelas;
use App\Transaksi;
use App\tugas;
use App\Video;
use DateTime;
use DateTimeZone;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use DB;
use PDF;

class KelasController extends Controller
{

    public function index()
    {
        $data = [
            'kelas' => Kelas::paginate(9)
        ];

        return view('front.kelas.index',$data);
    }

    public function detail($id)
    {
        $dec_id = Crypt::decrypt($id);
        $data = [
            'kelas' => Kelas::find($dec_id),
            'peserta' => DB::table('transaksi')->where('status', '1')->where('kelas_id', $dec_id)->where('users_id', Auth::user()->id)->first()
        ];

        return view('front.kelas.detail',$data);
    }

    public function sertifikat($id){
        $dec_id = Crypt::decrypt($id);
        $pdf = PDF::loadview('pdf.sertifikat',['kelas' => Kelas::find($dec_id), 'kirimtugas' => DB::table('kirimtugas')->where('kelas_id', $dec_id)->where('users_id', Auth::user()->id)->get()])->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    public function tugas($id)
    {
        $dec_id = Crypt::decrypt($id);
        $data = [
            'kelas' => Kelas::with('tugas')->find($dec_id),
            'tugas' => DB::table('tugas')->where('kelas_id', $dec_id)->get()
        ];
        // dd($data);
        return view('front.kelas.tugas',$data);
    }

    public function downloadtugas($id)
    {
        $file=tugas::findOrFail($id);
        return Storage::download('tugas/'. $file->upload_tugas);
    }

    public function belajar($id,$idvideo)
    {
        $dec_id = Crypt::decrypt($id);
        $dec_idvideo = Crypt::decrypt($idvideo);
        $data = [
            'kelas' => Kelas::find($dec_id),
            'video' => Video::find($dec_idvideo)
        ];

        return view('front.kelas.belajar',$data);
    }
}

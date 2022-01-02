<?php

namespace App\Http\Controllers\admin;

use App\absensi;
use App\Http\Controllers\Controller;
use App\Kelas;
use App\tugas;
use App\Video;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use DB;

class KelasController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Kelas',
            'kelas' => Kelas::all()
        ];

        return view('admin.kelas.index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Kelas',
        ];
        return view('admin.kelas.tambah', $data);
    }

    public function simpan(Request $request)
    {
        
        $validator = Validator($request->all(), [
            'name_kelas' => 'required',
            'biaya_kelas' => 'required',
            'description_kelas' => 'required',
            'thumbnail' => 'required|mimes:png,jpg,jpeg',
        ]);
        if ($validator->fails()) {
            return redirect()->route('admin.kelas.tambah')->withErrors($validator)->withInput();
        } else {
            $file = $request->file('thumbnail')->store('kelas','public');
            $obj = [
                'name_kelas' => $request->name_kelas,
                'biaya_kelas' => $request->biaya_kelas,
                'description_kelas' => $request->description_kelas,
                'thumbnail' => $file,
            ];
            Kelas::insert($obj);
            return redirect()->route('admin.kelas')->with('status', 'Berhasil Menambah Kelas Baru');
        }
    }

    public function detail($id)
    {
        $dec_id = Crypt::decrypt($id);
        $data = [
            'title' => 'Detail Kelas',
            'siswa' => DB::table('transaksi')->select('transaksi.*', 'kelas.name_kelas', 'users.name')->join('kelas', 'transaksi.kelas_id', 'kelas.id')->join('users', 'transaksi.users_id', 'users.id')->where('transaksi.status', '1')->where('transaksi.kelas_id', $dec_id)->get(),
            'kelas' => Kelas::find($dec_id)
        ];
        return view('admin.kelas.detail', $data);
    }

    public function hapus($id)
    {
        $dec_id = Crypt::decrypt($id);
        $kelas = Kelas::find($dec_id);
        Storage::delete('public/'.$kelas->thumbnail);
        Video::where('kelas_id', '=', $dec_id)->delete();
        tugas::where('kelas_id', '=', $dec_id)->delete();
        $kelas->delete();
        return redirect()->route('admin.kelas')->with('status', 'Berhasil Menghapus Kelas');
    }

    public function edit($id)
    {
        $dec_id = Crypt::decrypt($id);
        $data = [
            'title' => 'Edit Kelas',
            'kelas' => Kelas::find($dec_id)
        ];
        return view('admin.kelas.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $dec_id = Crypt::decrypt($id);
        $validator = Validator($request->all(), [
            'name_kelas' => 'required',
            'biaya_kelas' => 'required',
            'description_kelas' => 'required',
            'thumbnail' => 'mimes:png,jpg,jpeg'
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.kelas.edit', $id)->withErrors($validator)->withInput();
        } else {

            $kelas = Kelas::find($dec_id);
            if ($request->file('thumbnail')) {
                Storage::delete('public/'.'public/'.$kelas->thumbnail);
                $file = $request->file('thumbnail')->store('thumbnail_kelas', 'public');
                $kelas->name_kelas = $request->name_kelas;
                $kelas->biaya_kelas = $request->biaya_kelas;
                $kelas->description_kelas = $request->description_kelas;
                $kelas->thumbnail = $file;
            } else {
                $kelas->name_kelas = $request->name_kelas;
                $kelas->biaya_kelas = $request->biaya_kelas;
                $kelas->description_kelas = $request->description_kelas;
            }
            $kelas->save();
            return redirect()->route('admin.kelas.detail',$id)->with('status', 'Berhasil Memperbarui Kelas');
        }
    }

    //Vidio
    public function tambahvideo($id)
    {
        $data = [
            'title' => 'Tambah Video Materi',
            'id' => $id
        ];

        return view('admin.kelas.tambahvideo',$data);
    }

    public function simpanvideo(Request $request,$id)
    {

        $validator = Validator($request->all(), [
            'name_video' => 'required',
            'url_video' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.kelas.tambahvideo',$id)->withErrors($validator)->withInput();
        } else {
            $obj = [
                'name_video' => $request->name_video,
                'kelas_id' => Crypt::decrypt($id),
                'url_video' => $request->url_video,
            ];
            Video::insert($obj);
            return redirect()->route('admin.kelas.detail',$id)->with('status', 'Berhasil Menambah Materi Video');
        }
    }

    public function hapusvideo($id,$idkelas)
    {
        $dec_id = Crypt::decrypt($id);
        Video::where('id','=',$dec_id)->delete();
        return redirect()->route('admin.kelas.detail',$idkelas)->with('status', 'Berhasil Menghapus Video Materi');
    }

    //tugas
    public function tambahtugas($id)
    {
        $data = [
            'title' => 'Tugas Siswa',
            'id' => $id,
            'tugas' => tugas::all()
        ];

        return view('admin.kelas.tambahtugas',$data);
    }
    
    public function simpantugas(Request $request,$id)
    {
        $validator = Validator($request->all(), [
            'upload_tugas' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);
        
        $filenameWithExt = $request->file('upload_tugas')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);  
        $extension = $request->file('upload_tugas')->getClientOriginalExtension();
        $filenameSimpan = $filename.'_'.time().'.'.$extension;
    //    dd($filenameSimpan);
        $file = $request->file('upload_tugas')->storeAs('tugas',$filenameSimpan);
        if ($validator->fails()) {
            return redirect()->route('admin.kelas.tambahtugas',$id)->withErrors($validator)->withInput();
        } else {
            $obj = [
            'kelas_id' => Crypt::decrypt($id),
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'upload_tugas' => $filenameSimpan
            ];
            tugas::insert($obj);
            return redirect()->route('admin.kelas.detail',$id)->with('status', 'Berhasil Menambah tugas');
        }
    }
    public function hapustugas($id,$idkelas){
        $dec_id = Crypt::decrypt($id);
        tugas::where('id','=',$dec_id)->delete();
        return redirect()->route('admin.kelas.detail',$idkelas)->with('status', 'Berhasil Menghapus tugas');
    }

}

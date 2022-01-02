<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\portofolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class PortofolioController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Portofolio',
            'portofolio' => DB::table('portofolios')->select('portofolios.*', 'users.name as nama_user')->join('users', 'portofolios.users_id', 'users.id')->get()
        ];
        return view('admin.portofolio.index', $data);
    }

    public function indexfront()
    {
        return view('front.portofolio.index');
    }
    public function tambah()
    {
        $data = [
            'title' => 'Tambah Portofolio',
        ];
        return view('admin.portofolio.tambah', $data);
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'portofolio_image' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);
        $file = $request->file('portofolio_image')->store('portofolio','public');
            $obj = [
                'users_id' => Auth::user()->id,
                'title' => $request->title,
                'description' => $request->description,
                'portofolio_image' => $file,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            DB::table('portofolios')->insert($obj);
        return redirect()->route('admin.portofolio')->with('status', 'Berhasil Menambah Portofolio Baru');
    }

    public function edit($id)
    {
        $dec_id = Crypt::decrypt($id);
        $data = [
            'title' => 'Edit Portofolio',
            'portofolio' => portofolio::find($dec_id)
        ];
        return view('admin.portofolio.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $dec_id = Crypt::decrypt($id);

        $validator = Validator($request->all(), [
            'title' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.kelas.edit', $id)->withErrors($validator)->withInput();
        } else {

            $portofolio = portofolio::find($dec_id);
            if ($request->file('portofolio_image')) {
                Storage::delete('public/'.'public/'.$portofolio->portofolio_image);
                $file = $request->file('portofolio_image')->store('portofolio', 'public');
                $portofolio->title = $request->title;
                $portofolio->description = $request->description;
                $portofolio->portofolio_image = $file;
            } else {
                $portofolio->title = $request->title;
                $portofolio->description = $request->description;
            }
            $portofolio->save();
            return redirect()->route('admin.portofolio')->with('status', 'Berhasil Memperbarui Portofolio');
        }
    }

    public function delete($id)
    {
       Portofolio::destroy($id);
       return back();
    }
}

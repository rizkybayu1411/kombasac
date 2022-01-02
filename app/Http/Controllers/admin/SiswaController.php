<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;
use DB;

class SiswaController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Siswa',
            'siswa' => User::where('role','=','siswa')->get()
        ];
        return view('admin.siswa.index',$data);
    }

    public function tambah(){

        $data = [
            'title' => 'Tambah Data Siswa'
        ];
        return view('admin.siswa.tambah',$data);
    }

    public function simpan(Request $request)
    {

        $validator = Validator($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:8'
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.siswa.tambah')->withErrors($validator)->withInput();
        } else {
            $obj = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'siswa',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
            DB::table('users')->insertGetId($obj);
            return redirect()->route('admin.siswa')->with('status', 'Berhasil Menambah Siswa Baru');
        }
    }

    public function edit($id)
    {
        $dec_id = Crypt::decrypt($id);
        $data = [
            'title' => 'Edit Siswa',
            'siswa' => DB::table('users')->where('id', $dec_id)->first()
        ];
        return view('admin.siswa.edit', $data);
    }

    public function update(Request $request, $id)
    {

        $validator = Validator($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            // 'password' => 'required|min:8'
        ]);
        $dec_id = Crypt::decrypt($id);

        if ($validator->fails()) {
            return redirect()->route('admin.siswa.edit', $id)->withErrors($validator)->withInput();
        } else {
            $obj = [
                'name' => $request->name,
                'email' => $request->email,
                'updated_at' => Carbon::now()
            ];
            if($request->password != null){
                $obj['password'] = Hash::make($request->password);
            }
            DB::table('users')
                ->where('id', $dec_id)
                ->update($obj);
            return redirect()->route('admin.siswa')->with('status', 'Berhasil Mengedit Data Siswa');
        }
    }

    public function hapus($id)
    {
        $dec_id = Crypt::decrypt($id);
        DB::table('users')
                ->where('id', $dec_id)
                ->delete();
        return redirect()->route('admin.siswa')->with('status', 'Berhasil Menghapus Siswa');
    } 
}

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

class UserController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data User',
            'users' => User::where('role','!=','admin')->where('role','!=','siswa')->get()
        ];
        return view('admin.user.index',$data);
    }

    public function tambah(){

        $data = [
            'title' => 'Tambah Data User'
        ];
        return view('admin.user.tambah',$data);
    }

    public function simpan(Request $request)
    {

        $validator = Validator($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'role' => 'required',
            'password' => 'required|min:8'
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.user.tambah')->withErrors($validator)->withInput();
        } else {
            $obj = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
            DB::table('users')->insertGetId($obj);
            return redirect()->route('admin.user')->with('status', 'Berhasil Menambah User Baru');
        }
    }

    public function edit($id)
    {
        $dec_id = Crypt::decrypt($id);
        $data = [
            'title' => 'Edit User',
            'users' => DB::table('users')->where('id', $dec_id)->first()
        ];
        return view('admin.user.edit', $data);
    }

    public function update(Request $request, $id)
    {

        $validator = Validator($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
        ]);
        $dec_id = Crypt::decrypt($id);

        if ($validator->fails()) {
            return redirect()->route('admin.user.edit', $id)->withErrors($validator)->withInput();
        } else {
            $obj = [
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
                'updated_at' => Carbon::now()
            ];
            if($request->password != null){
                $obj['password'] = Hash::make($request->password);
            }
            DB::table('users')
                ->where('id', $dec_id)
                ->update($obj);
            return redirect()->route('admin.user')->with('status', 'Berhasil Mengedit Data User');
        }
    }

    public function editkatasandi()
    {
        $data = [
            'title' => 'Edit Katasandi',
        ];
        return view('admin.akun.editkatasandi',$data);
    }

    public function simpaneditkatasandi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('akun.editkatasandi')->withErrors($validator)->withInput();
        } else {
            User::where('id', '=', Auth::user()->id)->update([
                'password' => Hash::make($request->password),
            ]);
            return redirect()->route('admin')->with('status', 'Berhasil memperbarui katasandi');
        }
    }
}

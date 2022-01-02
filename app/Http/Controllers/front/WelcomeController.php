<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Kelas;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class WelcomeController extends Controller
{
    public function index()
    {
        $data = [
            'kelas' => Kelas::all()
        ];
        // $role = Role::create(['name' => 'mentor']);
        // $permission = Permission::create(['name' => 'portofolio']);
        // $permission = Permission::create(['name' => 'jurnal']);
        // $permission = Permission::create(['name' => 'absensi']);
        // $permission = Permission::create(['name' => 'materi']);
        // $permission = Permission::create(['name' => 'nilai']);
        // $permission = Permission::create(['name' => 'tugas']);
        // $permission = Permission::create(['name' => 'kelas']);
        // $permission = Permission::create(['name' => 'tenaker']);
        // $permission = Permission::create(['name' => 'assesment']);
        // $permission = Permission::create(['name' => 'setting']);
        return view('front.welcome', $data);

    }

    public function about()
    {
        return view('front.about');
    }
}

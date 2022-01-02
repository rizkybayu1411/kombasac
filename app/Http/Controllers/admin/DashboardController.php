<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
        ];
        return view('admin.dashboard',$data);
    }
    
    public function editadmin()
    {
        $admin = User::all();
        $data = [
            'title' => 'Edit Admin',
        ];

        return view('admin.akun.editprofil',compact('admin'), $data);
    }

}

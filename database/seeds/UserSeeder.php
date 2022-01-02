<?php

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12341234'),
            'role' => 'admin'
        ]);
        // DB::table('users')->insert([
        //     'name' => 'Pembimbing',
        //     'email' => 'pembimbing@gmail.com',
        //     'password' => Hash::make('12341234'),
        //     'role' => 'pembimbing'
        // ]);
        // DB::table('users')->insert([
        //     'name' => 'Keuangan',
        //     'email' => 'keuangan@gmail.com',
        //     'password' => Hash::make('12341234'),
        //     'role' => 'keuangan'
        // ]);
        // DB::table('users')->insert([
        //     'name' => 'Perusahaan',
        //     'email' => 'perusahaan@gmail.com',
        //     'password' => Hash::make('12341234'),
        //     'role' => 'perusahaan'
        // ]);
        // DB::table('users')->insert([
        //     'name' => 'Mentor',
        //     'email' => 'mentor@gmail.com',
        //     'password' => Hash::make('12341234'),
        //     'role' => 'mentor'
        // ]);
    }
}

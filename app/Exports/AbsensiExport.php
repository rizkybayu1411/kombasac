<?php

namespace App\Exports;

use App\absensi;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AbsensiExport implements FromView
{
    public function view(): View
    {
        return view('admin.absensi.export', [
            'absensi' => absensi::all()
        ]);
    }   
}

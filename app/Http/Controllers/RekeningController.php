<?php

namespace App\Http\Controllers;

use App\Rekening;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Crypt;

class RekeningController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Daftar Rekening',
            'rekening' => Rekening::all(),
        ];
        return view('admin.transaksi.rekening',$data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Rekening',
            'rekening' => Rekening::all()
        ];
        return view('admin.transaksi.tambahrekening', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_bank' => 'required',
            'no_rekening' => 'required',
            'atas_nama' => 'required',
        ]);
        $y = [
            'nama_bank' => $request->nama_bank,
            'no_rekening' => $request->no_rekening,
            'atas_nama' => $request->atas_nama,
        ];

        Rekening::create($y);
        return redirect()->route('admin.rekening')->with('status', 'Berhasil Menambah Rekening Baru');
    }

    public function edit($id)
    {
        $dec_id = Crypt::decrypt($id);
        $data = [
            'title' => 'Edit Rekening',
            'rekening' => Rekening::find($dec_id)
        ];
        return view('admin.transaksi.editrekening', $data);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator($request->all(), [
            'nama_bank' => 'required',
            'no_rekening' => 'required',
            'atas_nama' => 'required',
        ]);
        $dec_id = Crypt::decrypt($id);

        if ($validator->fails()) {
            return redirect()->route('admin.rekening.edit', $id)->withErrors($validator)->withInput();
        } else {
            $obj = [
                'nama_bank' => $request->nama_bank,
                'no_rekening' => $request->no_rekening,
                'atas_nama' => $request->atas_nama,
                'updated_at' => Carbon::now()
            ];
            DB::table('rekening')
                ->where('id', $dec_id)
                ->update($obj);
            return redirect()->route('admin.rekening')->with('status', 'Berhasil Mengedit Data Rekening');
        }
    }

    public function destroy($id)
    {
        $dec_id = Crypt::decrypt($id);
        DB::table('rekening')
                ->where('id', $dec_id)
                ->delete();
        return redirect()->route('admin.rekening')->with('status', 'Berhasil Menghapus Data Rekening');
    }
}

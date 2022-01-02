<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'front\WelcomeController@index')->name('welcome');
Route::get('/about', 'front\WelcomeController@about')->name('about');


Route::group(['middleware' => ['auth', 'checkRole:siswa']], function () {
    Route::get('/transaksi', 'front\TransaksiController@index')->name('transaksi');
    Route::get('/transaksi/{id}', 'front\TransaksiController@index')->name('transaksi.filter');
    Route::get('/transaksi/ulang/{id}', 'front\TransaksiController@indexUlang')->name('transaksi.filter.ulang');
    Route::post('/uploadbukti', 'front\TransaksiController@uploadbukti')->name('uploadbukti');
    Route::post('/uploadulang', 'front\TransaksiController@uploadulang')->name('uploadulang');

    Route::get('/akun', 'front\AkunController@index')->name('akun');
    Route::get('/akun/editprofil', 'front\AkunController@editprofil')->name('akun.editprofil');
    Route::post('/akun/simpaneditprofil', 'front\AkunController@simpaneditprofil')->name('akun.simpaneditprofil');
    Route::get('/akun/editkatasandi', 'front\AkunController@editkatasandi')->name('akun.editkatasandi');
    Route::post('/akun/simpaneditkatasandi', 'front\AkunController@simpaneditkatasandi')->name('akun.simpaneditkatasandi');

    Route::post('/absensi-simpan-masuk/{id}', 'AbsensiController@store')->name('simpan-masuk');
    Route::get('/absensi-keluar', 'AbsensiController@keluar')->name('absensi-keluar');
    Route::post('/absensi-simpan-keluar/{id}', 'AbsensiController@absensipulang')->name('simpan-keluar');

    Route::get('/jurnal', 'JurnalController@index')->name('jurnal');
    Route::post('/jurnal-simpan', 'JurnalController@store')->name('jurnal-simpan');
    Route::delete('/jurnal/delete', 'JurnalController@delete')->name('jurnal-hapus');

    //portofolio
    Route::get('/portofolio', 'front\PortofolioController@index')->name('portofolio');

    //assement
    Route::get('/assement', 'AssementController@index')->name('assement');
    Route::post('/upload/assement', 'AssementController@store')->name('assementkirim');

    //kelas
    Route::get('/kelas', 'front\KelasController@index')->name('kelas');
    Route::get('/kelas/detail/{id}', 'front\KelasController@detail')->name('kelas.detail');
    Route::get('/kelas/belajar/{id}/{idvideo}', 'front\KelasController@belajar')->name('kelas.belajar');
    Route::get('/kelas/detail/{id}', 'front\KelasController@detail')->name('kelas.detail');
    Route::get('/kelas/tugas/{id}', 'front\KelasController@tugas')->name('kelas.tugas');
    Route::get('/test/kelas/tugas/download/{id}', 'front\KelasController@downloadtugas')->name('kelas.tugas.download');
    Route::post('/upload/kelas/tugas', 'TugasController@store')->name('upload');
    Route::get('/sertifikat/{idkelas}', 'front\KelasController@sertifikat')->name('kelas.sertifikat');

});

Route::group(['middleware' => ['auth', 'checkRole:admin,pembimbing,keuangan,mentor']], function () {
    Route::get('/admin', 'admin\DashboardController@index')->name('admin');

    //Kelas
    Route::get('/admin/kelas', 'admin\KelasController@index')->name('admin.kelas');
    Route::get('/admin/kelas/tambah', 'admin\KelasController@tambah')->name('admin.kelas.tambah');
    Route::post('/admin/kelas/simpan', 'admin\KelasController@simpan')->name('admin.kelas.simpan');
    Route::get('/admin/kelas/detail/{id}', 'admin\KelasController@detail')->name('admin.kelas.detail');
    Route::get('/admin/kelas/hapus/{id}', 'admin\KelasController@hapus')->name('admin.kelas.hapus');
    Route::get('/admin/kelas/edit/{id}', 'admin\KelasController@edit')->name('admin.kelas.edit');
    Route::post('/admin/kelas/update/{id}', 'admin\KelasController@update')->name('admin.kelas.update');
    Route::get('/admin/kelas/edit/{id}', 'admin\KelasController@edit')->name('admin.kelas.edit');
    Route::post('/admin/kelas/update/{id}', 'admin\KelasController@update')->name('admin.kelas.update');

    //Tugas
    Route::get('/admin/tugas', 'TugasController@index')->name('admin.tugas');
    Route::get('/admin/tugas/detail/{id}', 'TugasController@detail')->name('admin.tugas.detail');
    Route::post('/admin/nilai/simpan/{id}', 'TugasController@nilai')->name('admin.tugas.nilai');
    
    //forum
    Route::get('/admin/forum', 'ForumController@index')->name('admin.forum');

    //vidio
    Route::get('/admin/kelas/tambahvideo/{id}', 'admin\KelasController@tambahvideo')->name('admin.kelas.tambahvideo');
    Route::post('/admin/kelas/simpanvideo/{id}', 'admin\KelasController@simpanvideo')->name('admin.kelas.simpanvideo');
    Route::get('/admin/kelas/hapusvideo/{id}/{idkelas}', 'admin\KelasController@hapusvideo')->name('admin.kelas.hapusvideo');
    //tugas
    Route::get('/admin/tugas/tambahtugas/{id}', 'admin\KelasController@tambahtugas')->name('admin.kelas.tambahtugas');
    Route::post('/admin/tugas/simpan/{id}', 'admin\KelasController@simpantugas')->name('admin.tugas.simpan');
    Route::get('/admin/tugas/hapustugas/{id}/{idkelas}', 'admin\KelasController@hapustugas')->name('admin.tugas.hapustugas');


    //Absensi
    Route::get('/admin/absensi', 'AbsenAdminController@index')->name('tampil-data');
    Route::get('/export-absensi', 'AbsenAdminController@export_excel')->name('export-data');

    //Nilai
    Route::get('/admin/nilai', 'admin\NilaiController@index')->name('admin.nilai');
    Route::get('/admin/nilai/tambah', 'admin\NilaiController@create')->name('admin.nilai.tambah');
    Route::post('/admin/nilai/pilihtugas', 'admin\NilaiController@pilihtugas')->name('admin.nilai.pilihtugas');

    //User
    Route::get('/admin/user', 'admin\UserController@index')->name('admin.user');
    Route::get('/admin/user/tambah', 'admin\UserController@tambah')->name('admin.user.tambah');
    Route::post('/admin/user/simpan', 'admin\UserController@simpan')->name('admin.user.simpan');
    Route::get('/admin/user/edit/{id}', 'admin\UserController@edit')->name('admin.user.edit');
    Route::post('/admin/user/update/{id}', 'admin\UserController@update')->name('admin.user.update');

    //Siswa
    Route::get('/admin/siswa', 'admin\SiswaController@index')->name('admin.siswa');
    Route::get('/admin/siswa/tambah', 'admin\SiswaController@tambah')->name('admin.siswa.tambah');
    Route::post('/admin/siswa/simpan', 'admin\SiswaController@simpan')->name('admin.siswa.simpan');
    Route::get('/admin/siswa/hapus/{id}', 'admin\SiswaController@hapus')->name('admin.siswa.hapus');
    Route::get('/admin/siswa/edit/{id}', 'admin\SiswaController@edit')->name('admin.siswa.edit');
    Route::post('/admin/siswa/update/{id}', 'admin\SiswaController@update')->name('admin.siswa.update');

    //portofolio
    Route::get('/admin/portofolio', 'admin\PortofolioController@index')->name('admin.portofolio');
    Route::get('/admin/portofolio/edit/{id}', 'admin\PortofolioController@edit')->name('admin.portofolio.edit');
    Route::get('/admin/portofolio/tambah', 'admin\PortofolioController@tambah')->name('admin.portofolio.tambah');
    Route::post('/admin/portofolio/simpan', 'admin\PortofolioController@simpan')->name('admin.portofolio.simpan');
    Route::post('/admin/portofolio/update/{id}', 'admin\PortofolioController@update')->name('admin.portofolio.update');
    Route::delete('/admin/portofolio/delete{id}', 'admin\PortofolioController@delete')->name('delete');


    //Transaksi
    Route::get('/admin/transaksi', 'admin\TransaksiController@index')->name('admin.transaksi');
    Route::get('/admin/transaksi/menunggu', 'admin\TransaksiController@belumdicek')->name('admin.transaksi.menunggu');
    Route::get('/admin/transaksi/ditolak', 'admin\TransaksiController@ditolak')->name('admin.transaksi.ditolak');
    Route::get('/admin/transaksi/disetujui', 'admin\TransaksiController@disetujui')->name('admin.transaksi.disetujui');
    Route::get('/admin/transaksi/detail/{id}', 'admin\TransaksiController@detail')->name('admin.transaksi.detail');
    Route::post('/admin/transaksi/ubah/{id}', 'admin\TransaksiController@ubah')->name('admin.transaksi.ubah');

    Route::get('/admin/setting', 'admin\SettingController@index')->name('admin.setting');
    Route::post('/admin/setting/simpan', 'admin\SettingController@simpan')->name('admin.setting.simpan');

    Route::get('/admin/editprofil', 'admin\UserController@editprofil')->name('admin.editprofil');
    Route::post('/admin/simpaneditprofil', 'admin\UserController@simpaneditprofil')->name('admin.simpaneditprofil');

    Route::get('/admin/editkatasandi', 'admin\UserController@editkatasandi')->name('admin.editkatasandi');
    Route::post('/admin/simpaneditkatasandi', 'admin\UserController@simpaneditkatasandi')->name('admin.simpaneditkatasandi');

    //Transaksi
    Route::get('/admin/rekening', 'RekeningController@index')->name('admin.rekening');
    Route::get('/admin/rekening-tambah', 'RekeningController@create')->name('admin.rekening.tambah');
    Route::post('/admin/rekening-simpan', 'RekeningController@store')->name('admin.rekening.simpan');
    Route::get('/admin/rekening-edit/{id}', 'RekeningController@edit')->name('admin.rekening.edit');
    Route::post('/admin/rekening-update/{id}', 'RekeningController@update')->name('admin.rekening.update');
    Route::get('/admin/rekening-hapus/{id}', 'RekeningController@destroy')->name('admin.rekening.hapus');

    Route::get('/admin/transaksi', 'admin\TransaksiController@index')->name('admin.transaksi');
    Route::get('/admin/transaksi/belumdicek', 'admin\TransaksiController@belumdicek')->name('admin.transaksi.belumdicek');
    Route::get('/admin/transaksi/ditolak', 'admin\TransaksiController@ditolak')->name('admin.transaksi.ditolak');
    Route::get('/admin/transaksi/disetujui', 'admin\TransaksiController@disetujui')->name('admin.transaksi.disetujui');
    Route::get('/admin/transaksi/detail/{id}', 'admin\TransaksiController@detail')->name('admin.transaksi.detail');
    Route::post('/admin/transaksi/ubah/{id}', 'admin\TransaksiController@ubah')->name('admin.transaksi.ubah');

});

Auth::routes();

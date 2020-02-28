<?php

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

Route::get('/', function () {
    return view('welcome');
});

use App\Mahasiswa;
use App\Dosen;
use App\Hobi;

//Route One to one
Route::get('relasi-1', function()
{
    $mhs = Mahasiswa::where('nim','=','54545454')->first();

    // Menampilkan data wali dari mahasiswa yang dipilih
    return $mhs->wali->nama;
});

Route::get('relasi-2', function()
{
    //memilih data mahasiswa yang memiliki nim '010101012'
    $mhs = Mahasiswa::where('nim','=','010101012')->first();

    // Menampilkan data wali dari mahasiswa yang dipilih
    return $mhs->dosen->nama;
});

Route::get('relasi-3', function()
{
    //mencari dosen dengan yang bernama Abdi
    $dosen = Dosen::where('nama','=','Abdi')->first();

    // Menampilkan data mahsiswa dari dosen yang dipilih
    foreach ($dosen->mahasiswa as $temp)
    echo '<li> Nama : ' . $temp->nama .
        '<strong>' . $temp->nim . '</strong></li>';
});

Route::get('relasi-4', function()
{
    $sina = Mahasiswa::where('nama','=','Sina')->first();

    foreach($sina->hobi as $temp)
        echo '<li>' . $temp->hobi .'</li>';
});

Route::get('relasi-5', function()
{
    $ngaji = Hobi::where('hobi','=','Mancing Pahala')->first();

    foreach($ngaji->mahasiswa as $temp)
        echo '<li> Nama : ' . $temp->nama .
        '<strong>' . $temp->nim . '</strong>
        </li>';
});

Route::get('relasi-join', function()
{
    $sql = DB::table('mahasiswa')->select
    (
        'mahasiswa.nama','mahasiswa.nim',
        'wali.nama as nama wali'
    )->join('wali','wali.id_mahasiswa','=','mahasiswa.id')->get();
    dd($sql);
});

Route::get('eloquent', function()
{
    $mahasiswa = Mahasiswa::with('wali','dosen','hobi')->get();
    return view('eloquent',compact('mahasiswa'));
});

//latihan Eloquent
Route::get('latihan-eloquent', function()
{
    $mhs = Mahasiswa::with('wali','dosen','hobi')->get()->take(1);
    return view('latihan-eloquent',compact('mhs'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('beranda', function()
{
    return view('beranda');
});

Route::get('kontak', function()
{
    return view('kontak');
});

Route::get('tentang', function()
{
    return view('tentang');
});

Route::get('eloquent', function()
{
    return view('eloquent 1');
});

Route::get('eloquent 2', function()
{
    return view('eloquent 2');
});

//CRUD Laravel yang ini!!!!!!
Route::resource('dosen', 'DosenController');
Route::resource('hobi', 'HobiController');
Route::resource('mahasiswa', 'MahasiswaController');
Route::resource('wali', 'WaliController');

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

//Relasi
Route::get('penulis', function(){
    $penulis = \App\User::find(1);

    foreach($penulis->artikel as $data){
        echo "Judul : $data->judul<br>";
        echo "Deskripsi : $data->deskripsi<br>";
        echo "slug : $data->slug";
        echo "<hr>";
    }
});

//relasi
use App\Dosen;
use App\Hobi;
use App\Mahasiswa;

Route::get('relasi-1', function(){
    #Mencari mahasiswa dengan NIM 1010101
    $mahasiswa = Mahasiswa::where('nim', '=', '1010101')->first();
    return $mahasiswa->wali->nama;
    #Menampilkan nama wali dari mahasiswa tsb
});

Route::get('relasi-2', function(){
    #mencari mahasiswa dengan NIM 1010101
    $mahasiswa = Mahasiswa::where('nim', '=', '1010101')->first();

    #Menanpilkan nama dosen pembimbing dari Mahasiswa 
    return $mahasiswa->dosen->nama;
});
Route::get('relasi-3', function (){
    #mencari dosen yang bernama Abdul Musthafa
    $dosen = Dosen::where('nama', '=', 'Abdul Musthafa')->first();

    #menampilkan seluruh data mahasiswa dari dosen Abdul Musthafa
    foreach ($dosen->mahasiswa as $temp)
        echo '<li> Nama : ' .$temp->nama .
        ' <strong>'. $temp->nim . '</strong></li>';
});
Route::get('relasi-4', function (){
    #mencari data mahasiswa yang memiliki nama Syahrul
    $novay = Mahasiswa::where('nama', '=', 'Syahrul')->first();
    #menampilkan seluruh data hobi mahasiswa yang bernama Syahrul
    foreach ($novay->hobi as $temp)
        echo '<li>' . $temp->hobi . '</li>';
});
Route::get('relasi-5', function(){
    #mencari data hobi mandi hujan
    $mandi_hujan = Hobi::where('hobi', '=', 'Mandi Hujan')->first();
    #menampilkan semua mahasiswa yg mempunyai hobi mandi hujan
    foreach ($mandi_hujan->mahasiswa as $temp)
    echo '<li> Nama : ' . $temp->nama . '<strong>'
        . $temp->nim . '</strong>';
});
Route::resource('siswa','SiswaController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('tabungan/report', 'TabunganController@jumlah_tabungan');
Route::resource('tabungan', 'TabunganController');

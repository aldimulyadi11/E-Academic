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

// TAMPILAN LOGIN //

Route::get('/', function () {
    return view('tampilDepan.index');
});

// LOGIN CONTROLLER //

Route::get('/adminDashboard', 'loginController@index');
Route::get('/mhsDashboard', 'loginController@index2');
Route::get('/dosenDashboard', 'loginController@index3');
Route::get('/ortuDashboard', 'loginController@index4');
Route::get('/loginAdmin', 'loginController@loginAdmin');
Route::get('/loginMhs', 'loginController@loginMhs');
Route::get('/loginDosen', 'loginController@loginDosen');
Route::get('/loginOrtu', 'loginController@loginOrtu');
Route::post('/loginPost', 'loginController@loginPost');
Route::post('/loginPost2', 'loginController@loginPost2');
Route::post('/loginPost3', 'loginController@loginPost3');
Route::post('/loginPost4', 'loginController@loginPost4');


// ADMIN CONTROLLER //

Route::get('/jumlahAdmin','adminController@jumlahAdmin');
Route::get('/dataAdmin','adminController@dataAdmin');
Route::get('tambahAdmin','adminController@tambahAdmin');
Route::post('/registerPost', 'adminController@registerPost');
Route::get('editAdmin/{a}','adminController@editAdmin');
Route::post('updateAdmin/{b}','adminController@updateAdmin');
Route::get('hapusAdmin/{c}','adminController@hapusAdmin');
Route::get('/settingAdmin', 'adminController@settingAdmin');
Route::post('/settingPost', 'adminController@settingPost');
Route::get('tambahSettingAdmin','adminController@tambahSettingAdmin');
Route::get('editSettingAdmin/{d}','adminController@editSettingAdmin');
Route::post('updateSettingAdmin/{e}','adminController@updateSettingAdmin');
Route::get('/settingMhs', 'adminController@settingMhs');
Route::get('/settingOrtu', 'adminController@settingOrtu');
Route::get('/logout', 'adminController@logout');
Route::get('/settingDosen', 'adminController@settingDosen');

// MAHASISWA CONTROLLER //

Route::get('/cetakNilaiUtsMhs','mhsController@cetakNilaiUtsMhs');
Route::get('/cetakNilaiUasMhs','mhsController@cetakNilaiUasMhs');
Route::get('/dataNilaiUtsMhs','mhsController@dataNilaiUtsMhs');
Route::get('/dataNilaiUasMhs','mhsController@dataNilaiUasMhs');
Route::get('/dataNilaiUtsMhs2','mhsController@dataNilaiUtsMhs2');
Route::get('/dataNilaiUasMhs2','mhsController@dataNilaiUasMhs2');
Route::get('/cetakMhs','mhsController@cetakMhs');
Route::get('/cetakKhs','mhsController@cetakKhs');
Route::get('/cetakKhs2','mhsController@cetakKhs2');
Route::get('/cetakKhs3','mhsController@cetakKhs3');
Route::get('/cetakKhs4','mhsController@cetakKhs4');
Route::get('/cetakKhs5','mhsController@cetakKhs5');
Route::get('/cetakKhs6','mhsController@cetakKhs6');
Route::get('/cetakKhs7','mhsController@cetakKhs7');
Route::get('/cetakKhs8','mhsController@cetakKhs8');
Route::get('/cetakJadwalMhs','mhsController@cetakJadwalMhs');
Route::get('/cetakMhsId/{ds}','mhsController@cetakMhsId');
Route::get('/mhsJadwal','mhsController@mhsJadwal');
Route::get('/mhsKrs','mhsController@mhsKrs');
Route::get('/cekKrs','mhsController@cekKrs');
Route::get('/cetakKrs','mhsController@cetakKrs');
Route::get('/cetakPilihKrs','mhsController@cetakPilihKrs');
Route::get('/mhsKhs','mhsController@mhsKhs');
Route::get('/mhsKhs2','mhsController@mhsKhs2');
Route::get('/mhsKhs3','mhsController@mhsKhs3');
Route::get('/mhsKhs4','mhsController@mhsKhs4');
Route::get('/mhsKhs5','mhsController@mhsKhs5');
Route::get('/mhsKhs6','mhsController@mhsKhs6');
Route::get('/mhsKhs7','mhsController@mhsKhs7');
Route::get('/mhsKhs8','mhsController@mhsKhs8');
Route::get('/pilihKrs/{gg}','mhsController@pilihKrs');
Route::get('/hapusKrs/{hh}','mhsController@hapusKrs');
Route::get('/dataMhs','mhsController@dataMhs');
Route::get('/tambahMhs','mhsController@tambahMhs');
Route::post('/registerTambahMhs', 'mhsController@registerTambahMhs');
Route::get('/editMhs/{dd}','mhsController@editMhs');
Route::post('/updateMhs/{ee}','mhsController@updateMhs');
Route::get('/hapusMhs/{ff}','mhsController@hapusMhs');
Route::get('/pilihJurusan/','mhsController@pilihJurusan');
Route::get('/profilMhs/{lk}','mhsController@profilMhs');

// DOSEN CONTROLLER //


Route::get('/dosenNilaiUts','dosenController@dosenNilaiUts');
Route::get('/dosenNilaiUas','dosenController@dosenNilaiUas');
Route::get('/dataNilaiUts','dosenController@dataNilaiUts');
Route::get('/dataNilaiUas','dosenController@dataNilaiUas');
Route::post('/registerTambahNilaiUts/{sd}','dosenController@registerTambahNilaiUts');
Route::post('/registerTambahNilaiUas/{hg}','dosenController@registerTambahNilaiUas');
Route::get('/editNilaiUts/{jkl}','dosenController@editNilaiUts');
Route::get('/editNilaiUas/{ffg}','dosenController@editNilaiUas');
Route::post('/updateNilaiUts/{mn}','dosenController@updateNilaiUts');
Route::post('/updateNilaiUas/{klk}','dosenController@updateNilaiUas');
Route::post('/registerTambahNilai/{bv}','dosenController@registerTambahNilai');
Route::post('/updateNilai/{mn}','dosenController@updateNilai');
Route::get('/editNilai/{nb}','dosenController@editNilai');
Route::get('/pilihMatkul/{zx}','dosenController@pilihMatkul');
Route::get('/profilDosen/{gf}','dosenController@profilDosen');
Route::get('/cetakDosen','dosenController@cetakDosen');
Route::get('/cetakNilai','dosenController@cetakNilai');
Route::get('/cetakNilaiUts2','dosenController@cetakNilaiUts2');
Route::get('/cetakJadwalNgajar','dosenController@cetakJadwalNgajar');
Route::get('/cetakDosenId/{nmn}','dosenController@cetakDosenId');
Route::get('/jadwalDosen','dosenController@jadwalDosen');
Route::get('/dataDosen','dosenController@dataDosen');
Route::get('/adminTambahDosen','dosenController@adminTambahDosen');
Route::get('/editDosen/{f}','dosenController@editDosen');
Route::post('/updateDosen/{g}','dosenController@updateDosen');
Route::get('/hapusDosen/{h}','dosenController@hapusDosen');
Route::post('/registerTambahDosen', 'dosenController@registerTambahDosen');

// FAKULTAS CONTROLLER //

Route::get('/cetakFakultas','fakultasController@cetakFakultas');
Route::get('/cetakFakultasId/{kl}','fakultasController@cetakFakultasId');
Route::get('/dataFakultas','fakultasController@dataFakultas');
Route::get('/tambahFakultas','fakultasController@tambahFakultas');
Route::post('/registerTambahFakultas', 'fakultasController@registerTambahFakultas');
Route::get('/editFakultas/{i}','fakultasController@editFakultas');
Route::post('/updateFakultas/{j}','fakultasController@updateFakultas');
Route::get('/hapusFakultas/{k}','fakultasController@hapusFakultas');

// JURUSAN CONTROLLER //


Route::get('/cetakJurusan','jurusanController@cetakJurusan');
Route::get('/cetakJurusanId/{fd}','jurusanController@cetakJurusanId');
Route::get('/dataJurusan','jurusanController@dataJurusan');
Route::get('/tambahJurusan','jurusanController@tambahJurusan');
Route::post('/registerTambahJurusan', 'jurusanController@registerTambahJurusan');
Route::get('/editJurusan/{l}','jurusanController@editJurusan');
Route::post('/updateJurusan/{m}','jurusanController@updateJurusan');
Route::get('/hapusJurusan/{n}','jurusanController@hapusJurusan');

// MATA KULIAH CONTROLLER //

Route::get('/cetakMatkul','matkulController@cetakMatkul');
Route::get('/cetakMatkulId/{fds}','matkulController@cetakMatkulId');
Route::get('/editMatkul','matkulController@editMatkul');
Route::get('/dataMatkul','matkulController@dataMatkul');
Route::get('/tambahMatkul','matkulController@tambahMatkul');
Route::post('/registerTambahMatkul', 'matkulController@registerTambahMatkul');
Route::get('/editMatkul/{o}','matkulController@editMatkul');
Route::post('/updateMatkul/{p}','matkulController@updateMatkul');
Route::get('/hapusMatkul/{q}','matkulController@hapusMatkul');

// RUANGAN CONTROLLER //

Route::get('/cetakRuangan','ruanganController@cetakRuangan');
Route::get('/dataRuangan','ruanganController@dataRuangan');
Route::get('/tambahRuangan','ruanganController@tambahRuangan');
Route::post('/registerTambahRuangan', 'ruanganController@registerTambahRuangan');
Route::get('/editRuangan/{u}','ruanganController@editRuangan');
Route::post('/updateRuangan/{v}','ruanganController@updateRuangan');
Route::get('/hapusRuangan/{w}','ruanganController@hapusRuangan');

// TAHUN AKADEMIK //

Route::get('/dataTahunAka','tahunAkaController@dataTahunAka');
Route::get('/tambahTahunAka','tahunAkaController@tambahTahunAka');
Route::post('/registerTambahTahunAka', 'tahunAkaController@registerTambahTahunAka');
Route::get('/editTahunAka/{x}','tahunAkaController@editTahunAka');
Route::post('/updateTahunAka/{y}','tahunAkaController@updateTahunAka');
Route::get('/hapusTahunAka/{z}','tahunAkaController@hapusTahunAka');

// JADWAL CONTROLLER //

Route::get('/cetakJadwalId/{sds}','jadwalKuliahController@cetakJadwalId');
Route::get('/cetakJadwal','jadwalKuliahController@cetakJadwal');
Route::get('/dataJadwal','jadwalKuliahController@dataJadwal');
Route::get('/tambahJadwal','jadwalKuliahController@tambahJadwal');
Route::post('/registerTambahJadwal', 'jadwalKuliahController@registerTambahJadwal');
Route::get('/editJadwal/{aa}','jadwalKuliahController@editJadwal');
Route::post('/updateJadwal/{bb}','jadwalKuliahController@updateJadwal');
Route::get('/hapusJadwal/{cc}','jadwalKuliahController@hapusJadwal');

// ORANG TUA CONTROLLER //

Route::get('/mhsKhsOrtu','ortuController@mhsKhsOrtu');
Route::get('/mhsKhsOrtu2','ortuController@mhsKhsOrtu2');
Route::get('/mhsKhsOrtu3','ortuController@mhsKhsOrtu3');
Route::get('/mhsKhsOrtu4','ortuController@mhsKhsOrtu4');
Route::get('/mhsKhsOrtu5','ortuController@mhsKhsOrtu5');
Route::get('/mhsKhsOrtu6','ortuController@mhsKhsOrtu6');
Route::get('/mhsKhsOrtu7','ortuController@mhsKhsOrtu7');
Route::get('/mhsKhsOrtu8','ortuController@mhsKhsOrtu8');
Route::get('/mhsJadwal2','ortuController@mhsJadwal');
Route::get('/mhsKrs2','ortuController@mhsKrs');

// CHART CONTROLLER //

Route::get('chartMhs', 'ChartController@chartMhs');
Route::get('/chartNilaiMhs','chartController@chartNilaiMhs');
Route::get('chartKaryawan', 'ChartController@chartKaryawan');
Route::get('chartSemua', 'ChartController@chartSemua');
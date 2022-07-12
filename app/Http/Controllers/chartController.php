<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Propaganistas\LaravelPhone\PhoneNumber;

class ChartController extends Controller
{
    //
    public function chartMhs()
    {
        $jur = \App\tb_jurusan::all();
        $siswa = \App\tb_mhs::all();

        $categories=[];
        $jumlah=[];

        foreach($jur as $data){
          $data->jur;
          $categories [] = $data->nama_jur;
          $jumlah[] = DB::table('tb_mhs')->where('fk_kode_jur',$data->kode_jur)->count();
        }    
        return view('admin.chart.chart',['categories'=>$categories,'jumlah'=>$jumlah]);
    }
    // public function chartNilaiMhs()
    // {
    //     $session=Session::get('nim');

    //     $nilai =DB::table('tb_nilais')->where('fk_nim',$session)->get();
        
    //     $categories=[];
    //     $jumlah=[];

    //     foreach($nilai as $data){
          
    //       $categories [] = $data->nama_matkul;
    //       $jumlah [] = $data->total;
          
    //     }
    //     return view('admin.chart.chartNilaiMhs',['categories'=>$categories,'jumlah'=>$jumlah]);
    // }

    public function chartKaryawan()
    {

        $dosen = \App\tb_dosen::all();      
        $jumlah[] = DB::table('tb_dosens')->count();
        return view('admin.chart.chartDosen',['jumlah'=>$jumlah]);
    }
    public function chartSemua()
    {
        $admin[] = DB::table('tb_admins')->count();
        $dosen[] = DB::table('tb_dosens')->count();
        $mhs[] = DB::table('tb_mhs')->count();
        $fakultas[] = DB::table('tb_fakultas')->count();
        $jurusan[] = DB::table('tb_jurusans')->count();
        $ruangan[] = DB::table('tb_ruangans')->count();
        $mata_kuliah[] = DB::table('tb_mata_kuliahs')->count();
        $jadwal[] = DB::table('tb_jadwals')->count();

        return view('admin.chart.chartSemua',['admin'=>$admin,'dosen'=>$dosen,'mhs'=>$mhs,'fakultas'=>$fakultas,'jurusan'=>$jurusan,'ruangan'=>$ruangan,'mata_kuliah'=>$mata_kuliah,'jadwal'=>$jadwal]);
    }

}
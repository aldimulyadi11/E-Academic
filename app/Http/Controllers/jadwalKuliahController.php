<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class jadwalKuliahController extends Controller
{
        
     public function cetakJadwal(Request $request){

        $tamp = DB::table('tb_jadwals')
        ->select('tb_mata_kuliahs.*','tb_jadwals.*','tb_jam_kuliahs.*','tb_jam_kuliahs.waktu')      
        ->join('tb_mata_kuliahs','tb_mata_kuliahs.kode_matkul','=','tb_jadwals.fk_kode_matkul')
        ->join('tb_jam_kuliahs','tb_jam_kuliahs.kode_jam','=','tb_jadwals.fk_kode_jam')
        ->orderBy('tb_mata_kuliahs.jurusan','asc')
        ->orderBy('tb_mata_kuliahs.semester','asc')
        ->orderBy('tb_mata_kuliahs.nama_matkul','asc')
        ->get();

        return PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('admin.jadwal.cetakJadwal',compact('tamp'))->stream();
        
    }
    public function cetakJadwalId($kode_matkul){

        $tamps = DB::table('tb_mata_kuliahs')->where('kode_matkul',$kode_matkul)->get();
        foreach($tamps as $x){
            $x ->jurusan;
        }
        $tamp = DB::table('tb_jadwals')
        ->select('tb_mata_kuliahs.*','tb_jadwals.*','tb_jam_kuliahs.*','tb_jam_kuliahs.waktu')      
        ->join('tb_mata_kuliahs','tb_mata_kuliahs.kode_matkul','=','tb_jadwals.fk_kode_matkul')
        ->join('tb_jam_kuliahs','tb_jam_kuliahs.kode_jam','=','tb_jadwals.fk_kode_jam')
        ->orderBy('tb_mata_kuliahs.jurusan','asc')
        ->orderBy('tb_mata_kuliahs.semester','asc')
        ->orderBy('tb_mata_kuliahs.nama_matkul','asc')
        ->where([
            ['tb_mata_kuliahs.jurusan','=',$x->jurusan],
            ['tb_mata_kuliahs.semester','=',$x->semester],
            
        ])->get();    

        return PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('admin.jadwal.cetakJadwalId',compact('tamp'))->stream();
        
    }

    public function dataJadwal(Request $request){

        $tamp = DB::table('tb_jadwals')
        ->select('tb_mata_kuliahs.*','tb_jadwals.*','tb_jam_kuliahs.*','tb_jam_kuliahs.waktu')      
        ->join('tb_mata_kuliahs','tb_mata_kuliahs.kode_matkul','=','tb_jadwals.fk_kode_matkul')
        ->join('tb_jam_kuliahs','tb_jam_kuliahs.kode_jam','=','tb_jadwals.fk_kode_jam')
        ->orderBy('tb_mata_kuliahs.jurusan','asc')
        ->orderBy('tb_mata_kuliahs.semester','asc')
        ->orderBy('tb_mata_kuliahs.nama_matkul','asc')
        ->get();
        
        return view('admin.jadwal.adminJadwal',compact('tamp'));
        
    }

    public function tambahJadwal(Request $request){

        $tamp=DB::table('tb_mata_kuliahs')->count();      
        $tamp3=DB::table('tb_dosens')->count();
        $tamp2=DB::table('tb_jurusans')->count();
        $tamp4=DB::table('tb_ruangans')->count();   
        $tamp5=DB::table('tb_jadwals')->select('matkul')->count();
        
        
        
        if($tamp == 0 ){
            return redirect('dataJadwal')->with('alert','Data Mata Kuliah Belum Tersedia');
        }
        elseif($tamp2 == 0){
            return redirect('dataJadwal')->with('alert','Data Dosen Belum Tersedia');
        }
        elseif($tamp3 == 0){
            return redirect('dataJadwal')->with('alert','Data Jurusan Belum Tersedia');
        }
        elseif($tamp4 == 0){
            return redirect('dataJadwal')->with('alert','Data Ruangan Belum Tersedia');
        }
        elseif($tamp == $tamp5){
            return redirect('dataJadwal')->with('alert','Data Mata Kuliah Telah Terisi Semua');
        }
        else{

            $tamp2=DB::table('tb_mata_kuliahs')->orderBy('nama_matkul','ASC')->get();
            $tamp4=DB::table('tb_ruangans')->get();
            $tamp5=DB::table('tb_jam_kuliahs')->orderBy('waktu','asc')->get();
            
            return view('admin.jadwal.adminTambahJadwal',compact('tamp2','tamp4','tamp5'));
        }
    }

    public function registerTambahJadwal(Request $request){
        
        $matkul = DB::table('tb_jadwals')->where('matkul','=',$request->matkul)->count();
        $cek = DB::table('tb_mata_kuliahs')->where('kode_matkul',$request->matkul)->get();
       // $cekss = DB::table('tb_jadwals')->get();

        $cekSks = DB::table('tb_jadwals')
        ->join('tb_mata_kuliahs','tb_mata_kuliahs.kode_matkul','tb_jadwals.fk_kode_matkul')
        ->get();
        $banyak = DB::table('tb_jadwals')
        ->join('tb_mata_kuliahs','tb_mata_kuliahs.kode_matkul','tb_jadwals.fk_kode_matkul')
        ->count();
        $tampss=[];
        foreach($cekSks as $cba){
            $tampss[] = $cba ->sks;
        }
        

        $byk = DB::table('tb_jadwals')->count();

        $coba = DB::table('tb_jadwals')
        ->where([
            ['fk_kode_jam','=',$request->waktu],
            ['hari','=',$request->hari],
            ['ruangan','=',$request->ruangan],
            
        ])->count();

        foreach($cek as $try){
            $tamp = $try ->sks;
        }
        
        if($matkul > 0){
            return redirect('tambahJadwal')->with('alert','Data Sudah Tersedia');
        }
        else if($coba > 0){
            return redirect('tambahJadwal')->with('alert','Data Sudah Tersedia');
        }
        
        if($request->waktu > 13 && $tamp == 2){
            return redirect('tambahJadwal')->with('alert','Waktu Melebihi Batas');
        }
        if($request->waktu > 12 && $tamp == 3){
            return redirect('tambahJadwal')->with('alert','Waktu Melebihi Batas');
        }
        

        $this->validate($request, [
        
            'hari' => 'required',
            'matkul' => 'required',
            'ruangan' => 'required',
            
        ]);

        DB::table('tb_jadwals')
        ->insert([
            
        
            'hari'=>$request->hari,
            'matkul'=>$request->matkul,
            'ruangan'=>$request->ruangan,
            'fk_kode_matkul'=>$request->matkul,
            'fk_kode_jam'=>$request->waktu,
            

        ]);
        return redirect('dataJadwal')->with('alert-success','Data Berhasil Ditambahkan');
    
    }

    public function editJadwal($kode_jadwal){

        $tamp=DB::table('tb_jadwals')->where('kode_jadwal',$kode_jadwal)->get();
        $tamp5=DB::table('tb_jam_kuliahs')->orderBy('waktu','asc')->get();
        $tamp2=DB::table('tb_mata_kuliahs')->orderBy('nama_matkul','ASC')->get();
        $tamp3=DB::table('tb_ruangans')->get();
        return view('admin.jadwal.adminEditJadwal',compact('tamp5','tamp','tamp2','tamp3'));
    }

    public function updateJadwal(Request $request, $kode_jadwal)
    {

        $matkul = DB::table('tb_jadwals')
        ->where('kode_jadwal','=',$kode_jadwal)
        ->orwhere('matkul','=',$request->matkul)->count();

        if($matkul > 1){
            return redirect('editJadwal/'.$kode_jadwal)->with('alert','Data Sudah Tersedia');
        }
        else{
            $this->validate($request, [
                'hari' => 'required',
                'matkul' => 'required',
                'ruangan' => 'required',
                
            ]);

            DB::table('tb_jadwals')->where('kode_jadwal',$kode_jadwal)->update([
                'hari'=>$request->hari,
                'matkul'=>$request->matkul,
                'ruangan'=>$request->ruangan,
                'fk_kode_matkul'=>$request->matkul,
                'fk_kode_jam'=>$request->waktu,

             ]);
            return redirect('dataJadwal')->with('alert-success','Data Berhasil Diubah');
        }
    }

    public function hapusJadwal($kode_jadwal)
    {
        DB::table('tb_jadwals')->where('kode_jadwal',$kode_jadwal)->delete();
        return redirect('dataJadwal')->with('alert-success','Data Berhasil Dihapus');
    }


}

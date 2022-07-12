<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use PDF;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Propaganistas\LaravelPhone\PhoneNumber;




class mhsController extends Controller

{

    public function cetakNilaiUasMhs(Request $request){

        $session=Session::get('nim');
        $nilai = DB::table('tb_nilais')->orderBy('semester','ASC')->orderBy('nama_matkul','ASC')->where('fk_nim',$session)->get();

        return PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('mhs.nilai.cetakNilaiUasMhs',compact('nilai'))->stream();
        
    }
    public function cetakNilaiUtsMhs(Request $request){

        $session=Session::get('nim');
        $nilai = DB::table('tb_nilais')->orderBy('semester','ASC')->orderBy('nama_matkul','ASC')->where('fk_nim',$session)->get();
        return PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('mhs.nilai.cetakNilaiUtsMhs',compact('nilai'))->stream();
        
    }

    public function dataNilaiUtsMhs(Request $request){
        $session=Session::get('nim');
        $nilai = DB::table('tb_nilais')        
        ->orderBy('semester','ASC')
        ->orderBy('nama_matkul','ASC')
        ->where('fk_nim',$session)->get();
        return view('mhs.nilai.dataNilaiUtsMhs',compact('nilai'));
    }

    public function dataNilaiUasMhs(Request $request){
        $session=Session::get('nim');
        $nilai = DB::table('tb_nilais')
        ->orderBy('semester','ASC')
        ->orderBy('nama_matkul','ASC')
        ->where([            
            ['total','>','0'],
            ['fk_nim','=',$session],            
        ])
        ->get();
        return view('mhs.nilai.dataNilaiUasMhs',compact('nilai'));
    }

    public function dataNilaiUtsMhs2(Request $request){
        $session=Session::get('nim');
        $nilai = DB::table('tb_nilais')        
        ->orderBy('semester','ASC')
        ->orderBy('nama_matkul','ASC')
        ->where('fk_nim',$session)->get();
        return view('ortu.nilai.dataNilaiUtsMhs2',compact('nilai'));
    }

    public function dataNilaiUasMhs2(Request $request){
        $session=Session::get('nim');
        $nilai = DB::table('tb_nilais')
        ->orderBy('semester','ASC')
        ->orderBy('nama_matkul','ASC')
        ->where([            
            ['total','>','0'],
            ['fk_nim','=',$session],            
        ])
        ->get();
        return view('ortu.nilai.dataNilaiUasMhs2',compact('nilai'));
    }

    public function profilMhs($nim){
        $tamp = DB::table('tb_mhs')
        ->select('tb_mhs.*','tb_tahun_akas.*','tb_jurusans.*','tb_tahun_akas.tahun_aka')
        ->join('tb_tahun_akas','tb_tahun_akas.kode_tahunAka','=','tb_mhs.fk_kode_tahunAka')
        ->join('tb_jurusans','tb_jurusans.kode_jur','=','tb_mhs.fk_kode_jur')
        ->where('nim',$nim)
        ->get();
        return view('admin.mahasiswa.profilMhs',compact('tamp'));
    }
    public function cetakKhs(Request $request){

        $session=Session::get('nim');
        $jum_krs = DB::table('tb_krs')->where([
            ['fk_nim','=',$session],
            ['semester','=',1],
        ])->sum('sks');

        $sems = DB::table('tb_nilais')->where([
            ['fk_nim','=',$session],
            ['semester','=',1],
        ])->sum('sks');


        $tot_sks = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',1],
        ])->sum('sks');
        $tot_bobot = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',1],
        ])->sum('bobot');
        $tot_jumlah = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',1],
        ])->sum('jumlah');
        $tot_ip = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',1],
        ])->sum('ip');

        $tot_ip2 = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
        ])->sum('ip');
        $tamp = DB::table('tb_nilais')->where([
                ['fk_nim','=',$session],
                ['semester','=',1],
            ])->count();

        $khs = DB::table('tb_nilais')->where([
                ['fk_nim','=',$session],
                ['semester','=',1],
            ])->get();
                        
            $tot_ip = $tot_ip / $tamp;
            $tot_ipk = 0;
            
            $ident = DB::table('tb_mhs')
            ->select('tb_mhs.*','tb_jurusans.*')
            ->join('tb_jurusans','tb_jurusans.kode_jur','tb_mhs.fk_kode_jur')
            ->where('nim','=',$session)
            ->get();


            return PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('mhs.khs.cetakKhs',compact('tamp','khs','tot_sks','tot_bobot','tot_jumlah','tot_ip','tot_ipk','ident'))->stream();
    }
    public function cetakKhs2(Request $request){

        $session=Session::get('nim');
        $jum_krs = DB::table('tb_krs')->where([
            ['fk_nim','=',$session],
            ['semester','=',2],
        ])->sum('sks');

        $sems = DB::table('tb_nilais')->where([
            ['fk_nim','=',$session],
            ['semester','=',2],
        ])->sum('sks');


        $tot_sks = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',2],
        ])->sum('sks');
        $tot_bobot = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',2],
        ])->sum('bobot');
        $tot_jumlah = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',2],
        ])->sum('jumlah');
        $tot_ip = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',2],
        ])->sum('ip');

        $tot_ip2 = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
        ])->sum('ip');

        

        $tamp = DB::table('tb_nilais')->where([
                ['fk_nim','=',$session],
                ['semester','=',2],
            ])->count();
        $tamps = DB::table('tb_nilais')->where([
                ['fk_nim','=',$session],
            ])->count();

        $khs = DB::table('tb_nilais')->where([
                ['fk_nim','=',$session],
                ['semester','=',2],
            ])->get();
                        
            $tot_ip = $tot_ip / $tamp;
            $tot_ipk = $tot_ip2 / $tamps;
            
            $ident = DB::table('tb_mhs')
            ->select('tb_mhs.*','tb_jurusans.*')
            ->join('tb_jurusans','tb_jurusans.kode_jur','tb_mhs.fk_kode_jur')
            ->where('nim','=',$session)
            ->get();


            return PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('mhs.khs.cetakKhs2',compact('tamp','khs','tot_sks','tot_bobot','tot_jumlah','tot_ip','tot_ipk','ident'))->stream();
    }
    public function cetakKhs3(Request $request){

        $session=Session::get('nim');
        $jum_krs = DB::table('tb_krs')->where([
            ['fk_nim','=',$session],
            ['semester','=',3],
        ])->sum('sks');

        $sems = DB::table('tb_nilais')->where([
            ['fk_nim','=',$session],
            ['semester','=',3],
        ])->sum('sks');


        $tot_sks = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',3],
        ])->sum('sks');
        $tot_bobot = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',3],
        ])->sum('bobot');
        $tot_jumlah = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',3],
        ])->sum('jumlah');
        $tot_ip = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',3],
        ])->sum('ip');

        $tot_ip2 = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
        ])->sum('ip');

        

        $tamp = DB::table('tb_nilais')->where([
                ['fk_nim','=',$session],
                ['semester','=',3],
            ])->count();
        $tamps = DB::table('tb_nilais')->where([
                ['fk_nim','=',$session],
            ])->count();

        $khs = DB::table('tb_nilais')->where([
                ['fk_nim','=',$session],
                ['semester','=',3],
            ])->get();
                        
            $tot_ip = $tot_ip / $tamp;
            $tot_ipk = $tot_ip2 / $tamps;
            
            $ident = DB::table('tb_mhs')
            ->select('tb_mhs.*','tb_jurusans.*')
            ->join('tb_jurusans','tb_jurusans.kode_jur','tb_mhs.fk_kode_jur')
            ->where('nim','=',$session)
            ->get();


            return PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('mhs.khs.cetakKhs3',compact('tamp','khs','tot_sks','tot_bobot','tot_jumlah','tot_ip','tot_ipk','ident'))->stream();
    }
    public function cetakKhs4(Request $request){

        $session=Session::get('nim');
        $jum_krs = DB::table('tb_krs')->where([
            ['fk_nim','=',$session],
            ['semester','=',4],
        ])->sum('sks');

        $sems = DB::table('tb_nilais')->where([
            ['fk_nim','=',$session],
            ['semester','=',4],
        ])->sum('sks');


        $tot_sks = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',4],
        ])->sum('sks');
        $tot_bobot = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',4],
        ])->sum('bobot');
        $tot_jumlah = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',4],
        ])->sum('jumlah');
        $tot_ip = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',4],
        ])->sum('ip');

        $tot_ip2 = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
        ])->sum('ip');

        

        $tamp = DB::table('tb_nilais')->where([
                ['fk_nim','=',$session],
                ['semester','=',4],
            ])->count();
        $tamps = DB::table('tb_nilais')->where([
                ['fk_nim','=',$session],
            ])->count();

        $khs = DB::table('tb_nilais')->where([
                ['fk_nim','=',$session],
                ['semester','=',4],
            ])->get();
                        
            $tot_ip = $tot_ip / $tamp;
            $tot_ipk = $tot_ip2 / $tamps;
            
            $ident = DB::table('tb_mhs')
            ->select('tb_mhs.*','tb_jurusans.*')
            ->join('tb_jurusans','tb_jurusans.kode_jur','tb_mhs.fk_kode_jur')
            ->where('nim','=',$session)
            ->get();


            return PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('mhs.khs.cetakKhs4',compact('tamp','khs','tot_sks','tot_bobot','tot_jumlah','tot_ip','tot_ipk','ident'))->stream();
    }
    public function cetakKhs5(Request $request){

        $session=Session::get('nim');
        $jum_krs = DB::table('tb_krs')->where([
            ['fk_nim','=',$session],
            ['semester','=',5],
        ])->sum('sks');

        $sems = DB::table('tb_nilais')->where([
            ['fk_nim','=',$session],
            ['semester','=',5],
        ])->sum('sks');


        $tot_sks = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',5],
        ])->sum('sks');
        $tot_bobot = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',5],
        ])->sum('bobot');
        $tot_jumlah = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',5],
        ])->sum('jumlah');
        $tot_ip = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',5],
        ])->sum('ip');

        $tot_ip2 = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
        ])->sum('ip');

        

        $tamp = DB::table('tb_nilais')->where([
                ['fk_nim','=',$session],
                ['semester','=',5],
            ])->count();
        $tamps = DB::table('tb_nilais')->where([
                ['fk_nim','=',$session],
            ])->count();

        $khs = DB::table('tb_nilais')->where([
                ['fk_nim','=',$session],
                ['semester','=',5],
            ])->get();
                        
            $tot_ip = $tot_ip / $tamp;
            $tot_ipk = $tot_ip2 / $tamps;
            
            $ident = DB::table('tb_mhs')
            ->select('tb_mhs.*','tb_jurusans.*')
            ->join('tb_jurusans','tb_jurusans.kode_jur','tb_mhs.fk_kode_jur')
            ->where('nim','=',$session)
            ->get();


            return PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('mhs.khs.cetakKhs5',compact('tamp','khs','tot_sks','tot_bobot','tot_jumlah','tot_ip','tot_ipk','ident'))->stream();
    }
    public function cetakKhs6(Request $request){

        $session=Session::get('nim');
        $jum_krs = DB::table('tb_krs')->where([
            ['fk_nim','=',$session],
            ['semester','=',6],
        ])->sum('sks');

        $sems = DB::table('tb_nilais')->where([
            ['fk_nim','=',$session],
            ['semester','=',6],
        ])->sum('sks');


        $tot_sks = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',6],
        ])->sum('sks');
        $tot_bobot = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',6],
        ])->sum('bobot');
        $tot_jumlah = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',6],
        ])->sum('jumlah');
        $tot_ip = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',6],
        ])->sum('ip');

        $tot_ip2 = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
        ])->sum('ip');

        

        $tamp = DB::table('tb_nilais')->where([
                ['fk_nim','=',$session],
                ['semester','=',6],
            ])->count();
        $tamps = DB::table('tb_nilais')->where([
                ['fk_nim','=',$session],
            ])->count();

        $khs = DB::table('tb_nilais')->where([
                ['fk_nim','=',$session],
                ['semester','=',6],
            ])->get();
                        
            $tot_ip = $tot_ip / $tamp;
            $tot_ipk = $tot_ip2 / $tamps;
            
            $ident = DB::table('tb_mhs')
            ->select('tb_mhs.*','tb_jurusans.*')
            ->join('tb_jurusans','tb_jurusans.kode_jur','tb_mhs.fk_kode_jur')
            ->where('nim','=',$session)
            ->get();


            return PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('mhs.khs.cetakKhs6',compact('tamp','khs','tot_sks','tot_bobot','tot_jumlah','tot_ip','tot_ipk','ident'))->stream();
    }
    public function cetakKhs7(Request $request){

        $session=Session::get('nim');
        $jum_krs = DB::table('tb_krs')->where([
            ['fk_nim','=',$session],
            ['semester','=',7],
        ])->sum('sks');

        $sems = DB::table('tb_nilais')->where([
            ['fk_nim','=',$session],
            ['semester','=',7],
        ])->sum('sks');


        $tot_sks = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',7],
        ])->sum('sks');
        $tot_bobot = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',7],
        ])->sum('bobot');
        $tot_jumlah = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',7],
        ])->sum('jumlah');
        $tot_ip = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',7],
        ])->sum('ip');

        $tot_ip2 = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
        ])->sum('ip');

        

        $tamp = DB::table('tb_nilais')->where([
                ['fk_nim','=',$session],
                ['semester','=',7],
            ])->count();
        $tamps = DB::table('tb_nilais')->where([
                ['fk_nim','=',$session],
            ])->count();

        $khs = DB::table('tb_nilais')->where([
                ['fk_nim','=',$session],
                ['semester','=',7],
            ])->get();
                        
            $tot_ip = $tot_ip / $tamp;
            $tot_ipk = $tot_ip2 / $tamps;
            
            $ident = DB::table('tb_mhs')
            ->select('tb_mhs.*','tb_jurusans.*')
            ->join('tb_jurusans','tb_jurusans.kode_jur','tb_mhs.fk_kode_jur')
            ->where('nim','=',$session)
            ->get();


            return PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('mhs.khs.cetakKhs7',compact('tamp','khs','tot_sks','tot_bobot','tot_jumlah','tot_ip','tot_ipk','ident'))->stream();
    }
    public function cetakKhs8(Request $request){

        $session=Session::get('nim');
        $jum_krs = DB::table('tb_krs')->where([
            ['fk_nim','=',$session],
            ['semester','=',8],
        ])->sum('sks');

        $sems = DB::table('tb_nilais')->where([
            ['fk_nim','=',$session],
            ['semester','=',8],
        ])->sum('sks');


        $tot_sks = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',8],
        ])->sum('sks');
        $tot_bobot = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',8],
        ])->sum('bobot');
        $tot_jumlah = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',8],
        ])->sum('jumlah');
        $tot_ip = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',8],
        ])->sum('ip');

        $tot_ip2 = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
        ])->sum('ip');

        

        $tamp = DB::table('tb_nilais')->where([
                ['fk_nim','=',$session],
                ['semester','=',8],
            ])->count();
        $tamps = DB::table('tb_nilais')->where([
                ['fk_nim','=',$session],
            ])->count();

        $khs = DB::table('tb_nilais')->where([
                ['fk_nim','=',$session],
                ['semester','=',8],
            ])->get();
                        
            $tot_ip = $tot_ip / $tamp;
            $tot_ipk = $tot_ip2 / $tamps;
            
            $ident = DB::table('tb_mhs')
            ->select('tb_mhs.*','tb_jurusans.*')
            ->join('tb_jurusans','tb_jurusans.kode_jur','tb_mhs.fk_kode_jur')
            ->where('nim','=',$session)
            ->get();


            return PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('mhs.khs.cetakKhs8',compact('tamp','khs','tot_sks','tot_bobot','tot_jumlah','tot_ip','tot_ipk','ident'))->stream();
    }
    public function cetakJadwalMhs(Request $request){

        $session=Session::get('nim');

        $tamp = DB::table('tb_mhs')
        ->where('nim','=',$session)
        ->get();

        foreach($tamp as $data) {
            $sem = $data ->semester;
            $jur = $data ->fk_kode_jur;
            $tahun_aka = $data ->fk_kode_tahunAka;
        }

        $tamp = DB::table('tb_jadwals')
        ->select('tb_jadwals.*','tb_krs.*','tb_jam_kuliahs.*')        
        ->join('tb_krs','tb_krs.kode_matkuls','=','tb_jadwals.fk_kode_matkul')
        ->join('tb_jam_kuliahs','tb_jam_kuliahs.kode_jam','tb_jadwals.fk_kode_jam')
        ->where([
            ['tb_krs.semester','=',$sem],
            ['tb_krs.fk_kode_tahunAka','=',$tahun_aka],
            ['tb_krs.fk_nim','=',$session],
        ])->get();
        $ident = DB::table('tb_mhs')
        ->select('tb_mhs.*','tb_jurusans.*')
        ->join('tb_jurusans','tb_jurusans.kode_jur','tb_mhs.fk_kode_jur')
        ->where('nim','=',$session)
        ->get();

        return PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('mhs.jadwal.cetakJadwal',compact('tamp','ident'))->stream();
        
    }

     public function cetakKrs(Request $request){

        $session=Session::get('nim');
        $tamp = DB::table('tb_mhs')
        ->where('nim','=',$session)
        ->get();

        foreach($tamp as $data) {
            $sem = $data ->semester;
            $jur = $data ->fk_kode_jur;
            $tahun_aka = $data ->fk_kode_tahunAka;
        }
        $krs = DB::table('tb_mata_kuliahs')
        ->select('tb_mata_kuliahs.*','tb_dosens.*','tb_jurusans.*')   
        ->join('tb_dosens','tb_dosens.nidn','=','tb_mata_kuliahs.fk_nidn')
        ->join('tb_jurusans','tb_jurusans.nama_jur','=','tb_mata_kuliahs.jurusan')
        ->orderBy('tb_mata_kuliahs.nama_matkul','ASC')
        ->where([
            ['tb_jurusans.kode_jur','=',$jur],
            ['tb_mata_kuliahs.semester','=',$sem],
            ['tb_mata_kuliahs.fk_kode_tahunAka','=',$tahun_aka],

        ])->get();

        $ident = DB::table('tb_mhs')
        ->select('tb_mhs.*','tb_jurusans.*')
        ->join('tb_jurusans','tb_jurusans.kode_jur','tb_mhs.fk_kode_jur')
        ->where('nim','=',$session)
        ->get();


    
        return PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('mhs.krs.cetakKrs',compact('krs','ident'))->stream();
    }

    public function cetakPilihKrs(Request $request){

        $session=Session::get('nim');
        $tamp = DB::table('tb_mhs')
        ->where('nim','=',$session)
        ->get();

        foreach($tamp as $data) {
            $sem = $data ->semester;
        }
        $krs = DB::table('tb_krs')
        ->orderBy('tb_krs.nama_matkul','ASC')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',$sem],
        ])->get();
        $ident = DB::table('tb_mhs')
        ->select('tb_mhs.*','tb_jurusans.*')
        ->join('tb_jurusans','tb_jurusans.kode_jur','tb_mhs.fk_kode_jur')
        ->where('nim','=',$session)
        ->get();

    
        return PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('mhs.krs.cetakPilihKrs',compact('krs','ident'))->stream();
    }

    public function cetakMhs(Request $request){

        $tamp = DB::table('tb_mhs')
        ->select('tb_mhs.*','tb_tahun_akas.*','tb_jurusans.*')
        ->join('tb_tahun_akas','tb_tahun_akas.kode_tahunAka','=','tb_mhs.fk_kode_tahunAka')
        ->join('tb_jurusans','tb_jurusans.kode_jur','=','tb_mhs.fk_kode_jur')
        ->orderBy('tb_mhs.semester', 'asc')
        ->orderBy('tb_jurusans.nama_jur', 'asc')
        ->orderBy('tb_mhs.nama_mhs', 'asc')
        ->get();

    
        return PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('admin.mahasiswa.cetakMhs',compact('tamp'))->stream();
    }
    public function cetakMhsId($nim){

        $tamp = DB::table('tb_mhs')
        ->select('tb_mhs.*','tb_tahun_akas.*','tb_jurusans.*')
        ->join('tb_tahun_akas','tb_tahun_akas.kode_tahunAka','=','tb_mhs.fk_kode_tahunAka')
        ->join('tb_jurusans','tb_jurusans.kode_jur','=','tb_mhs.fk_kode_jur')
        ->orderBy('tb_jurusans.nama_jur', 'asc')
        ->where('nim',$nim)
        ->get();

        foreach($tamp as $data){
            $data->fk_kode_jur;
        }

        $jur = DB::table('tb_jurusans')
        ->select('tb_jurusans.*','tb_dosens.*')
        ->join('tb_dosens','tb_dosens.nidn','=','tb_jurusans.fk_kode_nidn')
        ->where('kode_jur',$data->fk_kode_jur)
        ->get();

        $fak = DB::table('tb_fakultas')
        ->select('tb_fakultas.*','tb_jurusans.*','tb_dosens.*')
        ->join('tb_jurusans','tb_jurusans.fk_kode_fak','=','tb_fakultas.kode_fakultas')
        ->join('tb_dosens','tb_dosens.nidn','=','tb_fakultas.dekan')
        ->where('kode_jur',$data->fk_kode_jur)
        ->get();
    
        return PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('admin.mahasiswa.cetakMhsId',compact('jur','fak','tamp'))->stream();
    }

    public function mhsKhs(Request $request){
        $session=Session::get('nim');
        $jum_krs = DB::table('tb_krs')->where([
            ['fk_nim','=',$session],
            ['semester','=',1],
        ])->sum('sks');

        $sems = DB::table('tb_nilais')->where([
            ['fk_nim','=',$session],
            ['semester','=',1],
        ])->sum('sks');


        $tot_sks = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',1],
        ])->sum('sks');
        $tot_bobot = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',1],
        ])->sum('bobot');
        $tot_jumlah = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',1],
        ])->sum('jumlah');
        $tot_ip = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',1],
        ])->sum('ip');

        $tot_ip2 = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
        ])->sum('ip');
        $tamp = DB::table('tb_nilais')->where([
                ['fk_nim','=',$session],
                ['semester','=',1],
            ])->count();

        $khs = DB::table('tb_nilais')->where([
                ['fk_nim','=',$session],
                ['semester','=',1],
            ])->get();

        if($jum_krs == 0 && $sems==0){
            return redirect('mhsDashboard')->with('alert','Anda Belum Mempunyai KHS Semester 1');
        }
        else if($jum_krs == $sems){
            DB::table('tb_mhs')->where('nim',$session)->update([
                'semester'=>'2'
            ]);

            $tot_ip = $tot_ip / $tamp;
            $tot_ipk = 0;
            return view('mhs.khs.mhsKhs',compact('tamp','khs','tot_sks','tot_bobot','tot_jumlah','tot_ip','tot_ipk'));
        }
        else{
            return redirect('mhsDashboard')->with('alert','Anda Belum Mempunyai KHS Semester 1');
        }

        
    }
    public function mhsKhs2(Request $request){
        $session=Session::get('nim');

        $jum_krs = DB::table('tb_krs')->where([
            ['fk_nim','=',$session],
            ['semester','=',2],
        ])->sum('sks');

        $sems = DB::table('tb_nilais')->where([
            ['fk_nim','=',$session],
            ['semester','=',2],
        ])->sum('sks');


        $tot_sks = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',2],
        ])->sum('sks');
        $tot_bobot = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',2],
        ])->sum('bobot');
        $tot_jumlah = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',2],
        ])->sum('jumlah');
        $tot_ip = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',2],
        ])->sum('ip');

        $tot_ip2 = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
        ])->sum('ip');

        

        $tamp = DB::table('tb_nilais')->where([
                ['fk_nim','=',$session],
                ['semester','=',2],
            ])->count();
        $tamps = DB::table('tb_nilais')->where([
                ['fk_nim','=',$session],
            ])->count();

        $khs = DB::table('tb_nilais')->where([
                ['fk_nim','=',$session],
                ['semester','=',2],
            ])->get();

        if($jum_krs == 0 && $sems==0){
            return redirect('mhsDashboard')->with('alert','Anda Belum Mempunyai KHS Semester 2');
        }
        else if($jum_krs == $sems){
            DB::table('tb_mhs')->where('nim',$session)->update([
                'semester'=>'3'
            ]);
            $tot_ip = $tot_ip / $tamp;
            $tot_ipk = $tot_ip2 / $tamps;
            return view('mhs.khs.mhsKhs2',compact('tamp','khs','tot_sks','tot_bobot','tot_jumlah','tot_ip','tot_ipk'));
        }
        else{
            return redirect('mhsDashboard')->with('alert','Anda Belum Mempunyai KHS Semester 2');
        }
    }
    public function mhsKhs3(Request $request){
        $session=Session::get('nim');
        
        $cek = DB::table('tb_krs')
        ->select('tb_krs.*','tb_jurusans.*')
        ->join('tb_jurusans','tb_jurusans.nama_jur','=','tb_krs.jurusan')
        ->where('fk_nim',$session)->first();
        
        $sem_baru = $cek->semester + 1;

        $jum_krs = DB::table('tb_krs')->where([
            ['fk_nim','=',$session],
            ['semester','=',3],
        ])->sum('sks');

        $sems = DB::table('tb_nilais')->where([
            ['fk_nim','=',$session],
            ['semester','=',3],
        ])->sum('sks');


        $tot_sks = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',3],
        ])->sum('sks');
        $tot_bobot = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',3],
        ])->sum('bobot');
        $tot_jumlah = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',3],
        ])->sum('jumlah');
        $tot_ip = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',3],
        ])->sum('ip');

        $tot_ip2 = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
        ])->sum('ip');

        

        $tamp = DB::table('tb_nilais')->where([
                ['fk_nim','=',$session],
                ['semester','=',3],
            ])->count();
        $tamps = DB::table('tb_nilais')->where([
                ['fk_nim','=',$session],
            ])->count();

        $khs = DB::table('tb_nilais')->where([
                ['fk_nim','=',$session],
                ['semester','=',3],
            ])->get();

        if($jum_krs == 0 && $sems==0){
            return redirect('mhsDashboard')->with('alert','Anda Belum Mempunyai KHS Semester 3');
        }
        else if($jum_krs == $sems){
            DB::table('tb_mhs')->where('nim',$session)->update([
                'semester'=>'4'
            ]);
            $tot_ip = $tot_ip / $tamp;
            $tot_ipk = $tot_ip2 / $tamps;
            return view('mhs.khs.mhsKhs3',compact('tamp','khs','tot_sks','tot_bobot','tot_jumlah','tot_ip','tot_ipk'));
        }
        else{
            return redirect('mhsDashboard')->with('alert','Anda Belum Mempunyai KHS Semester 3');
        }
    }
    public function mhsKhs4(Request $request){
        $session=Session::get('nim');
        
        $cek = DB::table('tb_krs')
        ->select('tb_krs.*','tb_jurusans.*')
        ->join('tb_jurusans','tb_jurusans.nama_jur','=','tb_krs.jurusan')
        ->where('fk_nim',$session)->first();
        
        $sem_baru = $cek->semester + 1;

        $jum_krs = DB::table('tb_krs')->where([
            ['fk_nim','=',$session],
            ['semester','=',4],
        ])->sum('sks');

        $sems = DB::table('tb_nilais')->where([
            ['fk_nim','=',$session],
            ['semester','=',4],
        ])->sum('sks');


        $tot_sks = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',4],
        ])->sum('sks');
        $tot_bobot = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',4],
        ])->sum('bobot');
        $tot_jumlah = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',4],
        ])->sum('jumlah');
        $tot_ip = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',4],
        ])->sum('ip');

        $tot_ip2 = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
        ])->sum('ip');

        

        $tamp = DB::table('tb_nilais')->where([
                ['fk_nim','=',$session],
                ['semester','=',4],
            ])->count();
        $tamps = DB::table('tb_nilais')->where([
                ['fk_nim','=',$session],
            ])->count();

        $khs = DB::table('tb_nilais')->where([
                ['fk_nim','=',$session],
                ['semester','=',4],
            ])->get();

        if($jum_krs == 0 && $sems==0){
            return redirect('mhsDashboard')->with('alert','Anda Belum Mempunyai KHS Semester 4');
        }
        else if($jum_krs == $sems){
            DB::table('tb_mhs')->where('nim',$session)->update([
                'semester'=>'5'
            ]);
            $tot_ip = $tot_ip / $tamp;
            $tot_ipk = $tot_ip2 / $tamps;
            return view('mhs.khs.mhsKhs4',compact('tamp','khs','tot_sks','tot_bobot','tot_jumlah','tot_ip','tot_ipk'));
        }
        else{
            return redirect('mhsDashboard')->with('alert','Anda Belum Mempunyai KHS Semester 4');
        }
    }public function mhsKhs5(Request $request){
        $session=Session::get('nim');
        
        $cek = DB::table('tb_krs')
        ->select('tb_krs.*','tb_jurusans.*')
        ->join('tb_jurusans','tb_jurusans.nama_jur','=','tb_krs.jurusan')
        ->where('fk_nim',$session)->first();
        
        $sem_baru = $cek->semester + 1;

        $jum_krs = DB::table('tb_krs')->where([
            ['fk_nim','=',$session],
            ['semester','=',5],
        ])->sum('sks');

        $sems = DB::table('tb_nilais')->where([
            ['fk_nim','=',$session],
            ['semester','=',5],
        ])->sum('sks');


        $tot_sks = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',5],
        ])->sum('sks');
        $tot_bobot = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',5],
        ])->sum('bobot');
        $tot_jumlah = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',5],
        ])->sum('jumlah');
        $tot_ip = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',5],
        ])->sum('ip');

        $tot_ip2 = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
        ])->sum('ip');

        

        $tamp = DB::table('tb_nilais')->where([
                ['fk_nim','=',$session],
                ['semester','=',5],
            ])->count();
        $tamps = DB::table('tb_nilais')->where([
                ['fk_nim','=',$session],
            ])->count();

        $khs = DB::table('tb_nilais')->where([
                ['fk_nim','=',$session],
                ['semester','=',5],
            ])->get();

        if($jum_krs == 0 && $sems==0){
            return redirect('mhsDashboard')->with('alert','Anda Belum Mempunyai KHS Semester 5');
        }
        else if($jum_krs == $sems){
            DB::table('tb_mhs')->where('nim',$session)->update([
                'semester'=>'6'
            ]);
            $tot_ip = $tot_ip / $tamp;
            $tot_ipk = $tot_ip2 / $tamps;
            return view('mhs.khs.mhsKhs5',compact('tamp','khs','tot_sks','tot_bobot','tot_jumlah','tot_ip','tot_ipk'));
        }
        else{
            return redirect('mhsDashboard')->with('alert','Anda Belum Mempunyai KHS Semester 5');
        }
    }
    public function mhsKhs6(Request $request){
        $session=Session::get('nim');
        
        $cek = DB::table('tb_krs')
        ->select('tb_krs.*','tb_jurusans.*')
        ->join('tb_jurusans','tb_jurusans.nama_jur','=','tb_krs.jurusan')
        ->where('fk_nim',$session)->first();
        
        $sem_baru = $cek->semester + 1;

        $jum_krs = DB::table('tb_krs')->where([
            ['fk_nim','=',$session],
            ['semester','=',6],
        ])->sum('sks');

        $sems = DB::table('tb_nilais')->where([
            ['fk_nim','=',$session],
            ['semester','=',6],
        ])->sum('sks');


        $tot_sks = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',6],
        ])->sum('sks');
        $tot_bobot = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',6],
        ])->sum('bobot');
        $tot_jumlah = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',6],
        ])->sum('jumlah');
        $tot_ip = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',6],
        ])->sum('ip');

        $tot_ip2 = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
        ])->sum('ip');

        

        $tamp = DB::table('tb_nilais')->where([
                ['fk_nim','=',$session],
                ['semester','=',6],
            ])->count();
        $tamps = DB::table('tb_nilais')->where([
                ['fk_nim','=',$session],
            ])->count();

        $khs = DB::table('tb_nilais')->where([
                ['fk_nim','=',$session],
                ['semester','=',6],
            ])->get();

        if($jum_krs == 0 && $sems==0){
            return redirect('mhsDashboard')->with('alert','Anda Belum Mempunyai KHS Semester 6');
        }
        else if($jum_krs == $sems){
            DB::table('tb_mhs')->where('nim',$session)->update([
                'semester'=>'7'
            ]);
            $tot_ip = $tot_ip / $tamp;
            $tot_ipk = $tot_ip2 / $tamps;
            return view('mhs.khs.mhsKhs6',compact('tamp','khs','tot_sks','tot_bobot','tot_jumlah','tot_ip','tot_ipk'));
        }
        else{
            return redirect('mhsDashboard')->with('alert','Anda Belum Mempunyai KHS Semester 6');
        }
    }
    public function mhsKhs7(Request $request){
        $session=Session::get('nim');
        
        $cek = DB::table('tb_krs')
        ->select('tb_krs.*','tb_jurusans.*')
        ->join('tb_jurusans','tb_jurusans.nama_jur','=','tb_krs.jurusan')
        ->where('fk_nim',$session)->first();
        
        $sem_baru = $cek->semester + 1;

        $jum_krs = DB::table('tb_krs')->where([
            ['fk_nim','=',$session],
            ['semester','=',7],
        ])->sum('sks');

        $sems = DB::table('tb_nilais')->where([
            ['fk_nim','=',$session],
            ['semester','=',7],
        ])->sum('sks');


        $tot_sks = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',7],
        ])->sum('sks');
        $tot_bobot = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',7],
        ])->sum('bobot');
        $tot_jumlah = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',7],
        ])->sum('jumlah');
        $tot_ip = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',7],
        ])->sum('ip');

        $tot_ip2 = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
        ])->sum('ip');

        

        $tamp = DB::table('tb_nilais')->where([
                ['fk_nim','=',$session],
                ['semester','=',7],
            ])->count();
        $tamps = DB::table('tb_nilais')->where([
                ['fk_nim','=',$session],
            ])->count();

        $khs = DB::table('tb_nilais')->where([
                ['fk_nim','=',$session],
                ['semester','=',7],
            ])->get();

        if($jum_krs == 0 && $sems==0){
            return redirect('mhsDashboard')->with('alert','Anda Belum Mempunyai KHS Semester 7');
        }
        else if($jum_krs == $sems){
            DB::table('tb_mhs')->where('nim',$session)->update([
                'semester'=>'8'
            ]);
            $tot_ip = $tot_ip / $tamp;
            $tot_ipk = $tot_ip2 / $tamps;
            return view('mhs.khs.mhsKhs7',compact('tamp','khs','tot_sks','tot_bobot','tot_jumlah','tot_ip','tot_ipk'));
        }
        else{
            return redirect('mhsDashboard')->with('alert','Anda Belum Mempunyai KHS Semester 7');
        }
    }
    public function mhsKhs8(Request $request){
        $session=Session::get('nim');
        
        $cek = DB::table('tb_krs')
        ->select('tb_krs.*','tb_jurusans.*')
        ->join('tb_jurusans','tb_jurusans.nama_jur','=','tb_krs.jurusan')
        ->where('fk_nim',$session)->first();
        
        $sem_baru = $cek->semester + 1;

        $jum_krs = DB::table('tb_krs')->where([
            ['fk_nim','=',$session],
            ['semester','=',8],
        ])->sum('sks');

        $sems = DB::table('tb_nilais')->where([
            ['fk_nim','=',$session],
            ['semester','=',8],
        ])->sum('sks');


        $tot_sks = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',8],
        ])->sum('sks');
        $tot_bobot = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',8],
        ])->sum('bobot');
        $tot_jumlah = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',8],
        ])->sum('jumlah');
        $tot_ip = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',8],
        ])->sum('ip');

        $tot_ip2 = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$session],
        ])->sum('ip');

        

        $tamp = DB::table('tb_nilais')->where([
                ['fk_nim','=',$session],
                ['semester','=',8],
            ])->count();
        $tamps = DB::table('tb_nilais')->where([
                ['fk_nim','=',$session],
            ])->count();

        $khs = DB::table('tb_nilais')->where([
                ['fk_nim','=',$session],
                ['semester','=',8],
            ])->get();

        if($jum_krs == 0 && $sems==0){
            return redirect('mhsDashboard')->with('alert','Anda Belum Mempunyai KHS Semester 8');
        }
        else if($jum_krs == $sems){
            DB::table('tb_mhs')->where('nim',$session)->update([
                'semester'=>'8'
            ]);
            $tot_ip = $tot_ip / $tamp;
            $tot_ipk = $tot_ip2 / $tamps;
            return view('mhs.khs.mhsKhs8',compact('tamp','khs','tot_sks','tot_bobot','tot_jumlah','tot_ip','tot_ipk'));
        }
        else{
            return redirect('mhsDashboard')->with('alert','Anda Belum Mempunyai KHS Semester 8');
        }
    }
    public function cekKrs(Request $request){
        $session=Session::get('nim');

        $tamp = DB::table('tb_mhs')
        ->where('nim','=',$session)
        ->get();

        foreach($tamp as $data) {
            $sem = $data ->semester;
            $tahun_aka = $data ->tahun_aka;
        }

        
        $cek = DB::table('tb_krs')
        ->select('tb_krs.*','tb_jurusans.*')
        ->join('tb_jurusans','tb_jurusans.nama_jur','=','tb_krs.jurusan')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',$sem],
        ])->get();

        $jum_krs = DB::table('tb_krs')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',$sem],
        ])->sum('sks');
        foreach($cek as $data){
            $data->jenjang;
        }
        if($data->jenjang == 'S1' || $data->jenjang == 'D3'){
            if($jum_krs < 17 ){
                return redirect('mhsKrs')->with('alert','Jumlah SKS Tidak Boleh Kurang Dari 18 per Semester');
            }
            else if($jum_krs > 20){
                return redirect('mhsKrs')->with('alert','Jumlah SKS Tidak Boleh Lebih Dari 20 per Semester');
            }
            else{
                return redirect('mhsKrs')->with('alert-success','Jumlah SKS Telah Mememuhi Syarat');
            }
        }


    }

    public function pilihKrs($kode_matkul){

        $session=Session::get('nim');

        $pilih = DB::table('tb_krs')
        ->where('kode_matkuls','=',$kode_matkul)
        ->get();

        $pilih2 = DB::table('tb_krs')
        ->where([
            ['kode_matkuls','=',$kode_matkul],
            ['fk_nim','=',$session],
        ])->count();

        if($pilih2 > 0){
            return redirect('mhsKrs')->with('alert','Data Sudah Dipilih');
        }
        else{
            
            $tamp = DB::table('tb_mhs')
            ->where('nim','=',$session)
            ->get();

            foreach($tamp as $data) {
            $sem = $data ->semester;
            $jur = $data ->fk_kode_jur;
            $tahun_aka = $data ->fk_kode_tahunAka;
        }
        $krs = DB::table('tb_mata_kuliahs')
        ->select('tb_mata_kuliahs.*','tb_dosens.*','tb_jurusans.*')   
        ->join('tb_dosens','tb_dosens.nidn','=','tb_mata_kuliahs.fk_nidn')
        ->join('tb_jurusans','tb_jurusans.nama_jur','=','tb_mata_kuliahs.jurusan')
        ->where([
            ['tb_jurusans.kode_jur','=',$jur],
            ['tb_mata_kuliahs.semester','=',$sem],
            ['tb_mata_kuliahs.fk_kode_tahunAka','=',$tahun_aka],
            ['tb_mata_kuliahs.kode_matkul','=',$kode_matkul]

        ])->get();

            foreach($krs as $data){

                $data ->kode_matkul;
                $data ->nama_matkul;
                $data ->sks;
                $data ->kategori;
                $data ->nama_dosen;
                $data ->gelar;
                $data ->jurusan;
                $data ->semester;
                $data ->tahun_aka;
                $data ->nidn;

            }

            DB::table('tb_krs')->insert([
                'kode_matkuls'=>$data->kode_matkul,
                'nama_matkul'=>$data->nama_matkul,
                'sks'=>$data->sks,
                'dosen'=>$data->nama_dosen,
                'gelar'=>$data->gelar,
                'kategori'=>$data->kategori,
                'jurusan'=>$data->jurusan,
                'semester'=>$data->semester,
                'tahun_aka'=>$data->tahun_aka,
                'fk_nidn'=>$data->nidn,
                'fk_nim'=>$session,
                'fk_kode_tahunAka'=>$data->fk_kode_tahunAka,
            ]);    

            return redirect('mhsKrs')->with('alert-success','Mata Kuliah Berhasil Ditambahkan');    
        }

        
        
    }

    public function mhsKrs(Request $request){

        $session=Session::get('nim');
        $tamp = DB::table('tb_mhs')
        ->where('nim','=',$session)
        ->get();

        foreach($tamp as $data) {
            $sem = $data ->semester;
            $jur = $data ->fk_kode_jur;
            $tahun_aka = $data ->fk_kode_tahunAka;
        }
        $krs = DB::table('tb_mata_kuliahs')
        ->select('tb_mata_kuliahs.*','tb_dosens.*','tb_jurusans.*')   
        ->join('tb_dosens','tb_dosens.nidn','=','tb_mata_kuliahs.fk_nidn')
        ->join('tb_jurusans','tb_jurusans.nama_jur','=','tb_mata_kuliahs.jurusan')
        ->orderBy('tb_mata_kuliahs.nama_matkul','ASC')
        ->where([
            ['tb_jurusans.kode_jur','=',$jur],
            ['tb_mata_kuliahs.semester','=',$sem],
            ['tb_mata_kuliahs.fk_kode_tahunAka','=',$tahun_aka],

        ])->get();

        $pilih = DB::table('tb_krs')
        ->orderBy('tb_krs.nama_matkul','ASC')
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',$sem],
        ])->get();

        return view('mhs.krs.mhsKrs',compact('krs','pilih'));

    }

    public function mhsJadwal(Request $request){
        

        $session=Session::get('nim');

        $tamp = DB::table('tb_mhs')
        ->where('nim','=',$session)
        ->get();

        foreach($tamp as $data) {
            $sem = $data ->semester;
            $tahun_aka = $data ->tahun_aka;
        }

        $cek = DB::table('tb_krs')
        ->select('tb_krs.*','tb_jurusans.*')
        ->join('tb_jurusans','tb_jurusans.nama_jur','=','tb_krs.jurusan')
        ->where('fk_nim',$session)->get();

        $jum_krs = DB::table('tb_krs')->where([
            ['fk_nim','=',$session],
            ['semester','=',$sem],
        ])->sum('sks');

        if($jum_krs == 0){
            return redirect('mhsKrs')->with('alert','Jumlah SKS Tidak Boleh Kurang Dari 18 per Semester');
        }
        else{
            foreach($cek as $data){
                $data->jenjang;
            }
            if($data->jenjang == 'S1' || $data->jenjang == 'D3'){
                if($jum_krs < 17 ){
                    return redirect('mhsKrs')->with('alert','Jumlah SKS Tidak Boleh Kurang Dari 18 per Semester');
                }
                else if($jum_krs > 20){
                    return redirect('mhsKrs')->with('alert','Jumlah SKS Tidak Boleh Lebih Dari 20 per Semester');
                }
                else{
                    $session=Session::get('nim');

                    $tamp = DB::table('tb_mhs')
                    ->where('nim','=',$session)
                    ->get();

                    foreach($tamp as $data) {
                        $sem = $data ->semester;
                        $jur = $data ->fk_kode_jur;
                        $tahun_aka = $data ->fk_kode_tahunAka;
                    } 

                    $jdw = DB::table('tb_krs')
                    ->select('tb_jadwals.*','tb_krs.*','tb_dosens.*','tb_jurusans.*')        
                    ->join('tb_dosens','tb_dosens.nidn','=','tb_krs.fk_nidn')
                    ->join('tb_jadwals','tb_jadwals.fk_kode_matkul','=','tb_krs.kode_matkuls')
                    
                    ->join('tb_jurusans','tb_jurusans.nama_jur','=','tb_krs.jurusan')
                    ->where([
                        ['tb_jurusans.kode_jur','=',$jur],
                        ['tb_krs.semester','=',$sem],
                        ['tb_krs.fk_kode_tahunAka','=',$tahun_aka],
                        ['tb_krs.fk_nim','=',$session],

                    ])->get();

                    $jadwal = DB::table('tb_jadwals')
                    ->select('tb_jadwals.*','tb_krs.*','tb_jam_kuliahs.*')        
                    ->join('tb_krs','tb_krs.kode_matkuls','=','tb_jadwals.fk_kode_matkul')
                    ->join('tb_jam_kuliahs','tb_jam_kuliahs.kode_jam','tb_jadwals.fk_kode_jam')
                    ->where([
                        ['tb_krs.semester','=',$sem],
                        ['tb_krs.fk_kode_tahunAka','=',$tahun_aka],
                        ['tb_krs.fk_nim','=',$session],
                    ])->orderBy('tb_krs.nama_matkul','ASC')
                    ->get();
                    return view('mhs.jadwal.mhsJadwal',compact('jadwal'));
                }
            }    
        }
        

    }



    public function dataMhs(Request $request){
        $tamp = DB::table('tb_mhs')
        ->select('tb_mhs.*','tb_tahun_akas.*','tb_jurusans.*')
        ->join('tb_tahun_akas','tb_tahun_akas.kode_tahunAka','=','tb_mhs.fk_kode_tahunAka')
        ->join('tb_jurusans','tb_jurusans.kode_jur','=','tb_mhs.fk_kode_jur')
        ->orderBy('tb_jurusans.nama_jur', 'asc')
        ->orderBy('tb_mhs.nama_mhs', 'asc')
        ->get();
        return view('admin.mahasiswa.adminMahasiswa',compact('tamp'));
    }

    
    public function tambahMhs(Request $request){

        $jur=DB::table('tb_jurusans')->count();
        if($jur == 0){
            return redirect('dataMhs')->with('alert','Jurusan Belum Tersedia');
        }
        else{

            $tamp = DB::table('tb_jurusans')->get();
            $tamp2 = DB::table('tb_tahun_akas')->get();
            return view('admin.mahasiswa.adminTambahMahasiswa',compact('tamp','tamp2'));
        }

    }

    public function registerTambahMhs(Request $request){

        $mhs=DB::table('tb_mhs')->select('email','no_hp','no_hp2','no_hp3')
            ->orwhere('email','=',$request->email)

            ->orwhere('no_hp','=',$request->no_hp)
            ->orwhere('no_hp','=',$request->no_hp_ayah)
            ->orwhere('no_hp','=',$request->no_hp_ibu)

            ->orwhere('no_hp2','=',$request->no_hp)
            ->orwhere('no_hp2','=',$request->no_hp_ayah)
            ->orwhere('no_hp2','=',$request->no_hp_ibu)

            ->orwhere('no_hp3','=',$request->no_hp)
            ->orwhere('no_hp3','=',$request->no_hp_ayah)
            ->orwhere('no_hp3','=',$request->no_hp_ibu)->count();
        if($mhs > 0){
            return redirect('tambahMhs')->with('alert','Data Sudah Tersedia');
        }
        else{


            $kode = DB::table('tb_jurusans')->where('kode_jur',$request->jurusan)->get();
            foreach($kode as $data){
                $data->kode_jur;
                $data->fk_kode_fak;
            }
            $tamp = $data->kode_jur.$data->fk_kode_fak.$request->tahun_aka.'1';

            $cek =DB::table('tb_mhs')->where('fk_kode_jur',$request->jurusan)->max('nim');
            if($cek == NULL){
                $noUrut = (int) substr($cek, 9, 3);
                $noUrut++;
                $nim = $tamp.sprintf("%03s", $noUrut);
            }
            else{

                $noUrut = (int) substr($cek, 9, 3);
                $noUrut++;
                $nim =$tamp.sprintf("%03s", $noUrut);
            }


            $this->validate($request, [
                'nama_mhs'=> 'required|min:2',
                'tempat_lahir'=> 'required|min:2',
                'tgl_lahir'=> 'required',
                'email' => 'required|min:4|email|unique:tb_admins|unique:tb_dosens',
                'jk'=> 'required|min:2',
                'alamat'=> 'required|min:2',
                'asal'=> 'required|min:2',
                'no_hp' => 'required|min:10|max:13',
                'agama'=> 'required',
                'goldar'=> 'required',
                'jurusan'=> 'required',
                'semester'=> 'required',
                'tahun_aka'=> 'required',
                'kelas'=> 'required',
                'tgl_masuk'=> 'required',

                'nama_ayah'=> 'required|min:2',
                'pend_akhir_ayah'=> 'required|min:2',
                'pekerjaan_ayah'=> 'required',
                'alamat_ayah'=> 'required|min:2',
                'no_hp_ayah'=> 'required|min:10|max:13',
                'penghasilan_ayah'=> 'required|min:2',

                'nama_ibu'=> 'required|min:2',
                'pend_akhir_ibu'=> 'required',
                'pekerjaan_ibu'=> 'required',
                'alamat_ibu'=> 'required|min:2',
                'no_hp_ibu'=> 'required|min:10|max:13',
                'penghasilan_ibu'=> 'required',
            
                

            ]);

            DB::table('tb_mhs')->insert([
                'nim'=>$nim,
                'nama_mhs'=>$request->nama_mhs,
                'tempat_lahir'=>$request->tempat_lahir,
                'tgl_lahir'=>$request->tgl_lahir,
                'email'=>$request->email,
                'jk'=>$request->jk,            
                'alamat'=>$request->alamat,
                'asal'=>$request->asal,
                'no_hp'=>$request->no_hp,
                'agama'=>$request->agama,
                'goldar'=>$request->goldar,
                'fk_kode_jur'=>$request->jurusan,
                'semester'=>$request->semester,
                'tahun_aka'=>$request->tahun_aka,
                'kelas'=>$request->kelas,
                'tgl_masuk'=>$request->tgl_masuk,

                'nama_ayah'=>$request->nama_ayah,
                'pend_akhir'=>$request->pend_akhir_ayah,
                'pekerjaan'=>$request->pekerjaan_ayah,
                'alamat2'=>$request->alamat_ayah,
                'no_hp2'=>$request->no_hp_ayah,
                'penghasilan'=>$request->penghasilan_ayah,

                'nama_ibu'=>$request->nama_ibu,
                'pend_akhir2'=>$request->pend_akhir_ibu,
                'pekerjaan2'=>$request->pekerjaan_ibu,
                'alamat3'=>$request->alamat_ibu,
                'no_hp3'=>$request->no_hp_ibu,
                'penghasilan2'=>$request->penghasilan_ibu,
            
                
                'fk_kode_tahunAka'=>$request->tahun_aka

            ]);
            return redirect('dataMhs')->with('alert-success','Data Berhasil Ditambahkan');
        }
    }

    public function editMhs($nim){
        $mhs = DB::table('tb_mhs')->where('nim',$nim)->get();
        $tamp = DB::table('tb_jurusans')->get();
        $tamp2 = DB::table('tb_tahun_akas')->get();

        return view('admin.mahasiswa.adminEditMahasiswa',compact('mhs','tamp','tamp2'));
    }

    public function updateMhs(Request $request, $nim)
    {
        $mhs=DB::table('tb_mhs')->select('nim','email','no_hp','no_hp2','no_hp3')
            ->orwhere('email','=',$request->email)

            ->orwhere('no_hp','=',$request->no_hp)
            ->orwhere('no_hp','=',$request->no_hp_ayah)
            ->orwhere('no_hp','=',$request->no_hp_ibu)

            ->orwhere('no_hp2','=',$request->no_hp)
            ->orwhere('no_hp2','=',$request->no_hp_ayah)
            ->orwhere('no_hp2','=',$request->no_hp_ibu)

            ->orwhere('no_hp3','=',$request->no_hp)
            ->orwhere('no_hp3','=',$request->no_hp_ayah)
            ->orwhere('no_hp3','=',$request->no_hp_ibu)        

            ->count();
        if($mhs > 1){
            return redirect('editMhs/'.$request->nim)->with('alert','Data Sudah Tersedia');
        }
        else{

            
            $kode = DB::table('tb_jurusans')->where('kode_jur',$request->jurusan)->get();
            $ko = DB::table('tb_jurusans')
            ->join('tb_mhs','tb_mhs.fk_kode_jur','tb_jurusans.kode_jur')
            ->where('tb_mhs.nim',$nim)
            ->first();

            foreach($kode as $data){
                $data->kode_jur;
                $data->fk_kode_fak;
            }
            $cnt = $data->kode_jur.$data->fk_kode_fak.$request->tahun_aka.'1';

            $tamp = DB::table('tb_mhs')->get();
            $byk = DB::table('tb_mhs')->count();

            $ex = [];
            foreach($tamp as $data2){
                $ex[] = $data2->nim;
            }
            
            $cek =DB::table('tb_mhs')->where('fk_kode_jur',$request->jurusan)->max('nim');
            $noUrut = (int) substr($cek, 9, 3);
            $noUrut++;
            $nim_baru = $cnt.sprintf("%03s", $noUrut);

            if($request->jurusan == $ko->fk_kode_jur){
                $nim_baru = $nim;
            }
            else{
                $x = 0;
                while($x < $byk){
                    if($nim_baru == $ex[$x]){
                        $noUrut = (int) substr($cek, 9, 3);
                        $noUrut++;
                        $nim_baru = $cnt.sprintf("%03s", $noUrut);
                    }
                    $x++;
                }
            }                    
    
            $this->validate($request, [
                'nama_mhs'=> 'required|min:2',
                'tempat_lahir'=> 'required|min:2',
                'tgl_lahir'=> 'required',
                'email' => 'required|min:4|email|unique:tb_admins|unique:tb_dosens',
                'jk'=> 'required|min:2',
                'alamat'=> 'required|min:2',
                'asal'=> 'required|min:2',
                'no_hp' => 'required|min:10|max:13',
                'agama'=> 'required',
                'goldar'=> 'required',
                'jurusan'=> 'required',
                'semester'=> 'required',
                'tahun_aka'=> 'required',
                'kelas'=> 'required',
                'tgl_masuk'=> 'required',

                'nama_ayah'=> 'required|min:2',
                'pend_akhir_ayah'=> 'required|min:2',
                'pekerjaan_ayah'=> 'required',
                'alamat_ayah'=> 'required|min:2',
                'no_hp_ayah'=> 'required|min:10|max:13',
                'penghasilan_ayah'=> 'required|min:2',

                'nama_ibu'=> 'required|min:2',
                'pend_akhir_ibu'=> 'required',
                'pekerjaan_ibu'=> 'required',
                'alamat_ibu'=> 'required|min:2',
                'no_hp_ibu'=> 'required|min:10|max:13',
                'penghasilan_ibu'=> 'required',

            ]);

            DB::table('tb_mhs')->where('nim',$nim)->update([
                'nim'=>$nim_baru,
                'nama_mhs'=>$request->nama_mhs,
                'tempat_lahir'=>$request->tempat_lahir,
                'tgl_lahir'=>$request->tgl_lahir,
                'email'=>$request->email,
                'jk'=>$request->jk,            
                'alamat'=>$request->alamat,
                'asal'=>$request->asal,
                'no_hp'=>$request->no_hp,
                'agama'=>$request->agama,
                'goldar'=>$request->goldar,
                'fk_kode_jur'=>$request->jurusan,
                'semester'=>$request->semester,
                'tahun_aka'=>$request->tahun_aka,
                'kelas'=>$request->kelas,
                'tgl_masuk'=>$request->tgl_masuk,

                'nama_ayah'=>$request->nama_ayah,
                'pend_akhir'=>$request->pend_akhir_ayah,
                'pekerjaan'=>$request->pekerjaan_ayah,
                'alamat2'=>$request->alamat_ayah,
                'no_hp2'=>$request->no_hp_ayah,
                'penghasilan'=>$request->penghasilan_ayah,

                'nama_ibu'=>$request->nama_ibu,
                'pend_akhir2'=>$request->pend_akhir_ibu,
                'pekerjaan2'=>$request->pekerjaan_ibu,
                'alamat3'=>$request->alamat_ibu,
                'no_hp3'=>$request->no_hp_ibu,
                'penghasilan2'=>$request->penghasilan_ibu,
            
                'fk_kode_tahunAka'=>$request->tahun_aka
            ]);
            return redirect('dataMhs')->with('alert-success','Data Berhasil Diubah');
        }
    }




    public function hapusmhs($nim)
    {

        $krs=DB::table('tb_krs')->where('fk_nim',$nim)->count();
        $nilai=DB::table('tb_nilais')->where('fk_nim',$nim)->count();

        if ($krs > 0) {
            return redirect('dataMhs')->with('alert','Anda Harus Menghapus KRS Mahasiswa Terlebih Dahulu');
        }
        elseif ($nilai > 0) {
            return redirect('dataMhs')->with('alert','Anda Harus Menghapus Nilai Mahasiswa Terlebih Dahulu');
        }
        else{
            DB::table('tb_mhs')->where('nim',$nim)->delete();
            return redirect('dataMhs')->with('alert-success','Data Berhasil Dihapus');
        }
    }

    public function hapusKrs($id_matkul)
    {
        DB::table('tb_krs')->where('id_matkul',$id_matkul)->delete();
        return redirect('mhsKrs')->with('alert-success','Data Berhasil Dihapus');
    }
}

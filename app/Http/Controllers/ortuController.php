<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Propaganistas\LaravelPhone\PhoneNumber;

class ortuController extends Controller
{
        public function mhsKhsOrtu(Request $request){
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
            return redirect('ortuDashboard')->with('alert','Anda Belum Mempunyai KHS Semester 1');
        }
        else if($jum_krs == $sems){
            DB::table('tb_mhs')->where('nim',$session)->update([
                'semester'=>'2'
            ]);

            $tot_ip = $tot_ip / $tamp;
            $tot_ipk = 0;
            return view('ortu.khs.mhsKhsOrtu',compact('tamp','khs','tot_sks','tot_bobot','tot_jumlah','tot_ip','tot_ipk'));
        }
        else{
            return redirect('ortuDashboard')->with('alert','Anda Belum Mempunyai KHS Semester 1');
        }

        
    }
    public function mhsKhsOrtu2(Request $request){
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
            return redirect('ortuDashboard')->with('alert','Anda Belum Mempunyai KHS Semester 2');
        }
        else if($jum_krs == $sems){
            DB::table('tb_mhs')->where('nim',$session)->update([
                'semester'=>'3'
            ]);
            $tot_ip = $tot_ip / $tamp;
            $tot_ipk = $tot_ip2 / $tamps;
            return view('ortu.khs.mhsKhsOrtu2',compact('tamp','khs','tot_sks','tot_bobot','tot_jumlah','tot_ip','tot_ipk'));
        }
        else{
            return redirect('ortuDashboard')->with('alert','Anda Belum Mempunyai KHS Semester 2');
        }
    }
    public function mhsKhsOrtu3(Request $request){
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
            return redirect('ortuDashboard')->with('alert','Anda Belum Mempunyai KHS Semester 3');
        }
        else if($jum_krs == $sems){
            DB::table('tb_mhs')->where('nim',$session)->update([
                'semester'=>'4'
            ]);
            $tot_ip = $tot_ip / $tamp;
            $tot_ipk = $tot_ip2 / $tamps;
            return view('ortu.khs.mhsKhsOrtu3',compact('tamp','khs','tot_sks','tot_bobot','tot_jumlah','tot_ip','tot_ipk'));
        }
        else{
            return redirect('ortuDashboard')->with('alert','Anda Belum Mempunyai KHS Semester 3');
        }
    }
    public function mhsKhsOrtu4(Request $request){
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
            return redirect('ortuDashboard')->with('alert','Anda Belum Mempunyai KHS Semester 4');
        }
        else if($jum_krs == $sems){
            DB::table('tb_mhs')->where('nim',$session)->update([
                'semester'=>'5'
            ]);
            $tot_ip = $tot_ip / $tamp;
            $tot_ipk = $tot_ip2 / $tamps;
            return view('ortu.khs.mhsKhsOrtu4',compact('tamp','khs','tot_sks','tot_bobot','tot_jumlah','tot_ip','tot_ipk'));
        }
        else{
            return redirect('ortuDashboard')->with('alert','Anda Belum Mempunyai KHS Semester 4');
        }
    }public function mhsKhsOrtu5(Request $request){
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
            return redirect('ortuDashboard')->with('alert','Anda Belum Mempunyai KHS Semester 5');
        }
        else if($jum_krs == $sems){
            DB::table('tb_mhs')->where('nim',$session)->update([
                'semester'=>'6'
            ]);
            $tot_ip = $tot_ip / $tamp;
            $tot_ipk = $tot_ip2 / $tamps;
            return view('ortu.khs.mhsKhsOrtu5',compact('tamp','khs','tot_sks','tot_bobot','tot_jumlah','tot_ip','tot_ipk'));
        }
        else{
            return redirect('ortuDashboard')->with('alert','Anda Belum Mempunyai KHS Semester 5');
        }
    }
    public function mhsKhsOrtu6(Request $request){
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
            return redirect('ortuDashboard')->with('alert','Anda Belum Mempunyai KHS Semester 6');
        }
        else if($jum_krs == $sems){
            DB::table('tb_mhs')->where('nim',$session)->update([
                'semester'=>'7'
            ]);
            $tot_ip = $tot_ip / $tamp;
            $tot_ipk = $tot_ip2 / $tamps;
            return view('ortu.khs.mhsKhsOrtu6',compact('tamp','khs','tot_sks','tot_bobot','tot_jumlah','tot_ip','tot_ipk'));
        }
        else{
            return redirect('ortuDashboard')->with('alert','Anda Belum Mempunyai KHS Semester 6');
        }
    }
    public function mhsKhsOrtu7(Request $request){
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
            return redirect('ortuDashboard')->with('alert','Anda Belum Mempunyai KHS Semester 7');
        }
        else if($jum_krs == $sems){
            DB::table('tb_mhs')->where('nim',$session)->update([
                'semester'=>'8'
            ]);
            $tot_ip = $tot_ip / $tamp;
            $tot_ipk = $tot_ip2 / $tamps;
            return view('ortu.khs.mhsKhsOrtu7',compact('tamp','khs','tot_sks','tot_bobot','tot_jumlah','tot_ip','tot_ipk'));
        }
        else{
            return redirect('ortuDashboard')->with('alert','Anda Belum Mempunyai KHS Semester 7');
        }
    }
    public function mhsKhsOrtu8(Request $request){
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
            return redirect('ortuDashboard')->with('alert','Anda Belum Mempunyai KHS Semester 8');
        }
        else if($jum_krs == $sems){
            DB::table('tb_mhs')->where('nim',$session)->update([
                'semester'=>'8'
            ]);
            $tot_ip = $tot_ip / $tamp;
            $tot_ipk = $tot_ip2 / $tamps;
            return view('ortu.khs.mhsKhsOrtu8',compact('tamp','khs','tot_sks','tot_bobot','tot_jumlah','tot_ip','tot_ipk'));
        }
        else{
            return redirect('ortuDashboard')->with('alert','Anda Belum Mempunyai KHS Semester 8');
        }
    }

    public function mhsKrs(Request $request){

        $session=Session::get('nim');
        $tamp = DB::table('tb_mhs')
        ->where('nim','=',$session)
        ->get();

        foreach($tamp as $data) {
            $sem = $data ->semester;
        }
        $pilih = DB::table('tb_krs')
        
        ->where([
            ['fk_nim','=',$session],
            ['semester','=',$sem],
        ])
        ->orderBy('tb_krs.nama_matkul','ASC')
        ->get();

        return view('ortu.krs.mhsKrs2',compact('pilih'));

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
            return redirect('mhsKrs2')->with('alert','Anda Belum Memilih Mata Kuliah');
        }
        else{
            foreach($cek as $data){
                $data->jenjang;
            }
            if($data->jenjang == 'S1' || $data->jenjang == 'D3'){
                if($jum_krs < 17 ){
                    return redirect('mhsKrs2')->with('alert','Jumlah SKS Tidak Boleh Kurang Dari 18 per Semester');
                }
                else if($jum_krs > 20){
                    return redirect('mhsKrs2')->with('alert','Jumlah SKS Tidak Boleh Lebih Dari 20 per Semester');
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
                    return view('ortu.jadwal.mhsJadwal2',compact('jadwal'));
                }
            }    
        }
        

    }
}

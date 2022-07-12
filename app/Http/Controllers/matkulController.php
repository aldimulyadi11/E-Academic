<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use DB;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class matkulController extends Controller
{   
    public function cetakMatkul(Request $request){
        
        $tamp = DB::table('tb_mata_kuliahs')
        ->select('tb_mata_kuliahs.*','tb_dosens.*')
        ->join('tb_dosens','tb_dosens.nidn','=','tb_mata_kuliahs.fk_nidn')
        ->orderBy('tb_mata_kuliahs.jurusan','asc')
        ->orderBy('tb_mata_kuliahs.semester','asc')
        ->orderBy('tb_mata_kuliahs.nama_matkul','asc')
        ->get();        
    
        return PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('admin.matkul.cetakMatkul',compact('tamp'))->stream();
    }
    public function cetakMatkulId($kode_matkul){
        
        $tamps = DB::table('tb_mata_kuliahs')->where('kode_matkul',$kode_matkul)->get();
        foreach($tamps as $x){
            $x ->jurusan;
            $x ->semester;
        }
        $tamp = DB::table('tb_mata_kuliahs')
        ->select('tb_mata_kuliahs.*','tb_dosens.*')
        ->join('tb_dosens','tb_dosens.nidn','=','tb_mata_kuliahs.fk_nidn')
        ->orderBy('tb_mata_kuliahs.nama_matkul', 'asc')
        ->where([
            ['tb_mata_kuliahs.jurusan','=',$x->jurusan],
            ['tb_mata_kuliahs.semester','=',$x->semester],
            
        ])->get();
              
    
        return PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('admin.matkul.cetakMatkulId',compact('tamp'))->stream();
    }

    public function dataMatkul(Request $request){

        $tamp = DB::table('tb_mata_kuliahs')
        ->select('tb_mata_kuliahs.*','tb_dosens.*')
        ->join('tb_dosens','tb_dosens.nidn','=','tb_mata_kuliahs.fk_nidn')
        
        ->orderBy('tb_mata_kuliahs.jurusan','asc')
        ->orderBy('tb_mata_kuliahs.semester','asc')
        ->orderBy('tb_mata_kuliahs.nama_matkul','asc')
        ->get();

        return view('admin.matkul.adminMatkul',compact('tamp'));
    }

    public function tambahMatkul(Request $request){


        $tamp=DB::table('tb_dosens')->count();
        if($tamp == 0){
            return redirect('tambahMatkul')->with('alert','Dosen Pengajar Belum Tersedia');
        }
        else{
            
            $tamp =DB::table('tb_jurusans')->get();
            $tamp2 = DB::table('tb_tahun_akas')->get();
            $tamp3 =DB::table('tb_dosens')->get();
            return view('admin.matkul.adminTambahMatkul',compact('tamp','tamp2','tamp3'));
        }
    }

    public function registerTambahMatkul(Request $request){

        $matkul=DB::table('tb_mata_kuliahs')->select('kode_matkul','nama_matkul')
        ->where('nama_matkul','=',$request->nama_matkul)->count();
        if($matkul > 0){
            return redirect('tambahMatkul')->with('alert','Data Sudah Tersedia');
        }


        $cek =DB::table('tb_mata_kuliahs')->max('kode_matkul');
        $byk =DB::table('tb_mata_kuliahs')->count();
        $add = 'INU1';
        if($cek == NULL){
            $noUrut = (int) substr($cek, 4, 4);
            $noUrut++;
            $kode_matkul = $add.sprintf("%04s", $noUrut);
        }
        else{
            $noUrut = (int) substr($cek, 4, 4);
            $noUrut++;
            $kode_matkul = $add.sprintf("%04s", $noUrut);
        }
        $this->validate($request, [
            'nama_matkul' => 'required',
            'sks' => 'required',
            'kategori' => 'required',
            'jurusan' => 'required',
            'semester' => 'required',
            'tahun_aka'=> 'required',
            'dosen' => 'required',
        ]);

        DB::table('tb_mata_kuliahs')->insert([
            'kode_matkul'=>$kode_matkul,
            'nama_matkul'=>$request->nama_matkul,
            'sks'=>$request->sks,
            'kategori'=>$request->kategori,
            'jurusan'=>$request->jurusan,
            'semester'=>$request->semester,
            'tahun_aka'=>$request->tahun_aka,
            'dosen'=>$request->dosen,
            'fk_nidn'=>$request->dosen,
            'fk_kode_tahunAka'=>$request->tahun_aka,

        ]);
        return redirect('dataMatkul')->with('alert-success','Data Berhasil Ditambahkan');
        
        
    }


    public function editMatkul($kode_matkul){

        $tamp = DB::table('tb_mata_kuliahs')
        ->select('tb_mata_kuliahs.*','tb_dosens.*')
        ->join('tb_dosens','tb_dosens.nidn','=','tb_mata_kuliahs.fk_nidn')
        ->where('kode_matkul',$kode_matkul)
        ->get();

        $tamp2 = DB::table('tb_jurusans')->get();
        $tamp3 = DB::table('tb_tahun_akas')->get();
        $tamp4 = DB::table('tb_dosens')->get();

        return view('admin.matkul.adminEditMatkul',compact('tamp','tamp2','tamp3','tamp4'));
    }

    public function updateMatkul(Request $request, $kode_matkul)
    {

            $matkul = DB::table('tb_mata_kuliahs')
            ->where('kode_matkul','=',$request->kode_matkul)
            ->orwhere('nama_matkul','=',$request->nama_matkul)
            ->count();
            if($matkul > 1){
                return redirect('editMatkul/'.$request->kode_matkul)->with('alert','Data Sudah Tersedia');                     
            }
            else{
                if($request->kategori == 'Wajib'){
                    $add = 1;
                }
                else if($request->kategori == 'Pilihan'){
                    $add = 2;
                }

                
                $cek = DB::table('tb_mata_kuliahs')->where('kode_matkul',$kode_matkul)->first();
                $maxi =DB::table('tb_mata_kuliahs')->where('semester',$request->semester)->max('kode_matkul');

                if($request->semester == $cek->semester){
                    $kode_matkul_baru = $kode_matkul;
                }
                else{
                    $sem = $request->semester;
                    $add = 'INU'.$add.$sem;
                    $noUrut = (int) substr($maxi, 7, 3);
                    $noUrut++;
                    $kode_matkul_baru = $add.sprintf("%03s", $noUrut);
                    
                }
                
                $this->validate($request, [
                    'nama_matkul' => 'required',
                    'sks' => 'required',
                    'kategori' => 'required',
                    'jurusan' => 'required',
                    'semester' => 'required',
                    'tahun_aka'=> 'required',
                    'dosen' => 'required',
                ]);

                DB::table('tb_mata_kuliahs')->where('kode_matkul',$kode_matkul)->update([     
                    'kode_matkul'=>$kode_matkul_baru,       
                    'nama_matkul'=>$request->nama_matkul,
                    'sks'=>$request->sks,
                    'kategori'=>$request->kategori,
                    'jurusan'=>$request->jurusan,
                    'semester'=>$request->semester,
                    'tahun_aka'=>$request->tahun_aka,
                    'dosen'=>$request->dosen,
                    'fk_nidn'=>$request->dosen,
                    'fk_kode_tahunAka'=>$request->tahun_aka,    

                ]);
                return redirect('dataMatkul')->with('alert-success','Data Berhasil Diubah');
            }


        
    }

    public function hapusMatkul($kode_matkul)
    {
        $jadwal=DB::table('tb_jadwals')->where('fk_kode_matkul',$kode_matkul)->count();

        if ($jadwal > 0) {
            return redirect('dataMatkul')->with('alert','Anda Harus Menghapus Data Mata Kuliah Yang Dipilih Mahasiswa di Jadwal Kuliah');
        }
        else{

            DB::table('tb_mata_kuliahs')->where('kode_matkul',$kode_matkul)->delete();
            return redirect('dataMatkul')->with('alert-success','Data Berhasil Dihapus');
        }
    }
}

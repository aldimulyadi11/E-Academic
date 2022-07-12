<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class jurusanController extends Controller
{
    public function cetakJurusan(Request $request){

        $jurusan = DB::table('tb_jurusans')
        ->select('tb_jurusans.*','tb_dosens.*','tb_fakultas.*')
        ->join('tb_dosens','tb_dosens.nidn','=','tb_jurusans.fk_kode_nidn')
        ->join('tb_fakultas','tb_fakultas.kode_fakultas','=','tb_jurusans.fk_kode_fak')
        ->orderBy('nama_jur', 'asc')
        ->get();
    
        return PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('admin.jurusan.cetakJurusan',compact('jurusan'))->stream();
        
    }
    public function cetakJurusanId($kode_jur){

        $jurusan = DB::table('tb_jurusans')
        ->select('tb_jurusans.*','tb_dosens.*','tb_fakultas.*')
        ->join('tb_dosens','tb_dosens.nidn','=','tb_jurusans.fk_kode_nidn')
        ->join('tb_fakultas','tb_fakultas.kode_fakultas','=','tb_jurusans.fk_kode_fak')
        ->where('kode_jur',$kode_jur)
        ->get();
        
        $jur = DB::table('tb_jurusans')
        ->select('tb_jurusans.*','tb_dosens.*')
        ->join('tb_dosens','tb_dosens.nidn','=','tb_jurusans.fk_kode_nidn')
        ->where('kode_jur',$kode_jur)
        ->get();

        $fak = DB::table('tb_fakultas')
        ->select('tb_fakultas.*','tb_jurusans.*','tb_dosens.*')
        ->join('tb_jurusans','tb_jurusans.fk_kode_fak','=','tb_fakultas.kode_fakultas')
        ->join('tb_dosens','tb_dosens.nidn','=','tb_fakultas.dekan')
        ->where('kode_jur',$kode_jur)
        ->get();
    
        return PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('admin.jurusan.cetakJurusanId',compact('jur','fak','jurusan'))->stream();
        
    }
        
    public function dataJurusan(Request $request){

        $tamp = DB::table('tb_jurusans')
        ->select('tb_jurusans.*','tb_fakultas.nama_fakultas','tb_fakultas.kode_fakultas','tb_dosens.nama_dosen','tb_dosens.nidn','tb_dosens.gelar')
        ->join('tb_fakultas','tb_fakultas.kode_fakultas','=','tb_jurusans.fk_kode_fak')
        ->join('tb_dosens','tb_dosens.nidn','=','tb_jurusans.fk_kode_nidn')
        ->orderBy('nama_jur', 'asc')

        ->get();
        $dos = DB::table('tb_dosens')->get();
        return view('admin.jurusan.adminJurusan',compact('tamp','dos'));
    }

    public function tambahJurusan(Request $request){

        $jur=DB::table('tb_jurusans')->count();

        $tamp = DB::table('tb_dosens')           
        ->where('tb_dosens.jabatan','=','Ketua Jurusan')     
        ->count();

        if($tamp == 0){
            return redirect('dataJurusan')->with('alert','Ketua Jurusan Belum Tersedia');
        }
        elseif($tamp <= $jur){
            return redirect('dataJurusan')->with('alert','Ketua Jurusan Sudah Terpakai Semua');
        }
        else{
            $tamp = DB::table('tb_fakultas')
            ->get();

            $tamp2 = DB::table('tb_dosens')
            ->where('tb_dosens.jabatan','=','Ketua Jurusan')    
            ->get();
            return view('admin.jurusan.adminTambahJurusan',compact('tamp','tamp2'));
        }
    }

    public function registerTambahJurusan(Request $request){

        $jur=DB::table('tb_jurusans')->select('kode_jur','nama_jur','fk_kode_nidn')
        ->where('kode_jur','=',$request->kode_jur)
        ->orwhere('nama_jur','=',$request->nama_jur)
        ->orwhere('fk_kode_nidn','=',$request->ketua_jur)->count();
        if($jur > 0){
            return redirect('tambahJurusan')->with('alert','Data Sudah Tersedia');
        }
        else{

            $cek =DB::table('tb_jurusans')->max('kode_jur');
            if($cek == NULL){
                $noUrut = (int) substr($cek, 0, 2);
                $noUrut++;
                $kode_jur = sprintf("%02s", $noUrut);
            }
            else{
                $noUrut = (int) substr($cek, 0, 2);
                $noUrut++;
                $kode_jur = sprintf("%02s", $noUrut);
            }
            $this->validate($request, [
                'nama_fak' => 'required',
                'nama_jur' => 'required|min:2',
                'jenjang' => 'required',
                'ketua_jur' => 'required',
                
            ]);

            DB::table('tb_jurusans')
            ->insert([
                'kode_jur'=>$kode_jur,
                'nama_fak'=>$request->nama_fak,
                'nama_jur'=>$request->nama_jur,
                'jenjang'=>$request->jenjang,
                'fk_kode_fak'=>$request->nama_fak,
                'fk_kode_nidn'=>$request->ketua_jur

            ]);
            return redirect('dataJurusan')->with('alert-success','Data Berhasil Ditambahkan');
        }
    }

    public function editJurusan($kode_jurusan){

        $tamp = DB::table('tb_jurusans')
        ->select('tb_jurusans.*','tb_fakultas.nama_fakultas','tb_fakultas.kode_fakultas')
        ->join('tb_fakultas','tb_fakultas.kode_fakultas','=','tb_jurusans.fk_kode_fak')
        ->where('kode_jur',$kode_jurusan)
        ->get();

        $tamp2 = DB::table('tb_dosens')->where('jabatan','=','Ketua Jurusan')->get();
        $tamp3 = DB::table('tb_fakultas')->get();
        return view('admin.jurusan.adminEditJurusan',compact('tamp','tamp2','tamp3'));
    }

    public function updatejurusan(Request $request, $kode_jurusan)
    {
        $jur=DB::table('tb_jurusans')->select('kode_jur','nama_jur','fk_kode_nidn')
        ->where('kode_jur','=',$request->kode_jur)
        ->orwhere('nama_jur','=',$request->nama_jur)
        ->orwhere('fk_kode_nidn','=',$request->ketua_jur)->count();
        if($jur > 1){
            return redirect('editJurusan/'.$request->kode_jur)->with('alert','Data Sudah Tersedia');
        }
        else{

            $this->validate($request, [
                'nama_fak' => 'required',
                'nama_jur' => 'required|min:2',
                'jenjang' => 'required',
                'ketua_jur' => 'required',
            ]);

            DB::table('tb_jurusans')->where('kode_jur',$kode_jurusan)->update([
                'nama_fak'=>$request->nama_fak,
                'nama_jur'=>$request->nama_jur,
                'jenjang'=>$request->jenjang,
                'fk_kode_fak'=>$request->nama_fak,
                'fk_kode_nidn'=>$request->ketua_jur

             ]);
            return redirect('dataJurusan')->with('alert-success','Data Berhasil Diubah');
        }
    }

    public function hapusJurusan($kode_jurusan)
    {
        $mhs=DB::table('tb_mhs')->where('fk_kode_jur',$kode_jurusan)->count();

        if ($mhs > 0) {
            return redirect('dataJurusan')->with('alert','Anda Harus Menghapus Data Jurusan Yang Dipilih Mahasiswa Terlebih Dahulu');
        }
        else{
            DB::table('tb_jurusans')->where('kode_jur',$kode_jurusan)->delete();
            return redirect('dataJurusan')->with('alert-success','Data Berhasil Dihapus');   
        }
    }


}

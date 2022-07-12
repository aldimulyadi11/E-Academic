<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class fakultasController extends Controller
{

    public function cetakFakultas(Request $request){

        $fakultas = DB::table('tb_fakultas')
        ->select('tb_fakultas.*','tb_dosens.*')
        ->join('tb_dosens','tb_dosens.nidn','=','tb_fakultas.dekan')
        ->orderBy('nama_fakultas', 'asc')
        ->get();
        
    
        return PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('admin.fakultas.cetakFakultas',compact('fakultas'))->stream();
        
    }
    public function cetakFakultasId($kode_fakultas){

        $fakultas = DB::table('tb_fakultas')
        ->select('tb_fakultas.*','tb_dosens.*')
        ->join('tb_dosens','tb_dosens.nidn','=','tb_fakultas.dekan')
        ->orderBy('nama_fakultas', 'asc')
        ->where('kode_fakultas',$kode_fakultas)
        ->get();

        $dek = DB::table('tb_fakultas')
        ->select('tb_fakultas.*','tb_dosens.*')
        ->join('tb_dosens','tb_dosens.nidn','=','tb_fakultas.dekan')
        ->where('kode_fakultas',$kode_fakultas)
        ->get();
    
        return PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('admin.fakultas.cetakFakultasId',compact('fakultas','dek'))->stream();
        
    }

     public function dataFakultas(Request $request){

        $tamp = DB::table('tb_fakultas')
        ->select('tb_fakultas.kode_fakultas','tb_fakultas.nama_fakultas','tb_dosens.nama_dosen','tb_dosens.gelar')
        ->join('tb_dosens','tb_dosens.nidn','=','tb_fakultas.dekan')
        ->orderBy('nama_fakultas', 'asc')
        ->get();
        return view('admin.fakultas.adminFakultas',compact('tamp'));
    }

    public function tambahFakultas(Request $request){

        

        $fak=DB::table('tb_fakultas')->count();

        $tamp = DB::table('tb_dosens')           
        ->where('tb_dosens.jabatan','=','Dekan')->count();
        if($tamp == 0){
            return redirect('dataFakultas')->with('alert','Dekan Belum Tersedia');
        }
        elseif($tamp <= $fak){
            return redirect('dataFakultas')->with('alert','Dekan Sudah Terpakai Semua');
        }
        else{
            $tamp = DB::table('tb_dosens')               
            ->where('tb_dosens.jabatan','=','Dekan')     
            ->get();
            return view('admin.fakultas.adminTambahFakultas',compact('tamp'));
        }
    }

    public function registerTambahFakultas(Request $request){

        $fak=DB::table('tb_fakultas')->select('nama_fakultas','dekan')
        ->where('nama_fakultas','=',$request->nama_fak)
        ->orwhere('dekan','=',$request->dekan)->count();
        if($fak > 0){
            return redirect('tambahFakultas')->with('alert','Data Sudah Tersedia');
        }
        else{

            $cek =DB::table('tb_fakultas')->max('kode_fakultas');
            if($cek == NULL){
                $noUrut = (int) substr($cek, 0, 2);
                $noUrut++;
                $kode_fak = sprintf("%02s", $noUrut);
            }
            else{
                $noUrut = (int) substr($cek, 0, 2);
                $noUrut++;
                $kode_fak = sprintf("%02s", $noUrut);
            }
            
            $this->validate($request, [
                
                'nama_fak' => 'required',
                'dekan' => 'required',
            ]);


            DB::table('tb_fakultas')->insert([
                'kode_fakultas'=>$kode_fak,
                'nama_fakultas'=>$request->nama_fak,
                'dekan'=>$request->dekan

            ]);
            return redirect('dataFakultas')->with('alert-success','Data Berhasil Ditambahkan');
        }
    }


    public function editFakultas($kode_fakultas){

        $tamp = DB::table('tb_dosens')
        ->select('tb_fakultas.kode_fakultas','tb_fakultas.nama_fakultas','tb_fakultas.dekan','tb_dosens.nidn','tb_dosens.nama_dosen','tb_dosens.gelar')
        ->join('tb_fakultas','tb_fakultas.dekan','=','tb_dosens.nidn')
        ->where('kode_fakultas',$kode_fakultas)
        ->get();

        $tamp2 = DB::table('tb_dosens')
        ->where('jabatan','=','Dekan')
        ->orwhere('gelar','=','gelar')
        ->get();
        return view('admin.fakultas.adminEditFakultas',compact('tamp','tamp2'));
    }

    public function updateFakultas(Request $request, $kode_fakultas)
    {
        $fak=DB::table('tb_fakultas')->select('kode_fakultas','nama_fakultas','dekan')
        ->where('kode_fakultas','=',$request->kode_fak)
        ->orwhere('nama_fakultas','=',$request->nama_fak)
        ->orwhere('dekan','=',$request->dekan)->count();
        if($fak > 1){
            return redirect('editFakultas/'.$request->kode_fak)->with('alert','Data Sudah Tersedia');
        }
        else{

            $this->validate($request, [
                'nama_fak' => 'required|min:2',
                'dekan' => 'required',
            ]);

            DB::table('tb_fakultas')->where('kode_fakultas',$kode_fakultas)->update([
                'nama_fakultas'=>$request->nama_fak,
                'dekan'=>$request->dekan

            ]);
            return redirect('dataFakultas')->with('alert-success','Data Berhasil Diubah');
        }
    }

    public function hapusFakultas($kode_fakultas)
    {


        
        $fak=DB::table('tb_jurusans')->where('fk_kode_fak',$kode_fakultas)->count();

        if ($fak > 0) {
            return redirect('dataFakultas')->with('alert','Anda Harus Menghapus Data Fakultas di Jurusannya Terlebih Dahulu');
        }
        else{
            DB::table('tb_fakultas')->where('kode_fakultas',$kode_fakultas)-> delete();
            return redirect('dataFakultas')->with('alert-success','Data Berhasil Dihapus');
        }
    }
}

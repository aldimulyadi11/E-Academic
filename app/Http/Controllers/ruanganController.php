<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use DB;
use PDF;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ruanganController extends Controller
{
     public function cetakRuangan(Request $request){ 
        
        $tamp=DB::table('tb_ruangans')->get();            
        return PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('admin.ruangan.cetakRuangan',compact('tamp'))->stream();
    }

    public function dataRuangan(Request $request){ 
        
        $tamp=DB::table('tb_ruangans')->get();            
        return view('admin.ruangan.adminRuangan',compact('tamp'));
    }

    public function tambahRuangan(Request $request){        
        return view('admin.ruangan.adminTambahRuangan');
    }

    public function registerTambahRuangan(Request $request){

        $ruangan=DB::table('tb_ruangans')->select('nama_ruangan')
        ->where('nama_ruangan','=',$request->nama_ruangan)->count();
        if($ruangan > 0){
            return redirect('tambahRuangan')->with('alert','Data Sudah Tersedia');
        }
        else{

            $cek =DB::table('tb_ruangans')->max('kode_ruangan');

            if($cek == NULL){
                $noUrut = (int) substr($cek, 0, 3);
                $noUrut++;
                $kode_ruangan = sprintf("%03s", $noUrut);
            }
            else if($cek > 0 && $cek < '09'){
                $noUrut = (int) substr($cek, 0, 3);
                $noUrut++;
                $kode_ruangan = sprintf("%03s", $noUrut);
            }
            else{
                $noUrut = (int) substr($cek, 0, 3);
                $noUrut++;
                $kode_ruangan = sprintf("%03s", $noUrut);
            }

            $this->validate($request, [
                'nama_ruangan' => 'required|min:2',
            ]);

            DB::table('tb_ruangans')->insert([
                'kode_ruangan'=>$kode_ruangan,
                'nama_ruangan'=>$request->nama_ruangan
            ]);
            return redirect('dataRuangan')->with('alert-success','Data Berhasil Ditambahkan');
        }
    }


    public function editRuangan($kode_ruangan){

        $tamp = DB::table('tb_ruangans')        
        ->where('kode_ruangan',$kode_ruangan)
        ->get();

        return view('admin.ruangan.adminEditRuangan',compact('tamp'));
    }

    public function updateRuangan(Request $request, $kode_ruangan)
    {
        $ruangan=DB::table('tb_ruangans')->select('kode_ruangan','nama_ruangan')
        ->where('kode_ruangan','=',$request->kode_ruangan)
        ->orwhere('nama_ruangan','=',$request->nama_ruangan)->count();
        if($ruangan > 1){
            return redirect('editRuangan/'.$request->kode_ruangan)->with('alert','Data Sudah Tersedia');
        }
        else{

            $this->validate($request, [
                'nama_ruangan' => 'required',            
            ]);

            DB::table('tb_ruangans')->where('kode_ruangan',$kode_ruangan)->update([            
                'nama_ruangan'=>$request->nama_ruangan,

            ]);
            return redirect('dataRuangan')->with('alert-success','Data Berhasil Diubah');
        }
    }

    public function hapusRuangan($kode_ruangan)
    {
        DB::table('tb_ruangans')->where('kode_ruangan',$kode_ruangan)->delete();
        return redirect('dataRuangan')->with('alert-success','Data Berhasil Dihapus');
    }
}

<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class tahunAkaController extends Controller
{
    public function dataTahunAka(Request $request){ 
        
        $tamp=DB::table('tb_tahun_akas')->orderBy('tahun_aka', 'asc')->get();
        return view('admin.tahunAka.admintahunAka',compact('tamp'));
    }

    public function tambahTahunAka(Request $request){        
        return view('admin.tahunAka.adminTambahTahunAka');
    }

    public function registerTambahTahunAka(Request $request){
        
        $tahun_aka=DB::table('tb_tahun_akas')->select('tahun_aka')
        ->where('tahun_aka','=',$request->tahun_aka)->count();

        $kode =DB::table('tb_tahun_akas')->select('kode_tahunAka')->get();
        $byk =DB::table('tb_tahun_akas')->count();
        $tamp = [];

        foreach($kode as $data){
            $tamp [] = $data->kode_tahunAka;
        }

        if($tahun_aka > 0){
            return redirect('tambahTahunAka')->with('alert','Data Sudah Tersedia');
        }
        else{
            $tahka = $request->tahun_aka;

            if($tahka == '2019-2020'){
                $kode_tahunAka = 19;
            }
            else if($tahka == '2020-2021'){
                $kode_tahunAka = 20;
            }
            else if($tahka == '2021-2022'){
                $kode_tahunAka = 21;
            }
            else if($tahka == '2022-2023'){
                $kode_tahunAka = 22;
            }
            else if($tahka == '2023-2024'){
                $kode_tahunAka = 23;
            }
            else if($tahka == '2024-2025'){
                $kode_tahunAka = 24;
            }
           $this->validate($request, [
                'tahun_aka' => 'required',
                'status' => 'required',
            ]);
           for($a=0 ; $a<$byk; $a++){
                if($kode_tahunAka == $tamp[$a]){
                    return redirect('tambahTahunAka')->with('alert','Data Sudah Tersedia');   
                }
           }
            DB::table('tb_tahun_akas')->insert([ 
                'kode_tahunAka'=>$kode_tahunAka,           
                'tahun_aka'=>$request->tahun_aka,
                'status'=>$request->status,
            ]);
            return redirect('dataTahunAka')->with('alert-success','Data Berhasil Ditambahkan');
        }
    }

    public function editTahunAka($kode_tahunAka){

        $tamp = DB::table('tb_tahun_akas')      
        ->where('kode_tahunAka',$kode_tahunAka)
        ->get();

        return view('admin.tahunAka.adminEditTahunAka',compact('tamp'));
    }

    public function updateTahunAka(Request $request, $kode_tahunAkas)
    {
        $tahun_aka=DB::table('tb_tahun_akas')->select('tahun_aka','kode_tahunAka')
        ->where('kode_tahunAka','=',$request->kode_tahunAka)
        ->orwhere('tahun_aka','=',$request->tahun_aka)
        ->count();
        if($tahun_aka > 1){
            return redirect('editTahunAka/'.$request->kode_tahunAka)->with('alert','Data Sudah Tersedia');
        }
        else{
            
           $tahka = $request->tahun_aka;

            if($tahka == '2019-2020'){
               $kode_tahunAka = 19;
            }
            else if($tahka == '2020-2021'){
               $kode_tahunAka = 20;
            }
            else if($tahka == '2021-2022'){
               $kode_tahunAka = 21;
            }
            else if($tahka == '2022-2023'){
               $kode_tahunAka = 22;
            }
            else if($tahka == '2023-2024'){
               $kode_tahunAka = 23;
            }
            else if($tahka == '2024-2025'){
               $kode_tahunAka = 24;
            }

            $this->validate($request, [            
                'tahun_aka' => 'required',
                'status' => 'required',
            ]);


            DB::table('tb_tahun_akas')->where('kode_tahunAka',$kode_tahunAkas)->update([            
                'kode_tahunAka'=>$kode_tahunAka,
                'tahun_aka'=>$request->tahun_aka,
                'status'=>$request->status,

            ]);
            
            return redirect('dataTahunAka')->with('alert-success','Data Berhasil Diubah');
        }
    }

    public function hapusTahunAka($kode_tahunAka)
    {
        $mhs=DB::table('tb_mhs')->where('fk_kode_tahunAka',$kode_tahunAka)->count();
        $krs=DB::table('tb_krs')->where('fk_kode_tahunAka',$kode_tahunAka)->count();
        $matkul=DB::table('tb_mata_kuliahs')->where('fk_kode_tahunAka',$kode_tahunAka)->count();

        if ($mhs > 0) {
            return redirect('dataTahunAka')->with('alert','Anda Harus Menghapus Data Tahun Akademik Yang Dipilih Mahasiswa Terlebih Dahulu');
        }
        else if ($krs > 0) {
            return redirect('dataTahunAka')->with('alert','Anda Harus Menghapus Data Tahun Akademik Yang Berada di KRS Terlebih Dahulu');
        }
        else if ($matkul > 0) {
            return redirect('dataTahunAka')->with('alert','Anda Harus Menghapus Data Tahun Akademik Yang Berada di Mata Kuliah Terlebih Dahulu');
        }
        else{

            DB::table('tb_tahun_akas')->where('kode_tahunAka',$kode_tahunAka)->delete();
            return redirect('dataTahunAka')->with('alert-success','Data Berhasil Dihapus');
        }
    }
}

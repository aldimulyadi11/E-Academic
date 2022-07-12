<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PDF;
use DB;
use App\tb_dosen;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Propaganistas\LaravelPhone\PhoneNumber;



class dosenController extends Controller
{   
    public function profilDosen($nidn){
        $tamp = DB::table('tb_dosens')->where('nidn',$nidn)->get();
        return view('admin.dosen.profil',compact('tamp'));
    }


    public function cetakNilai(Request $request){

        $session=Session::get('nidn');
        $nilai = DB::table('tb_nilais')->where('fk_nidn',$session)->get();

        return PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('dosen.nilai.cetakNilai',compact('nilai'))->stream();
        
    }
    public function cetakNilaiUts2(Request $request){

        $session=Session::get('nidn');
        $nilai = DB::table('tb_nilais')->where('fk_nidn',$session)->get();
        return PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('dosen.nilai.cetakNilaiUts2',compact('nilai'))->stream();
        
    }

    public function cetakJadwalNgajar(Request $request){
        $session=Session::get('nidn');
        $tamp = DB::table('tb_jadwals')
        ->select('tb_jadwals.*','tb_mata_kuliahs.*','tb_jam_kuliahs.*')                
        ->join('tb_mata_kuliahs','tb_mata_kuliahs.kode_matkul','=','tb_jadwals.fk_kode_matkul')
        ->join('tb_jam_kuliahs','tb_jam_kuliahs.kode_jam','=','tb_jadwals.fk_kode_jam')
        ->where('tb_mata_kuliahs.fk_nidn','=',$session)
        ->get();


        return PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('dosen.jadwal.cetakJadwalNgajar',compact('tamp'))->stream();
        
    }

    public function cetakDosen(Request $request){

        $dosen = DB::table('tb_dosens')->orderBy('nama_dosen', 'asc')->get();

        return PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('admin.dosen.cetakDosen',compact('dosen'))->stream();
        
    }

    public function cetakDosenId($nidn){

        $dosen = DB::table('tb_dosens')->orderBy('nama_dosen', 'asc')->where('nidn',$nidn)->get();
    
        return PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('admin.dosen.cetakDosen',compact('dosen'))->stream();
        
    }


    public function updateNilaiUts(Request $request, $kode_nilai){

        $tamp = DB::table('tb_nilais')->where('kode_nilai',$kode_nilai)->first();        
        $nim  =  $tamp->fk_nim;
        $nidn = $tamp->fk_nidn;
        $mat  = $tamp->fk_kode_matkul;

        $data = DB::table('tb_nilais')
        ->select('tb_nilais.*','tb_mhs.*','tb_tahun_akas.*')
        ->join('tb_mhs','tb_mhs.nim','=','tb_nilais.fk_nim')
        ->join('tb_tahun_akas','tb_tahun_akas.tahun_aka','=','tb_nilais.tahun_aka')
        ->where([
            ['tb_nilais.fk_nim','=',$nim],
            ['tb_nilais.fk_kode_matkul','=',$mat],
            ['tb_nilais.fk_nidn','=',$nidn],
            
        ])->first();
        
        if($data->absen >= 0 && $data->absen <=100 && $data->tugas >= 0 && $data->tugas <=100 &&  $request->uts >= 0 && $request->uts <=100 && $data->uas >= 0 && $data->uas <=100)
        {
            $absen = 10 * $data->absen / 100;
            $tugas = 20 * $data->tugas / 100;
            $uts = 30 * $request->uts / 100;
            $uas = 40 * $data->uas / 100;
            $tamps =  $absen + $tugas + $uts + $uas;

            if($tamps >= 0 && $tamps <=49 ){
                $grade = 'E';
                $ket = 'TIDAK LULUS';
                $bobot = 0;
                $jumlah = $data->sks * $bobot;                    
            }
            else if($tamps >= 50 && $tamps <=59 ){
                $grade = 'D';
                $ket = 'TIDAK LULUS';
                $bobot = 1;
                $jumlah = $data->sks * $bobot;          
            }
            else if($tamps >= 60 && $tamps <=69 ){
                $grade = 'C';
                $ket = 'LULUS';
                $bobot = 2;
                $jumlah = $data->sks * $bobot;        
                
            }
            else if($tamps >= 70 && $tamps <=79 ){
                $grade = 'B';
                $ket = 'LULUS';
                $bobot = 3;
                $jumlah = $data->sks * $bobot;        
                
            }
            else if($tamps >= 80 && $tamps <=100 ){
                $grade = 'A';            
                $ket = 'LULUS';
                $bobot = 4;
                $jumlah = $data->sks * $bobot;        
                
            }
            else{
                return redirect('editNilaiUts/'.$kode_nilai)->with('alert','Inputan Invalid');
            }
            $total_ip = $jumlah / $data->sks;
            DB::table('tb_nilais')->where('kode_nilai',$kode_nilai)->update([
                'nama_mhs'=>$data->nama_mhs,
                'nama_matkul'=>$data->nama_matkul,
                'sks'=>$data->sks,
                'jurusan'=>$data->jurusan,
                'semester'=>$data->semester,
                'tahun_aka'=>$data->tahun_aka,
                'absen'=>$data->absen,
                'tugas'=>$data->tugas,
                'uts'=>$request->uts,
                'uas'=>$data->uas,
                'grade'=>$grade,
                'keterangan'=>$ket,
                'total'=>$tamps,
                'bobot'=>$bobot,
                'jumlah'=>$jumlah,                
                'ip'=>$total_ip,
                'fk_nim'=>$data->fk_nim,
                'fk_nidn'=>$data->fk_nidn,
                'fk_kode_matkul'=>$data->fk_kode_matkul
            ]);
        return redirect('dataNilaiUts')->with('alert-success','Data Berhasil Diubah');
        }
        else{
            return redirect('editNilaiUts/'.$kode_nilai)->with('alert','Inputan Invalid');
        }

    }

    public function updateNilaiUas(Request $request, $kode_nilai){
        $tamp = DB::table('tb_nilais')->where('kode_nilai',$kode_nilai)->first();        
        $nim  =  $tamp->fk_nim;
        $nidn = $tamp->fk_nidn;
        $mat  = $tamp->fk_kode_matkul;

        $nn = DB::table('tb_mhs')
        ->where('nim','=',$nim)
        ->first();
        $sem = $nn ->semester;


        $data = DB::table('tb_nilais')
        ->select('tb_nilais.*','tb_mhs.*','tb_tahun_akas.*')
        ->join('tb_mhs','tb_mhs.nim','=','tb_nilais.fk_nim')
        ->join('tb_tahun_akas','tb_tahun_akas.tahun_aka','=','tb_nilais.tahun_aka')
        ->where([
            ['tb_nilais.fk_nim','=',$nim],
            ['tb_nilais.fk_kode_matkul','=',$mat],
            ['tb_nilais.fk_nidn','=',$nidn],
            
        ])->first();
        if($request->absen >= 0 && $request->absen <=100 && $request->tugas >= 0 && $request->tugas <=100 &&  $request->uts >= 0 && $request->uts <=100 &&$request->uas >= 0 && $request->uas <=100)
        {
            $absen = 10 * $request->absen / 100;
            $tugas = 20 * $request->tugas / 100;
            $uts = 30 * $request->uts / 100;
            $uas = 40 * $request->uas / 100;
            $tamps =  $absen + $tugas + $uts + $uas;

            if($tamps >= 0 && $tamps <=49 ){
                $grade = 'E';
                $ket = 'TIDAK LULUS';
                $bobot = 0;
                $jumlah = $data->sks * $bobot;                    
            }
            else if($tamps >= 50 && $tamps <=59 ){
                $grade = 'D';
                $ket = 'TIDAK LULUS';

                $bobot = 1;
                $jumlah = $data->sks * $bobot;          
            }
            else if($tamps >= 60 && $tamps <=69 ){
                $grade = 'C';
                $ket = 'LULUS';

                $bobot = 2;
                $jumlah = $data->sks * $bobot;        
                
            }
            else if($tamps >= 70 && $tamps <=79 ){
                $grade = 'B';
                $ket = 'LULUS';

                $bobot = 3;
                $jumlah = $data->sks * $bobot;        
                
            }
            else if($tamps >= 80 && $tamps <=100 ){
                $grade = 'A';            
                $ket = 'LULUS';

                $bobot = 4;
                $jumlah = $data->sks * $bobot;        
                
            }
            else{
                return redirect('editNilaiUas/'.$kode_nilai)->with('alert','Inputan Invalid');
            }
            $total_ip = $jumlah / $data->sks;

            DB::table('tb_nilais')->where('kode_nilai',$kode_nilai)->update([
                'nama_mhs'=>$data->nama_mhs,
                'nama_matkul'=>$data->nama_matkul,
                'sks'=>$data->sks,
                'jurusan'=>$data->jurusan,
                'semester'=>$data->semester,
                'tahun_aka'=>$data->tahun_aka,
                'absen'=>$request->absen,
                'tugas'=>$request->tugas,
                'uts'=>$request->uts,
                'uas'=>$request->uas,
                'grade'=>$grade,
                'keterangan'=>$ket,
                'total'=>$tamps,
                'bobot'=>$bobot,
                'jumlah'=>$jumlah,            
                'ip'=>$total_ip,
                'fk_nim'=>$data->fk_nim,
                'fk_nidn'=>$data->fk_nidn,
                'fk_kode_matkul'=>$data->fk_kode_matkul
            ]);
            return redirect('dataNilaiUas')->with('alert-success','Data Berhasil Diubah');
        }
        else{
            return redirect('editNilaiUas/'.$kode_nilai)->with('alert','Inputan Invalid');
        }
    }


    public function editNilaiUts($kode_nilai){
        $session=Session::get('nidn');
        $nilai = DB::table('tb_nilais')
        ->where([
            ['kode_nilai','=',$kode_nilai],
            ['fk_nidn','=',$session],
            
        ])->get();
        return view('dosen.nilai.editNilaiUts',compact('nilai'));

    }
    public function editNilaiUas($kode_nilai){
        $session=Session::get('nidn');
        $nilai = DB::table('tb_nilais')
        ->where([
            ['kode_nilai','=',$kode_nilai],
            ['fk_nidn','=',$session],
            
        ])->get();
        return view('dosen.nilai.editNilaiUas',compact('nilai'));

    }

    public function dataNilaiUts(Request $request){

        $session=Session::get('nidn');
        $nilai = DB::table('tb_nilais')->where('fk_nidn',$session)->get();
        return view('dosen.nilai.dataNilaiUts',compact('nilai'));
    }

    public function dataNilaiUas(Request $request){

        $session=Session::get('nidn');
        $nilai = DB::table('tb_nilais')
        ->where([            
            ['total','>','0'],
            ['fk_nidn',$session],            
        ])->get();
        return view('dosen.nilai.dataNilaiUas',compact('nilai'));
    }


    public function registerTambahNilaiUts(Request $request, $id){
        
        $x = DB::table('tb_krs')->where('id_matkul','=',$id)->get();
        
        foreach($x as $data){
           $nim  =  $data->fk_nim;
           $nidn = $data->fk_nidn;
           $mat  = $data->kode_matkuls;

        }
        $nilai = DB::table('tb_krs')
        ->select('tb_krs.*','tb_mhs.*','tb_tahun_akas.*')
        ->join('tb_mhs','tb_mhs.nim','=','tb_krs.fk_nim')
        ->join('tb_tahun_akas','tb_tahun_akas.kode_tahunAKa','=','tb_krs.fk_kode_tahunAka')
        ->where([
            ['tb_krs.fk_nim','=',$nim],
            ['tb_krs.kode_matkuls','=',$mat],
            ['tb_krs.fk_nidn','=',$nidn],
            
        ])->get();

        foreach($nilai as $data){
            $data->nama_mhs;
            $data->fk_nim;
            $data->fk_nidn;
            $data->kode_matkuls;
            $data->nama_matkul;
            $data->sks;
            $data->jurusan;
            $data->semester;
            $data->tahun_aka;
        }

        $cek = DB::table('tb_nilais')
        ->where([
            ['tb_nilais.fk_nim','=',$data->fk_nim],
            ['tb_nilais.fk_kode_matkul','=',$data->kode_matkuls],
            ['tb_nilais.nama_matkul','=',$data->nama_matkul],
            
        ])->count();

        if($cek == 1){
            return redirect('dosenNilaiUts')->with('alert','Data Nilai Sudah Diinput');   
        }
        else{
                
            if($request->uts >= 0 && $request->uts <=49 ){
                $grade = 'E';                              
            }
            else if($request->uts >= 50 && $request->uts <=59 ){
                $grade = 'D';
            }
            else if($request->uts >= 60 && $request->uts <=69 ){
                $grade = 'C';
            }
            else if($request->uts >= 70 && $request->uts <=79 ){
                $grade = 'B';
            }
            else if($request->uts >= 80 && $request->uts <=100 ){
                $grade = 'A';
            }
            else{
                return redirect('dosenNilaiUts')->with('alert','Inputan Invalid');
            }
            DB::table('tb_nilais')->insert([
                'nama_mhs'=>$data->nama_mhs,
                'nama_matkul'=>$data->nama_matkul,
                'sks'=>$data->sks,
                'jurusan'=>$data->jurusan,
                'semester'=>$data->semester,
                'tahun_aka'=>$data->tahun_aka,
                'absen'=>'0',
                'tugas'=>'0',
                'uts'=>$request->uts,
                'uas'=>'0',
                'grade'=>$grade,
                'keterangan'=>'',
                'total'=>'0',
                'bobot'=>'0',
                'jumlah'=>'0',                
                'ip'=>'0',      
                'fk_nim'=>$data->fk_nim,
                'fk_nidn'=>$data->fk_nidn,
                'fk_kode_matkul'=>$data->kode_matkuls
            ]);
            return redirect('dosenNilaiUts')->with('alert-success','Data Berhasil Ditambahkan');
        }
    }

        public function registerTambahNilaiUas(Request $request, $id){

        $tamp = DB::table('tb_nilais')->where('kode_nilai','=',$id)->first();
        $nim  =  $tamp->fk_nim;
        $nidn = $tamp->fk_nidn;
        $mat  = $tamp->fk_kode_matkul;

        $tamp = DB::table('tb_mhs')
        ->where('nim','=',$nim)
        ->first();
        $sem = $tamp ->semester;
        
        $data = DB::table('tb_nilais')
        ->select('tb_nilais.*','tb_mhs.*','tb_tahun_akas.*')
        ->join('tb_mhs','tb_mhs.nim','=','tb_nilais.fk_nim')
        ->join('tb_tahun_akas','tb_tahun_akas.tahun_aka','=','tb_nilais.tahun_aka')
        ->where([
            ['tb_nilais.fk_nim','=',$nim],
            ['tb_nilais.fk_kode_matkul','=',$mat],
            ['tb_nilais.fk_nidn','=',$nidn],
            
        ])->first();

        $cek = DB::table('tb_nilais')
        ->where([
            ['fk_nim','=',$nim],
            ['fk_kode_matkul','=',$mat],
            ['fk_nidn','=',$nidn],
            ['total','>','0']
            
        ])->count();

        if($cek > 0){
            return redirect('dosenNilaiUas')->with('alert','Data Nilai Sudah Diinput');   
        }
        else{

            if($request->absen >= 0 && $request->absen <=100 && $request->tugas >= 0 && $request->tugas <=100 &&  $request->uts >= 0 && $request->uts <=100 &&$request->uas >= 0 && $request->uas <=100)
            {
                $absen = 10 * $request->absen / 100;
                $tugas = 20 * $request->tugas / 100;
                $uts = 30 * $request->uts / 100;
                $uas = 40 * $request->uas / 100;
                $tamps =  $absen + $tugas + $uts + $uas;

                if($tamps >= 0 && $tamps <=49 ){
                    $grade = 'E';
                    $ket = 'TIDAK LULUS';
                    $bobot = 0;
                    $jumlah = $data->sks * $bobot;                    
                }
                else if($tamps >= 50 && $tamps <=59 ){
                    $grade = 'D';
                    $ket = 'TIDAK LULUS';
                    $bobot = 1;
                    $jumlah = $data->sks * $bobot;          
                }
                else if($tamps >= 60 && $tamps <=69 ){
                    $grade = 'C';
                    $ket = 'LULUS';
                    $bobot = 2;
                    $jumlah = $data->sks * $bobot;        
                    
                }
                else if($tamps >= 70 && $tamps <=79 ){
                    $grade = 'B';
                    $ket = 'LULUS';
                    $bobot = 3;
                    $jumlah = $data->sks * $bobot;        
                    
                }
                else if($tamps >= 80 && $tamps <=100 ){
                    $grade = 'A';            
                    $ket = 'LULUS';
                    $bobot = 4;
                    $jumlah = $data->sks * $bobot;        
                    
                }
                else{
                    return redirect('dosenNilaiUas')->with('alert','Inputan Invalid');
                }

                $tot_ip2 = DB::table('tb_nilais')
                ->where([
                    ['fk_nim','=',$nim],
                ])->sum('ip');

                $total_ip = $jumlah / $data->sks;
                DB::table('tb_nilais')->where('kode_nilai',$id)->update([
                    'nama_mhs'=>$data->nama_mhs,
                    'nama_matkul'=>$data->nama_matkul,
                    'sks'=>$data->sks,
                    'jurusan'=>$data->jurusan,
                    'semester'=>$data->semester,
                    'tahun_aka'=>$data->tahun_aka,
                    'absen'=>$request->absen,
                    'tugas'=>$request->tugas,
                    'uts'=>$request->uts,
                    'uas'=>$request->uas,
                    'grade'=>$grade,
                    'keterangan'=>$ket,
                    'total'=>$tamps,
                    'bobot'=>$bobot,
                    'jumlah'=>$jumlah,                
                    'ip'=>$total_ip,   
                    'fk_nim'=>$data->fk_nim,
                    'fk_nidn'=>$data->fk_nidn,
                    'fk_kode_matkul'=>$data->fk_kode_matkul
                ]);
                return redirect('dosenNilaiUas')->with('alert-success','Data Berhasil Ditambahkan');
            }
            else{
                return redirect('dosenNilaiUas')->with('alert','Inputan Invalid');
            }
        }

    }


    public function dosenNilaiUts(Request $request){

        $session=Session::get('nidn');
       $nilai = DB::table('tb_krs')
        ->select('tb_krs.*','tb_dosens.*','tb_mhs.*')   
        ->join('tb_dosens','tb_dosens.nidn','=','tb_krs.fk_nidn')
        ->join('tb_mhs','tb_mhs.nim','=','tb_krs.fk_nim')        
        ->where('tb_krs.fk_nidn','=',$session)
        ->orderBy('tb_krs.semester', 'asc')
        ->orderBy('tb_krs.nama_matkul', 'asc')
        ->get();
       return view('dosen.nilai.dosenNilaiUts',compact('nilai'));
    }
    public function dosenNilaiUas(Request $request){

        $session=Session::get('nidn');
       $nilai = DB::table('tb_nilais')
        ->select('tb_nilais.*','tb_dosens.*','tb_mhs.*')   
        ->join('tb_dosens','tb_dosens.nidn','=','tb_nilais.fk_nidn')
        ->join('tb_mhs','tb_mhs.nim','=','tb_nilais.fk_nim')        
        ->where('tb_nilais.fk_nidn','=',$session)
        ->orderBy('tb_nilais.semester', 'asc')
        ->orderBy('tb_nilais.nama_matkul', 'asc')
        ->get();

       return view('dosen.nilai.dosenNilaiUas',compact('nilai'));
    }

    public function jadwalDosen(Request $request){

        $session=Session::get('nidn');
        $tamp = DB::table('tb_jadwals')
        ->select('tb_jadwals.*','tb_mata_kuliahs.*','tb_jam_kuliahs.*')                
        ->join('tb_mata_kuliahs','tb_mata_kuliahs.kode_matkul','=','tb_jadwals.fk_kode_matkul')
        ->join('tb_jam_kuliahs','tb_jam_kuliahs.kode_jam','=','tb_jadwals.fk_kode_jam')
        ->orderBy('tb_mata_kuliahs.semester','ASC')
        ->orderBy('tb_mata_kuliahs.nama_matkul','ASC')
        ->where('tb_mata_kuliahs.fk_nidn','=',$session)
        ->get();
       return view('dosen.jadwal.dosenJadwal',compact('tamp'));
    }

    public function dataDosen(Request $request){
        $tamp = DB::table('tb_dosens')->orderBy('nama_dosen', 'asc')->get();

        return view('admin.dosen.adminDosen',compact('tamp'));
    }
    
    public function adminTambahDosen(Request $request){
        return view('admin.dosen.adminTambahDosen');

    }

    public function registerTambahDosen(Request $request){


        $dosen=DB::table('tb_dosens')->select('email','no_hp')
        ->where('email','=',$request->email)
        ->orwhere('no_hp','=',$request->no_hp)->count();
        

        $rek = DB::table('tb_dosens')->where('jabatan','Rektor')->count();
        
        foreach($rektor as $tamp){
            $tamp->jabatan;
        }

        if($dosen > 0){
            return redirect('adminTambahDosen')->with('alert','Data Sudah Tersedia');   

        }
        else if($rek > 0){
            if($request->jabatan == $tamp->jabatan){
                return redirect('adminTambahDosen')->with('alert','Jabatan Rektor Sudah Ada');
            }


        }
        $tamp = DB::table('tb_dosens')->get();
        $byk = DB::table('tb_dosens')->count();

        $ex = [];
        foreach($tamp as $data){
            $ex[] = $data->nidn;
        }

        if($tamp == NULL){
            $date = $request->tgl_lahir;
            $noUrut = (int) substr($tamp, -1, 1);
            $noUrut++;
            $str = '04'.date("dmy",strtotime($date));
            $nidn = $str.sprintf("%02s", $noUrut);
        }
        else{
            $date = $request->tgl_lahir;
            $noUrut = (int) substr($tamp, -1, 1);
            $noUrut++;
            $str = '04'.date("dmy",strtotime($date));
           $nidn = $str.sprintf("%02s", $noUrut);
           $cc = DB::table('tb_dosens')->where('tgl_lahir',$request->tgl_lahir)->max('nidn');
            $x = 0;
            while($x < $byk){
                if($nidn == $ex[$x]){
                    $date = $request->tgl_lahir;
                    $noUrut = (int) substr($cc, -1, 1);
                    $noUrut++;
                    $str = '04'.date("dmy",strtotime($date));
                    $nidn = $str.sprintf("%02s", $noUrut);
                }
                $x++;
            }
        }    
        $this->validate($request, [
            'nama_dosen' => 'required|min:2',
            'email' => 'required|min:4|email|unique:tb_admins|unique:tb_mhs|unique:tb_dosens',
            'alamat' => 'required|min:2',
            'nama_dosen' => 'required|min:2',
            'tempat_lahir' => 'required|min:2',
            'tgl_lahir' => 'required',
            'agama' => 'required',
            'jk' => 'required',
            'goldar' => 'required',
            'pend_akhir' => 'required|min:2',
            'jabatan' => 'required',
            'kawin' => 'required',
            'gelar' => 'required|min:2',
            'no_hp' => 'required|min:10|max:13',

        ]);

        DB::table('tb_dosens')->insert([
            'nidn'=>$nidn,
            'nama_dosen'=>$request->nama_dosen,
            'email'=>$request->email,
            'alamat'=>$request->alamat,
            'tempat_lahir'=>$request->tempat_lahir,
            'tgl_lahir'=>$request->tgl_lahir,
            'agama'=>$request->agama,
            'jk'=>$request->jk,
            'goldar'=>$request->goldar,
            'pend_akhir'=>$request->pend_akhir,
            'jabatan'=>$request->jabatan,
            'kawin'=>$request->kawin,
            'gelar'=>$request->gelar,
            'no_hp'=>$request->no_hp
        ]);
        return redirect('dataDosen')->with('alert-success','Data Berhasil Ditambahkan');
        
    }

    public function editDosen($nidn){

        $fak=DB::table('tb_fakultas')->where('dekan',$nidn)->count();
        $jur=DB::table('tb_jurusans')->where('fk_kode_nidn',$nidn)->count();
        $krs=DB::table('tb_krs')->where('fk_nidn',$nidn)->count();
        $matkul=DB::table('tb_mata_kuliahs')->where('fk_nidn',$nidn)->count();
        $nilai=DB::table('tb_nilais')->where('fk_nidn',$nidn)->count();

        if ($fak > 0) {
            return redirect('dataDosen')->with('alert','Anda Tidak Bisa Mengubah Data Dosen Sedang Digunakan di Fakultas');
        }
        else if ($jur > 0) {
            return redirect('dataDosen')->with('alert','Anda Tidak Bisa Mengubah Data Dosen Sedang Digunakan di Jurusan');
        }
        else if ($krs > 0) {
            return redirect('dataDosen')->with('alert','Anda Tidak Bisa Mengubah Data Dosen Sedang Digunakan di KRS');
        }
        else if ($matkul > 0) {
            return redirect('dataDosen')->with('alert','Anda Tidak Bisa Mengubah Data Dosen Sedang Digunakan di Mata Kuliah');
        }
        else if ($nilai > 0) {
            return redirect('dataDosen')->with('alert','Anda Tidak Bisa Mengubah Data Dosen Sedang Digunakan di penilaian');
        }
        else{

            $tamp = DB::table('tb_dosens')
            ->where('nidn',$nidn)
            ->get();
            return view('admin.dosen.adminEditDosen',compact('tamp'));
        }
    }

    public function updateDosen(Request $request, $kode_nidn)
    {
        
        $rek=DB::table('tb_dosens')->where('jabatan','Rektor')->count();
        $dosen=DB::table('tb_dosens')->select('email','no_hp')
        ->orwhere('email','=',$request->email)
        ->orwhere('no_hp','=',$request->no_hp)
        ->count();

        if($dosen > 1){
            return redirect('editDosen/'.$request->nidn)->with('alert','Data Sudah Tersedia');
        }
        else if($rek > 1){
            return redirect('editDosen/'.$request->nidn)->with('alert','Jabatan Rektor Sudah Ada');
        }


        $tamp = DB::table('tb_dosens')->get();
        $byk = DB::table('tb_dosens')->count();

        $ex = [];
        foreach($tamp as $data){
            $ex[] = $data->nidn;
        }

        $date = $request->tgl_lahir;
        $noUrut = (int) substr($tamp, -1, 1);
        $noUrut++;
        $str = '04'.date("dmy",strtotime($date));
        $nidn = $str.sprintf("%02s", $noUrut);

        $cc = DB::table('tb_dosens')->where('tgl_lahir',$request->tgl_lahir)->max('nidn');
        $x = 0;
        while($x < $byk){
            if($nidn == $ex[$x]){
                $date = $request->tgl_lahir;
                $noUrut = (int) substr($cc, -1, 1);
                $noUrut++;
                $str = '04'.date("dmy",strtotime($date));
                $nidn = $str.sprintf("%02s", $noUrut);
            }
            $x++;
        }


        $this->validate($request, [
            'nama_dosen' => 'required|min:2',
            'email' => 'required|min:4|email|unique:tb_admins|unique:tb_mhs',
            'alamat' => 'required|min:2',
            'nama_dosen' => 'required|min:2',
            'tempat_lahir' => 'required|min:2',
            'tgl_lahir' => 'required',
            'agama' => 'required',
            'jk' => 'required',
            'goldar' => 'required',
            'pend_akhir' => 'required|min:2',
            'jabatan' => 'required',
            'kawin' => 'required',
            'gelar' => 'required|min:2',
            'no_hp' => 'required|min:10|max:13',

        ]);

        DB::table('tb_dosens')->where('nidn',$kode_nidn)->update([
            'nidn'=>$nidn,
            'nama_dosen'=>$request->nama_dosen,
            'email'=>$request->email,
            'alamat'=>$request->alamat,
            'tempat_lahir'=>$request->tempat_lahir,
            'tgl_lahir'=>$request->tgl_lahir,
            'agama'=>$request->agama,
            'jk'=>$request->jk,
            'goldar'=>$request->goldar,
            'pend_akhir'=>$request->pend_akhir,
            'jabatan'=>$request->jabatan,
            'kawin'=>$request->kawin,
            'gelar'=>$request->gelar,
            'no_hp'=>$request->no_hp
        ]);
        return redirect('dataDosen')->with('alert-success','Data Berhasil Diubah');
    }

    public function hapusDosen($nidn)
    {
        $fak=DB::table('tb_fakultas')->where('dekan',$nidn)->count();
        $jur=DB::table('tb_jurusans')->where('fk_kode_nidn',$nidn)->count();
        $krs=DB::table('tb_krs')->where('fk_nidn',$nidn)->count();
        $matkul=DB::table('tb_mata_kuliahs')->where('fk_nidn',$nidn)->count();
        $nilai=DB::table('tb_nilais')->where('fk_nidn',$nidn)->count();

        if ($fak > 0) {
            return redirect('dataDosen')->with('alert','Anda Harus Menghapus Data Dosen di Fakultasnya Terlebih Dahulu');
        }
        else if ($jur > 0) {
            return redirect('dataDosen')->with('alert','Anda Harus Menghapus Data Dosen di Jurusannya Terlebih Dahulu');
        }
        else if ($krs > 0) {
            return redirect('dataDosen')->with('alert','Anda Harus Menghapus Data Dosen di KRS Terlebih Dahulu');
        }
        else if ($matkul > 0) {
            return redirect('dataDosen')->with('alert','Anda Harus Menghapus Data Dosen di Mata Kuliah Terlebih Dahulu');
        }
        else if ($nilai > 0) {
            return redirect('dataDosen')->with('alert','Anda Harus Menghapus Data Dosen di Nilai Terlebih Dahulu');
        }
        else{

            DB::table('tb_dosens')->where('nidn',$nidn)->delete();
            return redirect('dataDosen')->with('alert-success','Data Berhasil Dihapus');
        }
    }
}

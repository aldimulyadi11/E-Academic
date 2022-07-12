<?php

namespace App\Http\Controllers;

use App\tb_admin;
use App\tb_mhs;
use App\tb_dosen;
use App\tb_fakultas;
use App\tb_jurusan;
use App\tb_ruangan;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use DB;


class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        if(!Session::get('login1')){
            return redirect('loginAdmin')->with('alert','Kamu harus login dulu');
        }
        else{

            $count = tb_admin::count();
            $count2 = tb_mhs::count();
            $count3 = tb_dosen::count();
            $count4 = tb_fakultas::count();
            $count5 = tb_jurusan::count();
            $count6 = tb_ruangan::count();
            return view('admin.adminDashboard',compact('count','count2','count3','count4','count5','count6'));
        }
    }

    public function loginAdmin(){
        return view('login.loginAdmin');
    }


    public function loginPost(Request $request){

        $email = $request->email;
        $password = $request->password;

        $data = tb_admin::where('email',$email)->first();
        if($data){ //apakah email tersebut ada atau tidak
            if(Hash::check($password,$data->password)){
                Session::put('nama_admin',$data->nama_admin);                
                Session::put('login1',TRUE);
                return redirect('adminDashboard');
            }
            else{
                return redirect('loginAdmin')->with('alert','Password atau Email, Salah !');
            }
        }
        else{
            return redirect('loginAdmin')->with('alert','Password atau Email, Salah!');
        }
    }


    public function index2(){
        if(!Session::get('login2')){
            return redirect('loginMhs')->with('alert','Kamu harus login dulu');
        }
        else{
            return view('mhs.mhsDashboard');
        }
    }

    public function loginMhs(){
        return view('login.loginMhs');
    }


    public function loginPost2(Request $request){

        $email = $request->email;
        $nim = $request->nim;

        $data = tb_mhs::where('email',$email)->first();
        if($data){ //apakah email tersebut ada atau tidak
            if($nim == $data->nim){
                Session::put('nama_mhs',$data->nama_mhs);
                Session::put('nim',$data->nim);
                Session::put('login2',TRUE);
                return redirect('mhsDashboard');
            }
            else{
                return redirect('loginMhs')->with('alert','Password atau Email, Salah !');
            }
        }
        else{
            return redirect('loginMhs')->with('alert','Password atau Email, Salah!');
        }
    }


    public function index3(){
        if(!Session::get('login3')){
            return redirect('loginDosen')->with('alert','Kamu harus login dulu');
        }
        else{
            return view('dosen.dosenDashboard');
        }
    }

    public function loginDosen(){
        return view('login.loginDosen');
    }


    public function loginPost3(Request $request){

        $email = $request->email;
        $nidn = $request->nidn;

        $data = tb_dosen::where('email',$email)->first();
        if($data){ //apakah email tersebut ada atau tidak
            if($nidn == $data->nidn){
                Session::put('nama_dosen',$data->nama_dosen);
                Session::put('nidn',$data->nidn);
                Session::put('login3',TRUE);
                return redirect('dosenDashboard');
            }
            else{
                return redirect('loginDosen')->with('alert','Password atau Email, Salah !');
            }
        }
        else{
            return redirect('loginDosen')->with('alert','Password atau Email, Salah!');
        }
    }


    public function index4(){
        if(!Session::get('login4')){
            return redirect('loginOrtu')->with('alert','Kamu harus login dulu');
        }
        else{
            return view('ortu.ortuDashboard');
        }
    }

    public function loginOrtu(){
        return view('login.loginOrtu');
    }


    public function loginPost4(Request $request){

        $email = $request->email;
        $nim = $request->nim;

        $data = tb_mhs::where('email',$email)->first();
        if($data){ //apakah email tersebut ada atau tidak
            if($nim == $data->nim){
                Session::put('nama_mhs',$data->nama_mhs);
                Session::put('nim',$data->nim);
                Session::put('login4',TRUE);
                return redirect('ortuDashboard');
            }
            else{
                return redirect('loginOrtu')->with('alert','Password atau Email, Salah !');
            }
        }
        else{
            return redirect('loginOrtu')->with('alert','Password atau Email, Salah!');
        }
    }
}

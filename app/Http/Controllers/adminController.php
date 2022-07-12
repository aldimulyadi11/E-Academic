<?php

namespace App\Http\Controllers;

use DB;

use App\tb_admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;



class adminController extends Controller
{
    public function dataAdmin(Request $request){

        $tamp = DB::table('tb_admins')->get();
        return view('admin.tabel_admin.tabel_admin',compact('tamp'));
    }

    public function settingAdmin(Request $request){

        $tamp = DB::table('tb_settings')->get();
        return view('setting.settingAdmin',compact('tamp'));
    }

    public function settingDosen(Request $request){

        $tamp = DB::table('tb_settings')->get();
        return view('setting.settingDosen',compact('tamp'));
    }

    public function settingMhs(Request $request){

        $tamp = DB::table('tb_settings')->get();
        return view('setting.settingMhs',compact('tamp'));
    }

    public function settingOrtu(Request $request){

        $tamp = DB::table('tb_settings')->get();
        return view('setting.settingOrtu',compact('tamp'));
    }

    public function tambahAdmin(Request $request){
        return view('admin.tabel_admin.tabel_tambah_admin');
    }

    public function editAdmin($kode_admin)
    {
        $tamp = DB::table('tb_admins')
        ->where('kode_admin',$kode_admin)
        ->get();
        return view('admin.tabel_admin.tabel_edit_admin',compact('tamp'));
    }

    public function tambahSettingAdmin(Request $request){
        return view('setting.admin.settingAdminTambah');
    }

    public function editSettingAdmin($id_setting){
        $tamp = DB::table('tb_settings')
        ->where('id_setting',$id_setting)
        ->get();
        return view('setting.admin.settingAdminEdit',compact('tamp'));
    }

    public function registerPost(Request $request){
        

        $this->validate($request, [
            'nama' => 'required|min:2',
            'email' => 'required|min:4|email|unique:tb_admins|unique:tb_mhs|unique:tb_dosens',
            'password' => 'required',
            'confirmation' => 'required|same:password',
        ]);

        $data =  new tb_admin();
        $data->nama_admin = $request->nama;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();
        return redirect('loginAdmin')->with('alert-success','Kamu Berhasil Register');
    }

    public function settingPost(Request $request){
        $this->validate($request, [
            'nama' => 'required|min:2',
            'email' => 'required|min:4|email|unique:tb_admins|unique:tb_mhs|unique:tb_dosens',
            'web' => 'required|min:4',
            'no_telp' => 'required|min:10|max:13',
            'alamat' => 'required|min:2',
        ]);

        DB::table('tb_settings')->insert([
            'nama'=>$request->nama,
            'email'=>$request->email,
            'web'=>$request->web,
            'no_telp'=>$request->no_telp,
            'alamat'=>$request->alamat

        ]);
        return redirect('settingAdmin')->with('alert-success','Data Berhasil Ditambahkan');
    }

    public function updateSettingAdmin(Request $request, $id_setting)
    {

        $this->validate($request, [
            'nama' => 'required|min:2',
            'email' => 'required|min:4|email|unique:tb_admins|unique:tb_mhs|unique:tb_dosens',
            'web' => 'required|min:4',
            'no_telp' => 'required|min:10',
            'alamat' => 'required|min:2',
        ]);

        DB::table('tb_settings')->where('id_setting',$id_setting)->update([
            'nama'=>$request->nama,
            'email'=>$request->email,
            'web'=>$request->web,
            'no_telp'=>$request->no_telp,
            'alamat'=>$request->alamat

         ]);
        return redirect('settingAdmin')->with('alert-success','Data Berhasil Diubah');
    }



    public function updateAdmin(Request $request, $kode_admin)
    {

        $this->validate($request, [
            'nama' => 'required|min:2',
            'email' => 'required|min:4|email|unique:tb_mhs|unique:tb_dosens',
            'password' => 'required',
            'confirmation' => 'required|same:password',
        ]);

        DB::table('tb_admins')->where('kode_admin',$kode_admin)->update([
             'nama_admin'=>$request->nama,
             'email'=>$request->email,
             'password'=> bcrypt($request->password),             
         ]);
        return redirect('dataAdmin')->with('alert-success','Data Berhasil Diubah');
    }


    public function hapusAdmin($kode_admin)
    {   
        $tamp = DB::table('tb_admins')->count();
        if($tamp == 1){
            return redirect('dataAdmin')->with('alert','Admin Tidak Boleh Kosong');
        }
        else{
            DB::table('tb_admins')->where('kode_admin',$kode_admin)->delete();
            return redirect('dataAdmin')->with('alert-success','Data Berhasil Dihapus');
        }
    }

    public function logout(){
        Session::flush();
        return redirect('/')->with('alert','Kamu sudah logout');
    }
}

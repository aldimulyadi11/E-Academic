@extends('layouts.masterAdmin')

@section('content')

  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
                      
  @if(\Session::has('alert'))
    <div class="alert alert-danger">
        <div>{{Session::get('alert')}}</div>
    </div>
@endif


	<div class="pull" role="main">
      <div class="">
        @foreach($mhs as $data)
        <form action="{{ url('/updateMhs/'.$data->nim) }}" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    {{ csrf_field() }}

        <div class="row">
              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit Data Mahasiswa</h2>                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />    

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">NIM <span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input value="{{$data->nim}}" name="nim" type="number" id="first-name" required="required" class="form-control col-md-7 col-xs-12" readonly="">
                    </div>
                  </div>                      

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Mahasiswa <span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input autocomplete="off" value="{{$data->nama_mhs}}" name="nama_mhs" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" autofocus="">
                    </div>
                  </div>  
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tempat Lahir <span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input autocomplete="off" value="{{$data->tempat_lahir}}" name="tempat_lahir" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Lahir <span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input autocomplete="off" value="{{$data->tgl_lahir}}" name="tgl_lahir" type="date" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email <span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input autocomplete="off" value="{{$data->email}}" name="email" type="email" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div> 

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <div id="gender" class="btn-group" data-toggle="buttons">
                        <label data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                          <input type="radio" name="jk" value="Laki-Laki" @if($data->jk=='Laki-Laki') checked @endif> &nbsp; Laki-Laki &nbsp;
                        </label>
                        <label data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                          <input type="radio" name="jk" value="Perempuan" @if($data->jk=='Perempuan') checked @endif> Perempuan
                        </label>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Alamat <span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <textarea autocomplete="off" name="alamat" id="first-name" required="required" class="form-control col-md-7 col-xs-12"> {{$data->alamat}}</textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Asal Sekolah <span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input autocomplete="off" value="{{$data->asal}}" name="asal" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div> 

                  <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No. Telepon <span class="required">*</span>
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input autocomplete="off" value="{{$data->no_hp}}" name="no_hp" type="telp" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Agama <span class="required">*</span> </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <select class="form-control" name="agama">
                      <option @if($data->agama=='Islam') selected @endif> Islam</option>
                      <option @if($data->agama=='Kristen') selected @endif> Kristen</option>
                      <option @if($data->agama=='Buddha') selected @endif> Buddha</option>  
                      <option @if($data->agama=='Hindu') selected @endif> Hindu</option>
                      <option @if($data->agama=='Kong Hu Cu') selected @endif> Kong Hu Cu</option>
                    </select>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Golongan Darah <span class="required">*</span> </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <select class="form-control" name="goldar">
                      <option @if($data->goldar=='A') selected @endif>A</option>
                      <option @if($data->goldar=='B') selected @endif>B</option>  
                      <option @if($data->goldar=='O') selected @endif>O</option>
                      <option @if($data->goldar=='AB') selected @endif>AB</option>                          
                    </select>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Jurusan <span class="required">*</span> </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <select class="form-control" name="jurusan">
                      @foreach($tamp as $data2)
                      <option value="{{$data2->kode_jur}}" @if($data->fk_kode_jur==$data2->kode_jur) selected @endif> {{$data2->nama_jur}} </option>
                      @endforeach
                    </select>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Semester <span class="required">*</span> </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <select class="form-control" name="semester">
                      <option @if($data->semester=='1') selected @endif>1</option>
                      <option @if($data->semester=='2') selected @endif>2</option>  
                      <option @if($data->semester=='3') selected @endif>3</option>
                      <option @if($data->semester=='4') selected @endif>4</option> 
                      <option @if($data->semester=='5') selected @endif>5</option>
                      <option @if($data->semester=='6') selected @endif>6</option>  
                      <option @if($data->semester=='7') selected @endif>7</option>
                      <option @if($data->semester=='8') selected @endif>8</option>                             
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Tahun Akademik <span class="required">*</span> </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <select class="form-control" name="tahun_aka">
                      @foreach($tamp2 as $data3)
                      <option value="{{$data3->kode_tahunAka}}" @if($data->fk_kode_tahunAka==$data3->kode_tahunAka) selected @endif> {{$data3->tahun_aka}} </option>
                      @endforeach                     
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Kelas <span class="required">*</span> </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <select class="form-control" name="kelas">
                      <option @if($data->kelas=='Regular Pagi') selected @endif>Regular Pagi</option>  
                      <option @if($data->kelas=='Regular Sore') selected @endif>Regular Sore</option>
                      <option @if($data->kelas=='Karyawan') selected @endif>Karyawan</option>                             
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Masuk <span class="required">*</span>
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input autocomplete="off" value="{{$data->tgl_masuk}}" name="tgl_masuk" type="date" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
              </div>
            </div>
          </div>




      
          <div class="col-md-6 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Tambah Data Orang Tua</h2>                    
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <br />


                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Ayah <span class="required">*</span>
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input autocomplete="off" value="{{$data->nama_ayah}}" name="nama_ayah" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Pendidikan Terakhir <span class="required">*</span> </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <select class="form-control" name="pend_akhir_ayah">
                      <option @if($data->pend_akhir=='SD') selected @endif>SD</option>  
                      <option @if($data->pend_akhir=='SMP') selected @endif>SMP</option>
                      <option @if($data->pend_akhir=='SMA') selected @endif>SMA</option>
                      <option @if($data->pend_akhir=='D3') selected @endif>D3</option>
                      <option @if($data->pend_akhir=='D4') selected @endif>D4</option>  
                      <option @if($data->pend_akhir=='S1') selected @endif>S1</option>  
                      <option @if($data->pend_akhir=='S2') selected @endif>S2</option>
                      <option @if($data->pend_akhir=='S3') selected @endif>S3</option>
                      <option @if($data->pend_akhir=='Lainnya') selected @endif>Lainnya</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Pekerjaan Ayah<span class="required">*</span> </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <select class="form-control" name="pekerjaan_ayah" >

                      <option @if($data->pekerjaan=='Buruh') selected @endif>Buruh</option>  
                      <option @if($data->pekerjaan=='IRT') selected @endif>IRT</option>
                      <option @if($data->pekerjaan=='Petani') selected @endif>Petani</option>  
                      <option @if($data->pekerjaan=='Guru') selected @endif>Guru</option>  
                      <option @if($data->pekerjaan=='Dosen') selected @endif>Dosen</option>
                      <option @if($data->pekerjaan=='Insinyur') selected @endif>Insinyur</option>
                      <option @if($data->pekerjaan=='Wiraswasta') selected @endif>Wiraswasta</option>
                      <option @if($data->pekerjaan=='Dagang') selected @endif>Dagang</option>  
                      <option @if($data->pekerjaan=='Lainnya') selected @endif>Lainnya</option>
              
                    </select>
                  </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Alamat <span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <textarea autocomplete="off" name="alamat_ayah" id="first-name" required="required" class="form-control col-md-7 col-xs-12">{{$data->alamat2}}</textarea>
                    </div>
                  </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No. Telepon <span class="required">*</span>
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input autocomplete="off" value="{{$data->no_hp2}}" name="no_hp_ayah" type="telp" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Penghasilan Ayah <span class="required">*</span> </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <select class="form-control" name="penghasilan_ayah">

                      <option @if($data->penghasilan=='0 - 500.000') selected @endif>0 - 500.000</option>  
                      <option @if($data->penghasilan=='500.000 - 1.000.000') selected @endif>500.000 - 1.000.000</option>
                      <option @if($data->penghasilan=='1.000.000 - 2.000.0000') selected @endif>1.000.000 - 2.000.0000</option>  
                      <option @if($data->penghasilan=='2.000.000 - 4.000.0000') selected @endif>2.000.000 - 4.000.0000</option>  
                      <option @if($data->penghasilan=='4.000.000 - 6.000.000') selected @endif>4.000.000 - 6.000.000</option>
                      <option @if($data->penghasilan=='6.000.000 - 8.000.000') selected @endif>6.000.000 - 8.000.000</option>
                      <option @if($data->penghasilan=='8.000.000 - 8.000.000') selected @endif>8.000.000 - 8.000.000</option>
                      <option @if($data->penghasilan=='10.000.000 - Keatas') selected @endif>10.000.000 - Keatas</option>  

                    </select>
                  </div>
                </div>
                <br><br>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama ibu <span class="required">*</span>
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input autocomplete="off" value="{{$data->nama_ibu}}" name="nama_ibu" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="form-group"> 
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Pendidikan Terakhir <span class="required">*</span> </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <select class="form-control" name="pend_akhir_ibu">
                      <option @if($data->pend_akhir2=='SD') selected @endif>SD</option>  
                      <option @if($data->pend_akhir2=='SMP') selected @endif>SMP</option>
                      <option @if($data->pend_akhir2=='SMA') selected @endif>SMA</option>
                      <option @if($data->pend_akhir2=='D3') selected @endif>D3</option>
                      <option @if($data->pend_akhir2=='D4') selected @endif>D4</option>  
                      <option @if($data->pend_akhir2=='S1') selected @endif>S1</option>  
                      <option @if($data->pend_akhir2=='S2') selected @endif>S2</option>
                      <option @if($data->pend_akhir2=='S3') selected @endif>S3</option>
                      <option @if($data->pend_akhir2=='Lainnya') selected @endif>Lainnya</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Pekerjaan Ibu<span class="required">*</span> </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <select class="form-control" name="pekerjaan_ibu">
                      <option @if($data->pekerjaan2=='Buruh') selected @endif>Buruh</option>  
                      <option @if($data->pekerjaan2=='IRT') selected @endif>IRT</option>
                      <option @if($data->pekerjaan2=='Petani') selected @endif>Petani</option>  
                      <option @if($data->pekerjaan2=='Guru') selected @endif>Guru</option>  
                      <option @if($data->pekerjaan2=='Dosen') selected @endif>Dosen</option>
                      <option @if($data->pekerjaan2=='Insinyur') selected @endif>Insinyur</option>
                      <option @if($data->pekerjaan2=='Wiraswasta') selected @endif>Wiraswasta</option>
                      <option @if($data->pekerjaan2=='Dagang') selected @endif>Dagang</option>  
                      <option @if($data->pekerjaan2=='Lainnya') selected @endif>Lainnya</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Alamat <span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <textarea autocomplete="off" name="alamat_ibu" id="first-name" required="required" class="form-control col-md-7 col-xs-12"> {{$data->alamat3}}</textarea>
                    </div>
                  </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No. Telepon <span class="required">*</span>
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input autocomplete="off" value="{{$data->no_hp3}}" name="no_hp_ibu" type="telp" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Penghasilan Ibu <span class="required">*</span> </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <select class="form-control" name="penghasilan_ibu">
                      <option @if($data->penghasilan2=='0 - 500.000') selected @endif>0 - 500.000</option>  
                      <option @if($data->penghasilan2=='500.000 - 1.000.000') selected @endif>500.000 - 1.000.000</option>
                      <option @if($data->penghasilan2=='1.000.000 - 2.000.0000') selected @endif>1.000.000 - 2.000.0000</option>  
                      <option @if($data->penghasilan2=='2.000.000 - 4.000.0000') selected @endif>2.000.000 - 4.000.0000</option>  
                      <option @if($data->penghasilan2=='4.000.000 - 6.000.000') selected @endif>4.000.000 - 6.000.000</option>
                      <option @if($data->penghasilan2=='6.000.000 - 8.000.000') selected @endif>6.000.000 - 8.000.000</option>
                      <option @if($data->penghasilan2=='8.000.000 - 8.000.000') selected @endif>8.000.000 - 8.000.000</option>
                      <option @if($data->penghasilan2=='10.000.000 - Keatas') selected @endif>10.000.000 - Keatas</option>    
                    </select>
                  </div>
                </div>

            
                
                <br><br><br><br><br>


            </div>
          </div>
        </div>
      </div>


        <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
              <button type="reset" class="btn btn-danger">Reset</button>
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </div>

      </form>
      @endforeach
      </div>
    </div>

@endsection
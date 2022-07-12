@extends('layouts.masterAdmin')

@section('content')

      @if(\Session::has('alert'))
          <div class="alert alert-danger">
              <div>{{Session::get('alert')}}</div>
          </div>
      @endif

      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif


    <div class="pull" role="main">
      <div class="">
        <form action="{{ url('/registerTambahMhs') }}" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
        {{ csrf_field() }}

        <div class="row">
              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tambah Data Mahasiswa</h2>                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />

              <!--   
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">NIM <span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input autocomplete="off" name="nim" type="number" id="first-name" required="required" class="form-control col-md-7 col-xs-12" autofocus="">
                    </div>
                  </div>       -->                

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Mahasiswa <span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input autocomplete="off" name="nama_mhs" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>  
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tempat Lahir <span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input autocomplete="off" name="tempat_lahir" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Lahir <span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input autocomplete="off" name="tgl_lahir" type="date" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email <span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input autocomplete="off" name="email" type="email" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div> 

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <div id="gender" class="btn-group" data-toggle="buttons">
                        <label data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                          <input type="radio" name="jk" value="Laki-Laki" checked=""> &nbsp; Laki-Laki &nbsp;
                        </label>
                        <label data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                          <input type="radio" name="jk" value="Perempuan"> Perempuan
                        </label>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Alamat <span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <textarea autocomplete="off" name="alamat" id="first-name" required="required" class="form-control col-md-7 col-xs-12"></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Asal Sekolah <span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input autocomplete="off" name="asal" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div> 

                  <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No. Telepon <span class="required">*</span>
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input autocomplete="off" name="no_hp" type="telp" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Agama <span class="required">*</span> </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <select class="form-control" name="agama">
                      <option>Islam</option>
                      <option>Kristen</option>
                      <option>Budha</option>                              
                      <option>Hindu</option>
                      <option>Kong Hu Cu</option>
                    </select>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Golongan Darah <span class="required">*</span> </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <select class="form-control" name="goldar">
                      <option>A</option>
                      <option>B</option>
                      <option>O</option>                              
                      <option>AB</option>                            
                    </select>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Jurusan <span class="required">*</span> </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <select class="form-control" name="jurusan">
                      @foreach($tamp as $data)
                      <option value="{{$data->kode_jur}}">{{$data->nama_jur}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Semester <span class="required">*</span> </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <select class="form-control" name="semester">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>                              
                      <option>4</option>
                      <option>5</option>
                      <option>6</option>
                      <option>7</option>                              
                      <option>8</option>                            
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Tahun Akademik <span class="required">*</span> </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <select class="form-control" name="tahun_aka">
                      @foreach($tamp2 as $data2)
                      <option value="{{$data2->kode_tahunAka}}">{{$data2->tahun_aka}}</option>
                      @endforeach                     
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Kelas <span class="required">*</span> </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <select class="form-control" name="kelas">
                      <option>Regular Pagi</option>
                      <option>Regular Sore</option>
                      <option>Karyawan</option>                           
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Masuk <span class="required">*</span>
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input autocomplete="off" name="tgl_masuk" type="date" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
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
                    <input autocomplete="off" name="nama_ayah" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Pendidikan Terakhir <span class="required">*</span> </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <select class="form-control" name="pend_akhir_ayah">
                      <option>SD</option>
                      <option>SMP</option>
                      <option>SMA</option> 
                      <option>D1</option>
                      <option>D3</option>
                      <option>D4</option>
                      <option>S1</option>                             
                      <option>S2</option>
                      <option>S3</option>
                      <option>Lainya</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Pekerjaan Ayah<span class="required">*</span> </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <select class="form-control" name="pekerjaan_ayah">
                      <option>Buruh</option>
                      <option>IRT</option>
                      <option>Petani</option>
                      <option>Guru</option> 
                      <option>Dosen</option>
                      <option>Insinyur</option>
                      <option>Wiraswasta</option>
                      <option>Dagang</option>                             
                      <option>Lainnya</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Alamat <span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <textarea autocomplete="off" name="alamat_ayah" id="first-name" required="required" class="form-control col-md-7 col-xs-12"></textarea>
                    </div>
                  </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No. Telepon <span class="required">*</span>
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input autocomplete="off" name="no_hp_ayah" type="telp" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Penghasilan Ayah <span class="required">*</span> </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <select class="form-control" name="penghasilan_ayah">
                      <option>0 - 500.000</option>
                      <option>500.000 - 1.000.000</option>
                      <option>1.000.000 - 2.000.0000</option> 
                      <option>2.000.000 - 4.000.0000</option>
                      <option>4.000.000 - 6.000.000</option>
                      <option>6.000.000 - 8.000.000</option>
                      <option>8.000.000 - 8.000.000</option>                             
                      <option>10.000.000 - Keatas</option>   
                    </select>
                  </div>
                </div>
                <br><br>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama ibu <span class="required">*</span>
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input autocomplete="off" name="nama_ibu" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Pendidikan Terakhir <span class="required">*</span> </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <select class="form-control" name="pend_akhir_ibu">
                      <option>SD</option>
                      <option>SMP</option>
                      <option>SMA</option> 
                      <option>D1</option>
                      <option>D3</option>
                      <option>D4</option>
                      <option>S1</option>                             
                      <option>S2</option>
                      <option>S3</option>
                      <option>Lainya</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Pekerjaan Ibu<span class="required">*</span> </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <select class="form-control" name="pekerjaan_ibu">
                      <option>Buruh</option>
                      <option>IRT</option>
                      <option>Petani</option>
                      <option>Guru</option> 
                      <option>Dosen</option>
                      <option>Insinyur</option>
                      <option>Wiraswasta</option>
                      <option>Dagang</option>                             
                      <option>Lainnya</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Alamat <span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <textarea autocomplete="off" name="alamat_ibu" id="first-name" required="required" class="form-control col-md-7 col-xs-12"></textarea>
                    </div>
                  </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No. Telepon <span class="required">*</span>
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input autocomplete="off" name="no_hp_ibu" type="telp" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Penghasilan Ibu <span class="required">*</span> </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <select class="form-control" name="penghasilan_ibu">
                      <option>0 - 500.000</option>
                      <option>500.000 - 1.000.000</option>
                      <option>1.000.000 - 2.000.0000</option> 
                      <option>2.000.000 - 4.000.0000</option>
                      <option>4.000.000 - 6.000.000</option>
                      <option>6.000.000 - 8.000.000</option>
                      <option>8.000.000 - 8.000.000</option>                             
                      <option>10.000.000 - Keatas</option>   
                    </select>
                  </div>
                </div>
                <br><br><br>


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
      </div>
    </div>
@endsection
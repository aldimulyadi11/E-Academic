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
        <form action="{{ url('/registerTambahDosen') }}" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
        {{ csrf_field() }}

        <div class="row">
              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tambah Data Dosen</h2>                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />                 

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Dosen <span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input autocomplete="off" name="nama_dosen" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="{{old('nama_dosen')}}">
                    </div>
                  </div>  
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tempat Lahir <span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input autocomplete="off" name="tempat_lahir" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="{{old('tempat_lahir')}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Lahir <span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input autocomplete="off" name="tgl_lahir" type="date" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="{{old('tgl_lahir')}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email <span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input autocomplete="off" name="email" type="email" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="{{old('email')}}">
                    </div>
                  </div> 

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin<span class="required">*</span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <div id="gender" class="btn-group" data-toggle="buttons">
                        <label data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                          <input autocomplete="off" type="radio" name="jk" value="Laki-Laki" value="{{old('jk')}}" checked="" > &nbsp; Laki-Laki &nbsp;
                        </label>
                        <label data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                          <input autocomplete="off" type="radio" name="jk" value="Perempuan" value="{{old('jk')}}"> Perempuan
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Alamat <span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <textarea autocomplete="off" name="alamat" id="first-name" required="required" class="form-control col-md-7 col-xs-12">{{old('alamat')}}</textarea>
                    </div>
                  </div>
                  <br>

              </div>
            </div>
          </div>




          <div class="col-md-6 col-xs-12">
              <div class="x_panel">
                                 
                  <div class="clearfix"></div>
                
                <div class="x_content">
                <br><br><br>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No. Telepon <span class="required">*</span>
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input autocomplete="off" name="no_hp" type="telp" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="{{old('no_hp')}}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Agama <span class="required">*</span> </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <select class="form-control" name="agama">
                      <option {{old('agama') == 'Islam' ? 'selected' : ''}}>Islam</option>
                      <option {{old('agama') == 'Kristen' ? 'selected' : ''}}>Kristen</option>
                      <option {{old('agama') == 'Budha' ? 'selected' : ''}}>Budha</option>                              
                      <option {{old('agama') == 'Hindu' ? 'selected' : ''}}>Hindu</option>
                      <option {{old('agama') == 'Kong Hu Cu' ? 'selected' : ''}}>Kong Hu Cu</option>
                    </select>
                  </div>
                </div>
                

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Status Perkawinan<span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <div id="gender" class="btn-group" data-toggle="buttons">
                      <label data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                        <input autocomplete="off" type="radio" name="kawin" value="Kawin" checked=""> &nbsp; Kawin &nbsp;
                      </label>
                      <label data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                        <input autocomplete="off" type="radio" name="kawin" value="Belum Kawin"> Belum Kawin
                      </label>
                    </div>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Golongan Darah <span class="required">*</span> </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <select class="form-control" name="goldar">
                      <option {{old('tahun_aka') == 'A' ? 'selected' : ''}}>A</option>
                      <option {{old('tahun_aka') == 'B' ? 'selected' : ''}}>B</option>
                      <option {{old('tahun_aka') == 'O' ? 'selected' : ''}}>O</option>                              
                      <option {{old('tahun_aka') == 'AB' ? 'selected' : ''}}>AB</option>                            
                    </select>
                  </div>
                </div>
                 <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Pendidikan Terakhir <span class="required">*</span> </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <select class="form-control" name="pend_akhir">
                      <option {{old('tahun_aka') == 'SD' ? 'selected' : ''}}>SD</option>
                      <option {{old('tahun_aka') == 'SMP' ? 'selected' : ''}}>SMP</option>
                      <option {{old('tahun_aka') == 'SMA' ? 'selected' : ''}}>SMA</option> 
                      <option {{old('tahun_aka') == 'D1' ? 'selected' : ''}}>D1</option>
                      <option {{old('tahun_aka') == 'D3' ? 'selected' : ''}}>D3</option>
                      <option {{old('tahun_aka') == 'D4' ? 'selected' : ''}}>D4</option>
                      <option {{old('tahun_aka') == 'S1' ? 'selected' : ''}}>S1</option>                             
                      <option {{old('tahun_aka') == 'S2' ? 'selected' : ''}}>S2</option>
                      <option {{old('tahun_aka') == 'S3' ? 'selected' : ''}}>S3</option>                      
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Jabatan <span class="required">*</span> </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <select class="form-control" name="jabatan">
                      <option {{old('tahun_aka') == 'Rektor' ? 'selected' : ''}}>Rektor</option>
                      <option {{old('tahun_aka') == 'Wakil Rekor 1' ? 'selected' : ''}}>Wakil Rekor 1</option>
                      <option {{old('tahun_aka') == 'Wakil Rekor 2' ? 'selected' : ''}}>Wakil Rekor 2</option>
                      <option {{old('tahun_aka') == 'Wakil Rekor 3' ? 'selected' : ''}}>Wakil Rekor 3</option>
                      <option {{old('tahun_aka') == 'Dekan' ? 'selected' : ''}}>Dekan</option>
                      <option {{old('tahun_aka') == 'Ketua Jurusan' ? 'selected' : ''}}>Ketua Jurusan</option>
                      <option {{old('tahun_aka') == 'Dosen' ? 'selected' : ''}}>Dosen</option>                            
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Gelar <span class="required">*</span>
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input autocomplete="off" name="gelar" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="{{old('gelar')}}">
                  </div>
                </div> 
                <br>


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
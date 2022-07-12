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
        @foreach($tamp as $data)
        <form action="{{ url('updateDosen/'.$data->nidn) }}" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
              {{ csrf_field() }}

        <div class="row">
              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit Data Dosen</h2>                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />

                
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">NIDN <span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input autocomplete="off" value="{{$data->nidn}}" name="nidn" type="number" id="first-name" required="required" class="form-control col-md-7 col-xs-12" readonly="">
                    </div>
                  </div>                      

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Dosen <span class="required">*</span>
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input autocomplete="off" value="{{$data->nama_dosen}}" autofocus="" name="nama_dosen" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
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
                  <div class="col-md-7 col-sm-7 col-xs-12">
                    <textarea name="alamat" id="first-name" required="required" class="form-control col-md-7 col-xs-12"> {{$data->alamat}} </textarea>
                  </div>
                </div>

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
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Status Perkawinan<span class="required">*</span></label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <div id="gender" class="btn-group" data-toggle="buttons">
                      <label data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                        <input type="radio" name="kawin" value="Kawin" @if($data->kawin=='Kawin') checked @endif> &nbsp; Kawin &nbsp;
                      </label>
                      <label data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                        <input type="radio" name="kawin" value="Belum Kawin" @if($data->kawin=='Belum Kawin') checked @endif> Belum Kawin
                      </label>
                    </div>
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
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Pendidikan Terakhir <span class="required">*</span> </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <select class="form-control" name="pend_akhir">
                      <option @if($data->pend_akhir=='SD') selected @endif>SD</option>  
                      <option @if($data->pend_akhir=='SMP') selected @endif>SMP</option>
                      <option @if($data->pend_akhir=='SMA') selected @endif>SMA</option>
                      <option @if($data->pend_akhir=='D3') selected @endif>D3</option>
                      <option @if($data->pend_akhir=='D4') selected @endif>D4</option>  
                      <option @if($data->pend_akhir=='S1') selected @endif>S1</option>  
                      <option @if($data->pend_akhir=='S2') selected @endif>S2</option>
                      <option @if($data->pend_akhir=='S3') selected @endif>S3</option>
                      
                    </select>
                  </div>
                </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Jabatan <span class="required">*</span> </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <select class="form-control" name="jabatan">

                      <option @if($data->jabatan=='Rektor') selected @endif>Rektor</option>  
                      <option @if($data->jabatan=='Wakil Rekor 1') selected @endif>Wakil Rekor 1</option>
                      <option @if($data->jabatan=='Wakil Rekor 2') selected @endif>Wakil Rekor 2</option>
                      <option @if($data->jabatan=='Wakil Rekor 3') selected @endif>Wakil Rekor 3</option>
                      <option @if($data->jabatan=='Dekan') selected @endif>Dekan</option>
                      <option @if($data->jabatan=='Ketua Jurusan') selected @endif>Ketua Jurusan</option>  
                      <option @if($data->jabatan=='Dosen') selected @endif>Dosen</option>                              
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Gelar <span class="required">*</span>
                  </label>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input autocomplete="off" value="{{$data->gelar}}" name="gelar" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
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
      @endforeach
      </div>
    </div>

@endsection
@extends('layouts.masterAdmin')

@section('content')
	<div class="pull" role="main">
          <div class="">            
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit Mata Kuliah</h2>                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />

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

                    @foreach($tamp as $data)

                    <form action="{{ url('updateMatkul/'.$data->kode_matkul) }}" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    {{ csrf_field() }}

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kode Mata Kuliah<span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                          <input value="{{$data->kode_matkul}}" name="kode_matkul" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" readonly="" >
                        </div>
                      </div>                      

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Mata Kuliah<span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                          <input autocomplete="off" value="{{$data->nama_matkul}}" name="nama_matkul" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" autofocus="">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">SKS<span class="required">*</span> </label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                          <select class="form-control" name="sks">
                            <option>2</option>
                            <option>3</option>                            
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Kategori<span class="required">*</span> </label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                          <select class="form-control" name="kategori">
                            <option>Wajib</option>
                            <option>Pilihan</option>                                                        
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jurusan <span class="required">*</span> </label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                          <select class="form-control" name="jurusan">                      
                            @foreach($tamp2 as $data2)
                              <option @if($data->jurusan==$data2->nama_jur) selected @endif> {{$data2->nama_jur}}</option>
                            @endforeach

                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Semester <span class="required">*</span> </label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
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
                      <div class="col-md-7 col-sm-7 col-xs-12">
                        <select class="form-control" name="tahun_aka">
                          @foreach($tamp3 as $data3)
                          <option value="{{$data3->kode_tahunAka}}">{{$data3->tahun_aka}}</option>
                          @endforeach                     
                        </select>
                      </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Dosen Pengajar<span class="required">*</span> </label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                          <select class="form-control" name="dosen">
                            @foreach($tamp4 as $data4)
                              <option value="{{$data4->nidn}}" @if($data->fk_nidn==$data4->nidn) selected @endif> {{$data4->nama_dosen}}.,{{$data4->gelar}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          
                          <button class="btn btn-danger" type="reset">Reset</button>
                          <button class="btn btn-success" type="submit">Submit</button>
                        </div>
                      </div>

                    </form>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


@endsection
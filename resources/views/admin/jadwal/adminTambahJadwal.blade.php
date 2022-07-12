@extends('layouts.masterAdmin')

@section('content')
	<div class="pull" role="main">
          <div class="">            
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tambah Jadwal Kuliah</h2>                    
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

                    

                     <form action="{{ url('/registerTambahJadwal') }}" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    {{ csrf_field() }}                   

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Hari <span class="required">*</span> </label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                          <select class="form-control" name="hari">
                            <option>Senin</option>
                            <option>Selasa</option>                            
                            <option>Rabu</option>
                            <option>Kamis</option>  
                            <option>Jumat</option>
                            <option>Sabtu</option> 
                            
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Waktu <span class="required">*</span> </label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                          <select class="form-control" name="waktu">
                            @foreach($tamp5 as $data5)
                              <option value="{{$data5->kode_jam}}">{{$data5->waktu}}</option>
                            @endforeach 
                          </select>
                        </div>
                      </div>

                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Mata Kuliah  <span class="required">*</span> </label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                          <select class="form-control" name="matkul">
                            @foreach($tamp2 as $data2)
                              <option value="{{$data2->kode_matkul}}">{{$data2->nama_matkul}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Ruangan <span class="required">*</span> </label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                          <select class="form-control" name="ruangan">
                            @foreach($tamp4 as $data4)
                              <option >{{$data4->nama_ruangan}}</option>
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
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection
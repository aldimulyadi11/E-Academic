@extends('layouts.masterMhs')

@section('content')
  <div class="pull" role="main">
          <div class="">            
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">


                  @if(\Session::has('alert'))
                      <div class="alert alert-danger">
                          <div>{{Session::get('alert')}}</div>
                      </div>
                  @endif
                  
                  @if(\Session::has('alert-success'))
                      <div class="alert alert-success">
                          <div>{{Session::get('alert-success')}}</div>
                      </div>
                  @endif


                    <h2>Profile Mahasiwa</h2>                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                    @foreach($tamp as $data)
                      <img src="/asset/production/images/mhs.png" alt="" width="200" height="200" style="position: relative;left:40%">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">NIm <span class="required" >*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                          <input type="text" id="first-name" readonly="" class="form-control col-md-7 col-xs-12" value="{{$data->nim}}">
                        </div>
                      </div>                      

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama<span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                          <input type="email" id="first-name" readonly="" class="form-control col-md-7 col-xs-12 "value="{{$data->nama_mhs}}">
                        </div>
                      </div>  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                          <input type="text" id="first-name" readonly="" class="form-control col-md-7 col-xs-12" value="{{$data->email}}">
                        </div>
                      </div>  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jurusan <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                          <input type="text" id="first-name" readonly="" class="form-control col-md-7 col-xs-1 2"value="{{$data->nama_jur}}">
                        </div>
                      </div>  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Semester <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                          <input type="text" id="first-name" readonly="" class="form-control col-md-7 col-xs-12" value="{{$data->semester}}">
                        </div>
                      </div> 
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tahun Akamdekik <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                          <input type="text" id="first-name" readonly="" class="form-control col-md-7 col-xs-12" value="{{$data->tahun_aka}}">
                        </div>
                      </div> 

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No. HP <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                          <input type="text" id="first-name" readonly="" class="form-control col-md-7 col-xs-12" value="{{$data->no_hp}}">
                        </div>
                      </div> 
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Lahir <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                          <input type="text" id="first-name" readonly="" class="form-control col-md-7 col-xs-12" value="{{$data->tgl_lahir}}">
                        </div>
                      </div> 

                      <div class="ln_solid"></div>
                    @endforeach
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection
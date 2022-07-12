@extends('layouts.masterAdmin')

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


                    <h2>Tentang Aplikasi</h2>                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <img src="/asset/production/images/logo2.png" width="200" height="200" style="margin-left:37%;">
                    <br><br><br>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                      {{ csrf_field() }}
                      
                    @foreach($tamp as $data)
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Universitas <span class="required" >*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                          <input type="text" id="first-name" readonly="" class="form-control col-md-7 col-xs-12" value="{{$data->nama}}">
                        </div>
                      </div>                      

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email<span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                          <input type="email" id="first-name" readonly="" class="form-control col-md-7 col-xs-12 "value="{{$data->email}}">
                        </div>
                      </div>  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Web <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                          <input type="text" id="first-name" readonly="" class="form-control col-md-7 col-xs-12" value="{{$data->web}}">
                        </div>
                      </div>  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No. Telpon <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                          <input type="number" id="first-name" readonly="" class="form-control col-md-7 col-xs-1 2"value="{{$data->no_telp}}">
                        </div>
                      </div>  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Alamat <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                          <input type="text" id="first-name" readonly="" class="form-control col-md-7 col-xs-12" value="{{$data->alamat}}">
                        </div>
                      </div>  
                      <div class="ln_solid"></div>


                      <div class="form-group" >
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">   
                          <!-- <a href="{{'tambahSettingAdmin'}}" type="submit" class="btn btn-success" >Input Data Baru</a>   -->                     
                          <a href="{{'editSettingAdmin/'.$data->id_setting}}" type="submit" class="btn btn-success" >Ubah Data</a>
                        </div>
                      </div>

                    @endforeach
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection
@extends('layouts.masterAdmin')

@section('content')
	<div class="pull" role="main">
          <div class="">            
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit Data Jurusan</h2>                    
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

                    <form action="{{ url('/updateJurusan/'.$data->kode_jur) }}" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    {{ csrf_field() }}

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kode Jurusan <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                          <input name="kode_jur" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="{{$data->kode_jur}}" readonly="">
                        </div>
                      </div>          


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Fakultas <span class="required">*</span> </label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                          <select class="form-control" name="nama_fak">                               
                                @foreach($tamp3 as $data3)
                                  <option @if($data3->kode_fakultas == $data->fk_kode_fak) selected @endif value="{{$data3->kode_fakultas}}">{{$data3->nama_fakultas}}
                                  </option>
                                @endforeach
                          </select>
                        </div>
                      </div>                    

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Jurusan <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                          <input name="nama_jur" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="{{$data->nama_jur}}">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Ketua Jurusan <span class="required">*</span> </label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                          <select class="form-control" name="ketua_jur">
                            @foreach($tamp2 as $data2)
                              <!--  -->

                              <option @if($data2->nidn == $data->fk_kode_nidn) selected @endif value="{{$data2->nidn}}">{{$data2->nama_dosen}} .,{{$data2->gelar}}</option>
                            @endforeach
                          </select>

                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenjang <span class="required">*</span> </label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                          <select class="form-control" name="jenjang">
                            <option>D3</option>
                            <option>S1</option>
                          </select>
                        </div>
                      </div>

                      

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						              <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success">Submit</button>
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
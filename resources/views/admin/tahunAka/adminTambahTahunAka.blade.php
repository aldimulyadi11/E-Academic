@extends('layouts.masterAdmin')

@section('content')
	<div class="pull" role="main">
          <div class="">            
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tambah Data Tahun Akademik</h2>                    
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
                    
                    <form action="{{ url('/registerTambahTahunAka') }}" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    {{ csrf_field() }}

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tahun Akademik <span class="required">*</span> </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select class="form-control" name="tahun_aka" autofocus="">
                            <option {{old('tahun_aka') == '2019-2020' ? 'selected' : ''}} >2019-2020</option>
                            <option {{old('tahun_aka') == '2020-2021' ? 'selected' : ''}} >2020-2021</option>
                            <option {{old('tahun_aka') == '2021-2022' ? 'selected' : ''}} >2021-2022</option>
                            <option {{old('tahun_aka') == '2022-2023' ? 'selected' : ''}} >2022-2023</option> 
                            <option {{old('tahun_aka') == '2023-2024' ? 'selected' : ''}} >2023-2024</option>
                            <option {{old('tahun_aka') == '2024-2025' ? 'selected' : ''}} >2024-2025</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status <span class="required">*</span> </label>
                        <div class="col-md-7 col-sm-7 col-xs-12">
                          <select class="form-control" name="status">
                            <option value="Aktif" {{old('status') == 'Aktif' ? 'selected' : ''}}>Aktif</option>
                            <option value="Tidak Aktif" {{old('status') == 'Tidak Aktif' ? 'selected' : ''}}>Tidak Aktif</option>
                                                        
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
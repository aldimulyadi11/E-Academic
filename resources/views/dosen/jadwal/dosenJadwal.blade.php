@extends('layouts.masterDosen')

@section('content')
	<div class="pull" role="main">
          <div class="">            
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Jadwal Mengajar</h2>    
                    <br><br>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                  <a target="_blank" href="{{'cetakJadwalNgajar'}}" class="btn btn-success"><i class="fa fa-print"></i> Cetak</a>
                  <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                  
                  <div class="x_content">
                    <table id="datatable"  class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th style="text-align: center;">No</th>
                          <th style="text-align: center;">Jam</th>
                          <th style="text-align: center;">Hari</th>
                          <th style="text-align: center;">Mata Kuliah</th>
                          <th style="text-align: center;">Ruangan</th>
                          <th style="text-align: center;">Jurusan</th>
                          <th style="text-align: center;">Semester</th>                          
                        </tr>
                      </thead>


                      <tbody style="text-align: center;">
                      @php $i = 1 @endphp
                      @foreach($tamp as $data)                        
                        <tr>
                          <td>{{$i++}}</td>
                          <td>{{$data -> waktu}}</td>
                          <td>{{$data -> hari}}</td>
                          <td>{{$data -> nama_matkul}}</td>
                          <td>{{$data -> ruangan}}</td>
                          <td>{{$data -> jurusan}}</td>
                          <td>{{$data -> semester}}</td>
                          
                                                 
                        </tr>
                      @endforeach
                      </tbody>

                      <tfoot>
                        <tr>
                          <th style="text-align: center;">No</th>
                          <th style="text-align: center;">Jam</th>
                          <th style="text-align: center;">Hari</th>
                          <th style="text-align: center;">Mata Kuliah</th>
                          <th style="text-align: center;">Ruangan</th>
                          <th style="text-align: center;">Jurusan</th>
                          <th style="text-align: center;">Semester</th>                          
                        </tr>
                      </tfoot>

                    </table>
                  </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


@endsection
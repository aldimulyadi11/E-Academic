@extends('layouts.masterAdmin')

@section('content')
	<div class="pull"  role="main">
      <div class="">
          <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tahun Akademik</h2>
                    <div class="clearfix"></div>
                  </div>


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

                  <div class="x_content">
                    <a href="{{'tambahTahunAka'}}" class="btn btn-info"> Input Data Baru</a>
                    <br><br>
                    <table id="datatable"  class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th style="text-align: center;">No</th>
                          <th style="text-align: center;">Kode Tahun Akademik</th>
                          <th style="text-align: center;">Tahun Akademik</th>
                          <th style="text-align: center;">Status</th>
                          <th style="text-align: center;">Aksi</th>
                        </tr>
                      </thead>


                      <tbody style="text-align: center;"> 
                      @php $i = 1 @endphp
                      @foreach($tamp as $data)                       
                        <tr>
                          <td>{{$i++}}</td>
                          <td>{{ $data -> kode_tahunAka }}</td>
                          <td>{{ $data -> tahun_aka }}</td>
                          <td>{{ $data -> status }}</td> 
                          <td align="center">

                            <div class="col-md-offset">
                              <a class="btn btn-danger" href="{{'editTahunAka/'.$data->kode_tahunAka}}"><i class="glyphicon glyphicon-pencil"></i></a>
                              <a class="btn btn-primary" href="{{'hapusTahunAka/'.$data->kode_tahunAka}}"><i class="glyphicon glyphicon-trash"></i></a>
                              </td>
                        </tr>
                      @endforeach
                      </tbody>

                      <tfoot>
                        <tr>
                          <th style="text-align: center;">No</th>
                          <th style="text-align: center;">Kode Tahun Akademik</th>                          
                          <th style="text-align: center;">Tahun Akademik</th>
                          <th style="text-align: center;">Status</th>
                          <th style="text-align: center;">Aksi</th>
                        </tr>
                      </tfoot>

                    </table>

                    
                   <!--  <div class="modal fade" id="modal-a">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Delete</h4>
                          </div>
                          <div class="modal-body">
                            <h4>Apakah Anda Yakin Ingin Menghapus Data Tahun Akademik?</h4>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                          </div>
                        </div>                        
                      </div>                      
                    </div> -->
                  

                  </div>
                </div>
              </div>
          </div>
	  </div>
	</div>



@endsection
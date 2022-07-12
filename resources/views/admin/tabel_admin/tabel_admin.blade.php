@extends('layouts.masterAdmin')

@section('content')
	<div class="pull"  role="main" >
      <div class="">
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

                  <h2>Data Admin</h2>
                  <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <a href="{{'tambahAdmin'}}" class="btn btn-info"> Input Admin Baru</a>
                    <br><br>
                    <table id="datatable"  class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th style="text-align: center;">No</th>
                          <th style="text-align: center;">Nama Admin</th>
                          <th style="text-align: center;">Email</th>
                          <th style="text-align: center;">Aksi</th>
                        </tr>
                      </thead>


                      <tbody style="text-align: center;"> 

                      @php $i = 1 @endphp
                      @foreach($tamp as $data)                      
                        <tr>
                          <td>{{ $i++ }}</td>
                          <td>{{ $data -> nama_admin }}</td>
                          <td>{{ $data -> email }}</td>                   
                          <td align="center">

                            <div class="col-md-offset">
                              <a class="btn btn-danger" href="{{'editAdmin/'.$data->kode_admin}}"><i class="glyphicon glyphicon-pencil"></i></a>
                              <a class="btn btn-primary" href="{{'hapusAdmin/'.$data->kode_admin}}"><i class="glyphicon glyphicon-trash"></i></a>
                            </div>

                            

                          </td>
                        </tr>
                        @endforeach
                      </tbody>

                      <thead>
                        <tr>
                          <th style="text-align: center;">No</th>
                          <th style="text-align: center;">Nama Admin</th>
                          <th style="text-align: center;">Email</th>
                          <th style="text-align: center;">Aksi</th>
                        </tr>
                      </thead>

                    </table>
<!-- 
                  @foreach($tamp as $data)
                    <div class="modal fade" id="modal-success">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Delete</h4>
                          </div>
                          <div class="modal-body">
                            <h4>Apakah Anda Yakin Ingin Menghapus Data Admin?</h4>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                            <a href="{{'hapusAdmin/'.$data->kode_admin}}" class="btn btn-primary">Hapus</a>
                          </div>
                        </div>                        
                      </div>                      
                    </div>
                  @endforeach -->
                    

                  </div>
                </div>
              </div>
          </div>
	  </div>
	</div>



@endsection
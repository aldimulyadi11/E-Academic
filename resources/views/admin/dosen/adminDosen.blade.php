@extends('layouts.masterAdmin')

@section('content')
	<div class="pull"  role="main">
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

                    <h2>Data Dosen</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <a href="{{'adminTambahDosen'}}" class="btn btn-info"><i class="fa fa-plus-square"></i> Tambah</a>
                    <a target="_blank" href="{{'cetakDosen'}}" class="btn btn-success"><i class="fa fa-print"></i> Cetak</a>
                    <br><br>
                    <table id="datatable"  class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th style="text-align: center;">No</th>
                          <th style="text-align: center;">NIDN</th>
                          <th style="text-align: center;">Nama Dosen</th>
                          <th style="text-align: center;">No. Hp</th>
                          <th style="text-align: center;">Jabatan</th>

                          <th style="text-align: center;">Aksi</th>
                        </tr>
                      </thead>
                      <tbody > 
                      @php $i = 1 @endphp
                      @foreach($tamp as $data)                       
                        <tr>
                          <td style="text-align: center;">{{$i++}}</td>
                          <td style="text-align: center;">{{ $data -> nidn }}</td>
                          <td >{{ $data -> nama_dosen }}. {{ $data -> gelar }}</td>
                          <td style="text-align: center;">{{ $data -> no_hp }}</td>
                          <td >{{ $data -> jabatan }}</td>
                          <td align="center">

                            <div class="col-md-offset">
                              <a class="btn btn-danger" href="{{'editDosen/'.$data->nidn}}"><i class="glyphicon glyphicon-pencil"></i></a>
                              <a class="btn btn-primary" href="{{'hapusDosen/'.$data->nidn}}"><i class="glyphicon glyphicon-trash"></i></a>
                              <a target="_blank" href="{{'cetakDosenId/'.$data->nidn}}" class="btn btn-success"><i class="fa fa-print"></i></a>

                            </div>
                          </td>
                        </tr>

                      @endforeach
                      </tbody>

                      <tfoot>
                        <tr>
                          <th style="text-align: center;">No</th>
                          <th style="text-align: center;">NIDN</th>
                          <th style="text-align: center;">Nama Dosen</th>
                          <th style="text-align: center;">No. Hp</th>
                          <th style="text-align: center;">Jabatan</th>
                          <th style="text-align: center;">Aksi</th>
                        </tr>
                      </tfoot>

                    </table>

                    <!-- @foreach($tamp as $data)
                    <div class="modal fade" id="modal-b">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Delete</h4>
                          </div>
                          <div class="modal-body">
                            <h4>Apakah Anda Yakin Ingin Menghapus Data Dosen?</h4>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                            <a href="{{'hapusDosen/'.$data->nidn}}" class="btn btn-primary">Hapus</a>
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
@extends('layouts.masterAdmin')

@section('content')
	<div class="pull"  role="main">
      <div class="">
          <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Jurusan</h2>
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
                    <a href="{{'tambahJurusan'}}" class="btn btn-info"><i class="fa fa-plus-square"></i> Tambah</a>
                    <a target="_blank" href="{{'cetakJurusan'}}" class="btn btn-success"><i class="fa fa-print"></i> Cetak</a>
                    <br><br>
                    <table id="datatable"  class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th style="text-align: center;">No</th>
                          <th style="text-align: center;">Kode Jurusan</th>
                          <th style="text-align: center;">Nama Jurusan</th>
                          <th style="text-align: center;">Nama Fakultas</th>
                          <th style="text-align: center;">Ketua Jurusan</th>                          
                          <th style="text-align: center;">Jenjang</th>
                          <th style="text-align: center;">Aksi</th>
                        </tr>
                      </thead>


                      <tbody >    
                      @php $i = 1 @endphp                
                      @foreach($tamp as $data)
                        <tr>
                          <td style="text-align: center;">{{$i++}}</td>
                          <td style="text-align: center;">{{ $data -> kode_jur }}</td>
                          <td>{{ $data -> nama_jur }}</td>
                          <td>{{ $data -> nama_fakultas }}</td>
                          <td>{{ $data -> nama_dosen }} {{ $data -> gelar }}</td>
                          <td style="text-align: center;">{{ $data -> jenjang }}</td>
                          <td align="center">
                            <div class="col-md-offset">
                              <a class="btn btn-danger" href="{{'editJurusan/'.$data->kode_jur}}"><i class="glyphicon glyphicon-pencil"></i></a>
                              <a class="btn btn-primary" href="{{'hapusJurusan/'.$data->kode_jur}}"><i class="glyphicon glyphicon-trash"></i></a>
                              <a target="_blank" href="{{'cetakJurusanId/'.$data->kode_jur}}" class="btn btn-success"><i class="fa fa-print"></i></a>

                            </div>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>

                      <tfoot>
                        <tr>
                          <th style="text-align: center;">No</th>
                          <th style="text-align: center;">Kode Jurusan</th>
                          <th style="text-align: center;">Nama Jurusan</th>
                          <th style="text-align: center;">Nama Fakultas</th>
                          <th style="text-align: center;">Ketua Jurusan</th>                          
                          <th style="text-align: center;">Jenjang</th>
                          <th style="text-align: center;">Aksi</th>
                        </tr>
                      </tfoot>
                    </table>

                    <!-- @foreach($tamp as $data)
                    <div class="modal fade" id="modal-jurusan">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Delete</h4>
                          </div>
                          <div class="modal-body">
                            <h4>Apakah Anda Yakin Ingin Menghapus Data Jurusan?</h4>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                            <a href="{{'hapusJurusan/'.$data->kode_jur}}" class="btn btn-primary">Hapus</a>
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
@endsection
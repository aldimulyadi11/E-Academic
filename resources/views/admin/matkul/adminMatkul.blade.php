@extends('layouts.masterAdmin')

@section('content')
	<div class="pull"  role="main">
      <div class="">
          <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Mata Kuliah</h2>
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
                    <a href="{{'tambahMatkul'}}" class="btn btn-info"><i class="fa fa-plus-square"></i> Tambah</a>
                    <a target="_blank" href="{{'cetakMatkul'}}" class="btn btn-success"><i class="fa fa-print"></i> Cetak</a>
                    <br><br>
                    <table id="datatable"  class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th style="text-align: center;">No</th>
                          <th style="text-align: center;">Kode Mata Kuliah</th>
                          <th style="text-align: center;">Nama Mata Kuliah</th>
                          <th style="text-align: center;">SKS</th>
                          <th style="text-align: center;">Kategori</th>
                          <th style="text-align: center;">Jurusan</th>
                          <th style="text-align: center;">Semester</th>
                          <th style="text-align: center;">Dosen</th>
                          <th style="text-align: center;">Aksi</th>
                        </tr>
                      </thead>


                      <tbody > 
                      @php $i = 1 @endphp
                      @foreach($tamp as $data)                       
                        <tr>
                          <td style="text-align: center;">{{$i++}}</td>
                          <td style="text-align: center;">{{ $data -> kode_matkul }}</td>
                          <td>{{ $data -> nama_matkul }}</td>
                          <td style="text-align: center;">{{ $data -> sks }}</td>
                          <td>{{ $data -> kategori }}</td>
                          <td >{{ $data -> jurusan }}</td>
                          <td style="text-align: center;">{{ $data -> semester }}</td>
                          <td>{{ $data -> nama_dosen }}.,{{ $data -> gelar }}</td>
                          <td align="center">

                            <div class="col-md-offset">
                              <a class="btn btn-danger" href="{{'editMatkul/'.$data->kode_matkul}}"><i class="glyphicon glyphicon-pencil"></i></a>
                              <a class="btn btn-primary" href="{{'hapusMatkul/'.$data->kode_matkul}}"><i class="glyphicon glyphicon-trash"></i></a>
                              <a target="_blank" href="{{'cetakMatkulId/'.$data->kode_matkul}}" class="btn btn-success"><i class="fa fa-print"></i></a>

                            </div>
                          </td>
                        </tr>
                      @endforeach
                      </tbody>

                      <tfoot>
                        <tr>
                          <th style="text-align: center;">No</th>
                          <th style="text-align: center;">Kode Mata Kuliah</th>
                          <th style="text-align: center;">Nama Mata Kuliah</th>
                          <th style="text-align: center;">SKS</th>
                          <th style="text-align: center;">Kategori</th>
                          <th style="text-align: center;">Jurusan</th>
                          <th style="text-align: center;">Semester</th>
                          <th style="text-align: center;">Dosen</th>
                          <th style="text-align: center;">Aksi</th>
                        </tr>
                      </tfoot>
                    </table>

                    <!-- @foreach($tamp as $data)
                    <div class="modal fade" id="modal-matkul">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Delete</h4>
                          </div>
                          <div class="modal-body">
                            <h4>Apakah Anda Yakin Ingin Menghapus Data Mata Kuliah?</h4>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                            <a href="{{'hapusMatkul/'.$data->kode_matkul}}" class="btn btn-primary">Hapus</a>
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
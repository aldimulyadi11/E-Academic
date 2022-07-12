@extends('layouts.masterMhs')

@section('content')



	<div class="pull"  role="main">
      <div class="">
          <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Kartu Rencana Studi </h2>
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
                    <p ><h4 align="center">Daftar Mata Kuliah Kontrak</h4></p>
                    <a target="_blank" href="{{'cetakKrs'}}" class="btn btn-success"><i class="fa fa-print"></i> Cetak</a>
                    <br><br>
                    <table id="datatable"  class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th style="text-align: center;">No</th>
                          <th style="text-align: center;">Kode Mata Kuliah</th>
                          <th style="text-align: center;">Nama Mata Kuliah</th>
                          <th style="text-align: center;">SKS</th>
                          <th style="text-align: center;">Dosen</th>
                          <th style="text-align: center;">Aksi</th>
                        </tr>
                      </thead>


                      <tbody style="text-align: center;">   
                      @php $i = 1 @endphp                     
                      @foreach($krs as $data)
                        <tr>
                          <td>{{$i++}}</td>
                          <td>{{$data -> kode_matkul}}</td>
                          <td>{{$data -> nama_matkul}}</td>
                          <td>{{$data -> sks}}</td>
                          <td>{{$data -> nama_dosen}}.,{{$data -> gelar}}</td>
                          <td align="center">

                            <div class="col-md-offset">
                              <a class="btn btn-info" href="{{'pilihKrs/'.$data->kode_matkul}}"><i class="fa fa-plus-square"></i></a>                              
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
                          <th style="text-align: center;">Dosen</th>                          
                          <th style="text-align: center;">Aksi</th>
                        </tr>
                      </tfoot>

                    </table>


                    <br><br><br><br>
                    <p ><h4 align="center">Daftar Mata Kuliah Yang Anda Pilih</h4></p>
                    <a target="_blank" href="{{'cetakPilihKrs'}}" class="btn btn-success"><i class="fa fa-print"></i> Cetak</a>
                    <br>
                    <table id="datatable"  class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th style="text-align: center;">Kode Mata Kuliah</th>
                          <th style="text-align: center;">Nama Mata Kuliah</th>
                          <th style="text-align: center;">SKS</th>
                          <th style="text-align: center;">Dosen</th>                          
                          <th style="text-align: center;">Aksi</th>
                        </tr>
                      </thead>


                      <tbody style="text-align: center;">                        
                        @foreach($pilih as $data2)
                        <tr>
                          <td>{{$data2 -> kode_matkuls}}</td>
                          <td>{{$data2 -> nama_matkul}}</td> 
                          <td>{{$data2 -> sks}}</td>
                          <td>{{$data2 -> dosen}}.,{{$data2 -> gelar}}</td>
                          <td align="center">

                            <div class="col-md-offset">
                              <a class="btn btn-danger" href="{{'hapusKrs/'.$data2->id_matkul}}"><i class="glyphicon glyphicon-trash"></i></a>                              
                            </div>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                         <tr>
                          <th style="text-align: center;">Kode Mata Kuliah</th>
                          <th style="text-align: center;">Nama Mata Kuliah</th>
                          <th style="text-align: center;">SKS</th>
                          <th style="text-align: center;">Dosen</th>                          
                          <th style="text-align: center;">Aksi</th>
                        </tr>
                      </tfoot>

                    </table>

                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">                      
                          <span style="position: relative;left:220px;"><a  href="cekKrs" class="btn btn-success"><i class="fa fa-check-square"></i> Saya Selesai Mengisi KRS</a></span>
                        </div>
                      </div>

                  </div>
                </div>
              </div>
          </div>
	  </div>
	</div>



@endsection
@extends('layouts.masterOrtu')

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
                        </tr>
                      </thead>


                      <tbody style="text-align: center;">                        
                        @foreach($pilih as $data2)
                        <tr>
                          <td>{{$data2 -> kode_matkuls}}</td>
                          <td>{{$data2 -> nama_matkul}}</td> 
                          <td>{{$data2 -> sks}}</td>
                          <td>{{$data2 -> dosen}}.,{{$data2 -> gelar}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                         <tr>
                          <th style="text-align: center;">Kode Mata Kuliah</th>
                          <th style="text-align: center;">Nama Mata Kuliah</th>
                          <th style="text-align: center;">SKS</th>
                          <th style="text-align: center;">Dosen</th>                          
                        </tr>
                      </tfoot>

                    </table>
                  </div>
                </div>
              </div>
          </div>
    </div>
  </div>



@endsection
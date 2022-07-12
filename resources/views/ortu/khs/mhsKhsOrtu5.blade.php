@extends('layouts.masterOrtu')

@section('content')



<div class="pull"  role="main">
      <div class="">
          <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Kartu Hasil Studi </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <p><h4 align="center">Semester 5</h4></p>
                    <a target="_blank" href="{{'cetakKhs5'}}" class="btn btn-success"><i class="fa fa-print"></i> Cetak</a>
                    <br><br>
                    <table id="datatable"  class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th style="text-align: center;">Kode Mata Kuliah</th>
                          <th style="text-align: center;">Mata Kuliah</th>
                          <th style="text-align: center;">SKS</th>
                          <th style="text-align: center;">Huruf</th>
                          <th style="text-align: center;">Bobot</th>
                          <th style="text-align: center;">Jumlah</th>
                        </tr>
                      </thead>
                      <tbody style="text-align: center;">    
                      @foreach($khs as $data)                   
                        <tr>
                          <td>{{$data -> fk_kode_matkul}}</td>
                          <td>{{$data -> nama_matkul}}</td>                          
                          <td>{{$data -> sks}}</td>
                          <td>{{$data -> grade}}</td>
                          <td>{{$data -> bobot}}</td>
                          <td>{{$data -> jumlah}}</td>
                        </tr>
                      @endforeach
                      </tbody>
                      <tbody>
                        <tr style="text-align: center;">
                          <th colspan="2" style="text-align: center;">Total</th>
                          <td>{{$tot_sks}}</td>
                          <td></td>
                          <td>{{$tot_bobot}}</td>
                          <td>{{$tot_jumlah}}</td>
                          
                        </tr>
                      </tbody>

                      <tbody>
                        <tr style="text-align: center;">
                          <th colspan="2" style="text-align: center;">IP</th>
                          <td colspan="5" >{{number_format($tot_ip,2)}}</td>
                        </tr>
                      </tbody>

                      <tbody>
                        <tr style="text-align: center;">
                          <th colspan="2" style="text-align: center;">IPK</th>
                          <td colspan="5">{{number_format($tot_ipk,2)}}</td>
                        </tr>
                      </tbody>

                      <tfoot>
                        <tr>
                          <th style="text-align: center;">Kode Mata Kuliah</th>
                          <th style="text-align: center;">Mata Kuliah</th>
                          <th style="text-align: center;">SKS</th>
                          <th style="text-align: center;">Huruf</th>                          
                          <th style="text-align: center;">Bobot</th>
                          <th style="text-align: center;">Jumlah</th>
                        </tr>
                      </tfoot>

                    </table>
                </div>
              </div>
          </div>
    </div>
  </div>

@endsection
@extends('layouts.masterOrtu')

@section('content')
  <div class="pull" role="main">
          <div class="">            
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Jadwal Kuliah</h2>                    
                    <div class="clearfix"></div>
                  </div>
                  <a target="_blank" href="{{'cetakJadwalMhs'}}" class="btn btn-success"><i class="fa fa-print"></i> Cetak</a>
                  <br>
                  <div class="x_content">
                    <table id="datatable"  class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th style="text-align: center;">No</th>
                          <th style="text-align: center;">Waktu</th>
                          <th style="text-align: center;">Hari</th>                          
                          <th style="text-align: center;">Mata Kuliah</th>
                          <th style="text-align: center;">Ruangan</th>
                          <th style="text-align: center;">Dosen</th>
                        </tr>
                      </thead>


                      <tbody style="text-align: center;">
                      @php $i = 1 @endphp
                      @foreach($jadwal as $data)                    
                        <tr>
                          <td>{{$i++}}</td>
                          <td>{{$data -> waktu}}</td>
                          <td>{{$data -> hari}}</td>
                          <td>{{$data -> nama_matkul}}</td>
                          <td>{{$data -> ruangan}}</td>
                          <td>{{$data -> dosen}}. {{$data -> gelar}}</td>
                        </tr>
                      @endforeach
                      </tbody>

                      <thead>
                        <tr>
                          <th style="text-align: center;">No</th>
                          <th style="text-align: center;">Waktu</th>
                          <th style="text-align: center;">Hari</th>                          
                          <th style="text-align: center;">Mata Kuliah</th>
                          <th style="text-align: center;">Ruangan</th>
                          <th style="text-align: center;">Dosen</th>
                        </tr>
                      </thead>

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
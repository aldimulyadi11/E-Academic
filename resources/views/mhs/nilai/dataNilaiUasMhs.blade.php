@extends('layouts.masterMhs')

@section('content')
	<div class="pull" role="main">
          <div class="">            
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Penilaian Mahasiswa</h2>                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
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

                      <br><br>
                      <div class="x_content">
                        <a target="_blank" href="{{'cetakNilaiUasMhs'}}" class="btn btn-success"><i class="fa fa-print"></i> Cetak</a> 
                        <table id="datatable"  class="table table-striped table-bordered">
                          
                          <thead>
                            <tr>
                              <th style="text-align: center;">No</th>
                              <th style="text-align: center;">Mata Kuliah</th>
                              <th style="text-align: center;">Semester</th>                                                      
                              <th style="text-align: center;">Kehadiran</th>
                              <th style="text-align: center;">Tugas</th>
                              <th style="text-align: center;">UTS</th>
                              <th style="text-align: center;">UAS</th>
                              <th style="text-align: center;">Total</th>
                              <th style="text-align: center;">Grade</th>
                              <th style="text-align: center;">Keterangan</th>
                            </tr>
                          </thead>


                          <tbody >  
                          @php $i = 1 @endphp  
                          @foreach($nilai as $data)  
                                            
                            <tr>
                              <td style="text-align: center;">{{$i++}}</td>
                              <td>{{$data->nama_matkul}}</td>                              
                              <td style="text-align: center;">{{$data->semester}}</td>
                              <td style="text-align: center;">{{$data->absen}}</td>
                              <td style="text-align: center;">{{$data->tugas}}</td>
                              <td style="text-align: center;">{{$data->uts}}</td>
                              <td style="text-align: center;">{{$data->uas}}</td>
                              <td style="text-align: center;">{{$data->total}}</td>
                              <td style="text-align: center;">{{$data->grade}}</td>                              
                              <td style="text-align: center;">{{$data->keterangan}}</td>
                            </tr>   
                          @endforeach                     
                          </tbody>

                          <tfoot>
                            <tr>
                              <th style="text-align: center;">No</th>
                              <th style="text-align: center;">Mata Kuliah</th>
                              <th style="text-align: center;">Semester</th>                                                      
                              <th style="text-align: center;">Kehadiran</th>
                              <th style="text-align: center;">Tugas</th>
                              <th style="text-align: center;">UTS</th>
                              <th style="text-align: center;">UAS</th>
                              <th style="text-align: center;">Total</th>
                              <th style="text-align: center;">Grade</th>
                              <th style="text-align: center;">Keterangan</th>                             
                            </tr>
                          </tfoot>

                        </table>
                      </div>

                  </div>

                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


@endsection
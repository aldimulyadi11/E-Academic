@extends('layouts.masterDosen')

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
                        <table id="datatable"  class="table table-striped table-bordered">
                          
                          <thead>
                            <tr>
                              <th style="text-align: center;">No</th>
                              <th style="text-align: center;">NIM</th>
                              <th style="text-align: center;">Mahasiswa</th>
                              <th style="text-align: center;">Mata Kuliah</th>
                              <th style="text-align: center;">Jurusan</th>
                              <th style="text-align: center;">Semester</th>
                              <th style="text-align: center;">Kehadiran</th>
                              <th style="text-align: center;">Tugas</th>
                              <th style="text-align: center;">UTS</th>
                              <th style="text-align: center;">UAS</th>                              
                              <th style="text-align: center;">Aksi</th>
                            </tr>
                          </thead>


                          <tbody style="text-align: center;">  
                          @php $i = 1 @endphp  
                          @foreach($nilai as $data)  
                                            
                            <tr>
                              <td>{{$i++}}</td>
                              <td>{{$data->fk_nim}}</td>
                              <td>{{$data->nama_mhs}}</td>
                              <td>{{$data->nama_matkul}}</td>
                              <td>{{$data->jurusan}}</td>
                              <td>{{$data->semester}}</td>
                              <form action="{{ url('/updateNilaiUas/'.$data->kode_nilai) }}" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                              {{ csrf_field() }}                             
                              <td><input autofocus="" style="width: 32%;text-align: center;" type="number" value="{{$data->absen}}" name="absen"></td>
                              <td><input style="width: 32%;text-align: center;" type="number" value="{{$data->tugas}}" name="tugas"></td>
                              <td><input style="width: 32%;text-align: center;" type="number" value="{{$data->uts}}" name="uts"></td>
                              <td><input style="width: 32%;text-align: center;" type="number" value="{{$data->uas}}" name="uas"></td>
                              <td>
                                 <button type="submit" class="btn btn-success"><i class="fa fa-check-square"></i> </button>
                              </td>
                              </form>
                            </tr>   
                          @endforeach                     
                          </tbody>

                          <tfoot>
                            <tr>
                              <th style="text-align: center;">No</th>
                              <th style="text-align: center;">NIM</th>
                              <th style="text-align: center;">Mahasiswa</th>
                              <th style="text-align: center;">Mata Kuliah</th>
                              <th style="text-align: center;">Jurusan</th>
                              <th style="text-align: center;">Semester</th>
                              <th style="text-align: center;">Kehadiran</th>
                              <th style="text-align: center;">Tugas</th>
                              <th style="text-align: center;">UTS</th>
                              <th style="text-align: center;">UAS</th>                              
                              <th style="text-align: center;">Aksi</th>
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
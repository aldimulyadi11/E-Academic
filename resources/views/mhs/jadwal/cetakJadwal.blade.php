@extends('cssBuatan')
<!DOCTYPE html>
<html>
<head>
  <title>Data Jadwal Kuliah</title>
</head>
<body>
  <center>
     <p>DATA JADWAL KULIAH INTERNATIONAL UNIVERSITY <br> www.internationaluniversity.com <br> Jalan Merdeka No. 1945 </p>
    <br>
  </center>
  <table class="table1">
    @foreach($ident as $mhs)
    <tr>
      <td>Nama</td>
      <td>{{$mhs -> nama_mhs}}</td>
    </tr>
    <tr>
      <td>Jurusan</td>
      <td>{{$mhs -> nama_jur}}</td>
    </tr>
    <tr>
      <td>Semester</td>
      <td>{{$mhs -> semester}}</td>
    </tr>
    @endforeach
  </table>
 
  <table class='table1'>
    <thead>
        <tr>
          <th>No</th>
          <th>Waktu</th>
          <th>Hari</th>
          <th>Mata Kuliah</th>                          
          <th>Ruangan</th>
          <th>Nama Dosen</th>
        </tr>
      </thead>
      <tbody>
      @php $i = 1 @endphp 
      @foreach($tamp as $data)                       
        <tr>
          <td id="tengah">{{$i++}}</td>
          <td id="tengah">{{$data -> waktu}}</td>
          <td>{{$data -> hari}}</td>
          <td>{{$data -> nama_matkul}}</td>
          <td id="tengah">{{$data -> ruangan}}</td>
          <td>{{$data -> dosen}}. {{$data -> gelar}}</td>
        </tr>
      @endforeach
      </tbody>
      <tfoot>
        <tr>
          <th>No</th>
          <th>Waktu</th>
          <th>Hari</th>
          <th>Mata Kuliah</th>                          
          <th>Ruangan</th>
          <th>Nama Dosen</th>
        </tr>
      </tfoot>

  </table>
</body>
</html>
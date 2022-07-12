@extends('cssBuatan')    
<!DOCTYPE html>
<html>
<head>
  <title>Data Mahasiswa</title>
</head>
<body>
  <center>
     <p>DATA MAHASISWA INTERNATIONAL UNIVERSITY <br> www.internationaluniversity.com <br> Jalan Merdeka No. 1945 </p>
    <br>
  </center>
 
  <table class='table1'> 
    <thead>
        <tr>
          <th>No</th>
          <th>NIM</th>
          <th>Nama Mahasiswa</th>
          <th>Jurusan</th>
          <th>Semester</th>
          <th>Tahun Akademik</th>
        </tr>
      </thead>
      <tbody> 
      @php $i = 1 @endphp
        @foreach($tamp as $data)
        <tr>
          <td id="tengah">{{$i++}}</td>
          <td id="tengah">{{ $data -> nim }}</td>
          <td>{{ $data -> nama_mhs }}</td>
          <td>{{ $data -> nama_jur }}</td>
          <td id="tengah">{{ $data -> semester }}</td>
          <td id="tengah">{{ $data -> tahun_aka }}</td>
        </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr>
          <th>No</th>
          <th>NIM</th>
          <th>Nama Mahasiswa</th>
          <th>Jurusan</th>
          <th>Semester</th>
          <th>Tahun Akademik</th>
        </tr>
      </tfoot>
  </table>
</body>
</html>
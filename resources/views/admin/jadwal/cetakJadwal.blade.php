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
 
  <table class='table1'> 
    <thead>
        <tr>
          <th>No</th>
          <th>Waktu</th>
          <th>Hari</th>
          <th>Mata Kuliah</th>
          <th>Semester</th>                          
          <th>Ruangan</th>
          <th>Jurusan</th>
        </tr>
      </thead>
      <tbody>
      @php $i = 1 @endphp 
      @foreach($tamp as $data)                       
        <tr>
          <td id="tengah">{{$i++}}</td>
          <td id="tengah">{{ $data -> waktu }}</td>
          <td>{{ $data -> hari }}</td>
          <td>{{ $data -> nama_matkul }}</td>
          <td id="tengah">{{ $data -> semester }}</td>
          <td id="tengah">{{ $data -> ruangan }}</td>
          <td>{{ $data -> jurusan }}</td>
        </tr>
      @endforeach
      </tbody>
      <tfoot>
        <tr>
          <th>No</th>
          <th>Waktu</th>
          <th>Hari</th>
          <th>Mata Kuliah</th>
          <th>Semester</th>                          
          <th>Ruangan</th>
          <th>Jurusan</th>
        </tr>
      </tfoot>

  </table> 
</body>
</html>
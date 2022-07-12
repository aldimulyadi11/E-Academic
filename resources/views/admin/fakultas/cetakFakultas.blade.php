@extends('cssBuatan')
<!DOCTYPE html>
<html>
<head>
  <title>Data Fakultas</title>

</head>
<body>
  <center>
    <p>DATA FAKULTAS INTERNATIONAL UNIVERSITY <br> www.internationaluniversity.com <br> Jalan Merdeka No. 1945 </p>
    <br>
  </center>
 
  <table class='table1'>
    <thead>
        <tr>
          <th>No</th>
          <th>Kode Fakultas</th>
          <th>Nama Fakultas</th>
          <th>Dekan</th>
        </tr>
      </thead>
      <tbody> 
      @php $i = 1 @endphp
      @foreach($fakultas as $data)                       
        <tr>
          <td id="tengah">{{$i++}}</td>
          <td id="tengah">{{ $data -> kode_fakultas }}</td>
          <td>{{ $data -> nama_fakultas }}</td>
          <td>{{ $data -> nama_dosen }}. {{ $data -> gelar }}</td>
        </tr>

      @endforeach
      </tbody>
      <tfoot>
        <tr>
          <th>No</th>
          <th>Kode Fakultas</th>
          <th>Nama Fakultas</th>
          <th>Dekan</th>
        </tr>
      </tfoot>
  </table>
</body>
</html>
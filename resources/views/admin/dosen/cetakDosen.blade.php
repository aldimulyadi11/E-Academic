@extends('cssBuatan')
<!DOCTYPE html>
<html>
<head>
  <title>Data Dosen</title>

</head>
<body>
    
  <center>
    <p>DATA DOSEN INTERNATIONAL UNIVERSITY <br> www.internationaluniversity.com <br> Jalan Merdeka No. 1945 </p>
    <br>
  </center>
 
  <table class='table1'>
    <thead>
        <tr>
          <th>No</th>
          <th>NIDN</th>
          <th>Nama Dosen</th>
          <th>No. Hp</th>
          <th>Jabatan</th>

        </tr>
      </thead>
      <tbody> 
      @php $i = 1 @endphp
      @foreach($dosen as $data)                       
        <tr>  
          <td id="tengah">{{$i++}}</td>
          <td id="tengah">{{ $data -> nidn }}</td>
          <td>{{ $data -> nama_dosen }}. {{ $data -> gelar }}</td>
          <td id="tengah">{{ $data -> no_hp }}</td>
          <td>{{ $data -> jabatan }}</td>
        </tr>

      @endforeach
      </tbody>
      <tfoot>
        <tr>
          <th>No</th>
          <th>NIDN</th>
          <th>Nama Dosen</th>
          <th>No. Hp</th>
          <th>Jabatan</th>

        </tr>
      </tfoot>
  </table>
</body>
</html> 

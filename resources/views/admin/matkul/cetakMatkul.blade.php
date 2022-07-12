@extends('cssBuatan')    
<!DOCTYPE html>
<html>
<head>
  <title>Data Mata Kuliah</title>
</head>
<body>
  <center>
     <p>DATA MATA KULIAH INTERNATIONAL UNIVERSITY <br> www.internationaluniversity.com <br> Jalan Merdeka No. 1945 </p>
    <br>
  </center>
 
  <table class='table1'> 
    <thead>
        <tr>
          <th>No</th>
          <th>Kode Mata Kuliah</th>
          <th>Mata Kuliah</th>
          <th>SKS</th>
          <th>Jurusan</th>
          <th>Semester</th>
          <th>Dosen</th>
        </tr>
      </thead>


      <tbody> 
      @php $i = 1 @endphp
      @foreach($tamp as $data)                       
        <tr>
          <td id="tengah">{{$i++}}</td>
          <td id="tengah">{{ $data -> kode_matkul }}</td>
          <td>{{ $data -> nama_matkul }}</td>
          <td id="tengah">{{ $data -> sks }}</td>
          <td>{{ $data -> jurusan }}</td>
          <td id="tengah">{{ $data -> semester }}</td>
          <td>{{ $data -> nama_dosen }}.,{{ $data -> gelar }}</td>
        </tr>
      @endforeach
      </tbody>

      <tfoot>
        <tr>
          <th>No</th>
          <th>Kode Mata Kuliah</th>
          <th>Mata Kuliah</th>
          <th>SKS</th>
          <th>Jurusan</th>
          <th>Semester</th>
          <th>Dosen</th>
        </tr>
      </tfoot>
  </table>
</body>
</html>
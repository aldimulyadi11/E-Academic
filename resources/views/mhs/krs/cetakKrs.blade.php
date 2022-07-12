@extends('cssBuatan')
<!DOCTYPE html>
<html>
<head>
  <title>Daftar KRS</title>

</head>
<body>
  <center>
    <p>DAFTAR KARTU RENCANA STUDY KONTRAK INTERNATIONAL UNIVERSITY <br> www.internationaluniversity.com <br> Jalan Merdeka No. 1945 </p>
    <br>
  </center>
  <table class='table1'>
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
          <th>Kode Mata Kuliah</th>
          <th>Nama Mata Kuliah</th>
          <th>SKS</th>
          <th>Dosen</th>
        </tr>
      </thead>


      <tbody>   
      @php $i = 1 @endphp                     
      @foreach($krs as $data)
        <tr>
          <td id="tengah">{{$i++}}</td>
          <td id="tengah">{{$data -> kode_matkul}}</td>
          <td>{{$data -> nama_matkul}}</td>
          <td id="tengah">{{$data -> sks}}</td>
          <td>{{$data -> nama_dosen}}.,{{$data -> gelar}}</td>
        </tr>
      @endforeach
      </tbody>
      <tfoot>
        <tr>
          <th>No</th>
          <th>Kode Mata Kuliah</th>
          <th>Nama Mata Kuliah</th>
          <th>SKS</th>
          <th>Dosen</th>                          
        </tr>
      </tfoot>
  </table>
</body>
</html>
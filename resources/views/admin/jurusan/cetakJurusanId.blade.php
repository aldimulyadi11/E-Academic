@extends('cssBuatan')
<!DOCTYPE html>
<html>
<head>
  <title>Data Jurusan</title>

</head>
<body>
  <center>
    <p>DATA JURUSAN INTERNATIONAL UNIVERSITY <br> www.internationaluniversity.com <br> Jalan Merdeka No. 1945 </p>
    <br>
  </center>
 
  <table class='table1'> 
    <thead>
        <tr>
          <th>No</th>
          <th>Kode Jurusan</th>
          <th>Nama Jurusan</th>
          <th>Nama Fakultas</th>
          <th>Ketua Jurusan</th>
          <th>jenjang</th>
        </tr>
      </thead>
      <tbody> 
      @php $i = 1 @endphp
      @foreach($jurusan as $data)                       
        <tr>
          <td>{{$i++}}</td>
          <td id="tengah">{{ $data -> kode_jur }}</td>
          <td>{{ $data -> nama_jur }}</td>
          <td>{{ $data -> nama_fakultas }}</td>
          <td>{{ $data -> nama_dosen }}. {{ $data -> gelar }}</td>
          <td id="tengah">{{ $data -> jenjang }}</td>
        </tr>

      @endforeach
      </tbody>
      <tfoot>
        <tr>
          <th>No</th>
          <th>Kode Jurusan</th>
          <th>Nama Jurusan</th>
          <th>Nama Fakultas</th>
          <th>Ketua Jurusan</th>
          <th>jenjang</th>
        </tr>
      </tfoot>
  </table>
  <div id="left">
      <p class="pos2">Menyetujui Dekan</p>
      @foreach($fak as $kejur)
        <p class="dek">{{$kejur -> nama_dosen}}. {{$kejur->gelar}}</p>
      @endforeach
    </div>
  <div id="right">
    <p class="pos">Mengetahui Ketua Jurusan</p>
    @foreach($jur as $nama)
      <p class="rek">{{$nama -> nama_dosen}}. {{$nama->gelar}}</p>
    @endforeach
  </div>

</body>
</html>
@extends('cssBuatan')
<!DOCTYPE html>
<html>
<head>
  <title>Daftar KHS</title>

</head>
<body>
  <center>
    <p>DAFTAR KARTU HASIL STUDY INTERNATIONAL UNIVERSITY <br> www.internationaluniversity.com <br> Jalan Merdeka No. 1945 </p>
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
      <td>1</td>
    </tr>
    @endforeach
  </table>
 
  <table class='table1'> 
    <thead>
        <tr>
          <th>Kode Mata Kuliah</th>
          <th>Mata Kuliah</th>
          <th>SKS</th>
          <th>Huruf</th>
          <th>Bobot</th>
          <th>Jumlah</th>
        </tr>
      </thead>
      <tbody>    
      @foreach($khs as $data)                   
        <tr>
          <td id="tengah">{{$data -> fk_kode_matkul}}</td>
          <td>{{$data -> nama_matkul}}</td>                          
          <td id="tengah">{{$data -> sks}}</td>
          <td id="tengah">{{$data -> grade}}</td>
          <td id="tengah">{{$data -> bobot}}</td>
          <td id="tengah">{{$data -> jumlah}}</td>
        </tr>
      @endforeach
      </tbody>
      <tbody>
        <tr id="tengah">
          <td colspan="2" id="tengah">Total</th>
          <td>{{$tot_sks}}</td>
          <td></td>
          <td>{{$tot_bobot}}</td>
          <td>{{$tot_jumlah}}</td>
          
        </tr>
      </tbody>

      <tbody>
        <tr id="tengah">
          <td colspan="2" id="tengah">IP</th>
          <td colspan="5" >{{number_format($tot_ip,2)}}</td>
        </tr>
      </tbody>

      <tbody>
        <tr id="tengah">
          <td colspan="2" id="tengah">IPK</th>
          <td colspan="5">{{number_format($tot_ipk,2)}}</td>
        </tr>
      </tbody>

      <tfoot>
        <tr>
          <th>Kode Mata Kuliah</th>
          <th>Mata Kuliah</th>
          <th>SKS</th>
          <th>Huruf</th>                          
          <th>Bobot</th>
          <th>Jumlah</th>
        </tr>
      </tfoot>
  </table>
</body>
</html>
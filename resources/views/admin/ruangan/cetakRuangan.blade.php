@extends('cssBuatan')    
<!DOCTYPE html>
<html>
<head>
  <title>Data Ruangan</title>
</head>
<body>
  <center>
     <p>DATA RUANGAN INTERNATIONAL UNIVERSITY <br> www.internationaluniversity.com <br> Jalan Merdeka No. 1945 </p>
    <br>
  </center>
 
  <table class='table1'> 
    <thead>
        <tr>
          <th id="tengah">No</th>
          <th id="tengah">Kode Ruangan</th>
          <th id="tengah">Nama Ruangan</th>                          
        </tr>
      </thead>


      <tbody id="tengah">
        @php $i = 1 @endphp                        
        @foreach($tamp as $data)                       
        <tr>
          <td >{{$i++}}</td>
          <td >{{ $data -> kode_ruangan }}</td>
          <td>{{ $data -> nama_ruangan }}</td>                        
        </tr>
        @endforeach
      </tbody>

      <tfoot>
        <tr>
          <th id="tengah">No</th>
          <th id="tengah">Kode Ruangan</th>
          <th id="tengah">Nama Ruangan</th>                          
        </tr>
      </tfoot>
  </table>
</body>
</html>
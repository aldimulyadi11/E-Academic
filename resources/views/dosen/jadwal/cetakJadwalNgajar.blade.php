@extends('cssBuatan')
<!DOCTYPE html>
<html>
<head>
  <title>Data Jadwal Mengajar</title>
</head>
<body>
  <center>
     <p>DATA JADWAL MENGAJAR INTERNATIONAL UNIVERSITY <br> www.internationaluniversity.com <br> Jalan Merdeka No. 1945 </p>
    <br>
  </center>
 
  <table class='table1'> 
   <thead>
      <tr>
        <th>No</th>
        <th>Jam</th>
        <th>Hari</th>
        <th>Mata Kuliah</th>
        <th>Ruangan</th>
        <th>Jurusan</th>
        <th>Semester</th>                          
      </tr>
    </thead>


    <tbody id="tengah">
    @php $i = 1 @endphp
    @foreach($tamp as $data)                        
      <tr>
        <td id="tengah">{{$i++}}</td>
        <td id="tengah">{{$data -> waktu}}</td>
        <td>{{$data -> hari}}</td>
        <td>{{$data -> nama_matkul}}</td>
        <td id="tengah">{{$data -> ruangan}}</td>
        <td>{{$data -> jurusan}}</td>
        <td id="tengah">{{$data -> semester}}</td>
        
                               
      </tr>
    @endforeach
    </tbody>

    <tfoot>
      <tr>
        <th>No</th>
        <th>Jam</th>
        <th>Hari</th>
        <th>Mata Kuliah</th>
        <th>Ruangan</th>
        <th>Jurusan</th>
        <th>Semester</th>                          
      </tr>
    </tfoot>
  </table>

</body>
</html>
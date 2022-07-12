@extends('cssBuatan')
<!DOCTYPE html>
<html>
<head>
  <title>Daftar Nilai Mahasiswa</title>
</head>
<body>
  <center>
     <p>DATA NILAI MAHASISWA INTERNATIONAL UNIVERSITY <br> www.internationaluniversity.com <br> Jalan Merdeka No. 1945 </p>
    <br>
  </center>
 
  <table class='table1'> 
   <thead>
      <tr>
        <th>NIM</th>
        <th>Mahasiswa</th>
        <th>Mata Kuliah</th>
        <th>Kehadiran</th>
        <th>Tugas</th>
        <th>UTS</th>
        <th>UAS</th>
        <th>Total</th>
        <th>Grade</th>
        
      </tr>
    </thead>


    <tbody>
    
    @foreach($nilai as $data)  
                      
      <tr>
        <td id="tengah">{{$data->fk_nim}}</td>
        <td>{{$data->nama_mhs}}</td>
        <td>{{$data->nama_matkul}}</td>
        <td id="tengah">{{$data->absen}}</td> 
        <td id="tengah">{{$data->tugas}}</td>
        <td id="tengah">{{$data->uts}}</td>
        <td id="tengah">{{$data->uas}}</td>
        <td id="tengah">{{$data->total}}</td>
        <td id="tengah">{{$data->grade}}</td>
        
      </tr>   
    @endforeach                     
    </tbody>

    <tfoot>
      <tr>
        <th>NIM</th>
        <th>Mahasiswa</th>
        <th>Mata Kuliah</th>
        <th>Kehadiran</th>
        <th>Tugas</th>
        <th>UTS</th>
        <th>UAS</th>
        <th>Total</th>
        <th>Grade</th>
        
      </tr>
    </tfoot>

  </table>
</body>
</html>
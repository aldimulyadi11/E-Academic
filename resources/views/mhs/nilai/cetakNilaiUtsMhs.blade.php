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
        <th>Mata Kuliah</th>
        <th>Semester</th>
        <th>UTS</th>
        
      </tr>
    </thead>
    <tbody>
    
    @foreach($nilai as $data)  
                      
      <tr>
        <td>{{$data->nama_matkul}}</td> 
        <td id="tengah">{{$data->semester}}</td>
        <td id="tengah">{{$data->uts}}</td>

        
      </tr>   
    @endforeach                     
    </tbody>

    <tfoot>
      <tr>
        <th>Mata Kuliah</th>
        <th>Semester</th>
        <th>UTS</th>
        
      </tr>
    </tfoot>

  </table>
</body>
</html>
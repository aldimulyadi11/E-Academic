@extends('layouts.masterAdmin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Data Institusi</div>

                <div class="panel-body">
                    <div id="chartInstitusi">
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer')
<script src="/js/highcharts.js"></script>


<script type="text/javascript">
    Highcharts.chart('chartInstitusi', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Data Institusi'
    },

    xAxis: {
        categories: [
            'Admin',
            'Karyawan',
            'Mahasiswa',
            'Fakultas',
            'Program Studi',
            'Ruangan',
            'Mata Kuliah',
            'Jadwal'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Institusi'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Data Institusi',
        data: [{!!json_encode($admin)!!},{!!json_encode($dosen)!!},{!!json_encode($mhs)!!},{!!json_encode($fakultas)!!},{!!json_encode($jurusan)!!},{!!json_encode($ruangan)!!},{!!json_encode($mata_kuliah)!!},{!!json_encode($jadwal)!!}]

    }]
});
</script>
@endsection
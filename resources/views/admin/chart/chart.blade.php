@extends('layouts.masterAdmin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Data Mahasiswa</div>

                <div class="panel-body">
                    <div id="chartNilai">
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer')
<script src="/js/highcharts.js"></script>
<script>
    Highcharts.chart('chartNilai', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Data Mahasiswa per Jurusan'
    },
    xAxis: {
        categories:{!!json_encode($categories)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Mahasiswa'
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
            pointPadding: 0.4,
            borderWidth: 1
        }
    },
    series: [{
        name: 'Jurusan',
        data: {!!json_encode($jumlah)!!}

    }]
});
</script>
@endsection
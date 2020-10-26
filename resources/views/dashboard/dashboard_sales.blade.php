@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats shadow">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Total Follow UP Seluruhnya</h5>
                            <span class="h2 font-weight-bold mb-0">{{ $follup_all_count }}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-primary text-white rounded-circle shadow">
                                <i class="fas fa-people-arrows fa-2x"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <span class="text-primary mr-2">{{ $follup_this_month_count }}</span>
                        <span class="text-nowrap">Follow up bulan ini</span>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card card-stats shadow">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Total Follow Up Sukses </h5>
                            <span class="h2 font-weight-bold mb-0">{{ $follup_success_count }}</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-success text-white rounded-circle shadow">
                                <i class="fas fa-user fa-2x"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <span class="text-success mr-2">{{ $follup_success_this_month_count }}</span>
                        <span class="text-nowrap">Sukses bulan ini</span>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card card-stats shadow">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Tingkat Keberhasilan</h5>
                            <span class="h2 font-weight-bold mb-0">@if($follup_all_count>0) {{ ($follup_success_count / $follup_all_count)*100 }} % @else 0 % @endif</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-warning text-white rounded-circle shadow">
                                <i class="fas fa-people-arrows fa-2x"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <span class="text-warning mr-2">@if($follup_this_month_count>0) {{ ($follup_success_this_month_count / $follup_this_month_count)*100 }} % @else 0 % @endif</span>
                        <span class="text-nowrap">Follow up bulan ini</span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-body">
                    <div class="chart">
                        <!-- Chart wrapper -->
                        <canvas id="chart-follow-up" width="300" height="100" class="chart-canvas">Your browser does not support the canvas element.</canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
@endsection

@section('page_js_plugins')
<script>
var d = new Date();
var month = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
var ctx = document.getElementById('chart-follow-up');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [month[d.getMonth()-5], month[d.getMonth()-4], month[d.getMonth()-3], month[d.getMonth()-2], month[d.getMonth()-1], month[d.getMonth()]],
        datasets: [
            {
                label: '# of Votes',
                fill: false,
                data: [11, 2, 3, 33, 2, 3],
                backgroundColor: 'rgba(255, 99, 132, 1)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            },
            {
                label: '# 2',
                fill: false,
                data: [2, 1, 3, 1, 2, 3],
                backgroundColor: 'rgba(255, 99, 132, 1)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            },
        ]
    },
    options: {
        responsive: true,
        title: {
            display: true,
            text: 'Chart.js Line Chart'
        },
        tooltips: {
            mode: 'index',
            intersect: false,
        },
        hover: {
            mode: 'nearest',
            intersect: true
        },
        scales: {
            xAxes: [{
                display: true,
                scaleLabel: {
                    display: true,
                    labelString: 'Month'
                }
            }],
            yAxes: [{
                display: true,
                scaleLabel: {
                    display: true,
                    labelString: 'Value'
                }
            }]
        }
    }
});
</script>
@endsection
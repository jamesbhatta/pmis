@extends('user_app')
@section('content')
@include('navbar')
<div style="background-color: #edf2f8;width:100%;height:100vh;">
    <div style="height: 150px;"></div>
    <div class="container">
        <canvas id="myBarChart" style="height: 180px; max-width: 480px; margin: 0px auto; float:right;"></canvas>
    </div>
    <div class="container">
        <canvas id="myPieChart" style="height: 180px; max-width: 480px; margin: 0px auto; float:left;"></canvas>

    </div>
</div>
@endsection
@push('scripts')
<script>
    const barChart = document.getElementById('myBarChart').getContext('2d');
    const labels = [
        'Red',
        'Blue',
        'Yellow',
        'Green',
        'Purple',
        'Orange'
    ];
    const myChart = new Chart(barChart, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: '# of Votes',

                backgroundColor: [
                    'red',
                    'blue',
                    'yellow',
                    'pink',
                    'purple',
                    'orange'
                ],

                data: [20, 30, 40, 50, 60, 70, 80, 90, 100, 0],
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,

                }
            }
        }
    });



    const barPieChart = document.getElementById('myPieChart').getContext('2d');
    const labelsPie = [
        'red',
        'blue',
        'yellow',
        'pink',
        'purple',
        'orange'
    ];
    const myPieChart = new Chart(barPieChart, {
        type: 'doughnut',
        data: {
            labels: labelsPie,
            datasets: [{
                label: 'My First Dataset',
                data: [30, 50, 40, 10, 20, 30],
                backgroundColor: [
                    'red',
                    'blue',
                    'yellow',
                    'pink',
                    'purple',
                    'orange'

                ],

            }]
        },
    });
</script>

@endpush
<style>
    #navbar {
        background: linear-gradient(to right, #3f0fb7, #1e78de);
        box-shadow: 0 3px 6px 0 rgb(0 0 0 / 12%) !important;
        font-family: "Roboto", sans-serif;
        position: fixed;
        width: 100vw;
    }

    .card1 {
        border-radius: 4px;
    }

    .card1 div span a {
        color: black;

    }

    .card1 div:hover {
        background-color: #4d3300;
        color: #fff;
        border-radius: 4px;
    }

    .card1 div:hover span a {
        color: #fff;
    }

    .fontsize th {
        font-weight: bold;
        font-size: 20px;
        text-align: center;
    }

    .fontsize1 td {
        text-align: center;
        font-size: 18px;
        /* background-color: #acadb0; */
    }

    .ChartStyle {
        float: right;
        margin-top: 10px;
    }
</style>
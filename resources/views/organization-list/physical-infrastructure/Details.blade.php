@extends('user_app')
@section('content')
@include('navbar')

<div style="background-color: #edf2f8;width:100%;height:100vh;">
    <div style="height: 150px;"></div>
    <div class="container">
        <script>
            window.onload = function() {

                var chart = new CanvasJS.Chart("chartContainer", {
                    animationEnabled: true,
                    theme: "light2", // "light1", "light2", "dark1", "dark2"
                    title: {
                        text: "Physical Infrastructure"
                    },
                    axisY: {
                        title: "No of Projects"
                    },
                    data: [{
                        type: "column",
                        showInLegend: true,
                        legendMarkerColor: "grey",
                        legendText: "MMbbl = one million barrels",
                        dataPoints: [{
                                y: 3008,
                                label: "Venezuela"
                            },
                            {
                                y: 2664,
                                label: "Saudi"
                            },
                            {
                                y: 1697,
                                label: "Canada"
                            },
                            {
                                y: 1584,
                                label: "Iran"
                            },
                            {
                                y: 1425,
                                label: "Iraq"
                            },
                            {
                                y: 1015,
                                label: "Kuwait"
                            },
                            {
                                y: 9780,
                                label: "UAE"
                            },
                            {
                                y: 8000,
                                label: "Russia"
                            }
                        ]
                    }]
                });
                chart.render();
            }
        </script>
        <div id="chartContainer" style="height: 300px; width: 60%;"></div>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    </div>
</div>
@endsection
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
</style>
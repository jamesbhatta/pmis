@extends('user_app')
@section('content')
@include('navbar')



<div style="background-color: #edf2f8;width:100%;height:100vh;">
    <div style="height: 150px;"></div>
    <div class="container">

        <table class="table table-striped">
            <thead class="fontsize">
                <th scope="col">#</th>
                <th scope="col">जिल्लागत परियोजना</th>
                <th scope="col">कुल परियोजना</th>
            </thead>
            <tbody>
                <tr class="fontsize1">
                    <td><a href="https://sagarkathariya.com.np">1</a></td>
                    <td><a href="https://sagarkathariya.com.np">Kailali</a></td>
                    <td><a href="https://sagarkathariya.com.np">10</a></td>
                </tr>
                <tr class="fontsize1">
                    <td><a href="https://sagarkathariya.com.np">2</a></td>
                    <td><a href="https://sagarkathariya.com.np">Kanchanpur</a></td>
                    <td><a href="https://sagarkathariya.com.np">12</a></td>
                </tr>
                <tr class="fontsize1">
                    <td><a href="https://sagarkathariya.com.np">3</a></td>
                    <td><a href="https://sagarkathariya.com.np">Doti</a></td>
                    <td><a href="https://sagarkathariya.com.np">20</a></td>
                </tr>

            </tbody>
        </table>
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
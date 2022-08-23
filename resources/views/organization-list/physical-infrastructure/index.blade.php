@extends('user_app')
@section('content')
@include('navbar')



<div style="background-color: #edf2f8;width:100%;height:100vh;">
    <div style="height: 150px;"></div>
    <div class="container">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark fontsize">
                <th scope="col">S.No</th>
                <th scope="col">Title</th>
                <th scope="col">Fiscal Year</th>
                <th scope="col">Budget</th>
                <th scope="col">Budget Upashirshakh</th>
                <th scope="col">Budget Source</th>
                <th scope="col">Expenditure</th>
                <th scope="col">Status</th>
            </thead>
            <tbody>
            @foreach ($physical_infrastures as $physical_infrasture)
                <tr class="fontsize1">
                    <td>1</td>
                    <td>{{$physical_infrasture->title}}</td>
                    <td>{{$physical_infrasture->fiscal_year}}</td>
                    <td>{{$physical_infrasture->budget}}</td>
                    <td>{{$physical_infrasture->budget_upashirshakh}}</td>
                    <td>{{$physical_infrasture->budget_source}}</td>
                    <td>{{$physical_infrasture->expenditure}}</td>
                    <td>1</td>
                </tr>
                @endforeach
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
        font-size: 20px;
        text-align: center;
    }

    .fontsize1 td {
        text-align: center;
        font-size: 18px;
       background-color:#acadb0;
    }
</style>
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
                    <td><a href="{{route('all-projects')}}">1</a></td>
                    <td><a href="{{route('all-projects')}}">Kailali</a></td>
                    <td><a href="{{route('all-projects')}}">10</a></td>
                </tr>
                <tr class="fontsize1">
                    <td><a href="{{route('view-details')}}">2</a></td>
                    <td><a href="{{route('view-details')}}">Kanchanpur</a></td>
                    <td><a href="{{route('view-details')}}">12</a></td>
                </tr>
                <tr class="fontsize1">
                    <td><a href="{{route('view-details')}}">3</a></td>
                    <td><a href="{{route('view-details')}}">Doti</a></td>
                    <td><a href="{{route('view-details')}}">20</a></td>
                </tr>

            </tbody>
        </table>
    </div>
</div>
@endsection

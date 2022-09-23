@extends('user_app')
@section('content')
@include('navbar')



<div style="background-color: #edf2f8;width:100%;height:100vh;">
    <div style="height: 150px;"></div>
    <div class="container">

        <table class="table table-striped">
            <thead class="fontsize">
                <th scope="col">#</th>
                <th scope="col">कार्यालय</th>
                <th scope="col">कुल परियोजना</th>
            </thead>
            <tbody>
            @foreach($offices as $item)
                <tr class="fontsize1">
                    <td><a href="{{route('all-projects',$item->id)}}">1</a></td>
                    <td><a href="{{route('all-projects',$item->id)}}">{{$item->name}}</a></td>
                    <td><a href="{{route('all-projects',$item->id)}}">{{$item->project_count}}</a></td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
</div>
@endsection

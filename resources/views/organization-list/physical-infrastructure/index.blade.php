@extends('user_app')
@section('content')
@include('navbar')

<div style="background-color: #edf2f8;width:100%;height:100vh;">
    <div style="height: 150px;"></div>
    <div class="container">
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/"><i class="fa fa-home" aria-hidden="true"></i></a></li>
            <li class="breadcrumb-item"><a href="#">भौतिक पूर्वाधार तथा यातायात मन्त्रालय</a></li>
            <li class="breadcrumb-item active" aria-current="page"></li>
        </ol>
    </nav>

        <table class="table table-striped">
            <thead class="fontsize">
                <th scope="col">#</th>
                <th scope="col">कार्यालय</th>
                <th scope="col">प्रकार</th>
                <th scope="col">कुल परियोजना</th>
            </thead>
            <tbody>
            @foreach($organizations as $item)
                <tr class="fontsize1">
                    <td><a href="">{{ $loop->iteration }}</a></td>
                    <td><a href="">{{$item->name}}</a></td>
                    <td><a href="">{{$item->type}}</a></td>
                    <td><a href="">{{}}</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('breadcrumb')
<nav aria-label="breadcrumb ">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">ड्यासबोर्ड</a></li>
        <li class="breadcrumb-item"><a href="{{route('report')}}">@lang('navigation.report')</a></li>
        <li class="breadcrumb-item active" aria-current="page">@lang('navigation.indicator')</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container-fluid">
    <table class="bg-white table table-bordered">
        <tr>
            <th> सि.नं.</th>
            <th>सूचकहरू (Key Indicators)</th>
            <th>इकाइ</th>
            <th>प्रगति</th>
        </tr>
        @foreach ($report as $key => $items)
        @foreach ($items as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $key }}</td>
                <td></td>
                <td>{{ $item->economic_progress_percent }}%</td>
            </tr>
        @endforeach
        @endforeach
    </table>
</div>
@endsection

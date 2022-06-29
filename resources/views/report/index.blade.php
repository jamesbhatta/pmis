@extends('layouts.app')

@section('breadcrumb')
<nav aria-label="breadcrumb ">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">ड्यासबोर्ड</a></li>
        <li class="breadcrumb-item active" aria-current="page">Report</li>
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
    </table>
</div>
@endsection

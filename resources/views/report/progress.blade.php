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
            <th rowspan="2"> सि.नं.</th>
            <th rowspan="2">आयोजना / कार्यक्रम</th>
            <th colspan="3" class="text-center">आयोजना संख्या</th>
            <td rowspan="2" class="text-center">यस अबधिसम्म संचालन भएका योजना संख्या</td>
            <td rowspan="2" class="text-center">यस अबधिसम्म सर्भेषण तथा लागत अनुमान भएका  योजना संख्या</td>
        </tr>
        <tr>
            <th>आयोजना संख्या</th>
            <th>क्ररमागत</th>
            <th>कुल जम्मा</th>
        </tr>
        {{-- @foreach ($report as $key => $items)
        @foreach ($items as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $key }}</td>
                <td></td>
                <td>{{ $item->economic_progress_percent }}%</td>
            </tr>
        @endforeach
        @endforeach --}}
    </table>
</div>
@endsection

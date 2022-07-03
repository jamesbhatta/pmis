@extends('layouts.app')

@section('breadcrumb')
<nav aria-label="breadcrumb ">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">ड्यासबोर्ड</a></li>
        <li class="breadcrumb-item active" aria-current="page">रिपोर्ट</li>
    </ol>
</nav>
@endsection

@push('styles')
    <style>
        .report-link-grid {
            display: grid; grid-template-columns: 1fr 1fr 1fr 1fr;
            gap: 1rem;
        }
        .report-link-grid > * {
            background-color: #fff;
            min-height: 200px;
            font-size: 2rem;
            color: inherit;
            border-radius: 4px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: 600;
        }
    </style>
@endpush

@section('content')
<div class="container-fluid font-noto">

    <div class="report-link-grid">
        <a href="{{ route('report.indicator-report') }}">सूचकहरू</a>
        <a href="{{ route('report.progress-report') }}">प्रगति रिपोर्ट</a>
    </div>

</div>
@endsection

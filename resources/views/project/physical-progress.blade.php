@extends('layouts.app')

@section('content')
<div class="container">
    @include('project.navigation')
    <div class="my-3">
        @include('alerts.all')
    </div>
    <project-physical-progress :project="{{ $project }}" :physical-progress="{{ $physicalProgress }}"></project-physical-progress>
</div>
@endsection

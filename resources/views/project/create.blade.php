@extends('layouts.app')

@section('content')
<div class="container">
    @include('alerts.all')
    <section>
        <project-form :project="{{ $project }}" :organizations="{{ $organizations }}" :project-types="{{ $projectTypes }}"></project-form>
    </section>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    @include('alerts.all')
    <section>
        <project-form :project="{{ $project }}" :organizations="{{ $organizations }}" :project-types="{{ $projectTypes }}" :budget-sources="{{ $budgetSources }}"></project-form>
    </section>
</div>
@endsection

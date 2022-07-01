@extends('layouts.app')

@section('content')
<div class="container">
    @include('project.navigation')
    <div class="my-3">
        @include('alerts.all')
    </div>
    <section class="box">
        <div class="box__body">
            <div class="d-flex">
                <h5 class="box__title">परियोजना विवरण</h5>
                <div class="ml-auto">
                    <a href="{{ route('project.edit', $project) }}">Edit</a>
                </div>
            </div>
            <div class="d-flex">
                <div><span class="text-muted">दर्ता नं :</span> १</div>
                <div class="ml-auto"><span class="text-muted">आर्थिक बर्ष :</span> २०७८/०७९</div>
            </div>
            <div><span class="text-muted">योजनाको नाम :</span> {{ $project->title }}</div>

            <div class="my-4">
                <div class="progress">
                    <div class="progress-bar progress-bar-striped" role="progressbar" style="width: {{ $project->economic_progress_percent }}%" aria-valuenow="{{ $project->economic_progress_percent }}" aria-valuemin="0" aria-valuemax="100">{{ $project->economic_progress_percent }} %</div>
                </div>
                <div class="text-center mt-2">आर्थिक प्रगति ({{ $project->economic_progress_percent }}%)</div>
            </div>

            <div><span class="text-muted">बिषयगत क्षेत्रको किसिम :</span> {{ $project->projectType->name }}</div>
            <div><span class="text-muted">शिर्षकगत किसिम :</span> {{ $project->projectType->topic->title }}</div>
            
            @if ($project->last_year_expenditure)
            <div><span class="text-muted">गत आर्थिक वर्षको खर्च :</span> रु. {{ $project->last_year_expenditure }} /-</div>
            @endif
            @if ($project->last_year_physical_progress)
            <div><span class="text-muted">गत आर्थिक वर्षको भौतिक प्रगति :</span> {{ $project->last_year_physical_progress }}(%)</div>
            @endif
            <div><span class="text-muted">लाभाम्वित हुने जनसंख्या :</span> {{ $project->population_to_be_benefited }}</div>


            <h5 class="box__title my-2">बजेट</h5>
            <div><span class="text-muted">बजेट :</span> रु.{{ $project->budget }} /-</div>
            <div><span class="text-muted">बजेटको स्रोत:</span> {{ $project->budget_source }}</div>
            <div><span class="text-muted">खर्चको किसिम:</span> {{ $project->expenditure_type }}</div>

            <h5 class="box__title my-2">विवरण</h5>
            <div>
                {!! $project->description !!}
            </div>
        </div>
    </section>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    @include('project.navigation')
    @include('alerts.all')
    <section class="box mt-4">
        <div class="box__body">
            <div class="d-flex">
                <h5 class="box__title">परियोजना विवरण</h5>
                <div class="ml-auto">
                    <a href="{{ route('project.edit', $project) }}">Edit</a>
                </div>
            </div>
            <div class="d-flex">
                <div>दर्ता नं : १</div>
                <div class="ml-auto">आर्थिक बर्ष : २०७८/०७९</div>
            </div>
            <div>योजनाको नाम : {{ $project->title }}</div>
            <div>बिषयगत क्षेत्रको किसिम : पूर्वाधार क्षेत्र</div>
            <div>शिर्षकगत किसिम : यातायात पूर्वाधार</div>
            <h5 class="5-responsive my-2">Budget</h5>
            <div>बजेट: {{ $project->budget }}</div>
            <div>बजेट स्रोत: {{ $project->budget_source }}</div>
            <div>खर्च किसिम: {{ $project->expenditure_type }}</div>
        </div>
    </section>
</div>
@endsection

@extends('user_app')
@section('content')
@include('navbar')
<div style="background-color: #edf2f8;width:100%;">
    <div style="height: 150px;"> </div>
    <div class="container mt-3">
        <div class="row">
            <div class="row col-6">
        
                <div class="row">
                    <h5 class="font-weight-bold">परियोजनाको विवरण</h5>
                </div>
                <div class="row listOfDetails" style="width: 100%; float:left;">
                    <ul>
                        <li>परियोजनाको नाम:{{$project->title}}</li>
                        <li>दर्ता नं : {{$project->id}}</li>
                        <li>आर्थिक बर्ष :{{$project->fiscal_year_id}}</li>
                    </ul>
                </div>
                <div class="row" style="width: 100%; float:left;">
                    <h5 class="font-weight-bold">आर्थिक प्रगति</h5>
                </div>
                <div class="row listOfDetails">
                    <ul>
                        <li><label class="">बिषयगत क्षेत्रको किसिम :</label>{{$project->projectType->name}}</li>
                        <li>शिर्षकगत किसिम :{{$project->projectType->topic->title}}</li>
                        <li>गत आर्थिक वर्षको खर्च :रु. {{ $project->last_year_expenditure }}/-</li>
                        <li>गत आर्थिक वर्षको भौतिक प्रगति :{{ $project->last_year_physical_progress }}(%)</li>
                        <li>लाभाम्वित हुने जनसंख्या :{{ $project->population_to_be_benefited }}</li>
                        <li>बजेट :रु.{{ $project->budget }}</li>
                        <li>बजेटको स्रोत : {{ $project->budget_source }}</li>
                        <li>खर्चको किसिम :{{ $project->expenditure_type }}</li>
                    </ul>
                </div>
                <div class="row" style="width: 100%; float:left;">
                    <h5 class="font-weight-bold">भौतिक प्रगति</h5>
                </div>
                <div class="row listOfDetails">
                    <ul >
                        <li>लागत अनुमान बनेको छ?:@if ($project->physicalProgress=="")@else{{$project->physicalProgress->estimate_completed ? "छ" : "छैन" }}@endif</li>
                        <li>सम्झौता भएको छ?: @if ($project->physicalProgress=="")@else{{$project->physicalProgress->agreement_date ? "छ" : "छैन" }}@endif</li>
                        <li>सम्झौता भएको मिति:@if ($project->physicalProgress=="")@else{{$project->physicalProgress->agreement_date}}@endif</li>
                        <li>परियोजना सुरु मिति:@if ($project->physicalProgress=="")@else{{$project->physicalProgress->project_start_date}}@endif</li>
                        <li>परियोजना सम्पन्न मिति:@if ($project->physicalProgress=="")@else{{$project->physicalProgress->project_completion_date}}@endif</li>
                        <li>ठेक्का मिति:@if ($project->physicalProgress=="")@else{{$project->physicalProgress->tender_date}}@endif</li>
                        <li>काम हुदै छ?:@if ($project->physicalProgress=="")@else{{$project->physicalProgress->wip ? "छ" : "छैन" }}@endif</li>
                        <li>अनुगमन हुदै छ?@if ($project->physicalProgress=="")@else{{$project->physicalProgress->followed_up ? "छ" : "छैन" }}@endif</li>
                    </ul >
                </div>
            </div>
            <div class="row col-6" style=" width:100%;float:right">
                <!-- <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </div> -->
                <div class="container">
                    <canvas id="myBarChart" style="height: 300px; max-width: 640px; margin: 0px auto; opacity:2;"></canvas>
                </div>
                <div class="row" style="width: 100%; float:left;">
                    <h5 class="font-weight-bold">उल्लेखनिए कार्यहरू</h5>
                    <label>{{$project->acheivements}}</label>
                </div>
                <div class="row col-12" style="margin: 0px 20px 0px 20px; height: 150px;">
                   
                </div>
            </div>


            <div class="row col-12  ">
                <h5 class="font-weight-bold">परियोजनाका तस्बिरहरू</h5>
                <div class="row mt-5">
                    @foreach ($project->image as $item)
                    {{-- {{$item}} --}}
                    <div class="col-lg-6">
                        <img src="{{asset('storage')}}{{'/'}}{{$item->image}}" class="img-fluid" alt="Responsive image">
                        
                    </div>    
                    @endforeach
                    
                   
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>
@endsection
@push('scripts')
<script>
    let expenditure={{$project->last_year_expenditure }};
    let budget={{$project->budget}};
    let economic_progress=expenditure/budget;
    let progress=economic_progress*100;
    
    const barChart = document.getElementById('myBarChart').getContext('2d');
    const labels = [
        'भौतिक प्रगति',
        'आर्थिक प्रगति',
    ];
    const myChart = new Chart(barChart, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: '# of Votes',

                backgroundColor: [
                    'red',
                    'blue',
                    
                ],

                data: [{{ $project->last_year_physical_progress }}, progress,0,100],
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,

                }
            }
        }
    });
</script>

@endpush
<style>
    #navbar {
        background: linear-gradient(to right, #3f0fb7, #1e78de);
        box-shadow: 0 3px 6px 0 rgb(0 0 0 / 12%) !important;
        font-family: "Roboto", sans-serif;
        position: fixed;
        width: 100vw;
    }

    .card1 {
        border-radius: 4px;
    }

    .card1 div span a {
        color: black;

    }

    .card1 div:hover {
        background-color: #4d3300;
        color: #fff;
        border-radius: 4px;
    }

    .card1 div:hover span a {
        color: #fff;
    }

    .fontsize th {
        font-weight: bold;
        font-size: 20px;
        text-align: center;
    }

    .fontsize1 td {
        text-align: center;
        font-size: 18px;
    }

    .ChartStyle {
        float: right;
        margin-top: 10px;
    }

    .listOfDetails ul li {
        list-style: none;
    }
</style>
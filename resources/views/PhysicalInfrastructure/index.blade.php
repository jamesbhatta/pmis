@extends('layouts.app')

@section('content')
<div class="container">
    {{-- @include('alerts.all') --}}
</div>

<div class="container-fluid">
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">ड्यासबोर्ड</a></li>
            <li class="breadcrumb-item">परियोजना </li>
            <li class="breadcrumb-item active" aria-current="page">भौतिक पूर्वाधार तथा यातायात मन्त्रालय </li>
        </ol>
    </nav>


    <div class="card z-depth-0">
        <div class="card-header">
            <div class="d-flex">
                <h1 class="h3-responsive d-inline-block">भौतिक पूर्वाधार तथा यातायात मन्त्रालय परियोजनाहरू</h1>
                <div class="ml-auto">
                    <a href="{{route('DrinkingWaterOffice.create')}}" class="btn btn-primary btn-sm z-depth-0">Add New</a>
                </div>
            </div>
        </div>
        <div class="card-body" style="overflow-x: auto;">
            <table class="table table-striped table-hover" style="width: 2000px;">
                <thead >
                    <tr class="h3" >
                        <th>क्र.स.</th>
                        <th>कार्यक्रम तथा परियोजना</th>
                        <th>जिल्ला</th>
                        <th>पालिका</th>
                        <th>सुरु बर्ष</th>
                        <th>लाभाम्वित हुने जनसंख्या</th>
                        <th>लागत अनुमान</th>
                        <th>खर्च रू.हजार मा</th>
                        <th>भौतिक प्रगाति(%)</th>
                        <th>चालु आ.व को बजेट</th>
                        <th>उपभोक्ता समितिको अध्यक्षको नाम</th>
                        <th>उपभोक्ता समितिको अध्यक्षको सम्पर्क न.</th>
                        <th>कैफियत</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($physicalInfrastructures as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="font-roboto">{{ $item->ProjectName }}1</td>
                        <td class="font-roboto">{{ $item->district}}2</td>
                        <td class="font-roboto">{{ $item->municipality}}3</td>
                        <td class="font-roboto">रु. {{ $item->starting_date}}4</td>
                        <td class="font-roboto">{{ $item->Population_to_be_benefited}}</td>
                        <td class="font-roboto">{{ $item->CostEstimate}}</td>
                        <td class="font-roboto">{{ $item->lastYearExpenses}}</td>
                        <td class="font-roboto">{{ $item->lastYearProgress}}</td>
                        <td class="font-roboto">{{ $item->chaluArthikBarshaBudget}}</td>
                        <td class="font-roboto">{{ $item->ChairmanName}}</td>
                        <td class="font-roboto">{{ $item->ChairmanContact}}</td>
                        <td class="font-roboto">{{ $item->remarks}}</td>


                        <td>
                            <a class="action-btn text-primary" href="{{ route('DrinkingWaterOffice.edit', $item) }}"><i class="far fa-edit"></i></a>
                            <form action="{{ route('DrinkingWaterOffice.destroy', $item) }}" method="post" onsubmit="return confirm('के तपाईँ निश्चित हुनुहुन्छ?')" class="form-inline d-inline">
                                @csrf

                                <button type="submit" class="action-btn text-danger"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr class="text-center font-italic">
                        <td colspan="10">
                            <div>
                                <svg id="Layer_1" enable-background="new 0 0 512 512" height="40" fill="#fefefe" viewBox="0 0 512 512" width="50" xmlns="http://www.w3.org/2000/svg">
                                    <path d="m512 256c0 68.38-26.629 132.667-74.98 181.02-48.353 48.351-112.64 74.98-181.02 74.98-47.869 0-93.723-13.066-133.518-37.482l29.35-29.35c30.91 17.088 66.42 26.832 104.168 26.832 119.103 0 216-96.897 216-216 0-37.748-9.744-73.258-26.833-104.167l29.351-29.35c24.416 39.794 37.482 85.648 37.482 133.517zm-482.858 255.142-28.284-28.284 60.528-60.528c-39.719-46.325-61.386-104.661-61.386-166.33 0-68.38 26.629-132.667 74.98-181.02 48.353-48.351 112.64-74.98 181.02-74.98 61.669 0 120.005 21.667 166.33 61.386l60.528-60.528 28.284 28.284zm60.711-117.28 304.009-304.009c-37.431-31.114-85.497-49.853-137.862-49.853-119.103 0-216 96.897-216 216 0 52.365 18.738 100.431 49.853 137.862z" />
                                </svg>
                            </div>
                            <div class="mt-3">
                                डाटाबेसमा कुनै डाटा छैन |
                            </div>
                        </td>

                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
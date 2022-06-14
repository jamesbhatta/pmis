@extends('layouts.app')

@section('content')
<div class="container">
    {{-- @include('alerts.all') --}}
</div>

<div class="container-fluid">
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">ड्यासबोर्ड</a></li>
            <li class="breadcrumb-item active" aria-current="page">परियोजना </li>
        </ol>
    </nav>
    {{-- We will use vue.js in form --}}
    {{--
            <div class="card z-depth-0 my-5">
            <div class="card-head">
                <h3 class="text-center my-3">नयाँ परियोजना थप्नुहोस्</h3>
                <hr>
            </div>
           <div class="card-body">
                <form action="{{$project->id ? route('project.update',$project) : route('project.store')}}" method="POST">
    @csrf
    @if ($project->id)
    @method('PUT')

    @endif
    <div class="row">
        <div class="form-group col-lg-4">
            <label>शीर्षक</label>

            <input type="text" class="form-control" name="title" value="{{old('title',$project->title)}}">
            <label class="px-1 text-danger">{{ $errors->first('title') }}</label>
        </div>
        <div class="form-group col-lg-4">
            <label> संगठन</label>
            <select class="form-control" name="organization_id">
                @if ($project->id)
                <option value="{{$project->organization_id}}" selected>{{$project->organization->name}}</option>
                @endif
                <option value="">कृपया संगठन चयन गर्नुहोस्</option>
                @foreach ($organizations as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
            <label class="px-1 text-danger">{{ $errors->first('organization_id') }}</label>
        </div>
        <div class="form-group col-lg-4">
            <label>परियोजना प्रकार</label>
            <select class="form-control" name="project_type">
                @if ($project->id)
                <option value="{{$project->project_type}}">{{$project->project_type}}</option>
                @endif
                <option value="">परियोजना प्रकार चयन गर्नुहोस्</option>
                <option value="सिचाई">सिचाई</option>
                <option value="खाने पानी">खाने पानी</option>
                <option value="पूर्वधार">पूर्वधार</option>
                <option value="सहरी विकास  ">सहरी विकास</option>
                <option value="यातायात">यातायात</option>
            </select>
            <label class="px-1 text-danger">{{ $errors->first('project_type') }}</label>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <label class="" for="inlineFormInputGroup">बजेट</label>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">रु.</div>
                </div>
                <input type="text" class="form-control" id="inlineFormInputGroup" name="budget" value="{{old('budget',$project->budget)}}">
            </div>
        </div>
        <div class="form-group col-lg-4">
            <label>बजेट स्रोत</label>
            <input type="text" class="form-control" name="budget_source" value="{{old('budget_source',$project->budget_source)}}">
        </div>
        <div class="form-group col-lg-4">
            <label>विवरण</label>
            <input type="text" class="form-control" name="description" value="{{old('description',$project->description)}}">
        </div>
    </div>
    <input type="submit" value="{{$project->id? "Update":"थप्नुहोस्"}}" class=" btn btn-primary">
    </form>
</div>
</div> --}}

<div class="card z-depth-0">
    <div class="card-header">
        <div class="d-flex">
            <h1 class="h3-responsive d-inline-block">परियोजना हरू</h1>
            <div class="ml-auto">
                <a href="{{ route('project.create') }}" class="btn btn-primary btn-sm z-depth-0">Add New</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>क्र.स.</th>
                    <th>शीर्षक</th>
                    <th>संगठन</th>
                    <th>परियोजना प्रकार</th>
                    <th>बजेट</th>
                    <th>बजेट स्रोत</th>
                    <th>विवरण</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="font-roboto">{{ $item->title }}</td>
                    <td class="font-roboto">{{ $item->organization->name }}</td>
                    <td class="font-roboto">{{ $item->project_type}}</td>
                    <td class="font-roboto">रु. {{ $item->budget}}</td>
                    <td class="font-roboto">{{ $item->budget_source}}</td>
                    <td class="font-roboto">{{ $item->description}}</td>


                    <td>
                        <a class="action-btn text-primary" href="{{ route('project.edit', $item) }}"><i class="far fa-edit"></i></a>
                        <form action="{{ route('project.destroy', $item) }}" method="post" onsubmit="return confirm('के तपाईँ निश्चित हुनुहुन्छ?')" class="form-inline d-inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="action-btn text-danger"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr class="text-center font-italic">
                    <td colspan="10">
                        <div>
                            <svg id="Layer_1" enable-background="new 0 0 512 512" height="40" fill="#fefefe" viewBox="0 0 512 512" width="50" xmlns="http://www.w3.org/2000/svg">
                                <path d="m512 256c0 68.38-26.629 132.667-74.98 181.02-48.353 48.351-112.64 74.98-181.02 74.98-47.869 0-93.723-13.066-133.518-37.482l29.35-29.35c30.91 17.088 66.42 26.832 104.168 26.832 119.103 0 216-96.897 216-216 0-37.748-9.744-73.258-26.833-104.167l29.351-29.35c24.416 39.794 37.482 85.648 37.482 133.517zm-482.858 255.142-28.284-28.284 60.528-60.528c-39.719-46.325-61.386-104.661-61.386-166.33 0-68.38 26.629-132.667 74.98-181.02 48.353-48.351 112.64-74.98 181.02-74.98 61.669 0 120.005 21.667 166.33 61.386l60.528-60.528 28.284 28.284zm60.711-117.28 304.009-304.009c-37.431-31.114-85.497-49.853-137.862-49.853-119.103 0-216 96.897-216 216 0 52.365 18.738 100.431 49.853 137.862z" /></svg>
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

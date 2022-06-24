@extends('layouts.app')

@section('breadcrumb')
<nav aria-label="breadcrumb ">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">ड्यासबोर्ड</a></li>
        <li class="breadcrumb-item active" aria-current="page">परियोजना </li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container">
    {{-- @include('alerts.all') --}}
</div>

<div class="container-fluid">
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

<div class="d-flex align-items-center mb-3">
    <h1 class="h3-responsive d-inline-block">परियोजनाहरू</h1>
    <div class="ml-auto">
        <a href="{{ route('project.create') }}" class="btn btn-primary z-depth-0">Add New</a>
    </div>
</div>
<table class="bg-white table">
    <thead>
        <tr>
            <th>क्र.स.</th>
            <th>शीर्षक</th>
            <th>संगठन</th>
            <th>परियोजना प्रकार</th>
            <th>बजेट</th>
            <th>बजेट स्रोत</th>
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
        <tr>
            <td colspan="10" class="text-center font-italic">डाटाबेसमा कुनै डाटा छैन |</td>
        </tr>
        @endforelse
    </tbody>
</table>
</div>
@endsection

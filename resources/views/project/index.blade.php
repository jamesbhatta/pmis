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
<div class="container-fluid">
    @include('alerts.all')
    <div class="d-flex align-items-center mb-3">
        <h1 class="box__title">परियोजनाहरू</h1>
        <div class="ml-auto">
            <a href="{{ route('project.create') }}" class="btn btn-success z-depth-0">Add New</a>
        </div>
    </div>

    <div class="d-flex font-noto mb-4" style="gap: 1rem;">
        <div>
            @if (auth()->user()->user_type != 'sub-division')
            <button class="custom-select" type="button" id="projectTypeDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ request('filter[organization_id]', 'कार्यालय')}}
              </button>
              <div class="dropdown-menu" aria-labelledby="projectTypeDropdown">
                @foreach ($organizations as $organization)
                <a class="dropdown-item" href="?filter[organization_id]={{ $organization->id }}">{{ $organization->name }} ({{ optional($organization->district)->name ?? $organization->address }})</a>
                @endforeach
              </div>
            @endif
        </div>
        <div>
            <button class="custom-select" type="button" id="projectTypeDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ request('filter[project_type_id]', 'परियोजनाका प्रकार')}}
              </button>
              <div class="dropdown-menu" aria-labelledby="projectTypeDropdown">
                @foreach ($projectTypes as $topic => $types)
                <a class="dropdown-item" href="#" disabled style="font-style: italic; background-color: #f2f7fb;">{{ $topic }}</a>
                @foreach ($types as $projectType)
                <a class="dropdown-item" href="?filter[project_type_id]={{ $projectType->id }}">{{ $projectType->name }}</a>
                @endforeach
                @endforeach
              </div>
        </div>
        <form class="ml-auto" action="">
            <input type="text" name="filter[search]" class="form-control" placeholder="Search">
        </form>
    </div>

    <table class="bg-white table projects-table">
        <thead>
            <tr>
                <th>क्र.स.</th>
                <th>दर्ता नं.</th>
                <th>आयोजना / कार्यक्रम</th>
                <th>संगठन</th>
                <th>परियोजना प्रकार</th>
                <th>बजेट</th>
                <th>बजेट स्रोत</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($projects as $project)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <span class="project-register-no">{{ $project->id }}</span>
                </td>
                <td class="font-roboto">{{ $project->title }}</td>
                <td class="font-roboto">{{ $project->organization->name }}</td>
                <td class="font-roboto">{{ $project->projectType->name}}</td>
                <td class="font-roboto">रु. {{ $project->budget}}</td>
                <td class="font-roboto">{{ $project->budget_source}}</td>
                <td class="text-right">
                    <a href="{{ route('project.show', $project) }}" class="btn btn-primary btn-md font-noto my-0 py-2 px-3 z-depth-0"><i class="fa fa-eye mr-2"></i>View</a>
                    {{-- <a href="{{ route('project.edit', $project) }}" class="action-btn text-primary"><i class="far fa-edit"></i></a> --}}
                    {{-- <form action="{{ route('project.destroy', $project) }}" method="post" onsubmit="return confirm('के तपाईँ निश्चित हुनुहुन्छ?')" class="form-inline d-inline">
                    @csrf
                    @method('delete')
                    <button type="submit" class="action-btn text-danger"><i class="far fa-trash-alt"></i></button>
                    </form> --}}
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

@extends('layouts.app')

@section('breadcrumb')
<nav aria-label="breadcrumb ">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">ड्यासबोर्ड</a></li>
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

    <!-- @includes('project.__filter_bar') -->

    <div class="bg-white">
        <table class="table projects-table">
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

        <nav class="p-2 px-3 font-noto">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    Showing {{ $projects->firstItem() }} to {{ $projects->lastItem() }} of {{ $projects->total() }} records
                </div>
                <div>
                    {{ $projects->links() }}
                </div>
            </div>
        </nav>
    </div>

</div>
@endsection

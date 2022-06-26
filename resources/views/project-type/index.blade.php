@extends('layouts.app')

@section('content')

<div class="container">
    @include('alerts.all')
</div>

<div class="container">
    <div class="card z-depth-0">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <form action="{{ $projectType->id ? route('project-type.update', $projectType) : route('project-type.store') }}" method="POST" class="form font-roboto">
                        @csrf
                        @isset($projectType->id)
                        @method('put')
                        @endisset
                        <div class="form-group">
                            <label for="input-fiscal-year">@lang('navigation.project_type')</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name',$projectType->name) }}">
                        </div>
                        <div class="form-group">
                            <label for="input-fiscal-year">@lang('navigation.project_type')&nbsp;(Eng.Optional)</label>
                            <input type="text" name="name_en" class="form-control" value="{{ old('name_en',$projectType->name_en) }}">
                        </div>
                        <div class="form-group">
                            <label for="input-fiscal-year">Group</label>
                            <select name="group" class="custom-select">
                                @foreach (config('constants.project_type_groups') as $group)
                                <option value="{{ $group }}" @if (old('group',$projectType->group) == $group) selected @endif>{{ $group }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success z-depth-0">{{ $projectType->id ? 'Update' : 'थप्नुहोस्'}} </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <div class="my-4"></div>

    <div class="card z-depth-0">
        <div class="card-header">
            <h1 class="h3-responsive d-inline-block">परियोजनाको प्रकारहरु</h1>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead class="h3-responsive">
                    <tr>
                        <th>क्र.स.</th>
                        <th>@lang('navigation.project_type')</th>
                        <th>Name in English</th>
                        <th>Group</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($projectTypes as $projectType)
                    <tr>
                        <td>{{$projectType->id}}</td>
                        <td>{{$projectType->name}}</td>
                        <td>{{$projectType->name_en}}</td>
                        <td>{{$projectType->group}}</td>
                        <td class="text-nowrap">
                            <a href="{{route('project-type.edit',$projectType)}}" class="action-btn text-primary"><i class="fa fa-edit"></i></a>
                            <span class="mx-2">|</span>
                            <form action="{{ route('project-type.destroy', $projectType) }}" method="post" onsubmit="return confirm('Are you sure to delete ?')" class="form-inline d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="action-btn text-danger"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

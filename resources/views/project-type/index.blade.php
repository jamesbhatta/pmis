@extends('layouts.app')

@section('breadcrumb')
<nav aria-label="breadcrumb ">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">ड्यासबोर्ड</a></li>
        <li class="breadcrumb-item active" aria-current="page">परियोजनाको प्रकारहरु</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container font-noto">
    @include('alerts.all')
    <div class="row">
        <div class="col-md-4">
            <div class="box">
                <div class="box__header">
                    <h4 class="box__title">{{ $projectType->id ? 'Update Project Type' : 'Add new ' }}</h4>
                </div>
                <div class="box__body">
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
                            <select name="topic_id" class="custom-select">
                                @foreach ($topics as $topic)
                                <option value="{{ $topic->id }}" @if (old('topic_id', $projectType->topic_id) == $topic->id) selected @endif>{{ $topic->title }}</option>
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
        <div class="col-md-8">
            <div class="box">
                <div class="box__header">
                    <h1 class="box__title">परियोजनाको प्रकारहरु</h1>
                </div>
                <div class="box__body">
                    <table class="table">
                        <thead class="h3-responsive">
                            <tr>
                                <th>क्र.स.</th>
                                <th>@lang('navigation.project_type')</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projectTypesGrouped as $group => $projectTypes)
                            <tr class="bg-">
                                <td colspan="42" class="font-weight-bold font-noto">{{ $group }}</td>
                            </tr>
                            @foreach ($projectTypes as $projectType)
                            <tr>
                                <td>{{$projectType->id}}</td>
                                <td>{{$projectType->name}}</td>
                                {{-- <td>{{$projectType->name_en}}</td> --}}
                                <td class="text-nowrap text-right">
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
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

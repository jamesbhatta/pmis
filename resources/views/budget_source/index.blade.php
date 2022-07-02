@extends('layouts.app')

@section('breadcrumb')
<nav aria-label="breadcrumb ">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">ड्यासबोर्ड</a></li>
        <li class="breadcrumb-item active" aria-current="page">बजेट स्रोत</li>
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
                    <h4 class="box__title">{{ $budgetSource->id ? 'Update Budget Source' : 'Add New' }}</h4>
                </div>
                <div class="box__body">
                    <form action="{{ $budgetSource->id ? route('budget-source.update', $budgetSource) : route('budget-source.store') }}" method="POST" class="form font-roboto">
                        @csrf
                        @isset($budgetSource->id)
                        @method('put')
                        @endisset
                        <div class="form-group">
                            <label for="input-budget-source">@lang('navigation.budget_source')</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title',$budgetSource->title) }}">
                        </div>
                        <!-- <div class="form-group">
                            <label for="input-fiscal-year">@lang('navigation.project_type')&nbsp;(Eng.Optional)</label>
                            <input type="text" name="name_en" class="form-control" value="{{ old('name_en',$budgetSource->name_en) }}">
                        </div> -->
                        <!-- <div class="form-group">
                            <label for="input-fiscal-year">Group</label>
                            <select name="topic_id" class="custom-select">

                            </select>
                        </div> -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-success z-depth-0">{{ $budgetSource->id ? 'Update' : 'थप्नुहोस्'}} </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="box">
                <div class="box__header">
                    <h1 class="box__title">@lang('navigation.budget_source')</h1>
                </div>
                <div class="box__body">
                    <table class="table">
                        <thead class="h3-responsive">
                            <tr>
                                <th>क्र.स.</th>
                                <th>@lang('navigation.budget_source')</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($budgetSources as $budgetSource)
                            <tr>
                                <td>{{$budgetSource->id}}</td>
                                <td>{{$budgetSource->title}}</td>

                                <td class="text-nowrap text-right">
                                    <a href="{{route('budget-source.edit',$budgetSource)}}" class="action-btn text-primary"><i class="fa fa-edit"></i></a>
                                    <span class="mx-2">|</span>
                                    <form action="{{ route('budget-source.destroy', $budgetSource) }}" method="post" onsubmit="return confirm('Are you sure to delete ?')" class="form-inline d-inline">
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
    </div>
</div>
@endsection

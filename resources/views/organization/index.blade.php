@extends('layouts.app')

@section('breadcrumb')
<nav aria-label="breadcrumb ">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">ड्यासबोर्ड</a></li>
        <li class="breadcrumb-item active" aria-current="page">@lang('navigation.Organizations')</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="container">
    @include('alerts.all')
</div>

<div class="container-flluid">
    <div class="box">
        <div class="box__header">
            <div class="d-flex align-items-center">
                <div>
                    <h3 class="box__title">@lang('navigation.Organizations')</h3>
                </div>
                <div class="ml-auto">
                    <a href="{{ route('organization.create') }}" class="btn btn-primary z-depth-0"><i class="fa fa-plus mr-2"></i>Add</a>
                </div>
            </div>
        </div>
        <div class="box__body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>@lang('navigation.Organization')</th>
                        <th>@lang('navigation.district')</th>
                        <th>@lang('navigation.type')</th>
                        <th>@lang('navigation.address')</th>
                        <th>@lang('navigation.phone')</th>
                        <th>@lang('navigation.email')</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($organizations as $organization)
                    <tr class="bg-white">
                        <td></td>
                        <td>{{ $organization->name }}</td>
                        <td>{{ $organization->district->name ?? '' }}</td>
                        <td class="text-capitalize">{{ $organization->type }}</td>
                        <td>{{ $organization->address }}</td>
                        <td>{{ $organization->phone }}</td>
                        <td>{{ $organization->email }}</td>
                        <td>
                            <div class="d-flex justify-content-end">
                                <a class="btn btn-primary btn-md font-noto my-0 py-2 px-3 z-depth-0" href="{{ route('organization.edit', $organization) }}">Edit</a>
                                <form action="{{ route('organization.destroy', $organization) }}" method="POST" class="d-inline" onsubmit="return confirm('Sure to trash?')">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-md font-noto my-0 py-2 px-3 z-depth-0" type="submit">Delete</butt>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr class="bg-white">
                        <td colspan="42" class="text-center">डाटाबेसमा कुनै डाटा छैन |</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
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
                    <form action="{{route('project-type.store')}}" method="POST" class="form">
                        @csrf
                       
                        <div class="form-group">
                            <label for="input-fiscal-year">@lang('navigation.project_type')</label>
                            <input type="text" id="input-fiscal-year" name="project_type" class="form-control font-roboto" value="">
                        </div>
                        <div class="form-group">
                            <label for="input-fiscal-year">@lang('navigation.project_type')&nbsp;(Eng.Optional)</label>
                            <input type="text" id="input-fiscal-year" name="project_type_en" class="form-control font-roboto" value="">
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-success z-depth-0">थप्नुहोस्</button>
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
                <thead>
                    <tr>
                        <th>क्र.स.</th>
                        <th>@lang('navigation.project_type')</th>
                        <th>Project Type's Name</th>
                       
                    </tr>
                </thead>

            <tbody>
                @foreach ($ProjectType as $ProjectType)
                <tr>
                    <td>{{$ProjectType->id}}</td>
                    <td>{{$ProjectType->project_type}}</td>
                    <td>{{$ProjectType->project_type_en}}</td>
                    <td class="text-nowrap">
                                
                                <a href="" class="action-btn text-primary"><i class="fa fa-edit"></i></a>
                                <span class="mx-2">|</span>
                                <form action="{{ route('project-type.destroy', $ProjectType) }}" method="post" onsubmit="return confirm('Are you sure to delete ?')" class="form-inline d-inline">
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

@push('scripts')
<!-- <script>
    $(function() {
        if ($('.fiscal-year-date')[0]) {
            $('.fiscal-year-date').nepaliDatePicker({});
        }

    })

</script> -->
@endpush

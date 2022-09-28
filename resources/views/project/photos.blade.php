@extends('layouts.app')

@section('content')
<div class="container">
    @include('project.navigation')
    <div class="my-3">
        @include('alerts.all')
    </div>
    <section class="box">
        <div class="box__body">
            <form action="{{ route('project.photos.update', $project) }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- <div class="form-group">
                    <label>काम सुरु हुनु भन्दा अगाडी को फोटो</label>
                    <input type="file" name="photo_before_work" class="d-block" accept="image/*">
                </div>
                <div class="form-group">
                    <label>मुल्याकन हुन बखतको फोटो</label>
                    <input type="file" name="photo_during_evaluation" class="d-block" accept="image/*">
                </div>
                <div class="form-group">
                    <label>काम सम्पन्न भएको फोटो</label>
                    <input type="file" name="photo_after_work" class="d-block" accept="image/*">
                </div>--}}
                
                {{-- ============================================= --}}
                <div class="wrapper">
                    <div id="survey_options">

                        <input type="file" name="image[]" class="form-control form-control-lg" size="50">

                    </div>
                    <div class="controls col-12">
                        <a href="#" id="remove_fields" class="btn btn-danger float-right"><i class="fa fa-minus"></i></a>
                        <a href="#" id="add_more_fields" class="btn btn-success float-right"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary z-depth-0 ml-0">Save</button>
                </div> 

            </form>
        </div>
    </section>

    <div class="box mt-4">
        <div class="box__header">
            
            <div class="row">
                @foreach ($photos as $photo)
                <div class="col-md-3">
                    <div class="card">
                        
                        <img style="height: 180px" class="p-3" src="{{asset('storage')}}{{'/'}}{{$photo->image}}" class="img-fluid" alt="Responsive image">
                    </div>
                    {{-- {{}} --}}
                    {{-- <img class="img-fluid" src="{{ get_file_url($photo->image) }}" alt="sdfs"> --}}
                </div> 
                @endforeach
               
            
            </div>
        </div>
    </div>
</div>
@endsection

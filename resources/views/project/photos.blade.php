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
                <div class="form-group">
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
                @if ($project->photo_before_work)
                <div class="col-md-4">
                    <div class="mb-3">Photo before work</div>
                    <img class="img-fluid" src="{{ get_file_url($project->photo_before_work) }}">
                </div>
                @endif
                @if ($project->photo_during_evaluation)
                <div class="col-md-4">
                    <div class="mb-3">Photo during Evaluation</div>
                    <img class="img-fluid" src="{{ get_file_url($project->photo_during_evaluation) }}">
                </div>
                @endif
                @if ($project->photo_after_work)
                <div class="col-md-4">
                    <div class="mb-3">Photo after work</div>
                    <img class="img-fluid" src="{{ get_file_url($project->photo_after_work) }}">
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

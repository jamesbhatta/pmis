@extends('layouts.app')

@section('content')
<div class="container">
    @include('project.navigation')
    <div class="my-3">
        @include('alerts.all')
    </div>
    <section class="box">
        <div class="box__body">
            <form action="{{ route('project.acheivements.update', $project) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Ulakhaniye karya haru</label>
                    <textarea name="acheivements" class="form-control" cols="30" rows="10">{!! $project->acheivements !!}</textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary z-depth-0 ml-0">Save</button>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    @include('project.navigation')
    @include('alerts.all')
    <project-physical-progress :project="{{ $project }}" :physical-progress="{{ $physicalProgress }}"></project-physical-progress>
</div>
@endsection

{{-- @push('scripts')
    <script>
        function showEditForm()
        {
            document.getElementById('progress-detail').classList.toggle('d-none');
            document.getElementById('edit-form').classList.toggle('d-none');
        }
    </script>
@endpush --}}

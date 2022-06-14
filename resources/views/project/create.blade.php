@extends('layouts.app')

@section('content')
<div class="container">
    @include('alerts.all')
    <section>
        <project-form :organizations="{{ $organizations }}"></project-form>
    </section>
</div>
@endsection

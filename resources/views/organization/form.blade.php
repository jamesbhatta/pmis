@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <x-organization-form :organization="$organization"></x-organization-form>
</div>

@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="font-roboto">
        <div class="text-center">
            <h2 class="h2-responsive font-weight-bold">{{ $user->exists ? 'Edit' : 'Add New' }} User</h2>
        </div>

        <div class="row">
            <div class="col-md-6 offset-3">
                <div class="card border">
                    <div class="card-body">

                        <div class="my-3">
                            @include('alerts.all')
                        </div>

                        <form action="{{ isset($user->id) ? route('user.update', $user) : route('user.store') }}" method="post" class="form">
                            @csrf
                            @isset($user->id)
                            @method('PUT')
                            @endisset
                            <div class="form-group">
                                <label>User's Full Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
                            </div>
                            <div class="form-group">
                                <label>User's Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" @isset($user->id) readonly @endisset>
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" value="{{ old('username', $user->username) }}">
                            </div>
                            <div class="form-group">
                                <label>@lang('navigation.role')</label>
                                @foreach($roles as $role)
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="roles[]" class="custom-control-input" id="role-checkbox-{{ $role->name }}" value="{{ $role->name }}" @if($user->hasRole($role->name)) checked @endif>
                                    <label class="custom-control-label" for="role-checkbox-{{ $role->name }}">{{ ucfirst($role->name) }}</label>
                                </div>
                                @endforeach
                            </div>

                            <div class="form-group">
                                <label for="" class="required">User Type</label>
                                <select name="user_type" class="custom-select">
                                    @foreach (config('constants.organization_types') as $key => $value)
                                    <option value="{{ $key }}" @if (old('user_type', $user->user_type) == $key) selected @endif>{{ $value }}</option>
                                    @endforeach
                                </select>
                                <x-invalid-feedback field="type"></x-invalid-feedback>
                            </div>

                            <div class="form-group">
                                <label>Organization</label>
                                <select name="organization_id" class="custom-select">
                                    @foreach (\App\Organization::get() as $organization)
                                    <option value="{{ $organization->id }}" @if(old('organization_id', $user->organization_id) == $organization->name) selected @endif>{{ $organization->name }} ({{ optional($organization->district)->name ?? $organization->address }})</option>
                                    @endforeach
                                </select>
                            </div>

                            @if($user->id == null)
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control">
                            </div>
                            @endisset

                            <div class="form-group">
                                @isset($user->id)
                                <button type="submit" class="btn btn-success btn-block z-depth-0">Update</button>
                                @else
                                <button type="submit" class="btn btn-success btn-block z-depth-0">Add</button>
                                @endisset
                            </div>

                    </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- End of user form --}}
    </div>
</div>
</div>
@endsection

@push('scripts')
<script>
    $(function() {
        $('#ward-toggler').change(function() {
            $('#ward-selector').toggleClass('d-none');;
        })
    })

</script>
@endpush

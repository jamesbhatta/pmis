@extends('layouts.app')

@section('content')
<div class="container">
    @include('alerts.all')
</div>

<div class="container-flluid">
    {{-- Organizations Table --}}
    {{-- <x-organizations-table :organizations="$organizations"></x-organizations-table> --}}
    {{-- End of Organizaitons Table --}}

    <div>
        <a href="{{ route('organization.create') }}" class="btn btn-primary z-depth-0">Add</a>
    </div>

    <table class="table table-hover table-borderless">
        <thead class="bg-light">
            <tr>
                <th>Organization name</th>
                <th>District</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Email</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse($organizations as $organization)
            <tr class="bg-white">
                <td>{{ $organization->name }}</td>
                <td>{{ $organization->district_id }}</td>
                <td>{{ $organization->address }}</td>
                <td>{{ $organization->phone }}</td>
                <td>{{ $organization->email }}</td>
                <td>
                    <div class="d-flex">
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
                <td colspan="42" class="text-center">No Records Found</td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection

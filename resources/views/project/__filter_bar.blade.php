<div class="d-flex font-noto mb-4" style="gap: 1rem;">
    <div>
        @if (auth()->user()->user_type != 'sub-division')
        <button class="custom-select" type="button" id="projectTypeDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ request('filter[organization_id]', 'कार्यालय')}}
          </button>
          <div class="dropdown-menu" aria-labelledby="projectTypeDropdown">
            @if (request()->has('filter.organization_id'))
            <a class="dropdown-item" href="{{ route('project.index') }}">Clear Filter</a>
            @endif
            @foreach ($organizations as $organization)
            <a class="dropdown-item" href="?filter[organization_id]={{ $organization->id }}">{{ $organization->name }} ({{ optional($organization->district)->name ?? $organization->address }})</a>
            @endforeach
          </div>
        @endif
    </div>
    <div>
        <button class="custom-select" type="button" id="projectTypeDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ request('filter[project_type_id]', 'परियोजनाका प्रकार')}}
          </button>
          <div class="dropdown-menu" aria-labelledby="projectTypeDropdown">
            @if (request()->has('filter.project_type_id'))
            <a class="dropdown-item" href="{{ route('project.index') }}">Clear Filter</a>
            @endif
            @foreach ($projectTypes as $topic => $types)
            <a class="dropdown-item" href="#" disabled style="font-style: italic; background-color: #f2f7fb;">{{ $topic }}</a>
            @foreach ($types as $projectType)
            <a class="dropdown-item" href="?filter[project_type_id]={{ $projectType->id }}">{{ $projectType->name }}</a>
            @endforeach
            @endforeach
          </div>
    </div>
    <form class="ml-auto" action="">
        <input type="text" name="filter[search]" class="form-control" value="{{ request('filter.search') }}" placeholder="Search">
    </form>
</div>
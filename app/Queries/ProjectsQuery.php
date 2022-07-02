<?php

namespace App\Queries;

use App\Filters\ProjectSearch;
use App\Project;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class ProjectsQuery extends QueryBuilder
{
    public function __construct()
    {
        $projectQuery = Project::query()
            ->with(['organization', 'projectType'])
            ->when(auth()->user()->user_type == 'sub-division', function ($query) {
                $query->where('organization_id', auth()->user()->organization_id);
            });

        parent::__construct($projectQuery);

        $this
            ->allowedFilters([
                'fiscal_year_id', 'organization_id', 'project_type_id', 'created_at',
                AllowedFilter::custom('search', new ProjectSearch)
            ])
            ->allowedSorts('created_at')
            ->defaultSort('-created_at');
    }
}

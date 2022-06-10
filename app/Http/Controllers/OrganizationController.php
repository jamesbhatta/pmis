<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrganizationRequest;
use App\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function index()
    {
        $organizations = Organization::latest()->get();
        return view('organization.index', [
            'organizations' => $organizations
        ]);
    }

    public function create()
    {
        return view('organization.form', [
            'organization' => new Organization
        ]);
    }

    public function store(OrganizationRequest $request)
    {
        $organization = Organization::create($request->validated());
        return redirect()->route('organization.index')->with('success', 'New organization as been added.');
    }

    public function edit(Organization $organization)
    {
        return view('organization.form', [
            'organization' => $organization
        ]);
    }
}

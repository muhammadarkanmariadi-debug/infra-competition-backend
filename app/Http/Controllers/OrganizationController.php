<?php

namespace App\Http\Controllers;

use App\Helper\APIReturn;
use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Organization::with(['mentor', 'organizationRoles'])->get();

        return APIReturn::success($data, 'Organizations retrieved successfully');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'is_organization' => 'required|boolean',
            'logo' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'short_description' => 'nullable|string',
            'long_description' => 'nullable|string',
            'mentor_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return APIReturn::error('Validation Error', 422, $validator->errors());
        }

        $organization = Organization::create($validator->validated());

        return APIReturn::success($organization, 'Organization created successfully', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'nullable|string|max:255',
            'is_organization' => 'nullable|boolean',
            'logo' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'short_description' => 'nullable|string',
            'long_description' => 'nullable|string',
            'mentor_id' => 'nullable|exists:users,id',
        ]);

        if ($validator->fails()) {
            return APIReturn::error('Validation Error', 422, $validator->errors());
        }

        $organization = Organization::find($id);
        if (!$organization) {
            return APIReturn::error('Organization not found', 404);
        }

        $organization->update($validator->validated());

        return APIReturn::success($organization, 'Organization updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $organization = Organization::find($id);
        if (!$organization) {
            return APIReturn::error('Organization not found', 404);
        }

        $organization->delete();

        return APIReturn::success(null, 'Organization deleted successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Helper\APIReturn;
use App\Http\Controllers\Controller;
use App\Models\OrganizationRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrganizationRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $data = OrganizationRole::where('organization_id', $id)->get();
        return APIReturn::success($data, 'Organization roles retrieved successfully');
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
            'organization_id' => 'required|exists:organizations,id',
        ]);
        if ($validator->fails()) {
            return APIReturn::error($validator->errors(), 'Validation failed');
        }

        $role = OrganizationRole::create($validator->validated());
        return APIReturn::success($role, 'Organization role created successfully');
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
            'name' => 'required|string|max:255',
            'organization_id' => 'required|exists:organizations,id',
        ]);
        if ($validator->fails()) {
            return APIReturn::error($validator->errors(), 'Validation failed');
        }

        $role = OrganizationRole::find($id);
        if (!$role) {
            return APIReturn::error('Organization role not found', 404);
        }

        $role->update($validator->validated());
        return APIReturn::success($role, 'Organization role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = OrganizationRole::find($id);
        if (!$role) {
            return APIReturn::error('Organization role not found', 404);
        }

        $role->delete();
        return APIReturn::success(null, 'Organization role deleted successfully');
    }
}

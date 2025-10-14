<?php

namespace App\Http\Controllers;

use App\Helper\APIReturn;
use App\Http\Controllers\Controller;
use App\Models\SocialProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SocialProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $data = SocialProfile::with(['user', 'organization', 'class', 'organizationRole'])->where('user_id', $id)->first();
        return APIReturn::success($data, 'Social profile retrieved successfully');
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
            'user_id' => 'required|exists:users,id',
            'organization_id' => 'nullable|exists:organizations,id',
            'class_id' => 'nullable|exists:classes,id',
            'organization_role_id' => 'nullable|exists:organization_roles,id',
            'description' => 'nullable|string',
            'profile_photo' => 'nullable|file|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return APIReturn::error('Validation Error', 422, $validator->errors());
        }
        $socialProfile = SocialProfile::create($validator->validated());
        return APIReturn::success($socialProfile, 'Social profile created successfully', 201);
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
            'user_id' => 'required|exists:users,id',
            'organization_id' => 'nullable|exists:organizations,id',
            'class_id' => 'nullable|exists:classes,id',
            'organization_role_id' => 'nullable|exists:organization_roles,id',
            'description' => 'nullable|string',
            'profile_photo' => 'nullable|file|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return APIReturn::error('Validation Error', 422, $validator->errors());
        }

        $socialProfile = SocialProfile::find($id);
        if (!$socialProfile) {
            return APIReturn::error('Social profile not found', 404);
        }

        $socialProfile->update($validator->validated());
        return APIReturn::success($socialProfile, 'Social profile updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $socialProfile = SocialProfile::find($id);
        if (!$socialProfile) {
            return APIReturn::error('Social profile not found', 404);
        }

        $socialProfile->delete();
        return APIReturn::success(null, 'Social profile deleted successfully');
    }
}

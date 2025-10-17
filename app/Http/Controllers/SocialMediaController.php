<?php

namespace App\Http\Controllers;

use App\Helper\APIReturn;
use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = SocialMedia::all();
        return APIReturn::success($data, 'Social media links retrieved successfully');
    }


    public function showOrganization($id)
    {
        $data = SocialMedia::where('organization_id', $id)->get();
        return APIReturn::success($data, 'Social media links retrieved successfully');
    }

    public function showUsers($id)
    {
        $data = SocialMedia::where('user_id', $id)->get();
        return APIReturn::success($data, 'Social media links retrieved successfully');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function storeUser(Request $request, $id)
    {
        if (auth()->guard('api')->user()->id != $id) {
            return APIReturn::error('anda tidak terautorisasi', 401);
        }

        $validator = Validator::make($request->all(), [
            'type' => 'required|string|max:255',
            'url' => 'required|url|max:255',
        ]);
        if ($validator->fails()) {
            return APIReturn::error('Validation Error', 422, $validator->errors());
        }
        $data = SocialMedia::create([
            'type' => $request->type,
            'url' => $request->url,
            'user_id' => $id,
        ]);
        return APIReturn::success($data, 'Social media link created successfully', 201);
    }

    public function storeOrganization(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required|string|max:255',
            'url' => 'required|url|max:255',
        ]);
        if ($validator->fails()) {
            return APIReturn::error('Validation Error', 422, $validator->errors());
        }
        $data = SocialMedia::create([
            'type' => $request->type,
            'url' => $request->url,
            'organization_id' => $id,
        ]);
        return APIReturn::success($data, 'Social media link created successfully', 201);
    }


    /**
     * Update the specified resource in storage.
     */
    public function updateUser(Request $request, string $id)
    {
        if (auth()->guard('api')->user()->id != $id) {
            return APIReturn::error('anda tidak terautorisasi', 401);
        }
        $validator = Validator::make($request->all(), [
            'type' => 'nullable|string|max:255',
            'url' => 'nullable|url|max:255',
        ]);
        if ($validator->fails()) {
            return APIReturn::error('Validation Error', 422, $validator->errors());
        }
        $socialMedia = SocialMedia::where('id', $id)->whereNotNull('user_id')->first();
        if (!$socialMedia) {
            return APIReturn::error('Social media link not found', 404);
        }
        $socialMedia->update($validator->validated());
        return APIReturn::success($socialMedia, 'Social media link updated successfully');
    }

    public function updateOrganization(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'nullable|string|max:255',
            'url' => 'nullable|url|max:255',
        ]);
        if ($validator->fails()) {
            return APIReturn::error('Validation Error', 422, $validator->errors());
        }
        $socialMedia = SocialMedia::where('id', $id)->whereNotNull('organization_id')->first();
        if (!$socialMedia) {
            return APIReturn::error('Social media link not found', 404);
        }
        $socialMedia->update($validator->validated());
        return APIReturn::success($socialMedia, 'Social media link updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (auth()->guard('api')->user()->id != $id) {
            return APIReturn::error('anda tidak terautorisasi', 401);
        }
        $socialMedia = SocialMedia::find($id);
        if (!$socialMedia) {
            return APIReturn::error('Social media link not found', 404);
        }

        $socialMedia->delete();
        return APIReturn::success(null, 'Social media link deleted successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Helper\APIReturn;
use App\Http\Controllers\Controller;
use App\Models\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Major::with('expertises')->get();

        if (count($data) < 1) {
            return APIReturn::error(null, 'Majors not found', 404);
        } else {
            return APIReturn::success($data, 'Majors retrieved successfully', 200);
        }
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
            'thumbnail' => 'required|string',
            'short_description' => 'required|string',
            'long_description' => 'required|string',
        ]);


        if ($validator->fails()) {
            return APIReturn::error('Validation Error', $validator->errors(), 422);
        }



        $short_description = Str::limit($request->long_description, 150);
        $major = Major::create([
            'name' => $request->name,
            'thumbnail' => $request->thumbnail,
            'description' => $request->description,
            'short_description' => $short_description,
            'long_description' => $request->long_description,
        ]);

        return APIReturn::success($major, 'Major created successfully', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Major::with('expertises')->find($id);
        if (!$data) {
            return APIReturn::error('Major not found', 404);
        } {
            return APIReturn::success($data, 'Major retrieved successfully');
        }
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
    public function update(Request $request,  $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'thumbnail' => 'required|string',

            'long_description' => 'required|string',
        ]);


        if ($validator->fails()) {
            return APIReturn::error('Validation Error', 422, $validator->errors());
        }

        $major = Major::find($id);
        if (!$major) {
            return APIReturn::error('Major not found', 404);
        }
        $short_description = Str::limit($request->long_description, 150);
        $major->update([
            'name' => $request->name,
            'thumbnail' => $request->thumbnail,
            'short_description' => $short_description,
            'long_description' => $request->long_description,
        ]);

        return APIReturn::success($major, 'Major updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $major = Major::find($id);
        if (!$major) {
            return APIReturn::error('Major not found', 404);
        }

        $major->delete();
        return APIReturn::success(null, 'Major deleted successfully');
    }
}

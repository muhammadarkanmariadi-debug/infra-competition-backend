<?php

namespace App\Http\Controllers;

use App\Helper\APIReturn;
use App\Http\Controllers\Controller;
use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Grade::all();
        return APIReturn::success($data, 'Grades retrieved successfully');
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
        ]);

        if ($validator->fails()) {
            return APIReturn::error('Validation Error', 422, $validator->errors());
        }

        $grade = Grade::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return APIReturn::success($grade, 'Grade created successfully', 201);
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
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
        ]);

        if ($validator->fails()) {
            return APIReturn::error('Validation Error', 422, $validator->errors());
        }

        $grade = Grade::find($id);
        if (!$grade) {
            return APIReturn::error('Grade not found', 404);
        }

        $grade->update($request->only(['name', 'description']));

        return APIReturn::success($grade, 'Grade updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $grade = Grade::find($id);
        if (!$grade) {
            return APIReturn::error('Grade not found', 404);
        }

        $grade->delete();
        return APIReturn::success(null, 'Grade deleted successfully');
    }
}

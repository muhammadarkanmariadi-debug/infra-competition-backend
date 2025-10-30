<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Helper\APIReturn;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $query = Alumni::query();

            // Filter by angkatan
            if ($request->has('angkatan')) {
                $query->where('angkatan', $request->angkatan);
            }

            // Search by name
            if ($request->has('search')) {
                $query->where('name', 'like', '%' . $request->search . '%');
            }

            // Sorting
            $sortBy = $request->get('sort_by', 'created_at');
            $sortOrder = $request->get('sort_order', 'desc');
            $query->orderBy($sortBy, $sortOrder);

            // Pagination
            $perPage = $request->get('per_page', 10);
            $alumni = $query->paginate($perPage);

            return APIReturn::success($alumni, 'Alumni retrieved successfully');
        } catch (\Exception $e) {
            return APIReturn::error('Failed to retrieve alumni', 500, $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'angkatan' => 'required|string|max:10',
                'current_job' => 'required|string|max:255',
                'company' => 'required|string|max:255',
                'quote' => 'nullable|string',
            ]);

            if ($validator->fails()) {
                return APIReturn::error('Validation failed', 422, $validator->errors());
            }

            $data = $validator->validated();

            // Handle photo upload
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('alumni', $filename, 'public');
                $data['photo'] = $path;
            }

            $alumni = Alumni::create($data);

            return APIReturn::success($alumni, 'Alumni created successfully', 201);
        } catch (\Exception $e) {
            return APIReturn::error('Failed to create alumni', 500, $e->getMessage());
        }
    }

    /**
     * Display the specified resource by slug.
     */
    public function show(string $slug)
    {
        try {
            $alumni = Alumni::where('slug', $slug)->first();

            if (!$alumni) {
                return APIReturn::error('Alumni not found', 404);
            }

            return APIReturn::success($alumni, 'Alumni retrieved successfully');
        } catch (\Exception $e) {
            return APIReturn::error('Failed to retrieve alumni', 500, $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage by slug.
     */
    public function update(Request $request, string $slug)
    {
        try {
            $alumni = Alumni::where('slug', $slug)->first();

            if (!$alumni) {
                return APIReturn::error('Alumni not found', 404);
            }

            $validator = Validator::make($request->all(), [
                'name' => 'sometimes|required|string|max:255',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'angkatan' => 'sometimes|required|string|max:10',
                'current_job' => 'sometimes|required|string|max:255',
                'company' => 'sometimes|required|string|max:255',
                'quote' => 'nullable|string',
            ]);

            if ($validator->fails()) {
                return APIReturn::error('Validation failed', 422, $validator->errors());
            }

            $data = $validator->validated();

            // Handle photo upload
            if ($request->hasFile('photo')) {
                // Delete old photo if exists
                if ($alumni->photo && Storage::disk('public')->exists($alumni->photo)) {
                    Storage::disk('public')->delete($alumni->photo);
                }

                $file = $request->file('photo');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('alumni', $filename, 'public');
                $data['photo'] = $path;
            }

            $alumni->update($data);

            return APIReturn::success($alumni, 'Alumni updated successfully');
        } catch (\Exception $e) {
            return APIReturn::error('Failed to update alumni', 500, $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage by slug.
     */
    public function destroy(string $slug)
    {
        try {
            $alumni = Alumni::where('slug', $slug)->first();

            if (!$alumni) {
                return APIReturn::error('Alumni not found', 404);
            }

            // Delete photo if exists
            if ($alumni->photo && Storage::disk('public')->exists($alumni->photo)) {
                Storage::disk('public')->delete($alumni->photo);
            }

            $alumni->delete();

            return APIReturn::success(null, 'Alumni deleted successfully');
        } catch (\Exception $e) {
            return APIReturn::error('Failed to delete alumni', 500, $e->getMessage());
        }
    }

    /**
     * Get alumni by angkatan (graduation year).
     */
    public function byAngkatan(string $angkatan)
    {
        try {
            $alumni = Alumni::where('angkatan', $angkatan)
                ->orderBy('name', 'asc')
                ->get();

            return APIReturn::success($alumni, 'Alumni retrieved successfully');
        } catch (\Exception $e) {
            return APIReturn::error('Failed to retrieve alumni', 500, $e->getMessage());
        }
    }

    /**
     * Get list of available angkatan.
     */
    public function angkatanList()
    {
        try {
            $angkatanList = Alumni::select('angkatan')
                ->distinct()
                ->orderBy('angkatan', 'desc')
                ->pluck('angkatan');

            return APIReturn::success($angkatanList, 'Angkatan list retrieved successfully');
        } catch (\Exception $e) {
            return APIReturn::error('Failed to retrieve angkatan list', 500, $e->getMessage());
        }
    }
}

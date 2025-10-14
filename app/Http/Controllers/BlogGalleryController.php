<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogGallery;
use Illuminate\Support\Facades\Validator;
use App\Helper\APIReturn;

class BlogGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = BlogGallery::query();
        if ($request->has('search')) {
            $data->where('name', 'like', '%' . $request->search . '%');
        }

        $datas = $data->paginate(5)->latest();
        if ($datas == null) {
            return APIReturn::error('Data Blog masih kosong', 404);
        }
        return response()->json([
            'status' => true,
            'message' => 'Data Blog',
            'data' => $datas
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'blog_id' => 'required',
            'path' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'name' => 'required',

        ]);

        if ($validator->fails()) {
            return APIReturn::error('Validation Error', 422, $validator->errors());
        }

        $path = $request->file('path')->store('images', 'public');

        $blog = BlogGallery::create([
            'blog_id' => $request->blog_id,
            'path' => $path,
            'name' => $request->name
        ]);

        return APIReturn::success($blog, 'Blog Gallery telah dibuat', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = BlogGallery::find($id);

        if (!$data) {
            return APIReturn::error('Blog Gallery tidak ditemukan', 404);
        }

        return APIReturn::success($data, 'Blog Gallery dengan id ' . $id, 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'blog_id' => 'nullable',
            'path' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'name' => 'nullable',
        ]);

        if ($validator->fails()) {
            return APIReturn::error('Validation Error', 422, $validator->errors());
        }

        $path = $request->file('path')->store('images', 'public');

        $data = BlogGallery::find($id)->update([
            'blog_id' => $request->blog_id,
            'path' => $path,
            'name' => $request->name
        ]);

        return APIReturn::success($data, 'Blog Gallery telah diupdate', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = BlogGallery::find($id)->delete();
        return APIReturn::success($data, 'Blog Gallery telah dihapus', 200);
    }
}

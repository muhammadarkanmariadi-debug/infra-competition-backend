<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Helper\APIReturn;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = Blog::query()->with('blogGallery');

        if ($request->has('search')) {
            $data->where('*', 'like', '%' . $request->search . '%');
        }

        $data = $data->paginate(5);

        if ($data == null) {
            return APIReturn::error('Data Blog masih kosong', 404);
        }else {
            return APIReturn::success($data, 'Data Blog', 200);
        }


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd(auth()->guard('api')->user());
        $validate = Validator::make($request->all(), [
            'title' => 'required',
            'thumbnail' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'tags' => 'required',
            'body' => 'required',
            'short_body' => 'required',
            'is_published' => 'required',
            'author_id' => 'required|exists:users,id'
        ]);


        if ($validate->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validate->errors(),
            ], 409);
        }

        $short_body = substr($request->body, 0, 100);
        $thumbnail = $request->file('thumbnail')->store('images', 'public');

        $data =  Blog::create([
            'title' => $request->title,
            'body' => $request->body,
            'short_body' => $short_body,
            'thumbnail' => $thumbnail,
            'tags' => $request->tags,
            'slug' => Str::slug($request->title),
            'is_published' => true,
            'author_id' => Auth::guard('api')->user()->id
        ]);


        return response()->json([
            'status' => true,
            'message' => 'Blog sudah dibuat',
            'data' => $data,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $data = Blog::find($slug)->with('blogGallery');


        if (!$data) {
            return APIReturn::error('Data Blog tidak ditemukan', 404);
        }else {
            return APIReturn::success($data, 'Data Blog', 200);
        }

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $validate = Validator::make($request->all(), [
            'title' => 'nullable',
            'thumbnail' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'tags' => 'nullable',
            'body' => 'nullable',
            'short_body' => 'nullable',
            'slug' => 'nullable',
            'is_published' => 'nullable',
            'author_id' => 'nullable|exists:users,id'
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validate->errors(),
            ], 409);
        }


        $short_body = substr($request->body, 0, 100);
        $thumbnail = $request->file('thumbnail')->store('images', 'public');

        $data =  Blog::find($id);
        $data   ->update([
            'title' => $request->title,
            'body' => $request->body,
            'short_body' => $short_body,
            'thumbnail' => $thumbnail,
            'tags' => $request->tags,
            'slug' => Str::slug($request->title),
            'is_published' => true,
            'author_id' => Auth::user()->id
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Blog sudah diupdate',
            'data' => $data,
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Blog::find($id)->delete();
        return response()->json([
            'status' => true,
            'message' => 'Blog dengan id ' . $id . ' sudah dihapus',
        ], 201);
    }

    public function author($id)
    {
        $data = Blog::where('author_id', $id)->with('author')->get();


        if(count($data) < 1){
            return APIReturn::error('Data Blog `tidak ditemukan', 404);
        }

        return response()->json([
            'status' => true,
            'data' => $data,
            'message' => 'Data Blog Oleh ' . $data[0]->author->name,
        ], 200);
    }
}

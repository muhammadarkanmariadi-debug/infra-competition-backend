<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GenerationGallery;
use App\Helper\APIReturn;
use App\Models\Generation;
use Illuminate\Support\Facades\Validator;
class GenerationGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = GenerationGallery::query();

        $datas = $data->paginate(5)->latest();
        if ($datas == null) {
            return APIReturn::error('Data Generations masih kosong', 404);
        }else {
            return APIReturn::success($datas, 'Data Generations', 200);
        }

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'generation_id' => 'required',
            'path' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'name' => 'required',
        ]);

        if ($validate->fails()) {
            return APIReturn::error('Validation Error', 422, $validate->errors());
        }

        $path = $request->file('path')->store('images', 'public');

        $path =  $request->file('path')->store('images', 'public');

        $data = GenerationGallery::create([
            'generation_id' => $request->generation_id,
            'path' => $path,
            'name' => $request->name
        ]);

        return APIReturn::success($data, 'Generation Gallery telah dibuat', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $data = GenerationGallery::find($id);

        if(!$data){
            return APIReturn::error('Data Generation tidak ditemukan', 404);
        }else {
            return APIReturn::success($data, 'Data Generation', 200);
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'generation_id' => 'nullable',
            'path' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'name' => 'nullable',
        ]);

        if ($validator->fails()) {
            return APIReturn::error('Validation Error', 422, $validator->errors());
        }

        $path = $request->file('path')->store('images', 'public');

        $data = GenerationGallery::find($id)->update([
            'generation_id' => $request->generation_id,
            'path' => $path,
            'name' => $request->name
        ]);

        return APIReturn::success($data, 'Generation Gallery telah diupdate', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $data = GenerationGallery::find($id)->delete();
        return APIReturn::success($data, 'Generation Gallery telah dihapus', 200);
    }
}

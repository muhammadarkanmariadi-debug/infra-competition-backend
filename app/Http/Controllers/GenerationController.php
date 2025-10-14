<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Generation;
use App\Helper\APIReturn;
use Illuminate\Support\Facades\Validator;

class GenerationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = Generation::with('generationgallery')->query();
        if ($request->has('search')) {
            $data->where('name', 'like', '%' . $request->search . '%');
        }

        if ($data == null) {
            return APIReturn::error('Data Generations masih kosong', 404);
        } else {
            return APIReturn::success($data, 'Generations retrieved successfully');
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validate->errors(),
            ], 409);
        }

        $data = Generation::create([
            'name' => $request->name,
        ]);

        return APIReturn::success($data, 'Generation telah dibuat', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $data = Generation::with('generationgallery')->find($id);

        if (!$data) {
            return APIReturn::error('Data Generation tidak ditemukan', 404);
        } else {
            return APIReturn::success($data, 'Data Generation', 200);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validate->fails()) {
            return APIReturn::error('Validation Error', 422, $validate->errors());
        }

        $data = Generation::find($id)->update([
            'name' => $request->name,
        ]);

        return APIReturn::success($data, 'Generation telah diupdate', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Generation::find($id)->delete();
        return APIReturn::success($data, 'Generation telah dihapus', 200);
    }
}

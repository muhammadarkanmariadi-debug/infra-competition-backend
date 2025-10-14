<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expertise;
use App\Helper\APIReturn;
use Illuminate\Support\Facades\Validator;

class ExpertiseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Expertise::query();

        if (request('search')) {
            $data->where('name', 'like', '%' . request('search') . '%');
        }


        if ($data == null) {
            return APIReturn::error('Data Expertise masih kosong', 404);
        }
        return response()->json([
            'status' => true,
            'message' => 'Data Expertise',
            'data' => $data->get()
        ], 200);
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

        $data = Expertise::create([
            'name' => $request->name,
        ]);

        return APIReturn::success($data, 'Expertise telah dibuat', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $data = Expertise::find($id);
        if (!$data) {
            return APIReturn::error('Data Expertise tidak ditemukan', 404);
        }
        return response()->json([
            'status' => true,
            'message' => 'Data Expertise dengan id ' . $id,
            'data' => $data
        ], 200);
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


       $data = Expertise::find($id);

       $data->update([
           'name' => $request->name,
       ]);

       return APIReturn::success($data, 'Expertise telah diupdate', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $data = Expertise::find($id)->delete();

        if(!$data){
            return APIReturn::error('Data Expertise tidak ditemukan', 404);
        }
        return APIReturn::success($data, 'Expertise telah dihapus', 200);
    }
}

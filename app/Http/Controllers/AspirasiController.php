<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Aspirasi;
use Illuminate\Http\Request;
use App\Helper\APIReturn;
use Illuminate\Support\Facades\Validator;

class AspirasiController extends Controller
{
    public function index()
    {
        $data =  Aspirasi::all();
        if (count($data) < 1) {
            return APIReturn::error('Data Aspirasi masih kosong', 404);
        } else {
            return APIReturn::success($data, 'Data Aspirasi', 200);
        }
    }


    public function store(Request $request)
    {
        $vadidate = Validator::make($request->all(), [
            'body' => 'required',
        ]);

        if ($vadidate->fails()) {
            return APIReturn::error('Validation Error', 422, $vadidate->errors());
        }

        $data = Aspirasi::create([
            $vadidate->validated()
        ]);

        return APIReturn::success($data, 'Aspirasi telah dibuat', 201);
    }


    public function show($id)
    {
        $data = Aspirasi::find($id);

        if (!$data) {
            return APIReturn::error('Data Aspirasi tidak ditemukan', 404);
        } else {
            return APIReturn::success($data, 'Data Aspirasi', 200);
        }
    }

    public function update(Request $request, $id)
    {
        $data = Aspirasi::find($id);

        $validate = Validator::make($request->all(), [
            'body' => 'required',
        ]);

        if ($validate->fails()) {
            return APIReturn::error('Validation Error', 422, $validate->errors());
        }

        if (!$data) {
            return APIReturn::error('Data Aspirasi tidak ditemukan', 404);
        } else {

            $data->update($validate->validated());
            return APIReturn::success($data, 'Data Aspirasi telah diupdate', 200);
        }
    }

    public function destroy($id) {
        $data =  Aspirasi::find($id)->delete();

        if (!$data) {
            return APIReturn::error('Data Aspirasi tidak ditemukan', 404);
        } else {
            return APIReturn::success($data, 'Data Aspirasi telah dihapus', 200);
        }
    }
}

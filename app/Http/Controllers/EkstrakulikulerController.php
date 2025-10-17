<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Ekstrakulikuler;
use Illuminate\Http\Request;
use App\Helper\APIReturn;
use Illuminate\Support\Facades\Validator;


class EkstrakulikulerController extends Controller
{
    public function index()
    {
        $data = Ekstrakulikuler::all();

        if (count($data) < 1) {
            return APIReturn::error('Data Ekstrakulikuler masih kosong', 404);
        } else {
            return APIReturn::success($data, 'Data Ekstrakulikuler', 200);
        }
    }


    public function show($id)
    {
        $data = Ekstrakulikuler::find($id);

        if (!$data) {
            return APIReturn::error('Data Ekstrakulikuler tidak ditemukan', 404);
        } else {
            return APIReturn::success($data, 'Data Ekstrakulikuler', 200);
        }
    }


    public function create(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
        ]);

        if ($validate->fails()) {
            return APIReturn::error('Validation Error', 422, $validate->errors());
        }

        $data = Ekstrakulikuler::create([
            $validate->validated()
        ]);

        return APIReturn::success($data, 'Ekstrakulikuler telah dibuat', 201);
    }

    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
        ]);


        if ($validate->fails()) {
            return APIReturn::error('Validation Error', 422, $validate->errors());
        }

        $data = Ekstrakulikuler::find($id);

        if (!$data) {
            return APIReturn::error('Data Ekstrakulikuler tidak ditemukan', 404);
        } else {
            $data->update($validate->validated());
            return APIReturn::success($data, 'Ekstrakulikuler telah diupdate', 200);
        }
    }
}

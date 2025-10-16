<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EkstrakulikulerGallery;
use App\Helper\APIReturn;
use Illuminate\Support\Facades\Validator;

class EkstrakulikulerGalleryController extends Controller
{
    public function index()
    {
        $data = EkstrakulikulerGallery::all();

        if (count($data) < 1) {
            return APIReturn::error('Data Ekstrakulikuler Gallery masih kosong', 404);
        } else {
            return APIReturn::success($data, 'Data Ekstrakulikuler Gallery', 200);
        }
    }


    public function show($id)
    {
        $data = EkstrakulikulerGallery::find($id);

        if (!$data) {
            return APIReturn::error('Data Ekstrakulikuler Gallery tidak ditemukan', 404);
        } else {
            return APIReturn::success($data, 'Data Ekstrakulikuler Gallery', 200);
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

        $data = EkstrakulikulerGallery::create([
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

        $data = EkstrakulikulerGallery::find($id);

        if (!$data) {
            return APIReturn::error('Data Ekstrakulikuler tidak ditemukan', 404);
        } else {
            $data->update($validate->validated());
            return APIReturn::success($data, 'Ekstrakulikuler telah diupdate', 200);
        }
    }


    public function destroy(Request $requset, $id)
    {
        $data = EkstrakulikulerGallery::find($id)->delete();

        if (!$data) {
            return APIReturn::error(null, 'Data Ekstrakulikuler Tidak Berhasil Dihapus', 404);
        } else {
            return APIReturn::success($data, 'Data Ekstrakulikuler Berhasil Dihapus', 200);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KesanPesan;
use App\Helper\APIReturn;
use Illuminate\Support\Facades\Validator;

class KesanPesanController extends Controller
{
    public function index()
    {
        $data = KesanPesan::all();

        if (count($data) < 1) {
            return APIReturn::error('Data Kesan Pesan masih kosong', 404);
        } else {
            return APIReturn::success($data, 'Data Kesan Pesan', 200);
        }
    }

    public function create(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'body' => 'required',
            'thumbnail' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ''
        ]);

        if ($validate->fails()) {
            return APIReturn::error('Validation Error', 422, $validate->errors());
        }


        $data = KesanPesan::create([
            $validate->validated()
        ]);

        return APIReturn::success($data, 'Kesan Pesan telah dibuat', 201);
    }


    public function show($id)
    {
        $data = KesanPesan::find($id);

        if (!$data) {
            return APIReturn::error('Data Kesan Pesan tidak ditemukan', 404);
        } else {
            return APIReturn::success($data, 'Data Kesan Pesan', 200);
        }
    }


    public function update(Request $request, $id)
    {
        $data = KesanPesan::find($id);

        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'body' => 'required',
            'thumbnail' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if ($validate->fails()) {
            return APIReturn::error('Validation Error', 422, $validate->errors());
        }



        if (!$data) {
            return APIReturn::error('Data Kesan Pesan tidak ditemukan', 404);
        } else {
            $data->update($validate->validated());
            return APIReturn::success($data, 'Data Kesan Pesan telah diupdate', 200);
        }
    }

    public function destroy($id)
    {
       $data =  KesanPesan::find($id)->delete();


        if (!$data) {
            return APIReturn::error('Data Kesan Pesan tidak ditemukan', 404);
        } else {
            return APIReturn::success($data, 'Data Kesan Pesan telah dihapus', 200);
        }
    }
}

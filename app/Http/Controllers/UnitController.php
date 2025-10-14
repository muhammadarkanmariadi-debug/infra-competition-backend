<?php

namespace App\Http\Controllers;

use App\Helper\APIReturn;
use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UnitController extends Controller
{
    public function index()
    {
        $data = Unit::all();

        if (empty($data)) {
            return APIReturn::error(null, 'Data Unit Tidak Ditemukan', 404);
        }

        return APIReturn::success($data, 'Data Unit', 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ])->validate();

        if (!$validator) {
            return APIReturn::error(null, 'Silahkan isi nama', 404);
        }

        $data = Unit::create([
            'name' => $request->name,
        ]);

        if (!$data) {
            return APIReturn::error(null, 'Data Unit Tidak Berhasil Dibuat', 404); # code../1.
        }

        return APIReturn::success($data, 'Data Unit Berhasil Dibuat', 200);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ])->validate();

        if (!$validator) {
            return APIReturn::error(null, 'Silahkan isi nama', 404);
        }

        $data = Unit::find($id)->update([
            'name' => $request->name,
        ]);

        if (!$data) {
            return APIReturn::error(null, 'Data Unit Tidak Berhasil Diubah', 404); # code../1.
        }

        return APIReturn::success($data, 'Data Unit Berhasil Diubah', 200);
    }

    public function destroy($id)
    {
        $data = Unit::find($id)->delete();

        if (!$data) {
            return APIReturn::error(null, 'Data Unit Tidak Berhasil Dihapus', 404);
        }

        return APIReturn::success($data, 'Data Unit Berhasil Dihapus', 200);
    }
}

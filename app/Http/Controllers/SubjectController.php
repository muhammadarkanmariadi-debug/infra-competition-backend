<?php

namespace App\Http\Controllers;

use App\Helper\APIReturn;
use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubjectController extends Controller
{
    public function index()
    {
        $data = Subject::all();

        if (empty($data)) {
            return APIReturn::error(null, 'Data Subject Tidak Ditemukan', 404);
        }

        return APIReturn::success($data, 'Data Subject', 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ])->validate();

        if (!$validator) {
            return APIReturn::error(null, 'Silahkan isi nama', 404);
        }

        $data = Subject::create([
            'name' => $request->name,
        ]);

        if (!$data) {
            return APIReturn::error(null, 'Data Subject Tidak Berhasil Dibuat', 404); # code../1.
        }

        return APIReturn::success($data, 'Data Subject Berhasil Dibuat', 200);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ])->validate();

        if (!$validator) {
            return APIReturn::error(null, 'Silahkan isi nama', 404);
        }

        $data = Subject::find($id)->update([
            'name' => $request->name,
        ]);

        if (!$data) {
            return APIReturn::error(null, 'Data Subject Tidak Berhasil Diubah', 404); # code../1.
        }

        return APIReturn::success($data, 'Data Subject Berhasil Diubah', 200);
    }

    public function destroy($id)
    {
        $data = Subject::find($id)->delete();

        if (!$data) {
            return APIReturn::error(null, 'Data Subject Tidak Berhasil Dihapus', 404);
        }

        return APIReturn::success($data, 'Data Subject Berhasil Dihapus', 200);
    }
}

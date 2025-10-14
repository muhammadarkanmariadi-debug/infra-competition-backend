<?php

namespace App\Http\Controllers;

use App\Helper\APIReturn;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function show()
    {
        $setting = Setting::first();

        if (empty($setting)) {
            return APIReturn::error(null, 'Data Setting Tidak Ditemukan', 404);
        } {
            return APIReturn::success($setting, 'Data Setting', 200);
        }
    }

    public function update(Request $request)
    {
        $setting = Setting::first();

        $validate = Validator::make($request->all(), [
            'name' => 'nullable',
            'description' => 'nullable',
            'logo' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'favicon' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'address' => 'nullable',
            'phone' => 'nullable',
            'email' => 'nullable',
            'facebook' => 'nullable',
            'tiktok' => 'nullable',
            'instagram' => 'nullable',
            'youtube' => 'nullable',
            'google_map' => 'nullable',
            'headmaster_id' => 'nullable',
        ]);

        if ($validate->fails()) {
            return APIReturn::error(null, $validate->errors(), 400);
        }

        $logo = $request->file('logo')->store('images', 'public');
        $favicon = $request->file('favicon')->store('images', 'public');

        $data = $setting->update([
            'name' => $request->name,
            'description' => $request->description,
            'logo' => $logo,
            'favicon' => $favicon,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'facebook' => $request->facebook,
            'tiktok' => $request->tiktok,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube,
            'google_map' => $request->google_map,
            'headmaster_id' => $request->headmaster_id,
        ]);


        return APIReturn::success($data, 'Data Setting Berhasil Diupdate', 201);

    }
}

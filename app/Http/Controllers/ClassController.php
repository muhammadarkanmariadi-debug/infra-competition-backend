<?php

namespace App\Http\Controllers;

use App\Helper\APIReturn;
use App\Http\Controllers\Controller;
use App\Models\Classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Generation;
use App\Models\Major;
use App\Models\Grade;
use App\Models\Expertise;



class ClassController extends Controller
{



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Classes::with('generation', 'major', 'grade', 'expertise')->query();

        if (request('search')) {
            $data->where('name', 'like', '%' . request('search') . '%');
        }

        if($data == null){
            return response()->json([
                'message' => 'Data Kelas masih kosong',
            ]);
        }

        return response()->json([
            'message' => 'Data Kelas',
            'data' => $data,
            'detail kelas' => [
                'generation' => $data->generation->name,
                'major' => $data->major->name,
                'grade' => $data->grade->name,
                'expertise' => $data->expertise->name
            ]


        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $validated = Validator::make($request->all(), [
            'name' => 'required',
            'generation_id' => 'required|exists:generations,id',
            'homeroomTeacher_id' => 'required|exists:users,id',
            'major_id' => 'required|exists:majors,id',
            'grade_id' => 'required|exists:grades,id',
            'expertise_id' => 'required|exists:expertises,id',
        ]);



        if ($validated->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validated->errors(),
            ], 409);
        }



        $data = Classes::create([
            'name' => $request->name,
            'generation_id' => $request->generation_id,
            'homeroomTeacher_id' => $request->homeroomTeacher_id,
            'major_id' => $request->major_id,
            'grade_id' => $request->grade_id,
            'expertise_id' => $request->expertise_id
        ]);




        return response()->json([
            'message' => 'Data Kelas',
            'data' => $data,
            'success' => true


        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {


        $data = Classes::with('generation', 'major', 'grade', 'expertise')->find($id);
        if(!$data){
            return response()->json([
                'message' => 'Data Kelas dengan id ' . $id. 'tidak ditemukan',
            ]);
        }

        return response()->json([
            'message' => 'Data Kelas dengan id ' . $id. 'diupdate',
            'data' => $data,
            'detail kelas' => [
                'generation' => $data->generation->name,
                'major' => $data->major->name,
                'grade' => $data->grade->name,
                'expertise' => $data->expertise->name
            ]


        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $validated = Validator::make($request->all(), [
            'name' => 'nullable',
            'generation_id' => 'nullable|exists:generations,id',
            'homeroomTeacher_id' => 'nullable|exists:users,id',
            'major_id' => 'nullable|exists:majors,id',
            'grade_id' => 'nullable|exists:grades,id',
            'expertise_id' => 'nullable|exists:expertises,id',
        ]);

        if ($validated->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validated->errors(),
            ], 409);
        }



        $data = Classes::find($id)->update([
            'name' => $request->name,
            'generation_id' => $request->generation_id,
            'homeroomTeacher_id' => $request->homeroomTeacher_id,
            'major_id' => $request->major_id,
            'grade_id' => $request->grade_id,
            'expertise_id' => $request->expertise_id
        ]);



        return response()->json([
            'message' => 'Data Kelas di ' . $id,
            'data' => $data,
            'success' => true
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $data = Classes::find($id)->delete();
        return response()->json([
            'message' => 'Data Kelas dengan id ' . $id,
            'data' => $data,
            'success' => true
        ], 200);
    }
}

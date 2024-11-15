<?php

namespace App\Http\Controllers;

use App\Models\patients;
use Illuminate\Http\Request;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = patients::all();

        $data = [
            'message'=>'Get all Patients',
            'data'=>$patients,
        ];

        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = [
            'nama' => $request->nama,
            'phone' => $request->phone,
            'address' => $request->address,
            'status' => $request->status,
            'in_date' => $request->in_date,
            'out_date' => $request->out_date,
            'timestamp' => $request->timestamp,
            ];
    
            $patients = patients::create($input);
    
            $data = [
                'message' => 'Patients is created succesfully',
                'data' => $patients
            ];
    
            return response()->json($data, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $patients = patients::find($id);

        if ($patients){
            $data = [
                'message' => 'Get detail patients',
                'data' => $patients,
            ];
            return response()->json($data, 200);
        }else{
            $data = [
                'message' => 'Student not found',
            ];
            return response()->json($data, 404);
        }
    
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, patients $patients)
    {
        $input = [
            'nama' => $request->nama,
            'phone' => $request->phone,
            'address' => $request->address,
            'status' => $request->status,
            'in_date' => $request->in_date,
            'out_date' => $request->out_date,
            'timestamp' => $request->timestamp,
            ];

        $patients->update($input);

        $data = [
            'message' => 'patients is updated succesfully',
            'data' => $patients
        ];

        return response()->json($data, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(patients $patients)
    {
        $patients->delete();

        $data = [
            'message' => 'Patients is deleted succesfully'
        ];

        return response()->json($data, 201);
    }
}

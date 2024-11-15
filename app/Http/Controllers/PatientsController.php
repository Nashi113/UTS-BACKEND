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
    // Validate incoming request data
    $validator = \Validator::make($request->all(), [
        'nama' => 'required|string|max:255',
        'phone' => 'required|string|max:15',
        'address' => 'required|string|max:500',
        'status' => 'required|string|max:255', // Example validation for status
        'in_date' => 'required|date',
        'out_date' => 'nullable|date|after_or_equal:in_date', // Ensure out_date is not earlier than in_date
    ]);

    // If validation fails, return errors
    if ($validator->fails()) {
        return response()->json([
            'message' => 'Validation failed',
            'errors' => $validator->errors(),
        ], 422);
    }

    // Create a new patient record
    $patient = Patients::create($request->all());

    // Prepare response data
    $data = [
        'message' => 'Patient is created successfully',
        'data' => $patient,
    ];

    // Return JSON response with status code 201 (Created)
    return response()->json($data, 201);
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, patients $patient)
{
    // Validate the incoming request
    $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'phone' => 'required|string|max:15',
        'address' => 'required|string|max:500',
        'status' => 'required|string|max:255',
        'in_date' => 'required|date',
        'out_date' => 'nullable|date|after_or_equal:in_date',
    ]);

    // Update the patient record with validated data
    $patient->update($validated);

    // Prepare the response data
    $data = [
        'message' => 'Patient is updated successfully',
        'data' => $patient
    ];

    // Return JSON response with status code 200 (OK)
    return response()->json($data, 200);
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(patients $patient)
    {
        $patient->delete();

        $data = [
            'message' => 'Patients is deleted succesfully'
        ];

        return response()->json($data, 201);
    }


    public function search($nama)
{
    $patient = patients::where('nama', $nama)->first(); // Menggunakan where untuk pencarian by name

    if ($patient) {
        return response()->json([
            'message' => 'Get detail patient',
            'data' => $patient,
        ], 200);
    } else {
        return response()->json([
            'message' => 'Patient not found',
        ], 404);
    }
}

    

public function show($id)
{
    $patient = patients::find($id);

        if ($patient){
            $data = [
                'message' => 'Get detail patient',
                'data' => $patient,
            ];
            return response()->json($data, 200);
        }else{
            $data = [
                'message' => 'patient not found',
            ];
            return response()->json($data, 404);
        }
}
}
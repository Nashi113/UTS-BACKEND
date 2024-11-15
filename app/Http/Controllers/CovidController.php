<?php

namespace App\Http\Controllers;

use App\Models\covid;
use Illuminate\Http\Request;

class CovidController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $covid = Covid::all();

        $data = [
            'message'=>'Get all data Covid',
            'data'=>$covid,
        ];

        return response()->json($data, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'nama'=>['required','string','max:255'],
            'phone'=>['required','integer','max:15'],
            'address'=>['required','text','max:500'],
            'status'=>['required','string','max:255'],
        ]);
    
            $covid = Covid::create([
                'nama' =>$request->nama,
                'phone' =>$request->phone,
                'address' =>$request->address,
                'status' =>$request->status,

            ]);
    
            return response()->json($covid, 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(covid $covid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(covid $covid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, covid $covid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(covid $covid)
    {
        $covid->delete();

        $data = [
            'message' => 'data covid is deleted succesfully'
        ];

        return response()->json($data, 201);
    }
}

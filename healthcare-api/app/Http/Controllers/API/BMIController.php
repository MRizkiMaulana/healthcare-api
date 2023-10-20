<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\BMI;
use Illuminate\Http\Request;

class BMIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function tampilkanBMI()
    {
        
        $bmiRecords = BMI::all();
        
        return response()->json(['bmi' => $bmiRecords], 200);
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function hitungBMI(Request $request)
    {
        //
        
        $request->validate([
            'berat_badan' => 'required|numeric',
            'tinggi_tubuh' => 'required|numeric',
        ]);

        $berat_badan = $request->input('berat_badan');
        $tinggi_tubuh = $request->input('tinggi_tubuh');

        $bmi = $berat_badan / ($tinggi_tubuh * $tinggi_tubuh);

        // Simpan data BMI ke database
        $bmiRecord = new BMI();
        $bmiRecord->berat_badan = $berat_badan;
        $bmiRecord->tinggi_tubuh = $tinggi_tubuh;
        $bmiRecord->bmi = $bmi;
        $bmiRecord->save();

        return response()->json(['bmi' => $bmi], 201);
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function editBMI(Request $request, $id)
    {
        //
        {
        $bmiRecord = BMI::find($id);

        if (!$bmiRecord) {
            return response()->json(['error' => 'BMI tidak ditemukan.'], 404);
        }

        $request->validate([
            'berat_badan' => 'required|numeric',
            'tinggi_tubuh' => 'required|numeric',
        ]);

        $berat_badan = $request->input('berat_badan');
        $tinggi_tubuh = $request->input('tinggi_tubuh');

        $bmi = $berat_badan / ($tinggi_tubuh * $tinggi_tubuh);

        $bmiRecord->berat_badan = $berat_badan;
        $bmiRecord->tinggi_tubuh = $tinggi_tubuh;
        $bmiRecord->bmi = $bmi;
        $bmiRecord->save();

        return response()->json(['message' => 'BMI telah diubah.'], 200);
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function hapusBMI($id)
    {
        {
        $bmiRecord = BMI::find($id);

        if (!$bmiRecord) {
            return response()->json(['error' => 'BMI tidak ditemukan.'], 404);
        }

        $bmiRecord->delete();

        return response()->json(['message' => 'BMI telah dihapus.'], 200);
    }
    }
}

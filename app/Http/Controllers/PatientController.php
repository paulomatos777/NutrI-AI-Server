<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Patient::all();
    }

    /**
 * Store a newly created resource in storage.
 */
public function store(Request $request)
{
    $request->validate([
        'gender' => 'required',
        'age' => 'required',
        'height' => 'required',
        'weight' => 'required',

    ]);

    // Cria um novo usuário usando Eloquent
    $patient = Patient::create($request->all());

    // Retorna apenas os dados do usuário criado e o status
    return [
        'status' => 'success',
        'message' => 'Patient created successfully',
        'data' => $patient,
    ];
}


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Patient::findOrFail($id);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id = null)
    {
        $request->validate([
            'gender',
            'age',
            'height',
            'weight'
        ]);

        $patient = Patient::findOrFail($id);
        $patient->update($request->all());

        // Retorna uma resposta JSON com os dados atualizados e o status 200 (OK)
        return response()->json([
            'status' => 'success',
            'message' => 'Patient updated successfully',
            'data' => $patient,
        ], 200);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();

        // Retorna uma resposta JSON com a mensagem de sucesso e o status 200 (OK)
        return response()->json([
            'status' => 'success',
            'message' => 'Patient deleted successfully',
        ], 200);
    }

}



<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Ingredient::all();
    }

    /**
 * Store a newly created resource in storage.
 */
public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
    ]);

    // Cria um novo usuário usando Eloquent
    $ingredient = Ingredient::create($request->all());

    // Retorna apenas os dados do usuário criado e o status
    return [
        'status' => 'success',
        'message' => 'Ingredient created successfully',
        'data' => $ingredient,
    ];
}


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Ingredient::findOrFail($id);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id = null)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $ingredient = Ingredient::findOrFail($id);
        $ingredient->update($request->all());

        // Retorna uma resposta JSON com os dados atualizados e o status 200 (OK)
        return response()->json([
            'status' => 'success',
            'message' => 'Ingredient updated successfully',
            'data' => $ingredient,
        ], 200);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ingredient = Ingredient::findOrFail($id);
        $ingredient->delete();

        // Retorna uma resposta JSON com a mensagem de sucesso e o status 200 (OK)
        return response()->json([
            'status' => 'success',
            'message' => 'Ingredient deleted successfully',
        ], 200);
    }

}


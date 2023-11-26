<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Recipe::all();
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
    $recipe = Recipe::create($request->all());

    // Retorna apenas os dados do usuário criado e o status
    return [
        'status' => 'success',
        'message' => 'Recipe created successfully',
        'data' => $recipe,
    ];
}


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Recipe::findOrFail($id);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id = null)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $recipe = Recipe::findOrFail($id);
        $recipe->update($request->all());

        // Retorna uma resposta JSON com os dados atualizados e o status 200 (OK)
        return response()->json([
            'status' => 'success',
            'message' => 'Recipe updated successfully',
            'data' => $recipe,
        ], 200);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->delete();

        // Retorna uma resposta JSON com a mensagem de sucesso e o status 200 (OK)
        return response()->json([
            'status' => 'success',
            'message' => 'Recipe deleted successfully',
        ], 200);
    }

}



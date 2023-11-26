<?php

namespace App\Http\Controllers;

use App\Models\RecipeIngredients;
use Illuminate\Http\Request;

class RecipeIngredientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return RecipeIngredients::all();
    }

    /**
 * Store a newly created resource in storage.
 */
public function store(Request $request)
{
    $request->validate([
        'recipe_id' => 'required',
        'ingredient_id' => 'required'
    ]);

    // Cria um novo usuário usando Eloquent
    $recipe_ingredient = RecipeIngredients::create($request->all());

    // Retorna apenas os dados do usuário criado e o status
    return [
        'status' => 'success',
        'message' => 'RecipeIngredient created successfully',
        'data' => $recipe_ingredient,
    ];
}


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return RecipeIngredients::findOrFail($id);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id = null)
    {
        $request->validate([
            'recipe_id',
            'ingredient_id'
        ]);

        $recipe_ingredient = RecipeIngredients::findOrFail($id);
        $recipe_ingredient->update($request->all());

        // Retorna uma resposta JSON com os dados atualizados e o status 200 (OK)
        return response()->json([
            'status' => 'success',
            'message' => 'RecipeIngredients updated successfully',
            'data' => $recipe_ingredient,
        ], 200);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $recipe_ingredient = RecipeIngredients::findOrFail($id);
        $recipe_ingredient->delete();

        // Retorna uma resposta JSON com a mensagem de sucesso e o status 200 (OK)
        return response()->json([
            'status' => 'success',
            'message' => 'RecipeIngredients deleted successfully',
        ], 200);
    }

}



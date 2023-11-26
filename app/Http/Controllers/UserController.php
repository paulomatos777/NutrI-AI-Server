<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();
    }

    /**
 * Store a newly created resource in storage.
 */
public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
        // Add other validation rules as needed
    ]);

    // Você pode usar o Hash para criptografar a senha antes de armazená-la no banco de dados
    $request['password'] = bcrypt($request['password']);

    // Cria um novo usuário usando Eloquent
    $user = User::create($request->all());

    // Retorna apenas os dados do usuário criado e o status
    return [
        'status' => 'success',
        'message' => 'User created successfully',
        'data' => $user,
    ];
}


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return User::findOrFail($id);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id = null)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'email|unique:users,email,'.$id,
            // Add other validation rules as needed
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());

        // Retorna uma resposta JSON com os dados atualizados e o status 200 (OK)
        return response()->json([
            'status' => 'success',
            'message' => 'User updated successfully',
            'data' => $user,
        ], 200);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        // Retorna uma resposta JSON com a mensagem de sucesso e o status 200 (OK)
        return response()->json([
            'status' => 'success',
            'message' => 'User deleted successfully',
        ], 200);
    }

}

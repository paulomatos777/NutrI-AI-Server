<?php

use App\Http\Controllers\IngredientController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\RecipeIngredientsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::resource('users', UserController::class);


Route::resource('patients', PatientController::class);


Route::resource('recipes', RecipeController::class);


Route::resource('ingredients', IngredientController::class);


Route::resource('receipe_ingredients', RecipeIngredientsController::class);


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $table = 'recipes'; // Define o nome da tabela associada ao modelo

    protected $fillable = ['name'];

    public function recipe_ingredients()
    {
        return $this->hasMany(RecipeIngredients::class);
    }
}

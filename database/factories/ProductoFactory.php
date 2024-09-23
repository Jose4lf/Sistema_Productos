<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->firstName(),//se llenara con unnombre aleatorio en ingles
            'descripcion' => $this->faker->text(),//se llenara con un oraciones aleatorias
            'categoria' => $this->faker->sentence(),//se llenara con un oraciones aleatorias
            'user_id'=>User::inRandomOrder()->first()//agarra el modelo User y asigna id’s de la tabla users a la columna user_id
            ];

    }
}

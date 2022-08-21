<?php

namespace Database\Factories;

use App\Models\Curso;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Curso>
 */
class CursoFactory extends Factory
{
    protected $model = Curso::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //Todos los campos que tiene mi tabla
            //El campo name se llene con una oracion
            'name' => $this->faker->sentence(),
            //El campo se llena con un parrafo
            'descripcion' => $this->faker->paragraph(),
            //Quiero que solo se pueda escoger entre 2 elementos
            'categoria' => $this->faker->randomElement(['Desarrollo Web', 'Diseño Web'])
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\alumnos>
 */
class AlumnosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'carnet' => $this->faker->regexify('[0-9]{4}-[0-9]{2}-[0-9]{5}'),
            'nombre' => $this->faker->firstName,
            'apellido' => $this->faker->lastName,
            'telefono' => $this->faker->numerify('##########'), // Genera un número de teléfono aleatorio de 10 dígitos
            'semestre' => $this->faker->randomElement(['Primer Semestre', 'Segundo Semestre', 'Tercer Semestre', 'Cuarto Semestre', 'Quinto Semestre', 'Sexto Semestre', 'Septimo Semestre', 'Octavo Semestre', 'Noveno Semestre', 'Decimo Semestre']),
        ];

    }
}
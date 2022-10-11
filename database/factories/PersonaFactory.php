<?php

namespace Database\Factories;

use App\Models\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonaFactory extends Factory
{
     /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Persona::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->firstName() ,
            'primer_apellido'=> $this->faker->lastName(),
            'segundo_apellido'=> $this->faker->lastName(),
            'ci' =>$this->faker->numberBetween(299116,11387268 ),
            'celular' =>$this->faker->numberBetween(12346678,11387268 ),
            'genero' => $this->faker->randomElement(['m', 'f']),
            'direccion' => $this->faker->address,
            'correo'=> 'alguien@example.com'
            /* 'fecha_nacimiento'=> $this->faker->dateTimeBetween('1980-01-01', 'now') , */
        ];
    }
}

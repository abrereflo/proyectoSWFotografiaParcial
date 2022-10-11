<?php

namespace Database\Factories;

use App\Models\Cliente;
use App\Models\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
     /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cliente::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $persona = Persona::all()->random();
        return [
            'persona_id' =>  $persona->id,
        ];
    }
}

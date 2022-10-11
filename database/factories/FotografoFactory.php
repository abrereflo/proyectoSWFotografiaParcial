<?php

namespace Database\Factories;

use App\Models\Fotografo;
use App\Models\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;

class FotografoFactory extends Factory
{
     /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Fotografo::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $persona = Persona::all()->random();
        return [
            'persona_id'=> $persona->id,
        ];
    }
}

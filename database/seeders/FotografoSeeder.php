<?php

namespace Database\Seeders;

use App\Models\Fotografo;
use Illuminate\Database\Seeder;

class FotografoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fotografo::factory(10)->create();
    }
}

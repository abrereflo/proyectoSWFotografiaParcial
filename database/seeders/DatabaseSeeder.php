<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RolSeeder::class);
        $this->call(UserSeeder::class);

        $this->call(PersonaSeeder::class);
        $this->call(ClienteSeeder::class);
        $this->call(FotografoSeeder::class);
        
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rol1 = Role::create(['name'=>'fotografo']);
        $rol2 = Role::create(['name'=>'cliente']);
        $rol3 = Role::create(['name'=>'organizador']);

        $permiso1 = Permission::create(['name'=>'eventos.index']);
        $permiso2 = Permission::create(['name'=>'eventos.create']);
        $permiso3 = Permission::create(['name'=>'eventos.store']);

        $permiso4 = Permission::create(['name'=>'album.index']);
        $permiso5 = Permission::create(['name'=>'album.create']);
        $permiso6 = Permission::create(['name'=>'album.store']);
        $permiso7 = Permission::create(['name'=>'home2.index']);

        $rol1->syncPermissions($permiso4, $permiso5, $permiso6,$permiso7);
        $rol3->syncPermissions($permiso1, $permiso2, $permiso3);

    }
}

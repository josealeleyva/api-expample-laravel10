<?php

namespace Database\Seeders;

use App\Enums\Roles;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;


class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        if (!Role::where('name', Roles::Superadmin->value)->exists())
            Role::create(['name' => Roles::Superadmin->value]);

        if (!Role::where('name', Roles::Admin->value)->exists())
            Role::create(['name' => Roles::Admin->value]);


        //Asignando roles
        //Superadmin
        if (!DB::table('model_has_roles')->where('role_id', 1)->where('model_id', 1)->where('model_type', 'App\Models\User')->exists())
            DB::table('model_has_roles')->insert(['role_id' => 1, 'model_id' => 1, 'model_type' => 'App\Models\User']);
    }
}
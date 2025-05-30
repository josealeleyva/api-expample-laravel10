<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //CREANDO PERMISOS
        //-----------------------------------------------------------------------------------
        //Users
        $resource = 'users';
        $permisos = collect([
            ['name' => "View {$resource}"],
            ['name' => "Store {$resource}"],
            ['name' => "Update {$resource}"],
            ['name' => "Update role {$resource}"],
            ['name' => "Destroy {$resource}"],
        ]);
        $permisos->each(function ($permiso) use ($resource) {
            $permiso['group'] = $resource;
            if (!\Spatie\Permission\Models\Permission::where('name', $permiso['name'])->exists())
                Permission::create($permiso);
        });

        //Asignando permisos
        Role::findByName('Superadministrador')->givePermissionTo($permisos);

       
        //-----------------------------------------------------------------------------------
        //roles
        $resource = 'roles';
        $permisos = collect([
            ['name' => "View {$resource}"],
            ['name' => "Store {$resource}"],
            ['name' => "Update {$resource}"],
            ['name' => "Destroy {$resource}"],
        ]);
        $permisos->each(function ($permiso) use ($resource) {
            $permiso['group'] = $resource;
            if (!\Spatie\Permission\Models\Permission::where('name', $permiso['name'])->exists())
                Permission::create($permiso);
        });

        //Asignando permisos
        Role::findByName('Superadministrador')->givePermissionTo($permisos);

        //-----------------------------------------------------------------------------------
        //permisos
        $resource = 'permisos';
        $permisos = collect([
            ['name' => "View {$resource}"],
            ['name' => "Store {$resource}"],
            ['name' => "Update {$resource}"],
            ['name' => "Destroy {$resource}"],
            ['name' => "Assign {$resource}"],
            ['name' => "Deny {$resource}"],
        ]);
        $permisos->each(function ($permiso) use ($resource) {
            $permiso['group'] = $resource;
            if (!\Spatie\Permission\Models\Permission::where('name', $permiso['name'])->exists())
                Permission::create($permiso);
        });

        //Asignando permisos
        Role::findByName('Superadministrador')->givePermissionTo($permisos);
    }
}
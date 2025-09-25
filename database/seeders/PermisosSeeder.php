<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermisosSeeder extends Seeder
{
    public function run(): void
    {
        $role = Role::findByName('Superadministrador');

        $recursos = [
            'users' => [
                'Ver',
                'Crear',
                'Actualizar',
                'Actualizar rol',
                'Eliminar'
            ],
            'roles' => [
                'Ver',
                'Crear',
                'Actualizar',
                'Eliminar'
            ],
            'permisos' => [
                'Ver',
                'Crear',
                'Actualizar',
                'Eliminar',
                'Asignar',
                'Quitar',
            ]
        ];

        foreach ($recursos as $recurso => $acciones) {
            $permisos = collect();

            foreach ($acciones as $accion) {
                $nombre = "{$accion} {$recurso}";
                if (!Permission::where('name', $nombre)->exists()) {
                    $permisos->push(Permission::create([
                        'name' => $nombre,
                        'group' => $recurso,
                    ]));
                } else {
                    $permisos->push(Permission::where('name', $nombre)->first());
                }
            }

            $role->givePermissionTo($permisos);
        }
    }
}

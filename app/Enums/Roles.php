<?php

namespace App\Enums;

enum Roles: string
{
    case Superadmin = 'Superadministrador';
    case Admin = 'Administrador';
    case Operador = 'Operador';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public function value(): string
    {
        return $this->value;
    }
}
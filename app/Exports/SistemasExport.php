<?php

namespace App\Exports;

use App\Models\Sistema;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SistemasExport implements FromQuery, WithColumnWidths, WithHeadings
{
    use Exportable;

    public function query()
    {
        return Sistema::query()
            ->join('users', 'sistemas.lider_id', '=', 'users.id')
            ->join('clientes', 'sistemas.cliente_id', '=', 'clientes.id')
            ->join('estados', 'sistemas.estado_id', '=', 'estados.id')
            ->join('criticidads', 'sistemas.criticidad_id', '=', 'criticidads.id')
            ->join('authentications', 'sistemas.authentication_id', '=', 'authentications.id')
            ->select('sistemas.nombre',
                     'sistemas.sigla',
                     'authentications.nombre as "login"',
                     'users.apellido as "lider"',
                     'clientes.nombre as "cliente"',
                     'estados.nombre as "estado"',
                     'criticidads.nombre as "criticidad"',
                     'sistemas.descripcion',
                     'sistemas.url_checksystem',
                     'sistemas.f_produccion'
                     )
            ;
    }

    public function columnWidths(): array
    {
        return [
            'A' => 40,
            'B' => 10,
            'C' => 10,
            'D' => 15,
            'E' => 25,
            'F' => 10,
            'G' => 10,
            'H' => 40,
            'I' => 40,
            'J' => 20,
        ];
    }

    public function headings(): array
    {
        return [
            'A' => 'SISTEMA',
            'B' => 'SIGLA',
            'C' => 'LOGIN',
            'D' => 'LIDER',
            'E' => 'CLIENTE',
            'F' => 'ESTADO',
            'G' => 'CRITICIDAD',
            'H' => 'DESCRIPCION',
            'I' => 'CHECKSYSTEM',
            'J' => 'IMPLEMENTACION'
        ];
    }
}

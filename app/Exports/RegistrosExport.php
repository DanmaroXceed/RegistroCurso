<?php

namespace App\Exports;

use App\Models\Registro;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class RegistrosExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Registro::select([
            'id',
            'email',
            'a_pat',
            'a_mat',
            'nombre',
            'inst',
            'cargo',
            'e_fed',
            'c_elec',
            'pasap',
            'c_curp',
            'email_comp',
            'tel',
            'ext',
            'cel',
        ])->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Email',
            'Paterno',
            'Materno',
            'Nombres',
            'Institucion',
            'Cargo',
            'Entidad Federativa',
            'Clave de elector',
            'Pasaporte',
            'CURP',
            'Email Complementario',
            'Telefono',
            'Extension',
            'Celular',
        ];
    }

    public function columnFormats(): array
    {
        return [
            'M' => NumberFormat::FORMAT_NUMBER, 
            'N' => NumberFormat::FORMAT_NUMBER,
            'O' => NumberFormat::FORMAT_NUMBER,
        ];
    }
}

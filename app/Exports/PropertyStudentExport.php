<?php

namespace App\Exports;

use App\Models\PropertyStudent;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PropertyStudentExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PropertyStudent::all();
    }

    public function headings(): array
    {
        return [
            'STT',
            'Ma_Sinh_Vien',
            'Ma_Mon_Hoc',
            'Hoc_Ky_Nam_Hoc',
        ];
    }
}

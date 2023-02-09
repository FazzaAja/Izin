<?php

namespace App\Exports;

use App\Models\Murid;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
// use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MuridExport implements WithHeadings
{
    use Exportable;

     /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["Nama", "NISN", "NIPD", "Kelas", "ID Jurusan", "JK"];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Murid::select(
    //         'nama',
    //         'nisn',
    //         'nipd',
    //         'kelas',
    //         'jurusan_id',
    //         'jk',
    //         'foto',
    //         'alamat',
    //         'phone',
    //         )->get();
    // }
  
   
}

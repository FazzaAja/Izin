<?php

namespace App\Imports;

use App\Models\Murid;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MuridImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Murid([
            'nama' => $row['nama'],
            'nisn' => $row['nisn'],
            'nipd' => $row['nipd'],
            'kelas' => $row['kelas'],
            'jurusan_id' => $row['jurusan_id'],
            'jk' => $row['jk'],
            // 'foto' => $row['foto'],
            // 'alamat' => $row['alamat'],
            // 'phone' => $row['phone'],
        ]);
    }
}

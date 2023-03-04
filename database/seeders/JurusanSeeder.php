<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jurusan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jurusan = [
            ['jurusan' => 'TBSM 1'],
            ['jurusan' => 'TBSM 2'],
            ['jurusan' => 'TBSM 3'],
            ['jurusan' => 'TBSM 4'],
            ['jurusan' => 'TKJ 1'],
            ['jurusan' => 'TKJ 2'],
            ['jurusan' => 'TKJ 3'],
            ['jurusan' => 'TKJ 4'],
            ['jurusan' => 'RPL 1'],
            ['jurusan' => 'RPL 2'],
            ['jurusan' => 'RPL 3'],
            ['jurusan' => 'RPL 4'],
            ['jurusan' => 'DKV 1'],
            ['jurusan' => 'DKV 2'],
            ['jurusan' => 'TOI 1'],
        ];

        Jurusan::insert($jurusan);

        // DB::table('jurusan')->insert($jurusan);

    }
}

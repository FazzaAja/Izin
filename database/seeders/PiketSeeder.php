<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Piket;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class PiketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $piket = [
            [
                'nama' => 'fazza',
                'nip' => '0059759224',
                'password' => Hash::make('qwerty'),
            ],
        ];

        Piket::insert($piket);


    }
}

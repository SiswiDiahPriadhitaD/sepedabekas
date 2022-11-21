<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrays = [
            ['type' => 'G 12', 'year' => '2021'],
            ['type' => 'PCX 03', 'year' => '2020'],
            ['type' => 'TURNER 1', 'year' => '2012'],
            ['type' => 'HYUDAI CX 6', 'year' => '2022'],
            ['type' => 'MERC 90', 'year' => '2019'],
        ];

        foreach($arrays as $row){
            Type::create([
                'type' => $row['type'],
                'year' => $row['year']
            ]);
        }
    }
}

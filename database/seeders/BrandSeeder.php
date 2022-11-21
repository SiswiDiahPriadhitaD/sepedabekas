<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrays = [
            ['brand' => 'SUZUKI'],
            ['brand' => 'HONDA'],
            ['brand' => 'YAMAHA'],
        ];

        foreach ($arrays as $row) {
            Brand::create([
                'brand' => $row['brand']
            ]);
        }
    }
}

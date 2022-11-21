<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrays = [
            [
                'brand_id' => 1,
                'type_id' => 2,
                'name' => 'Mio',
                'star' => 4.5,
                'price' => 140000000,
            ],
            [
                'brand_id' => 2,
                'type_id' => 5,
                'name' => 'pcx',
                'star' => 4,
                'price' => 134600000,
            ],
            [
                'brand_id' => 3,
                'type_id' => 1,
                'name' => 'vixion',
                'star' => 4,
                'price' => 195400000,
            ],
        ];

        foreach ($arrays as $row) {
            Product::create([
                'brand_id' => $row['brand_id'],
                'type_id' => $row['type_id'],
                'name' => $row['name'],
                'description' => 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown',
                'star' => $row['star'],
                'price' => $row['price'],
                'photo' => null,
            ]);
        }
    }
}

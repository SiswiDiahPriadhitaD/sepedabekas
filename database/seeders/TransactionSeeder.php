<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
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
                'user_id' => 2,
                'product_id' => 2,
                'order_date' => Carbon::now(),
                'information' => 'Lorem Ipsum',
                'total' => 134600000,
            ],
            [
                'user_id' => 3,
                'product_id' => 1,
                'order_date' => Carbon::now(),
                'information' => 'Lorem Ipsum',
                'total' => 140000000,
            ],
        ];

        $no = 1;
        foreach($arrays as $row){
            Transaction::create([
                'transaction_id' => 'TR-000'.$no++,
                'user_id' => $row['user_id'],
                'product_id' => $row['product_id'],
                'order_date' => $row['order_date'],
                'information' => $row['information'],
                'total' => $row['total'],
            ]);
        }
    }
}

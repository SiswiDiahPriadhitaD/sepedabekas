<?php

namespace Database\Seeders;

use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
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
                'transaction_id' => 'TR-0001',
                'date_payment' => Carbon::now(),
                'pay' => 134600000,
                'status' => 'paid',
            ],
            [
                'transaction_id' => 'TR-0002',
                'date_payment' => Carbon::now(),
                'pay' => 0,
                'status' => 'unpaid',
            ],
        ];

        $no = 1;
        foreach ($arrays as $row) {
            Payment::create([
                'transaction_id' => $row['transaction_id'],
                'date_payment' => $row['date_payment'],
                'pay' => $row['pay'],
                'status' => $row['status'],
            ]);
        }
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Payment;

class PaymentHistoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Payment::create([
          'nis'=>'NIS0001',
          'school_id'=>'S00001',
          'payment'=>4500000,
          'payment_status'=>'Y'
        ]);
    }
}

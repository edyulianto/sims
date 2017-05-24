<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('SchoolTableSeeder');
        $this->call('StudentTableSeeder');
        $this->call('PaymentHistoryTableSeeder');
        $this->call('UserTableSeeder');
    }
}

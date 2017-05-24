<?php

use Illuminate\Database\Seeder;
use App\School;

class SchoolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        School::create([
          'school_id'=>'S00001',
          'name'=>'SMP 20 Bandung',
          'address'=>'Jl. Centeh Bandung'
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Student;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Student::delete();
        Student::create([
          'name'=>'Edi Yulianto',
          'nis'=>'NIS0001',
          'school_id'=>'S00001',
          'email'=>'edi.y696@gmail.com'
        ]);
    }
}

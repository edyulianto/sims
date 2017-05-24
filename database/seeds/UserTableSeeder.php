<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hasher = app()->make('hash');
      	$api_token = sha1(time());

        User::create([
        	'username'=>'edi.y',
			'nis'=>'NIS0001',
			'password'=> $hasher->make('bismillah'),
			'api_token'=> '92b3dc9cda3545b89ff557b6b4af95fa2f3470c4'
        ]);
    }
}

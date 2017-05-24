<?php namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class Payment extends Model
{ 
	protected $table = 'payment_history';

 	protected $fillable = ['nis','school_id','payment'];	 
}

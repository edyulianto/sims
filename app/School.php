<?php namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class School extends Model
{ 
	protected $table = 'school';

 	protected $fillable = ['nis','name','address','school_id'];	 
}

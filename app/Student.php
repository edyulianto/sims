<?php namespace App;
 
use Illuminate\Database\Eloquent\Model;
 
class Student extends Model
{ 
	protected $table = 'student';

 	protected $fillable = ['nis','name', 'email','school_id'];	 
}

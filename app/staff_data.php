<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class staff_data extends Model {
	
	protected $table = 'staff_data';
	protected $fillable = ['staff_id', 'unique_id', 'qr_code','status'];

}
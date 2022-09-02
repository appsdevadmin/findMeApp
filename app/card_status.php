<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class card_status extends Model {
	
	protected $table = 'card_status';
	protected $fillable = ['staff_id', 'description', 'updated_by'];

}
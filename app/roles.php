<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class roles extends Model {

	protected $fillable=['name','description','active','created_by'];
	
}

?>

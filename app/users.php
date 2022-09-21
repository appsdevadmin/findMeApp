<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model {

    protected $table = 'users';

	protected $fillable=['id_no','access','role','name','email'];

}

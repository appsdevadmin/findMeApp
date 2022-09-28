<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class staff_data extends Model {

	protected $table = 'staff_data';

	protected $fillable = ['staff_id', 'unique_id', 'qr_code','first_name', 'last_name', 'middle_name', 'sex', 'dob',
        'grade_code', 'designation', 'phone', 'mobile', 'office', 'ext', 'email', 'blood_group','height','home_address',
        'section_name', 'loc_description','department_name','division_fullname', 'sbu','directorate_fullname', 'category','status'];

}

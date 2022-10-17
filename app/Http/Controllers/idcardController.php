<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use App\Services\Olympus\Requests\GetBasicStaffDetailsRequest;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\HttpResponse;

use Astrotomic\Vcard\Properties\Email;
use Astrotomic\Vcard\Properties\Gender;
use Astrotomic\Vcard\Properties\Kind;
use Astrotomic\Vcard\Properties\Tel;
use Astrotomic\Vcard\Vcard;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
//use JeroenDesloovere\VCard\VCard;

use App\users;
use App\staff_data;
use App\card_status;
use App\roles;

use Session;
use Auth;
use Mail;

class idcardController extends Controller {

    public $basicStaffDetails;
    public function __construct()
    {
        $this->basicStaffDetails = new GetBasicStaffDetailsRequest();
    }

	public function staff_data($id)
	{

		$staff_data = staff_data::where('unique_id',$id)->first();
		//dd($staff_data->staff_id.'.jpg');

		if(!$staff_data){
            //$staff_details = (object)$this->basicStaffDetails->init($staff_data->staff_id);
//            if(empty($staff_data)){
//
//            }


            Session::flash('message_error', 'Invalid Code!');
            //abort(404);
            $staff_data = "";
           return view('app_pages.id', compact('staff_data'));


		}else{
            Session::put('idx', $id);
            if($staff_data->status == 'Deactivated')
                $staff_data = "";
            return view('app_pages.id', compact('id','staff_data'));
		}


	}

    public function generateVcard($staff_id){
        $staff_data = staff_data::where('staff_id',$staff_id)->get()->first();

		$vcard = Vcard::make()
		->kind(Kind::INDIVIDUAL)
		//->gender(Gender::MALE)
		->fullName($staff_data->last_name,$staff_data->first_name)
		->name($staff_data->last_name,$staff_data->first_name)
		->email($staff_data->email)
		//->email($staff_data->email, [Email::WORK, Email::INTERNET])
		->tel($staff_data->mobile, [Tel::HOME, Tel::VOICE])
		->tel(('09460'.$staff_data->ext), [Tel::WORK, Tel::VOICE])
		->url('https://nnpcgroup.com')
		->title($staff_data->designation)
		->org('NNPC Limited');
		
		return $vcard;
        
    }

	public function home()
	{
		$username = Session::get('username');
		if (Session::has('username'))
		{
			$id = Session::get('idx');
			//dd($idx);
			if($id != ""){
				$staff_data = staff_data::where('unique_id',$id)->first();
				Session::forget('idx');
				return view('app_pages.home', compact('id','staff_data'));
				
			}
			else{
				$staff_data = staff_data::where('staff_id',$username)->first();
				return view('app_pages.home', compact('staff_data'));
			}
		}
		else {
			  Session::flash('message', 'Login to use the Application!');
			  return view('app_pages.login');
		}
	}


	public function card_stolen(Request $request)
	{
		$username = Session::get('username');
		if (Session::has('username'))
		{
			$this->validate($request,['staff_id' => 'required','description' => 'required']);

			$input = $request->all();

			$description = $input['description'];
			$staff_id = $input['staff_id'];
           // dd($staff_id);
			$input['updated_by'] = $username;

			card_status::create($input);

			staff_data::where('staff_id', $staff_id)->update(['status' => 'Deactivated']);


			Session::flash('message', 'Card Status Updated Successfully');
			return redirect('home/menu');

		}
		else {
			  Session::flash('message', 'Login to use the Application!');
			  return redirect('/');
		}
	}

	public function deactivate_card($id)
	{
		$username = Session::get('username');
		if (Session::has('username'))
		{
			if(($username == $id) || Session::get('role') == 1)
			{

				$input['description'] = 'Deactivated by Admin';
				$input['staff_id'] = $id;
				$input['updated_by'] = Session::get('firstname')." ".Session::get('surname')." (".$username.")";

				card_status::create($input);

				staff_data::where('staff_id', $id)->update(['status' => 'Deactivated']);


				Session::flash('message', 'Card Status Updated Successfully');
				return redirect('home/menu');

			}
			else{

			}
		}
		else {
			  Session::flash('message', 'Login to use the Application!');
			  return redirect('/');
		}
	}

	public function activate_card($id)
	{
		$username = Session::get('username');
		if (Session::has('username'))
		{
			if(($username == $id) || Session::get('role') == 1)
			{

				$input['description'] = 'Activated by Admin';
				$input['staff_id'] = $id;
				$input['updated_by'] = Session::get('firstname')." ".Session::get('surname')." (".$username.")";

				card_status::create($input);

				staff_data::where('staff_id', $id)->update(['status' => 'Activated']);


				Session::flash('message', 'Card Status Updated Successfully');
				return redirect('home/menu');

			}
			else{

			}
		}
		else {
			  Session::flash('message', 'Login to use the Application!');
			  return redirect('/');
		}
	}

	public function setup()
	{
		$username = Session::get('username');
		if (Session::has('username'))
		{
			return view('app_pages.setup');
		}
		else {
			  Session::flash('message', 'Login to use the Application!');
			  return view('app_pages.login');
		}
	}

	public function view_staff()
	{
		$username = Session::get('username');
		if (Session::has('username'))
		{
			if(Session::get('role')  == 1){
				$all_staff = staff_data::all();
				/* $all_staffx = staff_data::wherebetween('id', [5500,7501])->get();
				ini_set('max_execution_time', 0);
				foreach($all_staffx as $asx)
					QrCode::size(800)
					->format('png')
					->margin(2)
					//->color(26, 47, 62)
					->merge('../public/img/x11.png')
					->generate($asx->qr_code, public_path('qrcode/'.$asx->staff_id.'.png')); */

				return view('app_pages.view_staff',compact('all_staff'));
			}else{
				Session::flash('message', 'You do not have access to this function!');
				return redirect('/home/menu');
			}
		}
		else {
			  Session::flash('message', 'Login to use the Application!');
			  return view('app_pages.login');
		}
	}



	public function view_staff_data($id)
	{
		$username = Session::get('username');
		if (Session::has('username'))
		{
			if(Session::get('role')  == 1){

			$staff_data = staff_data::find($id);
			if($staff_data != ""){
				return view('app_pages.card', compact('id','staff_data'));

			}else{
				 Session::flash('message_error', 'Invalid ID!');
				 return redirect('/home/menu');
			}

		}else{
				Session::flash('message', 'You do not have access to this function!');
				return redirect('/home/menu');
		}

		}
		else {
			  Session::flash('message', 'Login to use the Application!');
			  return view('app_pages.login');
		}

	}

	public function view_card($id)
	{
		$username = Session::get('username');
		if (Session::has('username'))
		{
			if(Session::get('role')  == 1){

				$staff_data = staff_data::find($id);
				if($staff_data != ""){
					$card_history = card_status::where('staff_id',$staff_data->staff_id)->get();
					return view('app_pages.card_history', compact('id','staff_data','card_history'));

				}else{
					 Session::flash('message_error', 'Invalid ID!');
					 return redirect('/home/menu');
				}

			}else{
					Session::flash('message', 'You do not have access to this function!');
					return redirect('/home/menu');
			}

			}
			else {
				  Session::flash('message', 'Login to use the Application!');
				  return view('app_pages.login');
			}

	}

	public function search_staff(Request $request)
	{
        //dd($request->all());
		$username = Session::get('username');
		if (Session::has('username'))
		{
			if(Session::get('role')  == 1){

			$this->validate($request,['staff_id' => 'required']);

			$input = $request->all();
			$staff_id = $input['staff_id'];
               // dd($staff_id);
				$staff_data = staff_data::where('staff_id',$staff_id)->get()->first();
                //dd($staff_data);
				if($staff_data != ""){
					return view('app_pages.card', compact('staff_data'));

				}else{
					 Session::flash('message_error', 'Invalid ID!');
					 return redirect('/home/menu');
				}

			}else{
					Session::flash('message', 'You do not have access to this function!');
					return redirect('/home/menu');
			}

		}
		else {
			  Session::flash('message', 'Login to use the Application!');
			  return view('app_pages.login');
		}

	}

	public function manage_users()
	{
		$username = Session::get('username');
		if (Session::has('username'))
		{
			if(Session::get('role')  == 1){
				$all_users = users::all();
				foreach($all_users as $user){

					if($user->email == ""){
                        $user_details = (object)$this->basicStaffDetails->init($user->id_no);

						$input['name'] = $user_details->firstname." ".$user_details->surname;
						$input['email'] = $user_details->emailaddress;

						users::where('id_no', $user->id_no)->update(['name' => $user_details->firstname." ".$user_details->surname,'email' => $user_details->emailaddress]);
						$user->update($input);
					}
				}

				$user_details = users::all();
				return view('app_pages.manage_users',compact('user_details'));
			}else{
				Session::flash('message', 'You do not have access to this function!');
				return redirect('/home/menu');
			}
		}
		else {
			  Session::flash('message', 'Login to use the Application!');
			  return view('app_pages.login');
		}
	}

	public function create_user()
	{
		$username = Session::get('username');
		if (Session::has('username'))
		{
			if (Session::get('role') == 1)
			{
				$roles = roles::all();
				return view('app_pages.create_user', compact('roles'));
			}
			else {
			  Session::flash('message_error', 'You do not have access to this fuction!');
			  return redirect('/home/menu');
			}
		}
		else {
			  Session::flash('message', 'Login to use the Application!');
			  return redirect('/');
		}
	}


	public function new_user(Request $request)
	{
		$username = Session::get('username');
		if (Session::has('username'))
		{
			if ((Session::get('role') == "1") || (Session::get('role') == "2"))
			{
				$this->validate($request,['id_no' => 'required','role' => 'required']);

				$input = $request->all();
				$access = $input['access'];
				$id_no = $input['id_no'];
				$role = $input['role'];
				users::create($input);
				//DB::insert('insert into esmsusers (id_no, role,usersaccess) values (?, ?, ?)', [$id_no, $role, $access]);
				Session::flash('message', 'User created successfully!');
				return redirect('manage_users/menu');
			}
			else {
			  Session::flash('message_error', 'You do not have access to this fuction!');
			  return redirect('/home/menu');
			}
		}
		else {
			  Session::flash('message', 'Login to use the Application!');
			  return redirect('/');
		}
	}

	public function edit_user($id)
	{
		$username = Session::get('username');
		if (Session::has('username'))
		{
			if (Session::get('role') == "1")
			{

				$user = users::findorfail($id);

				$user_role = roles::where('id',$user->role)->first();
				$roles = roles::all();

				//dd($roles);
				return view('app_pages.edit_user', compact('user','user_role','roles'));

			}
			else {
			  Session::flash('message_error', 'You do not have access to this fuction!');
			  return redirect('/home/menu');
			}
		}
		else {
			  Session::flash('message', 'Login to use the Application!');
			  return redirect('/');
		}
	}

	public function update_user($id, Request $request)
	{
		
		$username = Session::get('username');
		if (Session::has('username'))
		{
			if (Session::get('role') == "1")
			{
				$input = $request->all();
				//dd($input);
				$this->validate($request,['role_id' => 'required', 'active' => 'required']);
				$access = $input['active'];
				//$id_no = $input['id_no'];
				$role = $input['role_id'];

				users::where('id', $id)->update(['role' => $role,'access' => $access,'email' => '']);

				Session::flash('message', 'User edited');
				return redirect('manage_users/menu');
			}
			else {
			  Session::flash('message_error', 'You do not have access to this fuction!');
			  return redirect('/home/menu');
			}
		}
		else {
			  Session::flash('message', 'Login to use the Application!');
			  return redirect('/');
		}
	}

	public function yes_access($id)
	{
		$username = Session::get('username');
		if (Session::has('username'))
		{
			if (Session::get('role') == "1")
			{
					users::where('id_no', $id)->update(['access' => 1]);
					Session::flash('message', 'User Activatate!');
					return redirect('/manage_users/menu');
			}
			else {
			  Session::flash('message_error', 'You do not have access to this fuction!');
			  return redirect('/');
			}
		}
		else {
			  Session::flash('message', 'Login to use the Application!');
			  return redirect('/logout');
		}
	}

	public function no_access($id)
	{
		$username = Session::get('username');
		if (Session::has('username'))
		{
			if (Session::get('role') == "1")
			{
					users::where('id_no', $id)
					->update(['access' => 0]);
					Session::flash('message', 'Access denied to user!');
					return redirect('/manage_users/menu');
			}
			else {
			  Session::flash('message_error', 'You do not have access to this fuction!');
			  return redirect('/');
			}
		}
		else {
			  Session::flash('message', 'Login to use the Application!');
			  return redirect('/logout');
		}
	}




}

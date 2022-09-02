<?php 

namespace App\Http\Controllers;


use App\Http\Requests;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\HttpResponse;

use App\users;
use App\nin_demo;
use App\tin_demo;
use App\vio_demo;
use App\states;
use App\feedback_data;

use Session;
use Auth;
use Mail;

use adwrapper;
use olympuswrapper;
use getStaffProfile;

include (app_path() . "/lib/adwrapper.php");
include (app_path() . "/lib/olympuswrapper.php");


class appController extends Controller {	
	
	public function login()
	{		
		return view('app_pages.login');
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
	
	public function manage_users()
	{	
		$username = Session::get('username');
		if (Session::has('username'))  
		{
			if(Session::get('role')  == 1){
				$all_users = users::all();					
				foreach($all_users as $user){
					
					if($user->email == ""){
						$userx = new olympuswrapper(true,true,$user->id_no);
						$user_details = $userx->getStaffProfile($user->id_no);
										
						$input['name'] = $user_details->firstname." ".$user_details->surname;
						$input['email'] = $user_details->emailaddress;
						
						users::where('id_no', $user->id_no)->update(['name' => $user_details->firstname." ".$user_details->surname,'email' => $user_details->emailaddress]);
						$user->update($input);
					}
				}
				
				$user_details = users::all();
				return view('app_pages.manage_users',compact('user_details','surname','firstname'));
			}else{
				Session::flash('message', 'You do not have access to this function!');
				return redirect('/home');
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
				//$roles = esmsroles::all();
				return view('app_pages.create_user', compact('roles'));
			}
			else {	 
			  Session::flash('message_error', 'You do not have access to this fuction!');
			  return redirect('/home');
			}
		}
		else {	 
			  Session::flash('message', 'Login to use the Application!');
			  return redirect('/login');
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
				return redirect('manage_users');
			}
			else {	 
			  Session::flash('message_error', 'You do not have access to this fuction!');
			  return redirect('/home');
			}
		}
		else {	 
			  Session::flash('message', 'Login to use the Application!');
			  return redirect('/login');
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
				//dd($user->id_no);
				return view('app_pages.edit_user', compact('user','roles'));
				
			}
			else {	 
			  Session::flash('message_error', 'You do not have access to this fuction!');
			  return redirect('/home');
			}
		}
		else {	 
			  Session::flash('message', 'Login to use the Application!');
			  return redirect('/login');
		}
	}
	
	public function update_user($id, Request $request)
	{
		$username = Session::get('username');
		if (Session::has('username'))  
		{
			if (Session::get('role') == "1")   
			{
		
				$this->validate($request,['id_no' => 'required','role' => 'required']);
			
				$input = $request->all();				
				$access = $input['access'];	
				$id_no = $input['id_no'];				
				$role = $input['role'];
				
				users::where('id', $id)->update(['id_no' => $id_no,'role' => $role,'access' => $access,'email' => '']);
				
				Session::flash('message', 'User edited');
				return redirect('manage_users');	
			}
			else {	 
			  Session::flash('message_error', 'You do not have access to this fuction!');
			  return redirect('/home');
			}
		}
		else {	 
			  Session::flash('message', 'Login to use the Application!');
			  return redirect('/login');
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
					return redirect('/manage_users');	
			}
			else {	 
			  Session::flash('message_error', 'You do not have access to this fuction!');
			  return redirect('/index');
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
					return redirect('/manage_users');	
			}
			else {	 
			  Session::flash('message_error', 'You do not have access to this fuction!');
			  return redirect('/index');
			}
		}
		else {	 
			  Session::flash('message', 'Login to use the Application!');
			  return redirect('/logout');
		}
	}
	
	public function home()
	{	
		$username = Session::get('username');
		if (Session::has('username'))  
		{
			
			return view('app_pages.home');
		}
		else {	 
			  Session::flash('message', 'Login to use the Application!');
			  return view('app_pages.login');
		}
	}
	

}

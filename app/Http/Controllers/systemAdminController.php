<?php namespace App\Http\Controllers;

use App\users;
use App\roles;
use App\oems;
use App\marketer_category;
use App\depots;
use App\fields;
use App\terminals;
use App\streams;
use App\vessels;
use App\jetties;
use App\trucks;
use App\status;
use App\centers;
use App\states;
use App\contract_types;
use App\depot_users;
use App\sufficiency_volume;
use App\states_operations;

use App\Http\Requests;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\HttpResponse;
use Session;
use Auth;
use DB;

class systemAdminController extends Controller {
	
	
	//DASHBOARD//
	
	public function dashboard()
	{	
		
		$states_operations = states_operations::all();
		$today = carbon::today();
		
		$popularity = \Lava::DataTable();
		$popularity->addStringColumn('state')
				   ->addNumberColumn('centers');
				   foreach($states_operations as $a => $so)
							$popularity->addRow([$so->state,$so->confirmed]);

  
		\Lava::GeoChart('Popularity', $popularity,['region'=>'NG','resolution'=>'provinces','height'=>'550','enableRegionInteractivity' => 'true']);
		
		//Second Map
	
		$centers = \Lava::DataTable();
		
		$centers->addNumberColumn('lat')
					->addNumberColumn('long')
					->addStringColumn('tooltip')
				   ->addNumberColumn('Centers');
				   foreach($states_operations as $a => $so)
							$centers->addRow([$so->longitude,$so->latitude,$so->state,$so->confirmed]);

  
		\Lava::GeoChart('Centers', $centers,['region'=>'NG','displayMode'=>'text','resolution'=>'provinces','height'=>'550','enableRegionInteractivity' => 'true']);
		
		
		
		
		return view('system_admin.dashboard');
	}

	//******************//
	// USERS   //
	//*****************//
	
	public function manage_users()
	{
		if (Session::get('role_id') == "1") 
			{
				$users = users::all();
				foreach($users as $user){					
					$role_name[] = roles::find($user->role_id);
				}
				//dd($users);
				return view('system_admin.manage_users', compact('users','role_name'));
			}
			else {	 
			  Session::flash('message_error', 'You do not have access to this fuction!');
			  return redirect('/home');
			}
	}
	
	public function create_user()
	{
		$username = Session::get('username');
		if (Session::has('username'))  
		{
			if(Session::get('role_id') == "1")    
			{
				//$roles = roles::where('id','!=',4)->where('active',1)->get();
				$roles = roles::all()->SortBy('name');
				return view('system_admin.create_user', compact('roles'));
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
			if (Session::get('role_id') == "1")   
			{
				$this->validate($request,['name' => 'required | unique:users,name',
				'address' => 'required',
				'phone' => 'required',
				'email' => 'required | unique:users,email',
				'active' => 'required',
				'role_id' => 'required']);
			
				$input = $request->all();
				$input['password'] = sha1('pa$$word');
				$input['access'] = $input['active'];
				$input['created_by'] = Session::get('user_id');
				$input['password_flag'] = 0;
				$input['access'] = 1;
				//dd($input);
				$email = $input['email'];
				
				$email_check = users::where('email','=',$email)->count();
				if($email_check > 0){
					Session::flash('message_error', 'Email already exists!');
					 return back()->withInput();
				}
				else{
					users::create($input);
					Session::flash('message', 'User created successfully!');
					return redirect('manage_users');
				}
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
			if(Session::get('role_id') == "1") 
			{
				
				$user = users::findorfail($id);	
				$user_role = roles::find($user->role_id);
				$roles = roles::where('active',1)->get();
				return view('system_admin.edit_user', compact('user','roles','user_role'));
				
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
			if (Session::get('role_id') == "1") 
			{
		
					$this->validate($request,['name' => 'required',
					'address' => 'required',
					'phone' => 'required',
					//'email' => 'required | unique:users,email',
					'email' => 'required',
					'active' => 'required',
					'role_id' => 'required']);
				
					$input = $request->all();
					$new_role = $input['role_id'];
					$input['access'] = $input['active'];
					$input['created_by'] = Session::get('user_id');
					$user = users::findorfail($id);
					$old_role = $user->role_id;
					//check to see if user role has changed
					
					/* if($new_role != $old_role){
						//Unassign user from site if he was a site engineer or project manager before editing the user
							if($old_role= 2){
								$user_sites = site_engineers::where('user_id','=',$id)->delete();									
							}
							if($old_role= 3){
								$user_sites = project_managers::where('user_id','=',$id)->get();
								foreach($user_sites as $a => $user_site){
									$input['user_id'] = 0;
									$input['created_by'] = Session::get('user_id');
									$user_site->update($input);
								}
							}
					} */
					$user->update($input);
					Session::flash('message', 'User edited');
					return redirect('manage_users');	
			}
			else {	 
			  Session::flash('message_error', 'You do not have access to this fuction!');
			  return redirect('/manage_users');
			}
		}
		else {	 
			  Session::flash('message', 'Login to use the Application!');
			  return redirect('/login');
		}
	}
	
	public function activate_user($id)
	{
		$user = users::findorfail($id);
		$input['active']  = $input['active'] = 1;
		$user->update($input);
		Session::flash('message', 'User Activated');
		return redirect('/manage_users');	
			
	}
	
	public function deactivate_user($id)
	{
		$user = users::findorfail($id);
		$input['active']  = $input['active'] = 0;
		$user->update($input);
		Session::flash('message', 'User Deactivated');
		return redirect('/manage_users');
			
	}
	
	//PASSWORD RESET//
	
	public function reset_password($id)
	{
		$user= users::find($id);
		$input['password_flag'] = 0;
		$input['password'] = sha1('pa$$word');
		$user->update($input);
		Session::flash('message', 'Password for '. $user->name .' Reset Successful');
		return redirect('/manage_users');
		
	}
	
	
	//**********//
	// ROLES   //
	//*******//
	
	public function manage_roles()
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
				$roles = roles::all();
				return view('system_admin.manage_roles', compact('roles'));
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
	
	public function create_role()
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
				return view('system_admin.create_role');
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
	
	
	public function new_role(Request $request)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
				$this->validate($request,['name' => 'required',
				'description' => 'required',
				'active' => 'required']);
			
				$input = $request->all();
				
				
				roles::create($input);
				Session::flash('message', 'Role created!');
				return redirect('manage_roles');
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
	
	public function edit_role($id)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
				
				$role = roles::findorfail($id);				
				
				return view('system_admin.edit_role', compact('role'));
				
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
	
	public function update_role($id, Request $request)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
		
					$this->validate($request,['name' => 'required',
						'description' => 'required',
						'active' => 'required']);
				
					$input = $request->all();					
					$role = roles::findorfail($id);
				
					$role->update($input);
					Session::flash('message', 'Roles edited');
					return redirect('/manage_roles');	
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

	public function activate_role($id)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
					$role = roles::findorfail($id);
					$input['active'] = 1;
					$role->update($input);
					Session::flash('message', 'Role Activated');
					return redirect('/manage_roles');	
			}
			else {	 
			  Session::flash('message_error', 'You do not have access to this fuction!');
			  return redirect('/home');
			}
		}
		else {	 
			  Session::flash('message', 'Login to use the Application!');
			  return redirect('/logout');
		}
	}
	
	public function deactivate_role($id)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
					$role = roles::findorfail($id);
					$input['active'] = 0;
					$role->update($input);
					Session::flash('message', 'Role Deactivated');
					return redirect('/manage_roles');
			}
			else {	 
			  Session::flash('message_error', 'You do not have access to this fuction!');
			  return redirect('/home');
			}
		}
		else {	 
			  Session::flash('message', 'Login to use the Application!');
			  return redirect('/logout');
		}
	}
	
	public function assign_roles()
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') < "3"))   
				{
				$user= user::where('active','=',1)->get();
				foreach($user as $a){
					$roles[] = roles::find($a->role_id);
				}
				//dd($roles);
				return view('system_admin.assign_roles',compact('user','roles'));
				}
			else {	 
			  Session::flash('message_error', 'You do not have access to this fuction!');
			  return redirect('/home');
			}
		}
		else {	 
			  Session::flash('message', 'Login to use the Application!');
			  return redirect('/logout');
		}
	}
	
	
	public function role_assignment($id)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') < "3"))   
				{
				$member_detail= user::find($id);
				$roles= roles::all();
				$role = roles::find($member_detail->role_id);
				return view('system_admin.role_assignment',compact('member_detail','roles','role'));
				}
			else {	 
			  Session::flash('message_error', 'You do not have access to this fuction!');
			  return redirect('/home');
			}
		}
		else {	 
			  Session::flash('message', 'Login to use the Application!');
			  return redirect('/logout');
		}
	}
	
	public function new_role_assigment(Request $request)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{	
			if ((Session::get('role_id') < "3"))   
				{			
					$this->validate($request,['role' => 'required']);
					
					$input = $request->all();
					$id = $input['id'];	
					$member_detail= user::find($id);	
					$input['role_id'] = $input['role'];	
					$member_detail->update($input);
						
				Session::flash('message', 'Role Updated!');
				return redirect('/assign_roles');
				}
				else {	 
				  Session::flash('message_error', 'You do not have access to this fuction!');
				  return redirect('/home');
			
				}
		}
		else {	 
			  Session::flash('message', 'Login to use the Application!');
			  return redirect('/logout');
		}
	}
	
	
	
	
	
	
	
	
	//**********//
	// STATES   //
	//*******//
	
	public function manage_states()
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
				$states = states::all();
				return view('system_admin.manage_states', compact('states'));
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
	
	
	public function create_state()
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
				return view('system_admin.create_state');
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
	
	public function new_state(Request $request)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
				$this->validate($request,['name' => 'required',
				'address' => 'required',
				'active' => 'required']);
			
				$input = $request->all();
				$input['created_by'] = $user_id;
				
				states::create($input);
				Session::flash('message', 'state created!');
				return redirect('manage_states');
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
	
	
	
	public function edit_state($id)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
				
				$state = states::findorfail($id);							
				return view('system_admin.edit_state', compact('state'));
				
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
	
	public function update_state($id, Request $request)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
		
					$this->validate($request,['name' => 'required',
						'address' => 'required',
						'active' => 'required']);
				
					$input = $request->all();					
					$state = states::findorfail($id);
				
					$state->update($input);
					Session::flash('message', 'state edited');
					return redirect('/manage_states');	
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

	public function activate_state($id)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
					$state = states::findorfail($id);
					$input['active'] = 1;
					$state->update($input);
					Session::flash('message', 'state Activated');
					return redirect('/manage_states');	
			}
			else {	 
			  Session::flash('message_error', 'You do not have access to this fuction!');
			  return redirect('/home');
			}
		}
		else {	 
			  Session::flash('message', 'Login to use the Application!');
			  return redirect('/logout');
		}
	}
	
	public function deactivate_state($id)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
					$state = states::findorfail($id);
					$input['active'] = 0;
					$state->update($input);
					Session::flash('message', 'state Deactivated');
					return redirect('/manage_states');
			}
			else {	 
			  Session::flash('message_error', 'You do not have access to this fuction!');
			  return redirect('/home');
			}
		}
		else {	 
			  Session::flash('message', 'Login to use the Application!');
			  return redirect('/logout');
		}
	}
	
	
	//**********//
	// OEM   //
	//*******//
	
	public function manage_oems()
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
				$oems = oems::all();
				return view('system_admin.manage_oems', compact('oems'));
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
	
	
	public function create_oem()
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
				return view('system_admin.create_oem');
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
	
	public function new_oem(Request $request)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
				$this->validate($request,['name' => 'required',
				'address' => 'required',
				'active' => 'required']);
			
				$input = $request->all();
				$input['created_by'] = $user_id;
				
				oems::create($input);
				Session::flash('message', 'oem created!');
				return redirect('manage_oems');
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
	
	
	public function edit_oem($id)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
				
				$oem = oems::findorfail($id);							
				return view('system_admin.edit_oem', compact('oem'));
				
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
	
	public function update_oem($id, Request $request)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
		
					$this->validate($request,['name' => 'required',
						'address' => 'required',
						'active' => 'required']);
				
					$input = $request->all();					
					$oem = oems::findorfail($id);
				
					$oem->update($input);
					Session::flash('message', 'oem edited');
					return redirect('/manage_oems');	
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

	public function activate_oem($id)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
					$oem = oems::findorfail($id);
					$input['active'] = 1;
					$oem->update($input);
					Session::flash('message', 'oem Activated');
					return redirect('/manage_oems');	
			}
			else {	 
			  Session::flash('message_error', 'You do not have access to this fuction!');
			  return redirect('/home');
			}
		}
		else {	 
			  Session::flash('message', 'Login to use the Application!');
			  return redirect('/logout');
		}
	}
	
	public function deactivate_oem($id)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
					$oem = oems::findorfail($id);
					$input['active'] = 0;
					$oem->update($input);
					Session::flash('message', 'oem Deactivated');
					return redirect('/manage_oems');
			}
			else {	 
			  Session::flash('message_error', 'You do not have access to this fuction!');
			  return redirect('/home');
			}
		}
		else {	 
			  Session::flash('message', 'Login to use the Application!');
			  return redirect('/logout');
		}
	}
	
	
	
	//**********//
	// CENTER   //
	//*******//
	
	public function manage_centers()
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
				$centers = centers::all();
				return view('system_admin.manage_centers', compact('centers'));
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
	
	
	public function create_center()
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
				return view('system_admin.create_center');
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
	
	public function new_center(Request $request)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
				$this->validate($request,['name' => 'required',
				'address' => 'required',
				'active' => 'required']);
			
				$input = $request->all();
				$input['created_by'] = $user_id;
				
				centers::create($input);
				Session::flash('message', 'center created!');
				return redirect('manage_centers');
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
	
	
	public function edit_center($id)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
				
				$center = centers::findorfail($id);							
				return view('system_admin.edit_center', compact('center'));
				
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
	
	public function update_center($id, Request $request)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
		
					$this->validate($request,['name' => 'required',
						'address' => 'required',
						'active' => 'required']);
				
					$input = $request->all();					
					$center = centers::findorfail($id);
				
					$center->update($input);
					Session::flash('message', 'center edited');
					return redirect('/manage_centers');	
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

	public function activate_center($id)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
					$center = centers::findorfail($id);
					$input['active'] = 1;
					$center->update($input);
					Session::flash('message', 'center Activated');
					return redirect('/manage_centers');	
			}
			else {	 
			  Session::flash('message_error', 'You do not have access to this fuction!');
			  return redirect('/home');
			}
		}
		else {	 
			  Session::flash('message', 'Login to use the Application!');
			  return redirect('/logout');
		}
	}
	
	public function deactivate_center($id)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
					$center = centers::findorfail($id);
					$input['active'] = 0;
					$center->update($input);
					Session::flash('message', 'center Deactivated');
					return redirect('/manage_centers');
			}
			else {	 
			  Session::flash('message_error', 'You do not have access to this fuction!');
			  return redirect('/home');
			}
		}
		else {	 
			  Session::flash('message', 'Login to use the Application!');
			  return redirect('/logout');
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	//**********//
	// MARKETERS   //
	//*******//
	
	public function manage_marketers()
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
				$marketers = marketers::all();
				return view('system_admin.manage_marketers', compact('marketers'));
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
	
	
	public function create_marketer()
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
				$marketer_category = marketer_category::where('active',1)->get();
				return view('system_admin.create_marketer', compact('marketer_category'));
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
	
	public function new_marketer(Request $request)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
				$this->validate($request,['name' => 'required',
				'marketer_category' => 'required',
				'active' => 'required']);
			
				$input = $request->all();
				$input['created_by'] = $user_id;
				
				marketers::create($input);
				Session::flash('message', 'Marketer created!');
				return redirect('manage_marketers');
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
	
	
	
	
	
	public function edit_marketer($id)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
				
				$marketer = marketers::findorfail($id);								
				$marketer_category = marketer_category::where('active',1)->get();
				return view('system_admin.edit_marketer', compact('marketer_category','marketer'));
				
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
	
	public function update_marketer($id, Request $request)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
		
					$this->validate($request,['name' => 'required',
						'marketer_category' => 'required',
						'active' => 'required']);
				
					$input = $request->all();					
					$marketer = marketers::findorfail($id);
				
					$marketer->update($input);
					Session::flash('message', 'Marketer edited');
					return redirect('/manage_marketers');	
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

	public function activate_marketer($id)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
					$marketer = marketers::findorfail($id);
					$input['active'] = 1;
					$marketer->update($input);
					Session::flash('message', 'Marketer Activated');
					return redirect('/manage_marketers');	
			}
			else {	 
			  Session::flash('message_error', 'You do not have access to this fuction!');
			  return redirect('/home');
			}
		}
		else {	 
			  Session::flash('message', 'Login to use the Application!');
			  return redirect('/logout');
		}
	}
	
	public function deactivate_marketer($id)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
					$marketer = marketers::findorfail($id);
					$input['active'] = 0;
					$marketer->update($input);
					Session::flash('message', 'Marketer Deactivated');
					return redirect('/manage_marketers');
			}
			else {	 
			  Session::flash('message_error', 'You do not have access to this fuction!');
			  return redirect('/home');
			}
		}
		else {	 
			  Session::flash('message', 'Login to use the Application!');
			  return redirect('/logout');
		}
	}
	
	
	
	
	//**********//
	// Vessels  //
	//*******//
	
	public function manage_vessels()
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
				$vessels = vessels::all();
				return view('system_admin.manage_vessels', compact('vessels'));
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
	
	
	public function create_vessel()
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
				return view('system_admin.create_vessel');
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
	
	public function new_vessel(Request $request)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
				$this->validate($request,['name' => 'required',
				'imo' => 'required','active' => 'required','dwt' => 'required','draft' => 'required']);
			
				$input = $request->all();				
				
				vessels::create($input);
				Session::flash('message', 'Vessels created!');
				return redirect('manage_vessels');
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
	
	
	public function edit_vessel($id)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
				
				$vessel = vessels::findorfail($id);				
				
				return view('system_admin.edit_vessel', compact('vessel'));
				
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
	
	public function update_vessel($id, Request $request)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
		
					$this->validate($request,['name' => 'required','imo' => 'required','active' => 'required','dwt' => 'required','draft' => 'required']);
				
					$input = $request->all();					
					$vessel = vessels::findorfail($id);
				
					$vessel->update($input);
					Session::flash('message', 'Vessels edited');
					return redirect('/manage_vessels');	
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

	public function activate_vessel($id)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
					$vessel = vessels::findorfail($id);
					$input['active'] = 1;
					$vessel->update($input);
					Session::flash('message', 'Vessels Activated');
					return redirect('/manage_vessels');	
			}
			else {	 
			  Session::flash('message_error', 'You do not have access to this fuction!');
			  return redirect('/home');
			}
		}
		else {	 
			  Session::flash('message', 'Login to use the Application!');
			  return redirect('/logout');
		}
	}
	
	public function deactivate_vessel($id)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
					$vessel = vessels::findorfail($id);
					$input['active'] = 0;
					$vessel->update($input);
					Session::flash('message', 'Vessels Deactivated');
					return redirect('/manage_vessels');
			}
			else {	 
			  Session::flash('message_error', 'You do not have access to this fuction!');
			  return redirect('/home');
			}
		}
		else {	 
			  Session::flash('message', 'Login to use the Application!');
			  return redirect('/logout');
		}
	}
	
	
	//**********//
	// Depots  //
	//*******//
	
	public function manage_depots()
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
				$depots = depots::all();
				return view('system_admin.manage_depots', compact('depots'));
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
	
	
	public function create_depot()
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
				return view('system_admin.create_depot');
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
	
	public function new_depot(Request $request)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
				$this->validate($request,['name' => 'required',
				'location' => 'required','active' => 'required','type' => 'required']);
			
				$input = $request->all();
				
				
				depots::create($input);
				Session::flash('message', 'Depot created!');
				return redirect('manage_depots');
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
	
	
	public function edit_depot($id)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
				
				$depot = depots::findorfail($id);				
				
				return view('system_admin.edit_depot', compact('depot'));
				
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
	
	public function update_depot($id, Request $request)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
		
					$this->validate($request,['name' => 'required','location' => 'required','active' => 'required','type' => 'required']);
				
					$input = $request->all();					
					$depot = depots::findorfail($id);
				
					$depot->update($input);
					Session::flash('message', 'Depots edited');
					return redirect('/manage_depots');	
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

	public function activate_depot($id)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
					$depot = depots::findorfail($id);
					$input['active'] = 1;
					$depot->update($input);
					Session::flash('message', 'Depot Activated');
					return redirect('/manage_depots');	
			}
			else {	 
			  Session::flash('message_error', 'You do not have access to this fuction!');
			  return redirect('/home');
			}
		}
		else {	 
			  Session::flash('message', 'Login to use the Application!');
			  return redirect('/logout');
		}
	}
	
	public function deactivate_depot($id)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
					$depot = depots::findorfail($id);
					$input['active'] = 0;
					$depot->update($input);
					Session::flash('message', 'Depot Deactivated');
					return redirect('/manage_depots');
			}
			else {	 
			  Session::flash('message_error', 'You do not have access to this fuction!');
			  return redirect('/home');
			}
		}
		else {	 
			  Session::flash('message', 'Login to use the Application!');
			  return redirect('/logout');
		}
	}
	
	
	//**********//
	// Jetties  //
	//*******//
	
	public function manage_jetties()
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
				$jetties = jetties::all();
				return view('system_admin.manage_jetties', compact('jetties'));
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
	
	
	public function create_jetty()
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
				return view('system_admin.create_jetty');
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
	
	public function new_jetty(Request $request)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
				$this->validate($request,['name' => 'required',
				'location' => 'required','active' => 'required','draft' => 'required']);
			
				$input = $request->all();
				
				
				jetties::create($input);
				Session::flash('message', 'Jetty created!');
				return redirect('manage_jetties');
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
	
	
	public function edit_jetty($id)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
				
				$jetty = jetties::findorfail($id);				
				
				return view('system_admin.edit_jetty', compact('jetty'));
				
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
	
	public function update_jetty($id, Request $request)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
		
					$this->validate($request,['name' => 'required','location' => 'required','active' => 'required','draft' => 'required']);
				
					$input = $request->all();					
					$jetty = jetties::findorfail($id);
				
					$jetty->update($input);
					Session::flash('message', 'Jetties edited');
					return redirect('/manage_jetties');	
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

	public function activate_jetty($id)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
					$jetty = jetties::findorfail($id);
					$input['active'] = 1;
					$jetty->update($input);
					Session::flash('message', 'Jetty Activated');
					return redirect('/manage_jetties');	
			}
			else {	 
			  Session::flash('message_error', 'You do not have access to this fuction!');
			  return redirect('/home');
			}
		}
		else {	 
			  Session::flash('message', 'Login to use the Application!');
			  return redirect('/logout');
		}
	}
	
	public function deactivate_jetty($id)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
					$jetty = jetties::findorfail($id);
					$input['active'] = 0;
					$jetty->update($input);
					Session::flash('message', 'Jetty Deactivated');
					return redirect('/manage_jetties');
			}
			else {	 
			  Session::flash('message_error', 'You do not have access to this fuction!');
			  return redirect('/home');
			}
		}
		else {	 
			  Session::flash('message', 'Login to use the Application!');
			  return redirect('/logout');
		}
	}
	
	
		//**********//
	// Trucks  //
	//*******//
	
	public function manage_trucks()
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
				//$trucks = trucks::select('id','plate_no','state','active')->get()->chunk(1000);;
				$trucks = trucks::limit(500)->get();
				//dd($trucks);
				return view('system_admin.manage_trucks', compact('trucks'));
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
	
	
	public function create_truck()
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
				$states = states::all();
				return view('system_admin.create_truck',compact('states'));
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
	
	public function new_truck(Request $request)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
				$this->validate($request,['state' => 'required','plate_no' => 'required','active' => 'required']);
			
				$input = $request->all();
				
				$plate_no = $input['plate_no'];
				$truck_count = trucks::where('plate_no',$plate_no)->count();
				
				if($truck_count == 0){
					trucks::create($input);		
					Session::flash('message', 'truck created!');
					return redirect('manage_trucks');
				}
				elseif($truck_count > 0){
					Session::flash('message_error', 'truck already exists!');
					return redirect('manage_trucks');
				}
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
	
	
	public function edit_truck($id)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
				
				$truck = trucks::findorfail($id);				
				$states = states::all();
				return view('system_admin.edit_truck', compact('truck','states'));
				
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
	
	public function update_truck($id, Request $request)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
		
					$this->validate($request,['state' => 'required',
				'plate_no' => 'required','active' => 'required']);
				
					$input = $request->all();					
					$truck = trucks::findorfail($id);
				
					$truck->update($input);
					Session::flash('message', 'trucks edited');
					return redirect('/manage_trucks');	
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

	public function activate_truck($id)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
					$truck = trucks::findorfail($id);
					$input['active'] = 1;
					$truck->update($input);
					Session::flash('message', 'truck Activated');
					return redirect('/manage_trucks');	
			}
			else {	 
			  Session::flash('message_error', 'You do not have access to this fuction!');
			  return redirect('/home');
			}
		}
		else {	 
			  Session::flash('message', 'Login to use the Application!');
			  return redirect('/logout');
		}
	}
	
	public function deactivate_truck($id)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
					$truck = trucks::findorfail($id);
					$input['active'] = 0;
					$truck->update($input);
					Session::flash('message', 'truck Deactivated');
					return redirect('/manage_trucks');
			}
			else {	 
			  Session::flash('message_error', 'You do not have access to this fuction!');
			  return redirect('/home');
			}
		}
		else {	 
			  Session::flash('message', 'Login to use the Application!');
			  return redirect('/logout');
		}
	}
	
	
	//**********//
	// CONTRACT TYPES   //
	//*******//
	
	public function manage_contract_types()
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
				$contract_types = contract_types::all();
				return view('system_admin.manage_contract_types', compact('contract_types'));
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
	
	
	public function create_contract_type()
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
				return view('system_admin.create_contract_type');
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
	
	public function new_contract_type(Request $request)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
				$this->validate($request,['name' => 'required',
				'description' => 'required',
				'active' => 'required']);
			
				$input = $request->all();
				
				
				contract_types::create($input);
				Session::flash('message', 'Contract Type created!');
				return redirect('manage_contract_types');
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
	
	
	public function edit_contract_type($id)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
				
				$contract_type = contract_types::findorfail($id);				
				
				return view('system_admin.edit_contract_type', compact('contract_type'));
				
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
	
	public function update_contract_type($id, Request $request)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
		
					$this->validate($request,['name' => 'required',
						'description' => 'required',
						'active' => 'required']);
				
					$input = $request->all();					
					$contract_type = contract_types::findorfail($id);
				
					$contract_type->update($input);
					Session::flash('message', 'Contract Type edited');
					return redirect('/manage_contract_types');	
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

	public function activate_contract_type($id)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
					$contract_type = contract_types::findorfail($id);
					$input['active'] = 1;
					$contract_type->update($input);
					Session::flash('message', 'Contract Type Activated');
					return redirect('/manage_contract_types');	
			}
			else {	 
			  Session::flash('message_error', 'You do not have access to this fuction!');
			  return redirect('/home');
			}
		}
		else {	 
			  Session::flash('message', 'Login to use the Application!');
			  return redirect('/logout');
		}
	}
	
	public function deactivate_contract_type($id)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
					$contract_type = contract_types::findorfail($id);
					$input['active'] = 0;
					$contract_type->update($input);
					Session::flash('message', 'Contract Type Deactivated');
					return redirect('/manage_contract_types');
			}
			else {	 
			  Session::flash('message_error', 'You do not have access to this fuction!');
			  return redirect('/home');
			}
		}
		else {	 
			  Session::flash('message', 'Login to use the Application!');
			  return redirect('/logout');
		}
	}
	
	
	//**********//
	// Status //
	//*******//
	
	public function manage_status()
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
				$statusx = status::all();
				return view('system_admin.manage_status', compact('statusx'));
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
	
	
	public function create_status()
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
				return view('system_admin.create_status');
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
	
	public function new_status(Request $request)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
				$this->validate($request,['name' => 'required',
				'description' => 'required',
				'active' => 'required']);
			
				$input = $request->all();
				
				
				status::create($input);
				Session::flash('message', 'Status created!');
				return redirect('manage_status');
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
	
	
	public function edit_status($id)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
				
				$status = status::findorfail($id);				
				
				return view('system_admin.edit_status', compact('status'));
				
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
	
	public function update_status($id, Request $request)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
		
					$this->validate($request,['name' => 'required',
						'description' => 'required',
						'active' => 'required']);
				
					$input = $request->all();					
					$status = status::findorfail($id);
				
					$status->update($input);
					Session::flash('message', 'Status edited');
					return redirect('/manage_status');	
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

	public function activate_status($id)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
					$status = status::findorfail($id);
					$input['active'] = 1;
					$status->update($input);
					Session::flash('message', 'Status Activated');
					return redirect('/manage_status');	
			}
			else {	 
			  Session::flash('message_error', 'You do not have access to this fuction!');
			  return redirect('/home');
			}
		}
		else {	 
			  Session::flash('message', 'Login to use the Application!');
			  return redirect('/logout');
		}
	}
	
	public function deactivate_status($id)
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
					$status = status::findorfail($id);
					$input['active'] = 0;
					$status->update($input);
					Session::flash('message', 'Status Deactivated');
					return redirect('/manage_status');
			}
			else {	 
			  Session::flash('message_error', 'You do not have access to this fuction!');
			  return redirect('/home');
			}
		}
		else {	 
			  Session::flash('message', 'Login to use the Application!');
			  return redirect('/logout');
		}
	}
	
	
	
	//******************//
	// 	DEPOT USERS    //
	//*****************//
	
	public function assign_users($id)
	{
		if (Session::get('role_id') == "1") 
		{
			//Get all users with depot user role 
				$depot = depots::find($id);
				$all_users = users::where('role_id','=',4)->where('active','=',1)->get();	
				
			
			//Get users already assigned to field if any
			
			$depot_users = depot_users::where('depot_id','=',$id)->where('user_id','!=',0)->get();	
			foreach($depot_users as $user){					
				$user_names[] = users::find($user->user_id);
			}
			
			return view('system_admin.assign_users', compact('depot','depot_users','user_names','all_users'));
		}
		else {	 
		  Session::flash('message_error', 'You do not have access to this fuction!');
		  return redirect('/home');
		}
	}
	
	
	public function assign_user($id, $idx)
	{
		if (Session::get('role_id') == "1") 
			{
				$count_depot_users = depot_users::where('depot_id','=',$idx)->where('user_id','=',$id)->count();	
				$depot_users= depot_users::where('depot_id','=',$idx)->where('user_id','=',$id)->first();	
				
				if($count_depot_users == 1){
					
					Session::flash('message', 'Already assigned as a user in the depot');		
					return redirect('/assign_users/'.$idx);
					
				}
				else{
					
					$input['depot_id'] = $idx;
					$input['user_id'] = $id;
					$input['created_by'] = Session::get('user_id');
					depot_users::create($input);
					
				}
				Session::flash('message', 'Depot Field Agent Assigned Successfully');		
				return redirect('/assign_users/'.$idx);
			}
			else {	 
			  Session::flash('message_error', 'You do not have access to this fuction!');
			  return redirect('/home');
			}
	}
	
	
	public function unassign_user($id, $idx)
	{
		if (Session::get('role_id') == "1") 
			{
				$count_depot_users = depot_users::where('depot_id','=',$idx)->where('user_id','=',$id)->count();	
					
				if($count_depot_users == 1){
					
					depot_users::where('depot_id','=',$idx)
										  ->where('user_id','=',$id)
										  ->delete();
					
				}				
				Session::flash('message', 'Depot Field Agent Unassigned Successfully');		
				return redirect('/assign_users/'.$idx);
			}
			else {	 
			  Session::flash('message_error', 'You do not have access to this fuction!');
			  return redirect('/home');
			}
	}
	
	//*******************//
	//SUFFICIENCY VOLUME//
	//*******************//
	public function manage_sufficiency_volume()
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
				$sufficiency_volumex = sufficiency_volume::all();
				return view('system_admin.manage_sufficiency_volume', compact('sufficiency_volumex'));
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
	
	
	public function create_sufficiency_volume()
	{
		$user_id = Session::get('user_id');
		if (Session::has('user_id'))  
		{
			if ((Session::get('role_id') == "1"))  
			{
				return view('system_admin.create_sufficiency_volume');
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
	
	
	public function confirm_sufficiency_volume(Request $request)
	{			
				
		$this->validate($request,['days' => 'required','volume' => 'required']);
		
		$input = $request->all();
		//dd($input);
		
		$volume = $input['volume'];
		$days = $input['days'];
		
		
			
		Session::flash('message', 'Confirm Sufficiency Days!');
		return view('system_admin.confirm_sufficiency_volume',compact('volume','days'));
				
	}
	
	
	public function new_sufficiency_volume(Request $request)
	{
		if ((Session::get('role_id') == "1"))  
		{
			$this->validate($request,['volume' => 'required','days' => 'required']);
		
			$input = $request->all();
			
			DB::table('sufficiency_volume')->where('active', '=', 1)->update(array('active' => 0));
			$input['active'] = 1;
			$input['created_by'] = Session::get('user_id');
			
			$quantity = $input['volume'];				
			$quantityx = str_replace(",", "", $quantity);
			$quantity = floatval($quantityx);
			$input['volume'] = $quantity;	
				
			sufficiency_volume::create($input);
			Session::flash('message', 'sufficiency volume created!');
			return redirect('manage_sufficiency_volume');
		}
		else {	 
		  Session::flash('message_error', 'You do not have access to this fuction!');
		  return redirect('/home');
		}
		
	}
	
		
	
	
	public function autocomplete(Request $request)
    {
        $data = trucks::select("plate_no")->where("plate_no","LIKE","%{$request->input('query')}%")->get();
        //dd($data);
		return response()->json($data);
    }
	
	
	
	
}

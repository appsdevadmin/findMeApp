<?php

namespace App\Http\Controllers;

use App\Console\Commands\ProcessRoutineOlympusStaffDump;
use App\Services\ActiveDirectory\ActiveDirectoryService;
use App\Http\Requests;
use App\Services\Dumps\OlympusStaffDetailsService;
use App\Services\Olympus\Requests\GetBasicStaffDetailsRequest;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\HttpResponse;
use Illuminate\Support\Facades\DB;
use Auth;
use Mail;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Throwable;

use App\users;

class loginController extends Controller
{

    public $basicStaffDetails;

    public function __construct()
    {
        $this->basicStaffDetails = new GetBasicStaffDetailsRequest();
    }

    public function index()
    {
        //(new OlympusStaffDetailsService())->processRoutineOlympusStaffDetailsDump();

        return view('app_pages.login');
    }

    //Random ID Generator
    public function uniqueID()
    {

        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
        srand((double)microtime() * 1000000);
        $i = 0;
        $uniqueID = '';
        while ($i <= 6) {
            $num = rand() % 33;
            $tmp = substr($chars, $num, 1);
            $uniqueID = $uniqueID . $tmp;
            $i++;
        }
        return $uniqueID;
    }

    public function login()
    {
        $today = Carbon::today();

        $year = $today->format('Y');

        return view('app_pages.login', compact('year'));
    }

    public function stafflogin(Request $request)
    {

        $this->validate($request, ['staff_id' => 'required', 'password' => 'required']);
        $input = $request->all();
        $username = $input['staff_id'];
        $password = $input['password'];

        $connection = (new ActiveDirectoryService())->connect($username, $password);


        if (!$connection['status']) {
            Session::flash('message', $connection['message']);

            return view('app_pages.login');
        }

        $logger_profile = (object)$this->basicStaffDetails->init($username);

        Session::put('username', $username);
        Session::put('firstname', $logger_profile->firstname);
        Session::put('surname', $logger_profile->surname);
        Session::put('department', $logger_profile->department);
        Session::put('location', $logger_profile->location);
        Session::put('grade', $logger_profile->grade);
        Session::put('email', $logger_profile->emailaddress);
        Session::put('designation', $logger_profile->designation);
        Session::put('extension', $logger_profile->extension);
        Session::put('extension', $logger_profile->extension);

        $username = Session::get('username');

        $user = users::where('id_no', '=', $username)->where('role','!=','2')
            ->first();
		if($user != ""){
            Session::put('role', $user->role);
			Session::put('role_id', $user->role);
		}else{
			Session::put('role', "2");
			Session::put('role_id',"2");
		}
        return redirect('/home/menu');
    }


    public function logout()
    {
        Auth::logout();
        Session::flash('message', 'Successfully logged out!');
        Session::forget('username');
        Session::forget('id');
        Session::forget('usernamex');
        Session::flush();
        return redirect('/');
    }

    public function first_login()
    {
        return view('app_pages.first_login');
    }

    public function new_first_login(Request $request)
    {
        $username = Session::get('username');
        if (Session::has('username')) {
            $this->validate($request, ['password' => 'required', 'confirm_password' => 'required|same:password']);

            $input = $request->all();

            $password = sha1($input['password']);
            $confirm_password = $input['confirm_password'];

            $user = users::where('email', '=', $username)->update(['password' => $password, 'password_flag' => 1]);
            if ($user) {
                Session::flash('message', 'Password set!');
                return redirect('/home/menu');
            } else {
                Session::flash('message', 'Password not set try again!');
                return redirect('/first_login');
            }
        } else {
            Session::flash('message', 'Login to use the Application!');
            //return view('auth.login');
            return redirect('/home/menu');
        }

    }

    public function home()
    {
        $role_id = Session::get('role_id');
        $user_id = Session::get('user_id');
        $today = Carbon::today();
        $year = $today->format('Y');
        dd($year);
        return view('app_pages.index', compact('year'));
    }


    public function error_page()
    {
        return view('app_pages.404');
    }


    //ADMIN PASS//
    public function admin_pass($id, $idx)
    {
        $today = Carbon::today();
        $year = $today->format('Y');
        return view('app_pages.admin_pass', compact('id', 'idx', 'year'));
    }

    public function adminlogin(Request $request)
    {

        $this->validate($request, ['passphrase' => 'required']);
        $input = $request->all();
        //dd($input);
        $id = $input['id'];
        $idx = $input['idx'];
        $usernamex = sha1($input['passphrase']);

        $pass = adminphrase::where('phrase', '=', $usernamex)->count();

        if ($idx == 1) {
            if ($pass == 1) {
                Session::put('usernamex', $usernamex);
                $usernamex = Session::get('usernamex');

                Session::flash('message', 'Admin Login successful!');
                return redirect('/edit_vessel_rob/' . $id);
            } else {
                Session::flash('message_error', 'Login Failed: Incorrect Admin-Phrase!');
                return redirect('/pending_vessels');

            }
        }

        if ($idx == 2) {
            if ($pass == 1) {
                Session::put('usernamex', $usernamex);
                $usernamex = Session::get('usernamex');

                Session::flash('message', 'Admin Login successful!');
                return redirect('/edit_shuttle_rob/' . $id);
            } else {
                Session::flash('message_error', 'Login Failed: Incorrect Admin-Phrase!');
                return redirect('/pending_sts_vessels');

            }
        }
    }


}

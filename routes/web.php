<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', [Controllers\loginController::class, 'index']);


// Route::get('index', function () {
//     return view('app_pages.index');
// });

Route::get('/generateQR', [App\Http\Controllers\QRCodeGen::class,'generateQR']);

//QUESTIONNAIRE

Route::get('/{id}', [Controllers\idcardController::class, 'staff_data']);
Route::get('home/menu', [Controllers\idcardController::class, 'home']);


//LOGIN
Route::get('login', [Controllers\loginController::class, 'login']);
Route::post('login', [Controllers\loginController::class, 'stafflogin']);
	
	
//404//
Route::get('error_page', [Controllers\loginController::class, 'error_page']);

//LOGOUT//
Route::get('home/logout', [Controllers\loginController::class, 'logout']);

//HOME//
Route::get('home', [Controllers\idcardController::class, 'home']);


//MANAGE USERS//
Route::get('manage_users/menu', [Controllers\idcardController::class, 'manage_users'])->name('Manage Users');
Route::get('create_user/menu', [Controllers\idcardController::class, 'create_user']);
Route::get('edit_user/{id}', [Controllers\idcardController::class, 'edit_user'])->name('Edit User');
Route::post('create_user', [Controllers\idcardController::class, 'new_user']);
Route::patch('edit_user/{id}', [Controllers\idcardController::class, 'update_user']);

Route::post('card_stolen', [Controllers\idcardController::class, 'card_stolen']);

Route::post('search_staff', [Controllers\idcardController::class, 'search_staff']);

Route::get('activate_card/{id}', [Controllers\idcardController::class, 'activate_card']);
Route::get('deactivate_card/{id}', [Controllers\idcardController::class, 'deactivate_card']);


//STATISTICS//

Route::get('view_staff/menu', [Controllers\idcardController::class, 'view_staff']);
Route::get('view_staff/{id}', [Controllers\idcardController::class, 'view_staff_data']);
Route::get('view_card/{id}', [Controllers\idcardController::class, 'view_card']);







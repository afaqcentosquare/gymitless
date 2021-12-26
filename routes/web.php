<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ForgotPasswordController;
use App\Http\Controllers\Admin\LeadController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\CalenderController;
use App\Http\Controllers\User\FrontWebController;
use App\Http\Controllers\Admin\TaskController;

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


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [LoginController::class, 'index'])->name('admin.login');
Route::post('admin/check/login', [LoginController::class, 'login'])->name('admin.check.login');
Route::get('admin/forgot-password', [ForgotPasswordController::class, 'index'])->name('admin.forgot_password');

Route::group(['middleware' => 'admin'], function () {

/*
|--------------------------------------------------------------------------
| Admin Lead Routes
|--------------------------------------------------------------------------
*/
Route::get('admin/leads', [LeadController::class, 'index'])->name('admin.leads.index');
Route::get('admin/leads/create', [LeadController::class, 'create'])->name('admin.leads.add');
Route::post('admin/leads/store', [LeadController::class, 'store'])->name('admin.leads.store');
Route::get('admin/leads/edit/{id}', [LeadController::class, 'edit'])->name('admin.leads.edit');
Route::post('admin/leads/update/{id}', [LeadController::class, 'update'])->name('admin.leads.update');
Route::get('admin/leads/show/{id}', [LeadController::class, 'show'])->name('admin.leads.show');
Route::get('admin/leads/destroy/{id}', [LeadController::class, 'destroy'])->name('admin.leads.destroy');
Route::post('admin/leads/storenote/{id}', [LeadController::class, 'storeNote'])->name('admin.leads.storenote');
Route::post('admin/leads/updatenote/{id}', [LeadController::class, 'updateNote'])->name('admin.leads.updatenote');
Route::get('admin/leads/updatenotestatus/{id}', [LeadController::class, 'updateNoteStatus'])->name('admin.leads.updatenotestatus');
Route::get('admin/leads/destroynote/{id}', [LeadController::class, 'destroyNote'])->name('admin.leads.destroynote');
/*
|--------------------------------------------------------------------------
| Admin Customer Routes
|--------------------------------------------------------------------------
*/
Route::get('admin/customers', [CustomerController::class, 'index'])->name('admin.customers.index');
Route::get('admin/customer/show/{id}', [CustomerController::class, 'show'])->name('admin.customer.show');
Route::get('admin/customer/create', [CustomerController::class, 'create'])->name('admin.customer.add');
Route::post('admin/customer/store', [CustomerController::class, 'store'])->name('admin.customer.store');
Route::post('admin/customer/update/{id}', [CustomerController::class, 'update'])->name('admin.customer.update');
Route::post('admin/customer/storenote/{id}', [CustomerController::class, 'storeNote'])->name('admin.customer.storenote');
Route::post('admin/customer/updatenote/{id}', [CustomerController::class, 'updateNote'])->name('admin.customer.updatenote');
Route::get('admin/customer/updatenotestatus/{id}', [CustomerController::class, 'updateNoteStatus'])->name('admin.customer.updatenotestatus');
Route::get('admin/customer/destroynote/{id}', [CustomerController::class, 'destroyNote'])->name('admin.customer.destroynote');
Route::post('admin/customer/addlocation/{id}', [CustomerController::class, 'addLocation'])->name('admin.customer.addlocation');
Route::get('admin/customer/editlocation/{id}', [CustomerController::class, 'editLocation'])->name('admin.customer.editlocation');
Route::post('admin/customer/updatelocation/{id}', [CustomerController::class, 'updateLocation'])->name('admin.customer.updatelocation');
Route::get('admin/customer/destroylocation/{id}', [CustomerController::class, 'destroyLocation'])->name('admin.customer.destroylocation');
Route::post('admin/customer/storemember/{id}', [CustomerController::class, 'storeMember'])->name('admin.customer.storemember');
Route::post('admin/customer/updateemember/{id}', [CustomerController::class, 'updateMember'])->name('admin.customer.updatemember');
Route::get('admin/customer/destroymember/{id}', [CustomerController::class, 'destroyMember'])->name('admin.customer.destroymember');
Route::get('admin/customer/closeaccount/{id}', [CustomerController::class, 'closeAccount'])->name('admin.customer.closeaccount');
/*
|--------------------------------------------------------------------------
| Admin Tasks Routes
|--------------------------------------------------------------------------
*/
Route::get('admin/tasks', [TaskController::class, 'index'])->name('admin.tasks.index');



/*
|--------------------------------------------------------------------------
| Admin Contact Routes
|--------------------------------------------------------------------------
*/
Route::get('admin/contacts', [ContactController::class, 'index'])->name('admin.contacts.index');
Route::post('admin/contacts/store', [ContactController::class, 'store'])->name('admin.contacts.store');
Route::post('admin/contacts/update/{id}', [ContactController::class, 'update'])->name('admin.contacts.update');
Route::get('admin/contacts/destroy/{id}', [ContactController::class, 'destroy'])->name('admin.contacts.destroy');

/*
|--------------------------------------------------------------------------
| Admin User Routes
|--------------------------------------------------------------------------
*/
Route::get('admin/users', [UserController::class, 'index'])->name('admin.users.index');
Route::get('admin/users/create', [UserController::class, 'create'])->name('admin.users.add');
Route::post('admin/users/store', [UserController::class, 'store'])->name('admin.users.store');
Route::get('admin/users/edit/{id}', [UserController::class, 'edit'])->name('admin.users.edit');
Route::post('admin/users/update/{id}', [UserController::class, 'update'])->name('admin.users.update');
Route::get('admin/users/show/{id}', [UserController::class, 'show'])->name('admin.users.show');

/*
|--------------------------------------------------------------------------
| Admin Settings Routes
|--------------------------------------------------------------------------
*/
Route::get('admin/settings', [SettingController::class, 'index'])->name('admin.settings');
Route::post('admin/settings/update/profile', [SettingController::class, 'update'])->name('admin.settings.update.profile');
Route::post('admin/settings/update/password', [SettingController::class, 'updatePassword'])->name('admin.settings.update.password');
/*
|--------------------------------------------------------------------------
| Admin Reports Routes
|--------------------------------------------------------------------------
*/
Route::get('admin/reports', [ReportController::class, 'index'])->name('admin.reports');


/*
|--------------------------------------------------------------------------
| Admin Calender Routes
|--------------------------------------------------------------------------
*/
Route::get('admin/calender', [CalenderController::class, 'index'])->name('admin.calender');
Route::post('admin/calender/store', [CalenderController::class, 'store'])->name('admin.calender.store');


Route::get('admin/logout', [LoginController::class, 'logout'])->name('admin.logout');
});
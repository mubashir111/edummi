<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\franchiseController;
use App\Http\Controllers\staffController;
use App\Http\Controllers\studentController;
use App\Http\Controllers\departmentController;
use App\Http\Controllers\token_viewController;
use App\Http\Controllers\newsController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\employeeController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\CourseFinder;
use App\Http\Controllers\representatives;
use App\Http\Controllers\applications;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\MailController;
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

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/resetpassword', [AuthController::class, 'resetpassword'])->name('resetpassword');

Route::post('/login-table', [AuthController::class, 'authenticate'])->name('login-table');


Route::get('/', [DashboardController::class, 'index'])->name('dashboard')->middleware('user_auth');

Route::resource('manage-students', studentController::class)->middleware('role:superadmin,Branch_Owner,Sales_Staff');

Route::get('personal-information', function () { return view('personal-information');})->name('personal-information')->middleware('role:superadmin,Branch_Owner,Sales_Staff');

Route::get('register-franchise', function () { return view('register-franchise');})->name('register-franchise')->middleware('role:superadmin,Branch_Owner,Sales_Staff');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::resource('franchise', franchiseController::class)->middleware('role:superadmin2,superadmin');
Route::resource('staff', staffController::class)->middleware('role:superadmin,Branch_Owner');
Route::resource('departments', departmentController::class)->middleware('role:superadmin,Branch_Owner');
Route::resource('tokens', token_viewController::class)->middleware('role:superadmin,Branch_Owner');

Route::resource('news', newsController::class)->middleware('role:superadmin,Branch_Owner');
Route::resource('employees', employeeController::class)->middleware('role:superadmin');

Route::resource('profile', profileController::class)->middleware('user_auth');

Route::resource('course-finder', CourseFinder::class)->middleware('role:superadmin,Branch_Owner');

Route::resource('representatives', representatives::class)->middleware('user_auth');

Route::post('/employestatus', [employeeController::class, 'changeStatus'])->name('employestatus')->middleware('user_auth');

Route::post('/departmentstatus', [departmentController::class, 'changeStatus'])->name('departmentstatus')->middleware('user_auth');

Route::post('/departmentemployee', [departmentController::class, 'departmentemployees'])->name('departmentemployee')->middleware('user_auth');

Route::post('/franchisestatus', [franchiseController::class, 'changeStatus'])->name('franchisestatus')->middleware('user_auth');

Route::resource('manage-applications', applications::class)->middleware('role:superadmin,Branch_Owner');

Route::post('/assigntoemployee', [studentController::class, 'assignto'])->name('assigntoemployee')->middleware('user_auth');

Route::get('/department-students', [studentController::class, 'departmentstudents'])->name('department-students')->middleware('role:franchises_employee,department_employee');

Route::get('/department-student-view/{id}', [studentController::class, 'assignedstudents'])->name('department-student-view')->middleware('user_auth');

Route::post('/excel', [ExcelController::class, 'upload'])->name('excel')->middleware('user_auth');

Route::post('/state_excel', [ExcelController::class, 'pincodeupload'])->name('state_excel')->middleware('user_auth');

Route::post('/departmentsname', [departmentController::class, 'updatename'])->name('departmentsname')->middleware('role:superadmin,Branch_Owner');



Route::get('/send-email', [MailController::class, 'sendEmail'])->name('sendEmail');

Route::get('/ticket-chat', [token_viewController::class, 'ticketView'])->name('tokens.ticketView')->middleware('user_auth');

Route::post('/password/email', [MailController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('/reset-password/{token}', [MailController::class, 'resetpassword'])->name('reset.password');

Route::post('/password/reset', [MailController::class, 'verifypassword'])->name('password.reset');

Route::post('/ticket/edit', [token_viewController::class, 'editcontent'])->name('tokens.editcontent');









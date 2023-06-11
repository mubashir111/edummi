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
use App\Http\Controllers\state_list_Controller;
use App\Http\Controllers\ApplicationChatController;
use App\Http\Controllers\leadsController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/resetpassword', [AuthController::class, 'resetpassword'])->name('resetpassword');
Route::post('/login-table', [AuthController::class, 'authenticate'])->name('login-table');

Route::get('/', [dashboardController::class, 'index'])->name('dashboard')->middleware('user_auth');

// Student Routes 
Route::resource('manage-students', studentController::class)->middleware('role:superadmin,Branch_Owner,Sales_Staff');
Route::post('/new-application', [studentController::class, 'newapplication'])->name('manage-students.newapplication')->middleware('user_auth');

Route::post('/country-education', [studentController::class, 'country_education'])->name('manage-students.country_education')->middleware('user_auth');

Route::post('/work-experience', [studentController::class, 'work_experiences'])->name('manage-students.work_experience')->middleware('user_auth');

Route::post('/gre-test', [studentController::class, 'gre_test'])->name('manage-students.gre_test')->middleware('user_auth');

Route::post('/gmat-test', [studentController::class, 'gmat_test'])->name('manage-students.gmat_test')->middleware('user_auth');

Route::post('/toefl-test', [studentController::class, 'toefl_test'])->name('manage-students.toefl_test')->middleware('user_auth');

Route::post('/ielts-test', [studentController::class, 'ielts_test'])->name('manage-students.ielts_test')->middleware('user_auth');

Route::post('/pte-test', [studentController::class, 'pte_test'])->name('manage-students.pte_test')->middleware('user_auth');
Route::post('/det-test', [studentController::class, 'det_test'])->name('manage-students.det_test')->middleware('user_auth'); 

Route::post('/sat-test', [studentController::class, 'sat_test'])->name('manage-students.sat_test')->middleware('user_auth');
Route::post('/act-test', [studentController::class, 'act_test'])->name('manage-students.act_test')->middleware('user_auth');
Route::post('/edit-application', [studentController::class, 'edit_aplications'])->name('manage-students.edit_aplications')->middleware('user_auth');

Route::get('/student-application', [studentController::class, 'filter_students_application'])->name('filter_students_application')->middleware('user_auth');

Route::get('/student-application-user/{id}', [studentController::class, 'students_application_user'])->name('students-application-user')->middleware('user_auth');

Route::post('/student-status', [studentController::class, 'students_status'])->name('studentstatus')->middleware('user_auth');

Route::post('/students-profile', [studentController::class, 'students_profile'])->name('students_profile')->middleware('user_auth');




//new routes for student documents and application

Route::get('/document-edit/{id}', [studentController::class, 'documentEdit'])->name('document.edit')->middleware('user_auth');

Route::get('/application-edit/{id}', [studentController::class, 'applicationEdit'])->name('application.edit')->middleware('user_auth');

Route::get('/academic-qualification/{id}', [studentController::class, 'academicQualificationEdit'])->name('academic-qualification.edit')->middleware('user_auth');

Route::post('/academic-qualification-show', [studentController::class, 'academicQualificationshow'])->name('academic-qualification.show')->middleware('user_auth');

Route::post('/academic-qualification-update', [studentController::class, 'academicQualificationupdate'])->name('academic-qalification.update')->middleware('user_auth');


Route::get('/work-experience-edit/{id}', [studentController::class, 'workExperience'])->name('work-experience-edit')->middleware('user_auth');
Route::post('/work_experience-show', [studentController::class, 'workexperienceshow'])->name('work_experience.show')->middleware('user_auth');
Route::post('/work_experience-update', [studentController::class, 'workexperienceupdate'])->name('work_experience.update')->middleware('user_auth');




Route::get('/tests-edit/{id}', [studentController::class, 'testsEdits'])->name('tests.edit')->middleware('user_auth');

Route::get('/tests-verified/{id}', [studentController::class, 'verifiedtestsEdits'])->name('verified-tests.edit')->middleware('user_auth');



// Other routes
Route::get('personal-information', function () { return view('personal-information');})->name('personal-information')->middleware('role:superadmin,Branch_Owner,Sales_Staff');
Route::get('register-franchise', function () { return view('register-franchise');})->name('register-franchise')->middleware('role:superadmin,Branch_Owner,Sales_Staff');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Franchise Routes
Route::resource('franchise', franchiseController::class)->middleware('role:superadmin2,superadmin');

// Staff Routes
Route::resource('staff', staffController::class)->middleware('role:superadmin,Branch_Owner');

// Department Routes
Route::resource('departments', departmentController::class)->middleware('role:superadmin,Branch_Owner');
Route::get('/departments-employee-remove/{id}', [departmentController::class, 'remove_employee'])->name('departments.remove_employee')->middleware('user_auth');

// Token Routes 
Route::resource('tokens', token_viewController::class)->middleware('role:superadmin,Branch_Owner');
Route::get('tokens-status-change/{id}/{status}', [token_viewController::class,'tokenstatuschange'])->name('tokenstatuschange')->middleware('role:superadmin,Branch_Owner');


// Application chat routes 

Route::resource('application-chat', ApplicationChatController::class)->middleware('user_auth');
Route::post('/application-staus-change', [applications::class, 'appstatuschange'])->name('application-staus-change')->middleware('role:superadmin');

Route::post('/application-read-mark', [applications::class, 'ApplicationstatusMarkread'])->name('ApplicationstatusMarkread')->middleware('user_auth');

// News Routes
Route::resource('news', newsController::class)->middleware('role:superadmin,Branch_Owner');

// Employee Routes
Route::resource('employees', employeeController::class)->middleware('role:superadmin');

// Leads Routes
Route::resource('lead', leadsController::class)->middleware('user_auth');
Route::get('/signed-leads', [leadsController::class, 'signedlead'])->name('signedlead')->middleware('user_auth');
Route::get('/converted-leads', [leadsController::class, 'convertedlead'])->name('convertedlead')->middleware('user_auth');
Route::post('/leads-assign', [leadsController::class, 'assignto'])->name('leads.assign')->middleware('user_auth');
Route::post('/leads-mager-assign', [leadsController::class, 'manger_assignto'])->name('leads.manger_assignto')->middleware('user_auth');
Route::post('/leads-change-status', [leadsController::class, 'statushange'])->name('lead.statuschange')->middleware('user_auth');
Route::post('/leads-edit', [leadsController::class, 'editview'])->name('lead.editview')->middleware('user_auth');
Route::post('/leads-update', [leadsController::class, 'storedata'])->name('lead.storedata')->middleware('user_auth');

// Profile Routes
Route::resource('profile', profileController::class)->middleware('user_auth');

// Course Finder Routes
Route::resource('course-finder', CourseFinder::class)->middleware('role:superadmin,Branch_Owner');

Route::get('course-finder-view/{url}',[CourseFinder::class, 'coursefinder_view'])->name('course-finder-view')->middleware('user_auth');

Route::post('courserfinderdelete',[CourseFinder::class, 'courserfinderdelete'])->name('courserfinderdelete')->middleware('user_auth');

// Representatives Routes
Route::resource('representatives', representatives::class)->middleware('user_auth');

// Applications Routes
Route::resource('manage-applications', applications::class)->middleware('role:superadmin,Branch_Owner');

// Excel Routes
Route::post('/excel', [ExcelController::class, 'upload'])->name('excel')->middleware('user_auth');
Route::post('/state_excel', [ExcelController::class, 'pincodeupload'])->name('state_excel')->middleware('user_auth');
Route::post('/leads', [ExcelController::class, 'leadsupload'])->name('leads.upload')->middleware('user_auth');


// Mail Routes
Route::get('/send-email', [MailController::class, 'sendEmail'])->name('sendEmail');
Route::post('/password/email', [MailController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [MailController::class, 'resetpassword'])->name('reset.password');
Route::post('/password/reset', [MailController::class, 'verifypassword'])->name('password.reset');

// Additional Routes
Route::post('/employestatus', [employeeController::class, 'changeStatus'])->name('employestatus')->middleware('user_auth');
Route::post('/departmentstatus', [departmentController::class, 'changeStatus'])->name('departmentstatus')->middleware('user_auth');
Route::post('/departmentemployee', [departmentController::class, 'departmentemployees'])->name('departmentemployee')->middleware('user_auth');
Route::post('/franchisestatus', [franchiseController::class, 'changeStatus'])->name('franchisestatus')->middleware('user_auth');
Route::post('/assigntoemployee', [studentController::class, 'assignto'])->name('assigntoemployee')->middleware('user_auth');
Route::get('/department-students', [studentController::class, 'departmentstudents'])->name('department-students')->middleware('role:franchises_employee,department_employee');

Route::get('/department-students-visa', [studentController::class, 'departmentstudents_visa'])->name('department-students-visa')->middleware('role:franchises_employee,department_employee');

Route::get('/department-student-view/{id}', [studentController::class, 'assignedstudents'])->name('department-student-view')->middleware('user_auth');
Route::post('/departmentsname', [departmentController::class, 'updatename'])->name('departmentsname')->middleware('role:superadmin,Branch_Owner');
Route::get('/ticket-chat', [token_viewController::class, 'ticketView'])->name('tokens.ticketView')->middleware('user_auth'); 
Route::post('/ticket/edit', [token_viewController::class, 'editcontent'])->name('tokens.editcontent');

Route::get('markasread/{id}', [departmentController::class, 'markasread'])->name('markasread');

Route::get('/visa-student-view/{id}', [studentController::class, 'application_student_view'])->name('visa-student-view')->middleware('role:franchises_employee,department_employee'); 

Route::get('/visa-student-document/{id}', [studentController::class, 'application_student_document_view'])->name('visa-student-document')->middleware('role:franchises_employee,department_employee');

Route::get('/visa-student-application/{id}', [studentController::class, 'application_student_application_view'])->name('visa-student-application')->middleware('role:franchises_employee,department_employee');

Route::get('/application-detail-view', [studentController::class, 'application_select_one'])->name('application_detail.view')->middleware('role:franchises_employee,department_employee');


// state list 

Route::post('/sate_list', [state_list_Controller::class, 'getStateList'])->name('state_list')->middleware('user_auth');

Route::post('/district_list', [state_list_Controller::class, 'getdistrictList'])->name('district_list')->middleware('user_auth');












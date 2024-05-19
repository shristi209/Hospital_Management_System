<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\AddressController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\TrashUserController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\TrashDoctorController;
use App\Http\Controllers\Website\DashboardController;
use App\Http\Controllers\Admin\DoctorSearchController;

use App\Http\Controllers\Doctor\NotificationController;
use App\Http\Controllers\Website\AppointmentController;
use App\Http\Controllers\Admin\ForgotPasswordController;
use App\Http\Controllers\Doctor\DoctorProfileController;


use App\Http\Controllers\Admin\TrashDepartmentController;
use App\Http\Controllers\Doctor\DoctorScheduleController;
use App\Http\Controllers\Website\FormAppointmentController;
use App\Http\Controllers\Doctor\DoctorAppointmentController;


Route::get('/', function () {
    return view('welcome');
});
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('admin-login');
    Route::post('/login', [AuthController::class, 'loginUser'])->name('login-user');
});

Route::group(['middleware' => ['role:super-admin']], function () {

    Route::resource('/role', RoleController::class);

    Route::group(['middleware' => ['role:admin','checkrole']], function () {
        Route::get('/logout', [AuthController::class, 'logoutUser'])->name('logout-user');

        Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
        Route::resource('/department', DepartmentController::class);

        Route::get('/usertrash', [TrashUserController::class, 'index'])->name('usertrash');
        Route::get('/departmenttrash', [TrashDepartmentController::class, 'index'])->name('departmenttrash');
        Route::get('/doctortrash', [TrashDoctorController::class, 'index'])->name('doctortrash');

        Route::put('/departmenttrashrestore/{id}', [TrashDepartmentController::class, 'restore'])->name('trashid');
        Route::delete('/departmenttrashdelete/{id}', [TrashDepartmentController::class, 'delete'])->name('trashdelete');

        Route::put('/usertrashrestore/{id}', [TrashUserController::class, 'restoreuser'])->name('trashuser');
        Route::delete('/usertrashdelete/{id}', [TrashUserController::class, 'deleteuser'])->name('trashdeleteuser');

        Route::put('/doctortrashdelete/{id}', [TrashDoctorController::class, 'restore'])->name('trashdoctor');
        Route::delete('/doctortrashdelete/{id}', [TrashDoctorController::class, 'delete'])->name('trashdeletedoctor');

        Route::resource('/user', UserController::class);
        Route::resource('/doctor', DoctorController::class);

        Route::resource('/schedule', ScheduleController::class);


        Route::get('/doctorsearch', [DoctorSearchController::class, 'searchDoctor'])->name('doctorsearch');
        Route::get('/fetchspecialization/{id}', [DoctorSearchController::class, 'fetchDepartmentBasedSpecialization'])->name('fetchspecialization');
    });
});
Route::group(['middleware' => ['role:doctor','checkroleadmin']], function () {
    Route::get('/doctorprofile', [DoctorProfileController::class, 'getProfile'])->name('doctorprofile');
    Route::get('/editprofile', [DoctorProfileController::class, 'edit'])->name('editprofile');
    Route::get('/editeducation', [DoctorProfileController::class, 'editEducation'])->name('editeducation');
    Route::get('/editexperience', [DoctorProfileController::class, 'editExperience'])->name('editexperience');

    Route::get('/createeducation', [DoctorProfileController::class, 'createEducation'])->name('createeducation');
    Route::get('/createexperience', [DoctorProfileController::class, 'createExperience'])->name('createexperience');

    Route::post('/storeeducation', [DoctorProfileController::class, 'storeEducation'])->name('storeeducation');
    Route::post('/storeexperience', [DoctorProfileController::class, 'storeExperience'])->name('storeexperience');

    Route::delete('/deleteeducation/{id}', [DoctorProfileController::class, 'deleteEducation'])->name('deleteeducation');
    Route::delete('/deleteexperience/{id}', [DoctorProfileController::class, 'deleteExperience'])->name('deleteexperience');

    Route::put('/updateprofile/{doctorId}', [DoctorProfileController::class, 'update'])->name('updateprofile');
    Route::put('/updateeducation/{doctorId}', [DoctorProfileController::class, 'updateEducation'])->name('updateeducation');
    Route::put('/updatexperience/{doctorId}', [DoctorProfileController::class, 'updateExperience'])->name('updatexperience');
    Route::resource('/doctorschedule', DoctorScheduleController::class);
    Route::resource('/doctorappointment', DoctorAppointmentController::class);
    Route::patch('/doctorappointment/statusupdate/{id}', [DoctorAppointmentController::class, 'statusUpdate'])->name('statusupdate');

    Route::patch('/notifications/markallasread', [NotificationController::class, 'markAllAsRead'])->name('notifications.markAllAsRead');



    Route::get('/fetchdistrict/{provinceId}', [AddressController::class, 'fetchDistrict'])->name('fetchdistrict');
    Route::get('/fetchmunicipality/{districtId}', [AddressController::class, 'fetchMunicipality'])->name('fetchmunicipality');

    Route::get('/addfetchdistrict/{provinceId}', [AddressController::class, 'addfetchDistrict'])->name('addfetchdistrict');
    Route::get('/addfetchmunicipality/{districtId}', [AddressController::class, 'addfetchMunicipality'])->name('addfetchmunicipality');
});

Route::get('/caresync', [DashboardController::class, 'index']);


Route::get('/appointment', [DashboardController::class, 'appointment'])->name('appointment');

Route::get('/fetchdoctor/{dept_id}', [AppointmentController::class, 'fetchDoctor'])->name('fetchdoctor');
Route::get('/fetchschedule/{schedule_id}', [AppointmentController::class, 'fetchSchedule'])->name('fetchschedule');

Route::resource('/appointmentform', FormAppointmentController::class);

Route::get('/forgotpassword', [ForgotPasswordController::class, 'forgotPassword'])->name('forgotpassword');
Route::post('/forgotpassword', [ForgotPasswordController::class, 'storePassword'])->name('storepassword');
Route::get('/resetpassword/{token}', [ForgotPasswordController::class, 'resetPassword'])->name('resetpassword');
Route::post('/resetpassword', [ForgotPasswordController::class, 'resetPasswordPost'])->name('storeresetpassword');

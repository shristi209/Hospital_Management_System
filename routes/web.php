<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ForgotPasswordController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\TrashUserController;
use App\Http\Controllers\Admin\TrashDepartmentController;
use App\Http\Controllers\Admin\TrashDoctorController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\AddressController;
use App\Http\Controllers\Admin\ScheduleController;

use App\Http\Controllers\Doctor\DoctorProfileController;
use App\Http\Controllers\Doctor\DoctorScheduleController;

use App\Http\Middleware\CheckRole;
use App\Http\Middleware\CheckRoleAdmin;

use App\Http\Controllers\Website\DashboardController;
use App\Http\Controllers\Website\AppointmentController;
use App\Http\Controllers\Website\FormAppointmentController;
use App\Http\Controllers\Doctor\NotificationController;
use App\Http\Controllers\Doctor\StatusController;
use App\Http\Controllers\Doctor\DoctorAppointmentController;


Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('admin-login');
    Route::post('/login', [AuthController::class,'loginUser'])->name('login-user');
});

Route::middleware('auth')->group(function () {

    Route::get('/logout',[AuthController::class,'logoutUser'])->name('logout-user');

    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    Route::middleware('checkrole')->group(function (){
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
    });

    Route::middleware('checkroleadmin')->group(function (){
    Route::get('/doctorprofile', [DoctorProfileController::class, 'getProfile'])->name('doctorprofile');
    Route::get('/editprofile', [DoctorProfileController::class, 'edit'])->name('editprofile');
    Route::get('/editeducation', [DoctorProfileController::class, 'editEducation'])->name('editeducation');
    Route::get('/editexperience', [DoctorProfileController::class, 'editExperience'])->name('editexperience');
    Route::put('/updateprofile/{doctorId}', [DoctorProfileController::class, 'update'])->name('updateprofile');
    Route::put('/updateeducation/{doctorId}', [DoctorProfileController::class, 'updateEducation'])->name('updateeducation');
    Route::put('/updatexperience/{doctorId}', [DoctorProfileController::class, 'updateExperience'])->name('updatexperience');
    Route::resource('/doctorschedule', DoctorScheduleController::class);
    Route::resource('/doctorappointment', DoctorAppointmentController::class);
    Route::patch('/doctorappointment/statusupdate/{id}', [DoctorAppointmentController::class,'statusUpdate'])->name('statusupdate');

    Route::patch('/notifications/markallasread', [NotificationController::class, 'markAllAsRead'])->name('notifications.markAllAsRead');

    });

    Route::get('/fetchdistrict/{provinceId}', [AddressController::class, 'fetchDistrict'])->name('fetchdistrict');
    Route::get('/fetchmunicipality/{districtId}', [AddressController::class, 'fetchMunicipality'])->name('fetchmunicipality');

    Route::get('/addfetchdistrict/{provinceId}', [AddressController::class, 'addfetchDistrict'])->name('addfetchdistrict');
    Route::get('/addfetchmunicipality/{districtId}', [AddressController::class, 'addfetchMunicipality'])->name('addfetchmunicipality');



});

Route::get('/caresync', [DashboardController::class, 'index']);


Route::get('/appointment', [DashboardController::class, 'appointment'])->name('appointment');
// Route::get('/notification', [NotificationController::class, 'index'])->name('notification');

Route::get('/fetchdoctor/{dept_id}', [AppointmentController::class, 'fetchDoctor'])->name('fetchdoctor');
Route::get('/fetchschedule/{schedule_id}', [AppointmentController::class, 'fetchSchedule'])->name('fetchschedule');
// Route::get('/appointmentform', [AppointmentController::class, 'formShow'])->name('appointmentform');
Route::resource('/appointmentform', FormAppointmentController::class);

Route::get('/forgotpassword', [ForgotPasswordController::class, 'forgotPassword'])->name('forgotpassword');
Route::post('/forgotpassword', [ForgotPasswordController::class, 'storePassword'])->name('storepassword');
Route::get('/resetpassword/{token}', [ForgotPasswordController::class, 'resetPassword'])->name('resetpassword');
Route::post('/resetpassword', [ForgotPasswordController::class, 'resetPasswordPost'])->name('storeresetpassword');





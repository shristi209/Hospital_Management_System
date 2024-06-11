<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    AuthController,
    HomeController,
    PageController,
    MenuController,
    RoleController,
    UserController,
    DoctorController,
    AddressController,
    ScheduleController,
    TrashUserController,
    DepartmentController,
    TrashDoctorController,
    DoctorSearchController,
    ForgotPasswordController,
    TrashDepartmentController,

};
use App\Http\Controllers\Website\{
    DashboardController,
    AppointmentController,
    FormAppointmentController
};
use App\Http\Controllers\Doctor\{
    NotificationController,
    DoctorProfileController,
    DoctorScheduleController,
    DoctorAppointmentController
};


// Public Routes
Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
Route::post('/graph', [HomeController::class, 'graphShow']);

// Guest Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('admin-login');
    Route::post('/login', [AuthController::class, 'loginUser'])->name('login-user');
});

// Auth Routes
Route::get('/logout', [AuthController::class, 'logoutUser'])->name('logout-user');

// Super Admin Routes
Route::group(['middleware' => ['role:super-admin|admin']], function () {

    Route::resource('/role', RoleController::class);
    Route::resource('/department', DepartmentController::class);

    Route::prefix('trash')->group(function () {
        Route::get('/user', [TrashUserController::class, 'index'])->name('usertrash');
        Route::get('/trash/department', [TrashDepartmentController::class, 'index'])->name('departmenttrash');
        Route::get('/doctor', [TrashDoctorController::class, 'index'])->name('doctortrash');

        Route::put('/department/{id}/restore', [TrashDepartmentController::class, 'restore'])->name('trashid');
        Route::delete('/department/{id}/delete', [TrashDepartmentController::class, 'delete'])->name('trashdelete');

        Route::put('/user/{id}/restore', [TrashUserController::class, 'restoreuser'])->name('trashuser');
        Route::delete('/user/{id}/delete', [TrashUserController::class, 'deleteuser'])->name('trashdeleteuser');

        Route::put('/doctor/{id}/restore', [TrashDoctorController::class, 'restore'])->name('trashdoctor');
        Route::delete('/doctor/{id}/delete', [TrashDoctorController::class, 'delete'])->name('trashdeletedoctor');

    });

    Route::resource('/user', UserController::class);
    Route::resource('/doctor', DoctorController::class);
    Route::resource('/schedule', ScheduleController::class);
    Route::resource('/page', PageController::class);
    Route::resource('menu', MenuController::class);
    Route::get('menu/senddata', [MenuController::class, 'sendMenu'])->name('menu.sendMenu');

    Route::get('/doctorsearch', [DoctorSearchController::class, 'searchDoctor'])->name('doctorsearch');
    Route::get('/fetchspecialization/{id}', [DoctorSearchController::class, 'fetchDepartmentBasedSpecialization'])->name('fetchspecialization');


});

// Doctor Routes
Route::group(['middleware' => ['role:doctor']], function () {
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
    Route::patch('/doctorschedule/statusupdate/{id}', [DoctorScheduleController::class, 'statusUpdate'])->name('availabilitycheck');


});

// General Routes
Route::get('/caresync', [DashboardController::class, 'index'])->name('caresync');
Route::get('/appointment', [DashboardController::class, 'appointment'])->name('appointment');
Route::get('/change/language/{lang}', [DashboardController::class, 'changeLang']);
Route::post('/feedback', [DashboardController::class, 'feedbacks']);

// Route::get('/appointment', [DashboardController::class, 'appointment'])->name('appointment');
Route::get('/fetchdoctor/{dept_id}', [AppointmentController::class, 'fetchDoctor'])->name('fetchdoctor');
Route::get('/fetchschedule/{schedule_id}', [AppointmentController::class, 'fetchSchedule'])->name('fetchschedule');
Route::resource('/appointmentform', FormAppointmentController::class);

// Forgot Password Routes
Route::get('/forgotpassword', [ForgotPasswordController::class, 'forgotPassword'])->name('forgotpassword');
Route::post('/forgotpassword', [ForgotPasswordController::class, 'storePassword'])->name('storepassword');
Route::get('/resetpassword/{token}', [ForgotPasswordController::class, 'resetPassword'])->name('resetpassword');
Route::post('/resetpassword', [ForgotPasswordController::class, 'resetPasswordPost'])->name('storeresetpassword');

Route::patch('/notifications/markallasread', [NotificationController::class, 'markAllAsRead'])->name('notifications.markAllAsRead');


Route::get('/fetchdistrict/{provinceId}', [AddressController::class, 'fetchDistrict'])->name('fetchdistrict');
Route::get('/fetchmunicipality/{districtId}', [AddressController::class, 'fetchMunicipality'])->name('fetchmunicipality');
Route::get('/addfetchdistrict/{provinceId}', [AddressController::class, 'addfetchDistrict'])->name('addfetchdistrict');
Route::get('/addfetchmunicipality/{districtId}', [AddressController::class, 'addfetchMunicipality'])->name('addfetchmunicipality');



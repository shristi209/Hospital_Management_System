<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\TrashUserController;
use App\Http\Controllers\Admin\TrashDepartmentController;
use App\Http\Controllers\Admin\TrashDoctorController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\AddressController;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('admin-login');
    Route::post('/login', [AuthController::class,'loginUser'])->name('login-user');
});

Route::middleware('auth')->group(function () {
    Route::get('/logout',[AuthController::class,'logoutUser'])->name('logout-user');

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

    Route::get('/fetchdistrict/{provinceId}', [AddressController::class, 'fetchDistrict'])->name('fetchdistrict');
    Route::get('/fetchmunicipality/{districtId}', [AddressController::class, 'fetchMunicipality'])->name('fetchmunicipality');

    Route::get('/addfetchdistrict/{provinceId}', [AddressController::class, 'addfetchDistrict'])->name('addfetchdistrict');
    Route::get('/addfetchmunicipality/{districtId}', [AddressController::class, 'addfetchMunicipality'])->name('addfetchmunicipality');

});





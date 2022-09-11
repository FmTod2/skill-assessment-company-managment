<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\StorageFileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/companies', CompanyController::class)->middleware('auth');
Route::get('get-companies', [CompanyController::class, 'getCompanies'])->name('get.companies');
Route::resource('/employees', EmployeeController::class);
Route::get('get-employees', [EmployeeController::class, 'getEmployees'])->name('get.employees');



Route::get('image/{filename}', [StorageFileController::class,'getPubliclyStorgeFile'])->name('image.displayImage');

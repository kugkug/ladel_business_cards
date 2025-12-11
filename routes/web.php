<?php

use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\GenerateQrController;
use App\Http\Controllers\VcardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function() {
    return "Forbidden 404";
});
Route::get('/admin/employee-list', [EmployeesController::class, 'index']);
Route::get('/employee/{id}', [EmployeesController::class, 'employee']);
Route::get('/employee/vcard/{id}', [VcardController::class, 'index']);

Route::get('/employee/generate/qrcode', [GenerateQrController::class, 'index']);
Route::get('/employee/generate/qrcode/{id}', [GenerateQrController::class, 'generate']);

Route::get('/add/employee', [EmployeesController::class, 'create']);
Route::get('/edit/employee/{id}', [EmployeesController::class, 'edit']);

Route::post('/execute/emp-save', [EmployeesController::class, 'store']);
Route::patch('/execute/emp-update/{id}', [EmployeesController::class, 'update']);
Route::delete('/execute/emp-delete/{id}', [EmployeesController::class, 'destroy']);


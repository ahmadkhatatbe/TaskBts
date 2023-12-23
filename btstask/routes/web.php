<?php
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ExportcompanyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Controller;

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


Route::get('/dashboard', [Controller::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');


// middleware for dashboard routes
Route::middleware('auth')->group(function () {
//Start Employee 
Route::resource('/Employee',EmployeeController::class);
// End Employee
//Start company 
Route::resource('/Company',CompanyController::class);
// End company

// search on employee
Route::get('/searchemployee', [Controller::class, 'searchEmployee'])->name('searchemployee');

// search on company
Route::get('/search', [Controller::class, 'searchcompany'])->name('searchcompany');

// export the data as pdf and excel 
// pdf
Route::get('/generate-pdf', [Controller::class, 'generatePDFemployee'])->name('generatePDFemployee');
Route::get('/generatepdf', [ExportcompanyController::class, 'generatePDFcompany'])->name('generatePDFcompany');

});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

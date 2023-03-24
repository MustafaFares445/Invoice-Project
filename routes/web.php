<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvoicesController;

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
    return view('auth.login');
});
Auth::routes();

Route::resource('/invoices' , InvoicesController::class);

Route::resource('/sections' , \App\Http\Controllers\SectionController::class);

Route::resource('/products' , \App\Http\Controllers\ProductController::class);

Route::resource('/InvocieAttachments' , \App\Http\Controllers\InvoiceAttachmentsController::class);

Route::get('/sections/{id}' , [InvoicesController::class , "getproducts"]);

Route::get('/InvoicesDetails/{id}' , [\App\Http\Controllers\InvoicesDetailsController::class , "edit"]);


Route::get('/download/{invoice_number}/{file_name}' , [\App\Http\Controllers\InvoicesDetailsController::class , "open_file"]);

Route::get('/delete_file' , [\App\Http\Controllers\InvoicesDetailsController::class , "destroy"])->name('delete_file');

Route::get('/InvoicesDetails/{id}' , [\App\Http\Controllers\InvoicesDetailsController::class , "edit"]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/{page}', [\App\Http\Controllers\AdminController::class , "index"]);



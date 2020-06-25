<?php

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


Route::resource("/expense_reports", "ExpenseReportController");

Route::resource('expense_reports.expenses','ExpenseController')->only(['create','store']);

Route::get("/expense_reports/{expense_report}/sendMail", "ExpenseReportController@sendMail")->name("expense_reports.sendMail");
Route::post("/expense_reports/{expense_report}/sendingMail", "ExpenseReportController@sendingMail")->name("expense_reports.sendingMail");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

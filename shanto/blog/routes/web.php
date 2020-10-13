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

Route::get('/', 'HomeController@home');
Route::get('/app', 'HomeController@app');

//Portfolio
Route::get('/portfolio','PortfolioController@portfolioShowPage');


//ViewPage
//Route::get('/viewProject','HomeController@viewProject');
Route::get('/projectView/{id}','HomeController@ProjectView');

//getFull Project List
Route::get('/fullProjectList','FullProject@fullProjectList');

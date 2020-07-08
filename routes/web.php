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

Route::get('/login', 					'FrontPageController@index')			->name('login.path');
Route::get('/register', 				'FrontPageController@register')			->name('register.path');
Route::post('/register/process', 		'FrontPageController@process')			->name('register.process');
Route::post('/login/process', 			'FrontPageController@loginProcess')		->name('login.process');
Route::get('/', 						'FrontPageController@home')				->name('home');

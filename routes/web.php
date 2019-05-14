<?php

Route::resource('/', 'WelcomeController');

Route::resource('/companies', 'CompaniesController')->middleware('auth');

Route::resource('/employees', 'EmployeesController')->middleware('auth');

Auth::routes();

Route::get('/home/{lang}', 'HomeController@index')->name('home');

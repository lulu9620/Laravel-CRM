<?php

Route::resource('/', 'WelcomeController');

Route::resource('/companies', 'CompaniesController');

Route::resource('/employees', 'EmployeesController');

Auth::routes();

Route::get('/home/{lang}', 'HomeController@index')->name('home');

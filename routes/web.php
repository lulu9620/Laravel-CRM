<?php

Route::resource('/','WelcomeController');

Route::resource('companies','CompaniesController');

Route::resource('employees','EmployeesController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

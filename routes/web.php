<?php

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

Route::view('/', 'home');

//contact-us svare til url, contact svare til view (contact.blade.php)
Route::view('contact-us', 'contact');
Route::view('about', 'about');

// Route::get('customers', 'CustomersController@index');
// Route::get('customers/create', 'CustomersController@create');
// Route::post('customers', 'CustomersController@store');
// Route::get('customers/{customer}', 'CustomersController@show');
// Route::get('customers/{customer}/edit', 'CustomersController@edit');
// Route::patch('customers/{customer}', 'CustomersController@update');
// //Route::delete('customers/{customer}, CustomersController@destroy');
// Route::delete('customers/{customer}', 'CustomersController@destroy')->name('customers.destroy');

Route::resource('customers', 'CustomersController');

/*
Route::any('{query}', 
  function() { return redirect('/'); })
  ->where('query', '.*');
*/
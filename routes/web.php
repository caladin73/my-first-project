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

Route::get('contact', 'ContactFormController@create')->name('contact.create');
Route::post('contact', 'ContactFormController@store')->name('contact.store');

Route::view('about', 'about'); //->middleware('test'); //custom middleware routeMiddleware apply

// Route::get('customers', 'CustomersController@index');
// Route::get('customers/create', 'CustomersController@create');
// Route::post('customers', 'CustomersController@store');
// Route::get('customers/{customer}', 'CustomersController@show');
// Route::get('customers/{customer}/edit', 'CustomersController@edit');
// Route::patch('customers/{customer}', 'CustomersController@update');
// //Route::delete('customers/{customer}, CustomersController@destroy');
// Route::delete('customers/{customer}', 'CustomersController@destroy')->name('customers.destroy');

//->middleware('auth') restricter siden så man skal være logged ind
Route::resource('customers', 'CustomersController'); //->middleware('auth');

/*
Route::any('{query}', 
  function() { return redirect('/'); })
  ->where('query', '.*');
*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

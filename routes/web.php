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

Route::get('/', function () {
    return view('home');
});

Route::group(['prefix' => 'customer'], function () {
    Route::get('/', 'UserController@index')->name('user');
    Route::post('/insert', 'UserController@create')->name('insert-new-user');
    Route::delete('/delete/{id}', 'UserController@delete')->name('delete-user');
    Route::get('update/{id}', 'UserController@updatePage')->name('update-user');
    Route::post('update/{id}', 'UserController@update')->name('edit-user');
});

Route::group(['prefix' => 'topping'], function() {
    Route::get('/', 'ToppingController@index')->name('topping');
    Route::get('/insert', 'ToppingController@insertPage')->name('insert-topping');
    Route::post('/insert', 'ToppingController@insert')->name('insert-new-topping');
    Route::get('/update/{id}', 'ToppingController@updatePage')->name('update-topping');
    Route::post('/update/{id}', 'ToppingController@update')->name('edit-topping');
    Route::delete('/delete/{id}', 'ToppingController@delete')->name('delete-topping');
});

Route::group(['prefix' => 'drink'], function(){
    Route::get('/', 'DrinkController@index')->name('drink');
    Route::get('/insert', 'DrinkController@insertPage')->name('insert-drink');
    Route::post('/insert', 'DrinkController@insert')->name('insert-new-drink');
    Route::get('/update/{id}', 'DrinkController@updatePage')->name('update-drink');
    Route::post('/update/{id}', 'DrinkController@update')->name('edit-drink');
    Route::delete('/delete/{id}', 'DrinkController@delete')->name('delete-drink');
});

Route::group(['prefix' => 'Transaction'], function () {
    Route::get('/', 'TransactionHeaderController@index')->name('transaction');
    Route::get('/insert', 'TransactionHeaderController@insertPage')->name('insert-transaction');
    Route::post('/insert', 'TransactionHeaderController@insert')->name('insert-new-transaction');
});



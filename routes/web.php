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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// brg
Route::get('/viewBrg', 'barangController@index')->name('viewBrg');
Route::post('/inserBrg','barangController@insert')->name('inserBrg');
Route::get('/editBrg/{id}', 'barangController@edit')->name('editBrg');
Route::post('/updBrg/{id}','barangController@update')->name('updBrg');
Route::get('/delBrg/{id}', 'barangController@delete')->name('delBrg');
// supp
Route::get('/viewSupp', 'supplierController@index')->name('viewSupp');
Route::post('/inserSupp','supplierController@insert')->name('inserSupp');
Route::get('/editSupp/{id}', 'supplierController@edit')->name('editSupp');
Route::post('/updSupp/{id}','supplierController@update')->name('updSupp');
Route::get('/delSupp/{id}', 'supplierController@delete')->name('delSupp');
// trans
Route::get('/viewTrans', 'transaksiController@index')->name('viewTrans');
Route::get('/addTrans','transaksiController@fieldo')->name('addTrans');
Route::post('/inserTrans','transaksiController@insert')->name('inserTrans');
Route::get('/getDetails/{id}','transaksiController@details')->name('getDetails');

//

Route::get('welcome', function () {
    return view('welcome');
});

Route::get('/template', function () {
    return view('template');
});



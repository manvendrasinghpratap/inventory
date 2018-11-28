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

/*Route::get('/', function () {
    return view('dashboard');
});*/
Route::get('/','AdminController@index');

Auth::routes();

Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');

/* Bank Routes Start*/
Route::get('banks','BankController@index');
Route::get('addbank','BankController@create');
Route::post('addbank','BankController@store');
Route::get('editbank/{id}','BankController@edit');
Route::post('updatebank','BankController@update');
/* Bank Routes Ends*/

Route::get('/categories','CategoryController@index');
Route::get('/addCategory','CategoryController@create');
Route::post('/addCategory','CategoryController@store');
Route::get('editCategory/{id}','CategoryController@edit');
Route::post('updateCategory','CategoryController@update');

Route::get('/products','ProductController@index');
Route::get('/addProduct','ProductController@create');
Route::post('/addProduct','ProductController@store');
Route::get('editProduct/{id}','ProductController@edit');
Route::get('editProductAndSize/{id}','ProductController@show');
Route::post('updateProduct','ProductController@update');

/* Delete Row From Table Start */
Route::get('/ajax/getStatenames/{id}','AjaxController@getStatenames');
Route::get('/ajax/getproductDetails/{id}','AjaxController@getproductDetails');
Route::get('/ajax/getRateAndGst/{id}','AjaxController@getRateAndGst');
Route::get('/ajax/addProductDropdown/{id}/{tr_id}','AjaxController@addProductDropdown');
Route::get('ajax/getCitynames/{id}','AjaxController@getCitynames');
Route::get('ajax/getLocationArea/{id}','AjaxController@getLocationArea');
Route::get('ajax/checkInvoice/{id}','AjaxController@checkInvoice');
Route::get('ajax/destroy/{name}/{id}','AjaxController@destroy');
Route::get('ajax/destroyByCustomColumn/{name}/{id}/{columnName}','AjaxController@destroyByCustomColumn');
/* Delete Row From Table End */


/*Invoice Controller Start */
Route::get('invoices','InvoiceController@index');
Route::get('generateInvoice','InvoiceController@create');
Route::get('print/{id}','InvoiceController@printpreview')->name('print');
Route::post('generateInvoice','InvoiceController@store');
Route::resource('invoices', 'InvoiceController');

/*Invoice Controller End */

/*Print command start */
Route::get('print','InvoiceController@print');
/*Print command End */

/**/





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

//Backend
Route::group(['prefix' => 'admin', 'namespace' => 'Backend'], function () {
    /*
    |--------------------------------------------------------------------------
    | Admin home page
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', ['as' => 'backend.dashboard.index', 'uses' => 'DashboardController@index']);
    Route::get('/login', ['as' => 'backend.users.login', 'uses' => 'LoginController@login']);
    Route::post('/login', ['as' => 'backend.users.login', 'uses' => 'LoginController@postLogin']);
    Route::get('/logout', ['as' => 'backend.users.logout', 'uses' => 'LoginController@logout']);

    Route::get('/users', ['as' => 'backend.users.list', 'uses' => 'UsersController@index']);
    Route::get('/users/add', ['as' => 'backend.users.add', 'uses' => 'UsersController@add']);
    Route::post('/users/add', ['as' => 'backend.users.add', 'uses' => 'UsersController@postAdd']);
    Route::get('/users/edit/{id}', ['as' => 'backend.users.edit', 'uses' => 'UsersController@edit']);
    Route::post('/users/edit/{id}', ['as' => 'backend.users.edit', 'uses' => 'UsersController@postEdit']);
    Route::get('/users/change_pwd', ['as' => 'backend.users.change_pass', 'uses' => 'UsersController@changePass']);
    Route::post('/users/change_pwd', ['as' => 'backend.users.change_pass', 'uses' => 'UsersController@postchangePass']);
    Route::get('/users/del/{id}', ['as' => 'backend.users.del', 'uses' => 'UsersController@del']);

    /*
    |--------------------------------------------------------------------------
    | Admin home page
    |--------------------------------------------------------------------------
    */
    Route::get('/system/signature', ['as' => 'backend.systems.signature', 'uses' => 'SystemsController@signature']);
    Route::post('/system/signature', ['as' => 'backend.systems.signature', 'uses' => 'SystemsController@postSignature']);

    /*
    |--------------------------------------------------------------------------
    | Admin contact page
    |--------------------------------------------------------------------------
    */
    Route::get('/contact', ['as' => 'backend.contacts.index', 'uses' => 'ContactController@index']);
    Route::get('/contact/view/{id}', ['as' => 'backend.contacts.view', 'uses' => 'ContactController@view']);

    Route::get('/contact/del/{id}', ['as' => 'backend.contacts.del', 'uses' => 'ContactController@del']);
    Route::get('/contact/count', ['as' => 'backend.contacts.count', 'uses' => 'ContactController@countContact']);

    /*
    |--------------------------------------------------------------------------
    | Admin category page
    |--------------------------------------------------------------------------
    */
    Route::get('/categories', ['as' => 'backend.categories.index', 'uses' => 'CategoryController@index']);
    Route::get('/categories/add', ['as' => 'backend.categories.add', 'uses' => 'CategoryController@add']);
    Route::post('/categories/add', ['as' => 'backend.categories.add', 'uses' => 'CategoryController@postAdd']);
    Route::get('/categories/edit/{id}', ['as' => 'backend.categories.edit', 'uses' => 'CategoryController@edit']);
    Route::post('/categories/edit/{id}', ['as' => 'backend.categories.edit', 'uses' => 'CategoryController@postEdit']);
    Route::get('/categories/del/{id}', ['as' => 'backend.categories.del', 'uses' => 'CategoryController@del']);

    /*
    |--------------------------------------------------------------------------
    | Admin facility page
    |--------------------------------------------------------------------------
    */
    Route::get('/facilities', ['as' => 'backend.facilities.index', 'uses' => 'FacilityController@index']);
    Route::get('/facilities/add', ['as' => 'backend.facilities.add', 'uses' => 'FacilityController@add']);
    Route::post('/facilities/add', ['as' => 'backend.facilities.add', 'uses' => 'FacilityController@postAdd']);
    Route::get('/facilities/edit/{id}', ['as' => 'backend.facilities.edit', 'uses' => 'FacilityController@edit']);
    Route::post('/facilities/edit/{id}', ['as' => 'backend.facilities.edit', 'uses' => 'FacilityController@postEdit']);
    Route::get('/facilities/del/{id}', ['as' => 'backend.facilities.del', 'uses' => 'FacilityController@del']);

    /*
    |--------------------------------------------------------------------------
    | Admin product page
    |--------------------------------------------------------------------------
    */
    Route::get('/products', ['as' => 'backend.products.index', 'uses' => 'ProductsController@index']);
    Route::get('/products/add', ['as' => 'backend.products.add', 'uses' => 'ProductsController@add']);
    Route::post('/products/add', ['as' => 'backend.products.add', 'uses' => 'ProductsController@postAdd']);
    Route::get('/products/edit/{id}', ['as' => 'backend.products.edit', 'uses' => 'ProductsController@edit']);
    Route::post('/products/edit/{id}', ['as' => 'backend.products.edit', 'uses' => 'ProductsController@postEdit']);
    Route::get('/products/del/{id}', ['as' => 'backend.products.del', 'uses' => 'ProductsController@del']);

    /*
    |--------------------------------------------------------------------------
    | Admin setting website page
    |--------------------------------------------------------------------------
    */
    Route::get('/settings', ['as' => 'backend.settings.index', 'uses' => 'SettingController@setting']);
    Route::post('/settings', ['as' => 'backend.settings.index', 'uses' => 'SettingController@postSetting']);


    /*
    |--------------------------------------------------------------------------
    | Admin chat room
    |--------------------------------------------------------------------------
    */
    Route::get('/chat', ['as' => 'backend.chats.index', 'uses' => 'ChatController@index']);



    /*
    |--------------------------------------------------------------------------
    | 
    |--------------------------------------------------------------------------
    */
   


});

//Frontend
Route::group(['prefix' => '', 'namespace' => 'Frontend'], function () {
    /*
    |--------------------------------------------------------------------------
    | Admin home page
    |--------------------------------------------------------------------------
    */
    Route::get('/', ['as' => 'frontend.home.index', 'uses' => 'HomeController@index']);


    /*
    |--------------------------------------------------------------------------
    | 
    |--------------------------------------------------------------------------
    */

});

    Route::get('admin', function () {
        if(Auth::check()){
            return redirect()->route('backend.dashboard.index');
        }else{
            return redirect()->to('admin/login');
        }
    });

    Route::get('login', function () {
        return redirect()->to('admin/login');
    });

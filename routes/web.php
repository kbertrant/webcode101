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
    return view('welcome');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/profile', 'HomeController@profile')->name('profile');
Route::post('/profile/update', 'HomeController@update_profile')->name('profile.update');
Route::post('/profile/residence', 'HomeController@update_residence')->name('profile.residence');
Route::post('/profile/admin', 'HomeController@update_admin')->name('profile.admin');
Route::get('quart/data', 'HomeController@getData');
Route::post('quart/data', 'HomeController@getData');
Route::post('user/change_password', 'HomeController@change_password')->name('user.change_password');
Route::post('user/modifier_password', 'HomeController@modifier_password')->name('user.modifier_password');
Route::get('user/change', 'HomeController@home')->name('user.change');


Route::get('/quart/create', 'QuartDeTravailController@index')->name('quart.create');
Route::post('/quart/store', 'QuartDeTravailController@store')->name('quart.store');
Route::get('/quart/show/{id}', 'QuartDeTravailController@show')->name('quart.show');
Route::post('/quart/etat_change', 'QuartDeTravailController@etat_change')->name('quart.etat_change');
Route::get('/note/list', 'QuartDeTravailController@note_list')->name('note.list');
Route::get('/quart/mes_quarts', 'QuartDeTravailController@mes_quarts')->name('quart.mes_quarts');
Route::post('/quart/update', 'QuartDeTravailController@update')->name('quart.update');
Route::get('/quart/edit/{id}', 'QuartDeTravailController@edit')->name('quart.edit');
Route::get('/quart/destroy/{id}', 'QuartDeTravailController@destroy')->name('quart.destroy');


Route::get('/tarif/list', 'TarifController@index')->name('tarif.list');
Route::get('/tarif/create', 'TarifController@create')->name('tarif.create');
Route::post('/tarif/store', 'TarifController@store')->name('tarif.store');
Route::get('/tarif/destroy/{id}', 'TarifController@destroy')->name('tarif.destroy');
Route::post('/tarif/update', 'TarifController@update')->name('tarif.update');
Route::get('/tarif/edit/{id}', 'TarifController@edit')->name('tarif.edit');

Route::get('/param/param', 'ParametreController@index')->name('param.param');
Route::get('/param/create', 'ParametreController@create')->name('param.create');
Route::post('/param/store', 'ParametreController@store')->name('param.store');
Route::get('/param/destroy/{id}', 'ParametreController@destroy')->name('param.destroy');
Route::post('/param/update', 'ParametreController@update')->name('param.update');
Route::get('/param/edit/{id}', 'ParametreController@edit')->name('parame.edit');

Route::get('/poste/list', 'PosteController@index')->name('poste.list');
Route::get('/poste/create', 'PosteController@create')->name('poste.create');
Route::post('/poste/store', 'PosteController@store')->name('poste.store');
//Route::post('/poste/post/{id}', 'PosteController@edit')->name('poste.post');
Route::get('/poste/destroy/{id}', 'PosteController@destroy')->name('poste.destroy');
Route::post('/poste/update', 'PosteController@update')->name('poste.update');
Route::get('/poste/edit/{id}', 'PosteController@edit')->name('poste.edit');

Route::get('/role', 'RoleController@index')->name('role');
Route::get('/role/get', 'RoleController@getrole')->name('role.get');
Route::get('/role/create', 'RoleController@create')->name('role.create');
Route::post('/role/store', 'RoleController@store')->name('role.store');
Route::get('/role/destroy/{id}', 'RoleController@destroy')->name('role.destroy');
Route::post('/role/update', 'RoleController@update')->name('role.update');
Route::get('/role/edit/{id}', 'RoleController@edit')->name('role.edit');

Route::get('/facturation/facture', 'FacturationController@index')->name('facturation.facture');
Route::post('/facturation/fetch_data', 'FacturationController@fetch_data')->name('facturation.fetch_data');
Route::get('/search', 'FacturationController@search');
Route::post('/facturation/load_data', 'DepenseController@load_data')->name('facturation.load_data');
Route::get('/actions', 'DepenseController@actions');
Route::get('/facturation/depenses', 'DepenseController@index')->name('facturation.depenses');


Route::get('/user/liste', 'UserController@index')->name('user.liste');
Route::get('/user/create', 'UserController@create')->name('user.create');
Route::post('/user/store', 'UserController@store')->name('user.store');
Route::get('/user/destroy/{id}', 'UserController@destroy')->name('user.destroy');
Route::post('/user/update', 'UserController@update')->name('user.update');
Route::get('/user/edit/{id}', 'UserController@edit')->name('user.edit');
Route::get('/search', 'UserController@search')->name('user.search');
Route::get('/searchs', 'UserController@searchs')->name('user.searchs');
Route::get('/searches', 'UserController@searches')->name('user.searches');

Route::get('/message/list', 'MessageController@index')->name('message.list');
Route::get('/message/create', 'MessageController@create')->name('message.create');
Route::get('/message/store', 'MessageController@store')->name('message.store');
Route::get('/message/{id}', 'MessageController@getMessage')->name('message');
Route::post('/message', 'MessageController@sendMessage');

Route::get('/residence/list', 'ResidenceController@index')->name('residence.list');
Route::get('/residence/destroy/{id}', 'ResidenceController@destroy')->name('residence.destroy');
Route::post('/residence/update', 'ResidenceController@update')->name('residence.update');
Route::get('/residence/edit/{id}', 'ResidenceController@edit')->name('residence.edit');
Route::get('/residence/geoaddress', 'ResidenceController@geoAddress')->name('residence.geoaddress');

Route::get('/professionnel/list', 'ProfessionnelController@index')->name('professionnel.list');
Route::get('/professionnel/destroy/{id}', 'ProfessionnelController@destroy')->name('professionnel.destroy');
Route::post('/professionnel/update', 'ProfessionnelController@update')->name('professionnel.update');
Route::get('/professionnel/edit/{id}', 'ProfessionnelController@edit')->name('professionnel.edit');

Route::get('/etat/list', 'DateEtatController@index')->name('etat.list');

Route::get('/jourferie/list', 'JourFerieController@index')->name('ferie.list');
Route::get('/jourferie/create', 'JourFerieController@create')->name('ferie.create');
Route::post('/jourferie/store', 'JourFerieController@store')->name('ferie.store');
Route::get('/jourferie/destroy/{id}', 'JourFerieController@destroy')->name('ferie.destroy');
//Route::post('/jourferie/post/{id}', 'JourFerieController@edit')->name('ferie.post');
Route::post('/jourferie/update', 'JourFerieController@update')->name('ferie.update');
Route::get('/jourferie/edit/{id}', 'JourFerieController@edit')->name('ferie.edit');

Route::name ('notification.')->prefix('notification')->group(function () {
    Route::name ('index')->get ('/', 'NotificationController@index');
    Route::name ('update')->patch ('{notification}', 'NotificationController@update');
});

Route::view('/bulksms', 'bulksms');
Route::post('/bulksms', 'BulkSmsController@sendSms');
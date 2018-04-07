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
    return redirect('/home');
});

Auth::routes();

Route::get('register', function() {
	return abort(404);
});

Route::get('password/reset', function() {
	return abort(404);
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/jurnal', 'HomeController@jurnal')->name('jurnal');
Route::get('/profil-ristik', 'HomeController@profile')->name('profile');
Route::get('/struktur-organisasi', 'HomeController@strukturOrganisasi')->name('struktur-organisasi');
Route::get('/kontak-kami', 'HomeController@contact')->name('contact');
Route::get('/galeri', 'HomeController@gallery')->name('gallery');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {
	Route::get('/', 'HomeController@index');

	// Route::resource('users', 'UserController');
	Route::resource('peneliti', 'PenelitiController');
	Route::resource('jurnal', 'JurnalController');
	Route::resource('redaksi', 'RedaksiController');

	Route::get('/profile-ristik', 'ProfileController@index')->name('profile.index');
	Route::post('/profile/about', 'ProfileController@updateAboutUs')->name('profile.update.about');
	Route::post('/profile/redaksi', 'ProfileController@updateRedaksi')->name('profile.update.redaksi');
	Route::post('/profile/contact', 'ProfileController@updateContact')->name('profile.update.contact');

	Route::get('gallery', 'GalleryController@index')->name('gallery.index');
	Route::post('gallery', 'GalleryController@upload')->name('gallery.upload');
	Route::get('gallery/{id}/full', 'GalleryController@fullPicture')->name('gallery.picture.full');
	Route::delete('gallery/{id}', 'GalleryController@remove')->name('gallery.destroy');

	Route::get('password', 'PasswordController@change')->name('password.change');
    Route::put('password', 'PasswordController@update')->name('password.update');
    Route::put('password/reset', 'PasswordController@reset')->name('password.reset');
});

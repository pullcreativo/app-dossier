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

Route::get('/','FrontController@index');
Route::get('histories','FrontController@getNoticias')->name('getNoticias');
Route::get('events','FrontController@getEventos')->name('getEventos');
Route::get('contact','FrontController@formContact')->name('formContact');
Route::get('editions','FrontController@getEditions')->name('getEditions');
Route::get('post/{slug}','FrontController@getPost')->name('getPost');
Route::get('category/{slug}','FrontController@getPostTema')->name('getPostTema');
Route::get('search','FrontController@search');
Route::get('about','FrontController@about')->name('about');
Route::get('sponsored','FrontController@sponsored')->name('sponsored');

//Gurdar contacto
Route::post('saveContact','FrontController@saveContact')->name('savecontact');


//Ruta de Autenticacion de usuario del sistema
Auth::routes();

//Grupo de rutas solo para usuarios autenticados
Route::group(['prefix'=>'panel','middleware'=>'auth'],function(){
	Route::get('/', 'HomeController@index')->name('home');

	//Ruta para eliminar post
	Route::get('posts/delete/{id}','HomeController@delete')->name('posts.delete');
	Route::post('posts/savefoto','HomeController@saveFoto')->name('posts.savefoto');
	Route::get('posts/removefoto/{id}','HomeController@revomeFoto')->name('posts.removefoto');
	
	//Ruata para temas
	Route::post('temas','TemaController@store')->name('temas.store');
	//Ruata para noticias
	Route::get('noticias','NoticiaController@index')->name('noticias.index');
	Route::get('noticias/create','NoticiaController@create')->name('noticias.create');
	Route::post('noticias','NoticiaController@store')->name('noticias.store');
	Route::get('noticias/{id}/edit','NoticiaController@edit')->name('noticias.edit');
	Route::put('noticias/{id}','NoticiaController@update')->name('noticias.update');
	Route::get('noticias/{id}/show','NoticiaController@show')->name('noticias.show');

	//Ruata para eventos
	Route::get('eventos','EventoController@index')->name('eventos.index');
	Route::get('eventos/create','EventoController@create')->name('eventos.create');
	Route::post('eventos','EventoController@store')->name('eventos.store');
	Route::get('eventos/{id}/edit','EventoController@edit')->name('eventos.edit');
	Route::put('eventos/{id}','EventoController@update')->name('eventos.update');

	//Ruta para videos
	Route::get('videos','VideoController@index')->name('videos.index');
	Route::get('videos/create','VideoController@create')->name('videos.create');
	Route::post('videos','VideoController@store')->name('videos.store');
	Route::get('videos/{id}/edit','VideoController@edit')->name('videos.edit');
	Route::put('videos/{id}','VideoController@update')->name('videos.update');

	//Ruta para ediciones
	Route::get('editions','EditionController@index')->name('editions.index');
	Route::get('editions/create','EditionController@create')->name('editions.create');
	Route::post('editions','EditionController@store')->name('editions.store');
	Route::get('editions/{id}/edit','EditionController@edit')->name('editions.edit');
	Route::put('editions/{id}','EditionController@update')->name('editions.update');
	Route::get('editions/{id}/articles','EditionController@getArticles')->name('editions.articles');
	Route::post('articles','EditionController@saveArticle')->name('articles.save');




});


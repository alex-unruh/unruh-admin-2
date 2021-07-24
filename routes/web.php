<?php

use Illuminate\Support\Facades\Route;

/**
 * SITE
 */
Route::group(['middleware' => ['stats']], function () {
	Route::get('/', 'HomeController@index')->name('home');
});

/**
 * ADMIN
 */
Route::namespace('Admin')->group(function () {

	// Login
	Route::get('/admin', 'LoginController@index')->name('admin');
	Route::get('/admin/logout', 'LoginController@logout')->name('logout');
	Route::post('/admin', 'LoginController@authenticate')->name('login');

	Route::group(['middleware' => ['auth']], function () {
		// Home
		Route::get('/admin/home', 'HomeController@index')->name('admin-home');
		Route::get('/admin/statistics/general', 'StatisticsController@generalStats');
		Route::get('/admin/statistics/today', 'StatisticsController@visitsToday');
		Route::get('/admin/statistics/month', 'StatisticsController@visitsInMonth');
		Route::get('/admin/statistics/year', 'StatisticsController@visitsInYear');
		Route::get('/admin/statistics/{column}/{date?}/{limit?}', 'StatisticsController@columnStats');

		// Users
		Route::get('/admin/usuarios', 'UsersController@index')->name('users');
		Route::get('/admin/usuarios/cadastrar', 'UsersController@create')->name('users-create');
		Route::get('/admin/usuarios/{user}/editar', 'UsersController@edit')->name('users-edit');
		Route::post('/admin/usuarios/cadastrar', 'UsersController@store')->name('users-store');
		Route::post('/admin/usuarios/{user}/editar', 'UsersController@update')->name('users-update');
		Route::post('/admin/usuarios/{id}/excluir', 'UsersController@destroy')->name('users-destroy');

		// Categories
		Route::get('/admin/categorias', 'CategoriesController@index')->name('categories');
		Route::get('/admin/categorias/cadastrar', 'CategoriesController@create')->name('categories-create');
		Route::get('/admin/categorias/{category}/editar', 'CategoriesController@edit')->name('categories-edit');
		Route::post('/admin/categorias/cadastrar', 'CategoriesController@store')->name('categories-store');
		Route::post('/admin/categorias/{category}/editar', 'CategoriesController@update')->name('categories-update');
		Route::post('/admin/categorias/{category}/excluir', 'CategoriesController@destroy')->name('categories-destroy');
		Route::post('/admin/categorias/criar-slug', 'CategoriesController@createSlug')->name('categories-create-slug');

		// Galleries
		Route::get('/admin/galerias', 'GalleriesController@index')->name('galleries');
		Route::get('/admin/galerias/cadastrar', 'GalleriesController@create')->name('galleries-create');
		Route::get('/admin/galerias/{galeria}/editar', 'GalleriesController@edit')->name('galleries-edit');
		Route::post('/admin/galerias/cadastrar', 'GalleriesController@store')->name('galleries-store');
		Route::post('/admin/galerias/{galeria}/editar', 'GalleriesController@update')->name('galleries-update');
		Route::post('/admin/galerias/{galeria}/excluir', 'GalleriesController@destroy')->name('galleries-destroy');
		Route::post('/admin/galerias/criar-slug', 'GalleriesController@createSlug')->name('galleries-create-slug');

		// Posts
		Route::get('/admin/posts', 'PostsController@index')->name('posts');
		Route::get('/admin/posts/cadastrar', 'PostsController@create')->name('posts-create');
		Route::get('/admin/posts/{post}/editar', 'PostsController@edit')->name('posts-edit');
		Route::post('/admin/posts/cadastrar', 'PostsController@store')->name('posts-store');
		Route::post('/admin/posts/{post}/editar', 'PostsController@update')->name('posts-update');
		Route::post('/admin/posts/{post}/excluir', 'PostsController@destroy')->name('posts-destroy');
		Route::post('/admin/posts/criar-slug', 'PostsController@createSlug')->name('posts-create-slug');

		// Config
		Route::get('/admin/configuracoes', 'ConfigController@edit')->name('config-edit');
		Route::post('/admin/configuracoes', 'ConfigController@update')->name('config-update');
	});
});

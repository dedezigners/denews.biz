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

Route::get('/', [
    'uses'  =>  'FrontEndController@index',
    'as'    =>  'index'
]);

Route::get('/post/{slug}', [
    'uses'  =>  'FrontEndController@singlePost',
    'as'    =>  'post.single'
]);

Route::get('/news/{id}', [
    'uses'  =>  'FrontEndController@category',
    'as'    =>  'category.single'
]);

Route::get('/tag/{id}', [
    'uses'  =>  'FrontEndController@tag',
    'as'    =>  'tag.single'
]);

Route::get('/author/{id}', [
    'uses'  =>  'FrontEndController@user',
    'as'    =>  'user.single'
]);

Route::get('/team', [
    'uses'  =>  'FrontEndController@team',
    'as'    =>  'team'
]);

Route::get('/about-us', [
    'uses'  =>  'FrontEndController@about',
    'as'    =>  'about'
]);

Route::get('/contact', [
    'uses'  =>  'FrontEndController@contact',
    'as'    =>  'contact'
]);

Route::get('/results', [
    'uses'  =>  'FrontEndController@search',
    'as'    =>  'search'
]);

View::composer('error/404', function($view) {
    $view->with([
        'title' => 'data'
    ]);
});

Auth::routes();


Route::group(['prefix'  =>  'admin', 'middleware'   =>  'auth'], function (){

    Route::get('/dashboard', [
        'uses'  =>  'HomeController@index',
        'as'    =>  'home'
    ]);

    Route::get('/post/create', [
        'uses'  =>  'PostsController@create',
        'as'    =>  'post.create'
    ]);
    Route::post('/post/store', [
        'uses'  =>  'PostsController@store',
        'as'    =>  'post.store'
    ]);


    /*
     * * * * * * * * * * * * * * * * *
     * CATEGORIES
     * * * * * * * * * * * * * * * * *
     */

    Route::get('/category/create', [
        'uses'  =>  'CategoriesController@create',
        'as'    =>  'category.create'
    ]);

    Route::get('/categories', [
        'uses'  =>  'CategoriesController@index',
        'as'    =>  'categories'
    ]);

    Route::get('/category/edit/{id}', [
        'uses'  =>  'CategoriesController@edit',
        'as'    =>  'category.edit'
    ]);

    Route::get('/category/delete/{id}', [
        'uses'  =>  'CategoriesController@destroy',
        'as'    =>  'category.delete'
    ]);

    Route::post('/category/store', [
        'uses'  =>  'CategoriesController@store',
        'as'    =>  'category.store'
    ]);

    Route::post('/category/update/{id}', [
        'uses'  =>  'CategoriesController@update',
        'as'    =>  'category.update'
    ]);

    Route::get('/posts', [
        'uses'  =>  'PostsController@index',
        'as'    =>  'posts'
    ]);

    Route::get('/post/edit/{id}', [
        'uses'  =>  'PostsController@edit',
        'as'    =>  'post.edit'
    ]);

    Route::get('/post/delete/{id}', [
        'uses'  =>  'PostsController@destroy',
        'as'    =>  'post.delete'
    ]);

    Route::post('/post/update/{id}', [
        'uses'  =>  'PostsController@update',
        'as'    =>  'post.update'
    ]);

    Route::get('/posts/trashed', [
        'uses'  =>  'PostsController@trashed',
        'as'    =>  'posts.trashed'
    ]);

    Route::get('/post/destroy/{id}', [
        'uses'  =>  'PostsController@kill',
        'as'    =>  'post.destroy'
    ]);

    Route::get('/post/restore/{id}', [
        'uses'  =>  'PostsController@restore',
        'as'    =>  'post.restore'
    ]);

    /*
     * * * * * *
     *  TAGS CRUD
     * * * * * *
    **/
    Route::get('/tag/create', [
        'uses'  =>  'TagsController@create',
        'as'    =>  'tag.create'
    ]);

    Route::post('/tag/store', [
        'uses'  =>  'TagsController@store',
        'as'    =>  'tag.store'
    ]);

    Route::get('/tags', [
        'uses'  =>  'TagsController@index',
        'as'    =>  'tags'
    ]);

    Route::get('/tag/edit/{id}', [
        'uses'  =>  'TagsController@edit',
        'as'    =>  'tag.edit'
    ]);

    Route::post('/tag/update/{id}', [
        'uses'  =>  'TagsController@update',
        'as'    =>  'tag.update'
    ]);

    Route::get('/tag/delete/{id}', [
        'uses'  =>  'TagsController@destroy',
        'as'    =>  'tag.delete'
    ]);

    /* Users */

    Route::get('/users', [
        'uses'  =>  'UsersController@index',
        'as'    =>  'users'
    ]);

    Route::get('/user/create', [
        'uses'  =>  'UsersController@create',
        'as'    =>  'user.create'
    ]);

    Route::post('/user/store', [
        'uses'  =>  'UsersController@store',
        'as'    =>  'user.store'
    ]);

    Route::get('/user/admin/{id}', [
        'uses'  =>  'UsersController@admin',
        'as'    =>  'user.admin'
    ]);

    Route::get('/user/not-admin/{id}', [
        'uses'  =>  'UsersController@not_admin',
        'as'    =>  'user.not.admin'
    ]);

    Route::get('/user/delete/{id}', [
        'uses'  =>  'UsersController@destroy',
        'as'    =>  'user.delete'
    ]);

    Route::get('/user/profile', [
        'uses'  =>  'ProfilesController@index',
        'as'    =>  'user.profile'
    ]);

    Route::post('/user/profile/update', [
        'uses'  =>  'ProfilesController@update',
        'as'    =>  'user.profile.update'
    ]);

    Route::get('/settings', [
        'uses'  =>  'SettingsController@index',
        'as'    =>  'settings'
    ]);

    Route::post('/settings/update', [
        'uses'  =>  'SettingsController@update',
        'as'    =>  'settings.update'
    ]);

});
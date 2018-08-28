
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
	'uses' => 'FrontEndController@index',
	'as' => 'index'
]);

Route::get('/results', function(){
	$posts = \App\Post::where('title','like','%'.request('query').'%')->get();

	return view('results')->with('posts',$posts)
						  ->with('title',\App\Setting::first()->site_name)
				          ->with('result','Search results for : '.request('query'))
				          ->with('settings',\App\Setting::all())
				          ->with('categories',\App\Category::take(5)->get())
				          ->with('query',request('query'));
});

Route::get('/post/{slug}', [
	'uses' => 'FrontEndController@singlePost',
	'as' => 'single.post'
]);

Route::get('/category/{id}', [
	'uses' => 'FrontEndController@category',
	'as' => 'category.post'
]);

Auth::routes();

Route::get('/home', 'HomeController@index');


//admin grouping
Route::group(['prefix' => 'admin','middleware'=>'auth'],function(){

	Route::get('/posts',[
		'uses' => 'PostsController@index',
		'as' => 'posts'
	]);

	Route::get('/post/create',[
		'uses' => 'PostsController@create',
		'as' => 'post.create'
	]);

	Route::post('/post/store',[
		'uses' => 'PostsController@store',
		'as' => 'post.store'
	]);

	Route::get('/post/edit/{id}',[
		'uses' => 'PostsController@edit',
		'as'=> 'post.edit'
	]);

	Route::post('/post/update/{id}',[
		'uses' => 'PostsController@update',
		'as'=> 'post.update'
	]);

	Route::get('/post/delete/{id}',[
		'uses' => 'PostsController@destroy',
		'as' => 'post.delete'
	]);

	Route::get('/post/trash',[
		'uses' => 'PostsController@trash',
		'as' => 'post.trash'
	]);

	Route::get('/post/kill/{id}',[
		'uses' => 'PostsController@kill',
		'as' => 'post.kill'
	]);

	Route::get('/post/restore/{id}',[
		'uses' => 'PostsController@restore',
		'as' => 'post.restore'
	]);
	//-----------------CATEGORIES CONTROLLER----------------
	Route::get('/category/index',[
		'uses' => 'CategoriesController@index',
		'as' => 'category.index'

	]);

	Route::get('/category/create',[
		'uses' => 'CategoriesController@create',
		'as' => 'category.create'
	]);

	Route::post('/category/store',[
		'uses' => 'CategoriesController@store',
		'as' => 'category.store'
	]);

	Route::get('/category/edit/{id}',[
		'uses' => 'CategoriesController@edit',
		'as' => 'category.edit'
	]);

	Route::get('/category/delete/{id}',[
		'uses' => 'CategoriesController@destroy',
		'as' => 'category.delete'
	]);

	Route::post('/category/update/{id}',[
		'uses' => 'CategoriesController@update',
		'as' => 'category.update'
	]);

	//-----------------TAGS CONTROLLER----------------

	Route::get('/tag/index',[
		'uses' => 'TagsController@index',
		'as' =>'tag.index'
	]);

	Route::get('/tag/create',[
		'uses' => 'TagsController@create',
		'as' =>'tag.create'
	]);

	Route::post('/tag/store',[
		'uses' =>'TagsController@store',
		'as' => 'tag.store'
	]);

	Route::get('/tag/edit/{id}',[
		'uses' => 'TagsController@edit',
		'as' => 'tag.edit'
	]);

	Route::post('/tag/update/{id}',[
		'uses' => 'TagsController@update',
		'as' => 'tag.update'
	]);

	Route::get('/tag/delete/{id}',[
		'uses' => 'TagsController@destroy',
		'as' => 'tag.delete'
	]);

	//-----------------USERS CONTROLLER----------------

	Route::get('/user/index',[
		'uses' => 'UsersController@index',
		'as' =>'user.index'
	]);

	Route::get('/user/create',[
		'uses' => 'UsersController@create',
		'as' =>'user.create'
	]);

	Route::post('/user/store',[
		'uses' => 'UsersController@store',
		'as' =>'user.store'
	]);

	Route::get('/user/admin/{id}',[
		'uses' => 'UsersController@admin',
		'as' =>'user.admin'
	]);

	Route::get('/user/notadmin/{id}',[
		'uses' => 'UsersController@notadmin',
		'as' =>'user.notadmin'
	]);

	Route::get('/user/profile',[
		'uses' => 'ProfilesController@index',
		'as' =>'user.profile'
	]);

	Route::post('/user/profile/update',[
		'uses' => 'ProfilesController@update',
		'as' => 'user.profile.update'
	]);

	Route::get('/user/delete/{id}',[
		'uses' => 'UsersController@destroy',
		'as' => 'user.delete'
	]);

	//-----------------SETTINGS CONTROLLER----------------

	Route::get('/setting',[
		'uses' => 'SettingsController@index',
		'as' =>'setting.index'
	]);

	Route::post('/setting/update',[
		'uses' => 'SettingsController@update',
		'as' => 'setting.update'
	]);

});


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
Route::get('/locale/{locale}', function($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});
Route::group(['prefix' => 'admin/', 'middleware' => 'checkAdminLogin'], function (){
    Route::resource('admin', 'admin\Admin');
    Route::resource('user', 'admin\Users' );
    Route::post('user/update', 'admin\Users@update')->name('user.edit');
    Route::resource('search', 'admin\Search');
    Route::resource('author', 'admin\Authors' );
    Route::post('author/update', 'admin\Authors@update')->name('author.edit');
    Route::resource('searchauth', 'admin\SearchAuthor' );
    Route::resource('publisher', 'admin\Publishers' );
    Route::post('publisher/update', 'admin\Publishers@update')->name('publisher.edit');
    Route::resource('publisher/search', 'admin\SearchPublisher');
});

Route::group(['prefix' => '/'], function (){
    Route::resource('home', 'Home' );
    Route::resource('category', 'Cat');
    Route::resource('detail', 'Detail');
    Route::post('detail/borrow/{id}', 'Detail@store')->name('detail.add');
    Route::resource('comment', 'Comments')->middleware('checkLogin');
    Route::resource('login', 'Authen\Login');
    Route::resource('register', 'Authen\Register');
    Route::resource('cart', 'Carts')->middleware('checkLogin');
    Route::post('cart/delete', 'Carts@delItem')->name('cart.del');

});

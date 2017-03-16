<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/users', function () {
    return \App\User::All();
});
Route::get('delete-users',function(){
  $users = \App\User::all();
  $users->each(function($item, $key){
    if($item->id > 4){
      $item->delete();
    }
  });
  return $users;
});
Route::resource('/articles','ApiArticleController');

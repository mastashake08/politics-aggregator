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
  $feed = \FeedReader::read('https://www.buzzfeed.com/politics.xml');


  foreach ($feed->get_items() as $link)
  {
    $article = \App\Article::firstOrCreate(['title' =>$link->get_title(),
     'description' => $link->get_description(),
     'link' => $link->get_link(),
     'source' => $feed->get_title()]);
     
  }

});

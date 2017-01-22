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
  $feeds = [
    \FeedReader::read('https://www.buzzfeed.com/politics.xml'),
    \FeedReader::read('http://rss.cnn.com/rss/cnn_allpolitics.rss'),
    \FeedReader::read('http://feeds.foxnews.com/foxnews/politics'),
    \FeedReader::read('http://feeds.feedburner.com/zerohedge/feed'),
    \FeedReader::read('http://thehill.com/rss/syndicator/19109'),
    ];
foreach($feeds as $feed){
  foreach ($feed->get_items() as $link)
  {
    $article = \App\Article::where('title', $link->get_title())->first();
    if($article == null){
    $article = \App\Article::Create(['title' =>$link->get_title(),
     'description' => $link->get_description(),
     'link' => $link->get_link(),
     'source' => $feed->get_title()]);

     event(new \App\Events\NewArticle($article));
   }
  }
}
dd(\App\Article::all());
});

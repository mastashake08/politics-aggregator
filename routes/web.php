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
Route::get('delete',function(){
  $duplicateRecords = \DB::select('title')
              ->selectRaw('count(`title`) as `occurences`')
              ->from('articles')
              ->groupBy('title')
              ->having('occurences', '>', 1)
              ->get();
              foreach($duplicateRecords as $record) {
    $record->delete();
}
})
Route::get('/', function () {
  return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::resource('articles','ArticleController');
Route::get('sitemap', function(){

    // create new sitemap object
    $sitemap = App::make("sitemap");

    // set cache key (string), duration in minutes (Carbon|Datetime|int), turn on/off (boolean)
    // by default cache is disabled


    // check if there is cached sitemap and build new only if is not

         // add item to the sitemap (url, date, priority, freq)
         $sitemap->add(url('/'), \Carbon\Carbon::now(), '1.0', 'daily');

         $sitemap->add(url('articles'), \Carbon\Carbon::now(), '0.9', 'daily');

         // get all posts from db
         $posts = \DB::table('articles')->orderBy('created_at', 'desc')->get();

         // add every post to the sitemap
         foreach ($posts as $post)
         {
            $sitemap->add(url("articles/{$post->url}"), $post->created_at, '0.9', 'monthly');
         }


    // show your sitemap (options: 'xml' (default), 'html', 'txt', 'ror-rss', 'ror-rdf')
    return $sitemap->render('xml');

});

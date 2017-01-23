<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/
Artisan::command('delete:article {id} {stop}', function () {
    for($i = $this->argument('id'); $i < $this->argument('stop'); $i = $i-2 ){
        \App\Article::destroy($i);
    }

})->describe('Delete Article');
Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');
Artisan::command('make:slug', function () {
    $articles = \App\Article::all();
    foreach($articles as $article){
      $article->url = str_slug($article->title);
      $article->save();
    }
})->describe('Change Slugs');

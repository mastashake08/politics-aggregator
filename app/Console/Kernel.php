<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use FeedReader;
use App\Article;
class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
         $schedule->call(function(){
           $feeds = [
             \FeedReader::read('https://www.buzzfeed.com/politics.xml'),
             \FeedReader::read('http://feeds.feedburner.com/zerohedge/feed'),
             \FeedReader::read('http://rss.nytimes.com/services/xml/rss/nyt/Politics.xml'),
             \FeedReader::read('http://www.latimes.com/nation/politics/rss2.0.xml'),
             \FeedReader::read('http://feeds.washingtonpost.com/rss/politics'),
             \FeedReader::read('http://www.politico.com/rss/politics08.xml'),
             \FeedReader::read('http://feeds.feedburner.com/realclearpolitics/qlMj'),
             \FeedReader::read('https://fivethirtyeight.com/politics/feed/'),
             \FeedReader::read('http://theantimedia.org/feed/'),
             ];
           $feeds = collect($feeds)->random(count($feeds));

         foreach($feeds as $feed){
           foreach ($feed->get_items() as $link)
           {

             $article = \App\Article::where('title' , $link->get_title())->first();
             if($article == null){
             $article = \App\Article::Create(['title' =>$link->get_title(),
              'description' => $link->get_description(),
              'link' => $link->get_link(),
              'source' => $feed->get_title(),
             'url' => str_slug($link->get_title()),
             'logo' => $feed->get_image_url()
             ]);

              event(new \App\Events\NewArticle($article));


            }

           }
         }
         })->everyMinute();

         $schedule->call(function(){
           $articles = \App\Article::orderBy('created_at','desc')->take(5)->get();

           $users = \App\User::all();
           $users->each(function($item,$key) use($articles){
             $item->notify(new \App\Notifications\DailyNewsletter($articles));
           });

         })->timezone('America/New_York')->twiceDaily(8,17);

         $schedule->call(function(){
           $article = \App\Article::orderBy('created_at','desc')->first();
           event(new \App\Events\Reminder($article->title));
         })->timezone('America/New_York')->hourly();


    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}

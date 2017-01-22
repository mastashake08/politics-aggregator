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
             \FeedReader::read('http://rss.cnn.com/rss/cnn_allpolitics.rss'),
             \FeedReader::read('http://feeds.foxnews.com/foxnews/politics'),
             \FeedReader::read('http://feeds.feedburner.com/zerohedge/feed'),
             \FeedReader::read('http://thehill.com/rss/syndicator/19109'),
             \FeedReader::read('http://feeds.feedburner.com/dailyreckoning'),
             \FeedReader::read('http://www.wsj.com/xml/rss/3_7085.xml'),
             ];
         foreach($feeds as $feed){

           foreach ($feed->get_items() as $link)
           {
             $article = \App\Article::where('title' , $link->get_title())->first();
             if($article == null){
             $article = \App\Article::Create(['title' =>$link->get_title(),
              'description' => $link->get_description(),
              'link' => $link->get_link(),
              'source' => $feed->get_title(),
              'slug' => str_slug($feed->get_title())]);

              event(new \App\Events\NewArticle($article));
            }


           }
         }
         })->everyTenMinutes();
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

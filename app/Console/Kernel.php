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
             ];
         foreach($feeds as $feed){

           foreach ($feed->get_items() as $link)
           {
             $article = Article::findOrCreate(['title' =>$link->get_title(),
              'description' => $link->get_description(),
              'link' => $link->get_link(),
              'source' => $feed->get_title()]);

           }
         }
         })->hourly();
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

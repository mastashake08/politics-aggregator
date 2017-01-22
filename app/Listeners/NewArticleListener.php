<?php

namespace App\Listeners;

use App\Events\NewArticle;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewArticleListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewArticle  $event
     * @return void
     */
    public function handle(NewArticle $event)
    {
        //
    }
}

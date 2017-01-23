<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class DailyNewsletter extends Notification
{
    use Queueable;
    public $articles;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($articles)
    {
        //
        $this->articles = $articles;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
      $message = new MailMessage();
      $message->subject('All Around Politics Daily Newsletter');
      $message->greeting("Hello {$notifiable->name}");
      $message->line("Here is what happened in politics today!");
      foreach($this->articles as $article){
        $url = url("/articles/{$article->url}");
        $message->line("{$article->title} - {$url}");
      }

      $message->action('Read All Articles', url('/articles'))
                  ->line('Stay informed!');
      return $message;
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}

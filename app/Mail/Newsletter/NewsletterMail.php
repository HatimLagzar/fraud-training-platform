<?php

namespace App\Mail\Newsletter;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewsletterMail extends Mailable
{
    use Queueable, SerializesModels;

    /** @var Collection|Post[] */
    private Collection $posts;

    /**
     * Create a new message instance.
     *
     * @param  Collection|Post[]  $posts
     *
     * @return void
     */
    public function __construct(Collection $posts)
    {
        $this->posts = $posts;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.newsletter')
                    ->with('posts', $this->posts);
    }
}

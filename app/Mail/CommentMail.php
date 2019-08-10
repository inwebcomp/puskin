<?php

namespace App\Mail;

use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;

class CommentMail extends Mailable
{
    use Queueable;

    private $data;
    /**
     * @var Article
     */
    private $article;

    public function __construct($data, Article $article)
    {
        $this->data = $data;
        $this->article = $article;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        $subject = __('Комментарий к записи') . ' ' . $this->article->title;

        return $this->subject($subject)->view('mail.comment')->with([
            'article'    => $this->article,
            'name'    => $this->data['name'],
            'text'    => nl2br(strip_tags($this->data['text'])),
        ]);
    }
}
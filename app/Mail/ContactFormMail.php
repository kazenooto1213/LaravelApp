<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;
    private $name;
    private $email;
    private $title;
    private $body;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($inputs)
    {
        // コンストラクタでプロパティに値を格納
        $this->name = $inputs['name'];
        $this->email = $inputs['email'];
        $this->title = $inputs['title'];
        $this->body = $inputs['body'];
    }

    public function build()
    {
        // メールの設定
        return $this->from('kazenooto19841213@gmail.com')
                    ->subject('自動送信メール')
                    ->view('email.post_mail')
                    ->with([
                        'name' => $this->name,
                        'email' => $this->email,
                        'title' => $this->title,
                        'body' => $this->body,
                    ]);
    }
}

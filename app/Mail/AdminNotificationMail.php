<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminNotificationMail extends Mailable
{
    use Queueable, SerializesModels;
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
        $this->title = $inputs['title'];
        $this->body = $inputs['body'];
    }

    public function build()
    {
        // メールの設定
        return $this->from('kazenooto19841213@gmail.com')
                    ->subject('WEBアプリ【皆で家計簿】よりお知らせがあります。')
                    ->view('admin.admin_post_mail')
                    ->with([
                        'title' => $this->title,
                        'body' => $this->body,
                    ]);
    }
}

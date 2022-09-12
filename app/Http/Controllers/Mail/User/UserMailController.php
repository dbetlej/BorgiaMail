<?php

namespace App\Http\Controllers\Mail\User;

use App\Http\Controllers\Controller;
use App\Models\Mail;
use App\Services\MailService;
use Illuminate\Http\RedirectResponse;

class UserMailController extends Controller
{
    private MailService $mailService;

    public function __construct()
    {
        $this->mailService = new MailService();
    }

    public function run($email, $title, $content)
    {
        $this->mailService->sendMail($email, $title, $content);
    }

    public function send(Mail $mail): RedirectResponse
    {
        $title = $mail->title;
        $content = $mail->content;

        $emails = collect(explode(', ', $mail->recipient));

        foreach ($emails as $email) {
            $this->run($email, $title, $content);
        }

        return redirect()->back()->with('message','Mail/s send Successfully!');
    }
}

<?php

namespace App\Services;

use App\Mail\UserMail;
use Illuminate\Support\Facades\Mail;

class MailService
{
    public function sendMail($email, $title, $content): void
    {
        Mail::to($email)->send(new UserMail($title, $content));
    }
}

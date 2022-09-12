<?php

namespace App\Http\Controllers\Panel\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\MailRequest;
use App\Models\Mail;
use App\Models\Recipient;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class MailController extends Controller
{
    public function index()
    {
        $mails = Mail::paginate(10);

        return view('mail.index', compact('mails'));
    }

    public function create()
    {
        $recipients = Recipient::get();

        return view('mail.create', compact('recipients'));
    }

    public function store(MailRequest $request): RedirectResponse
    {
        $recipientsArr = [];
        $data = $request->validated();
        $recipients = Recipient::findMany($data['recipients']);

        foreach($recipients as $recipient) {
            array_push($recipientsArr, $recipient['mail']);
        }

        $recipients = implode(', ', $recipientsArr);

        Mail::create([
            'creator_id' => Auth::id(),
            'title' => $data['title'],
            'content' => $data['content'],
            'recipient' => $recipients
        ]);

        return redirect()->back()->with('message','Create mail Successfully!');
    }

    public function show(Mail $mail)
    {
        $recipients = Recipient::get();

        return view('mail.show', compact('mail','recipients'));
    }

    public function edit(Mail $mail)
    {
        $recipients = Recipient::get();

        return view('mail.edit', compact('mail', 'recipients'));
    }

    public function update(MailRequest $request, $id): RedirectResponse
    {
        $recipientsArr = [];
        $data = $request->validated();
        $mail = Mail::find($id);
        $recipients = Recipient::findMany($data['recipients']);

        foreach($recipients as $recipient) {
            array_push($recipientsArr, $recipient['mail']);
        }

        $recipients = implode(', ', $recipientsArr);

        $mail->update([
            'title' => $data['title'],
            'content' => $data['content'],
            'recipient' => $recipients
        ]);

        return redirect()->back()->with('message','Update mail Successfully!');
    }

    public function destroy(Mail $mail): RedirectResponse
    {
        $mail->delete();

        return redirect()->route('mails.index');
    }
}

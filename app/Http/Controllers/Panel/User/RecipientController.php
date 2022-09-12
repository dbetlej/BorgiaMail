<?php

namespace App\Http\Controllers\Panel\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\RecipientRequest;
use App\Models\Recipient;
use Illuminate\Http\RedirectResponse;

class RecipientController extends Controller
{
    public function index()
    {
        $recipients = Recipient::paginate(10);

        return view('recipient.index', compact('recipients'));
    }

    public function create()
    {
        return view('recipient.create');
    }

    public function store(RecipientRequest $request): RedirectResponse
    {
        $data = new Recipient($request->validated());

        Recipient::create([
            'title' => $data['title'],
            'mail' => $data['mail'],
            'description' => $data['description']
        ]);

        return redirect()->back()->with('message','Create recipient Successfully!');
    }

    public function show(Recipient $recipient)
    {
        return view('recipient.show', compact('recipient'));
    }

    public function edit(Recipient $recipient)
    {
        return view('recipient.edit', compact('recipient'));
    }

    public function update(RecipientRequest $request, $id): RedirectResponse
    {
        $data = new Recipient($request->validated());
        $recipient = Recipient::find($id);

        $recipient->update([
            'title' => $data['title'],
            'mail' => $data['mail'],
            'description' => $data['description']
        ]);

        return redirect()->back()->with('message','Update recipient Successfully!');
    }

    public function destroy(Recipient $recipient): RedirectResponse
    {
        $recipient->delete();

        return redirect()->route('recipients.index');
    }
}

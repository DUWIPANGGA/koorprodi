<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\BroadcastMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BroadcastController extends Controller
{
    public function showForm()
    {
        $users = User::all(); // Atau filter sesuai kebutuhan, misalnya User::where('subscribed', true)->get()
        return view('broadcast.simple_form', compact('users'));
    }

    public function sendBroadcast(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'content' => 'required|string',
            'recipients' => 'nullable|array'
        ]);

        // Jika recipients tidak dipilih, kirim ke semua user
        $recipients = $request->recipients ? 
                     User::whereIn('id', $request->recipients)->get() :
                     User::all();

        foreach ($recipients as $recipient) {
            Mail::to($recipient->email)
                ->send(new BroadcastMail(
                    $request->subject,
                    $request->content,
                    $recipient->name
                ));
        }

        return back()->with('success', "Broadcast sent to {$recipients->count()} recipients!");
    }
}
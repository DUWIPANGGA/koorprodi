<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
        public function showForm()
    {
        return view('chat.simple_form');
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'recipient_email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'sender_name' => 'required|string',
            'sender_email' => 'required|email'
        ]);

        Mail::to($request->recipient_email)
            ->send(new ManualChatMail(
                $request->subject,
                $request->message,
                [
                    'name' => $request->sender_name,
                    'email' => $request->sender_email
                ]
            ));

        return back()->with('success', 'Message sent successfully!');
    }

}

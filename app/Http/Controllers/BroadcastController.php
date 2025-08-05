<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Jobs\BroadcastEmailJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BroadcastController extends Controller
{
    public function showForm()
    {
        $users = User::all(); // bisa diubah filter sesuai kebutuhan
        return view('broadcast.simple_form', compact('users'));
    }

    public function sendBroadcast(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'content' => 'required|string',
            'recipients' => 'nullable|array',
        ]);

        $recipients = $request->recipients
            ? User::whereIn('id', $request->recipients)->get()
            : User::all();

        $total = $recipients->count();

        $recipients->chunk(50)->each(function ($batch) use ($request) {
            foreach ($batch as $recipient) {
                try {
                    // Dispatch job dengan delay kecil jika ingin stagger
                    BroadcastEmailJob::dispatch(
                        $request->subject,
                        $request->content,
                        $recipient->email,
                        $recipient->name
                    )->delay(now()->addSeconds(5));
                } catch (\Exception $e) {
                    Log::error("Gagal dispatch job untuk {$recipient->email}: " . $e->getMessage());
                }
            }

            if (app()->environment('production')) {
                sleep(2); // jeda antar batch jika perlu
            }
        });

        return back()->with('success', "Broadcast job dispatched to {$total} recipients!");
    }
}

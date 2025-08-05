<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\BroadcastMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class BroadcastController extends Controller
{
    public function showForm()
    {
        $users = User::all();
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

        $successCount = 0;
        $failedCount = 0;
        $failedEmails = [];

        foreach ($recipients as $recipient) {
            try {
                // Kirim email langsung
                Mail::to($recipient->email)
                    ->send(new BroadcastMail(
                        $request->subject,
                        $request->content,
                        $recipient->name
                    ));
                $successCount++;
                
                // Tambahkan delay kecil di production untuk menghindari rate limit
                if (app()->environment('production')) {
                    usleep(200000); // 0.2 detik
                }
            } catch (\Exception $e) {
                $failedCount++;
                $failedEmails[] = $recipient->email;
                Log::error("Gagal mengirim email ke {$recipient->email}: " . $e->getMessage());
            }
        }

        $message = "Berhasil mengirim email ke {$successCount} penerima.";
        if ($failedCount > 0) {
            $message .= " Gagal mengirim ke {$failedCount} email: " . implode(', ', $failedEmails);
        }

        return back()->with(
            $failedCount > 0 ? 'warning' : 'success',
            $message
        );
    }
}
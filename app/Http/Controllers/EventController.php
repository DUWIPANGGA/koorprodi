<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rekap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EventController extends Controller
{
public function rekapEvent(Request $request)
{
    $validated = $request->validate([
        'status' => 'required|in:0,1', // atau in:open,close sesuai kebutuhan
    ]);

    // update data
    User::query()->update([
        'pelaporan_ipk' => $validated['status'],
    ]);

    // bikin log
    Log::info('Pelaporan IPK diubah', [
        'user' => auth()->user()->id ?? null, // siapa yang ubah
        'status_baru' => $validated['status'],
        'time' => now()->toDateTimeString(),
    ]);

    return redirect()
        ->route('dashboard')
        ->with('success', 'Rekap Event Berhasil');
}
//     public function rekapUser(Request $request, $id)
// {
//     logger()->debug('Request Data:', [
//         'all' => $request->all(),
//         'status' => $request->status,
//         'id' => $id
//     ]);
    
//     abort(500, 'Debugging'); // Force error untuk melihat log
// }
    public function rekapUser(Request $request, $id)
{
    $validated = $request->validate([
        'status' => 'required|boolean'
    ]);

    $user = User::findOrFail($id);
    
    logger()->info('Before Update', [
        'current_status' => $user->pelaporan_ipk,
        'new_status' => $validated['status']
    ]);

    $user->pelaporan_ipk = (bool)$validated['status'];
    $saved = $user->save();

    if (!$saved) {
        return back()->with('error', 'Gagal menyimpan perubahan');
    }

    return back()->with('success', 'Status berhasil diperbarui');
}
}

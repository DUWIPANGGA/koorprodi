<?php

namespace App\Http\Controllers;

use App\Models\Rekap;
use App\Models\User;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function rekapEvent(Request $request)
    {

        User::query()->update([
            'pelaporan_ipk' => $request->status,
        ]);
        return redirect()->route('dashboard')->with('success', 'Rekap Event Berhasil');
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

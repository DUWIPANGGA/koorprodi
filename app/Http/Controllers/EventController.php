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
    public function rekapUser(Request $request,$id)
    {
$user = User::find($id);
        $user->update([
            'pelaporan_ipk' => $request->status,
        ]);
        return redirect()->route('users.index')->with('success', 'user Berhasil di update');
    }
}

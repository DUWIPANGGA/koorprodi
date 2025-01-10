<?php

namespace App\Livewire;

use App\Models\Rekap;
use Livewire\Component;
use Illuminate\Foundation\Auth\User;

class Ipk extends Component
{
    public $search = '';

    public function render()
    {
        $rekaps = Rekap::select('rekap.*', 'users.name', 'users.nim')
    ->join('users', 'rekap.user_id', '=', 'users.id')
    ->where(function ($query) {
        $query->where('users.nim', 'like', '%'.$this->search.'%')
            ->orWhere('users.email', 'like', '%'.$this->search.'%')
            ->orWhere('users.angkatan', 'like', '%'.$this->search.'%')
            ->orWhere('users.asal_sekolah', 'like', '%'.$this->search.'%')
            ->orWhere('users.prodi', 'like', '%'.$this->search.'%');
    })
    ->paginate(10);

        return view('livewire.ipk',['rekaps'=>$rekaps]);
    }
    public function rekaps(){
        $rekaps = Rekap::select('rekap.*', 'users.name', 'users.nim')
    ->join('users', 'rekap.user_id', '=', 'users.id')
    ->where(function ($query) {
        $query->where('users.nim', 'like', '%'.$this->search.'%')
            ->orWhere('users.email', 'like', '%'.$this->search.'%')
            ->orWhere('users.angkatan', 'like', '%'.$this->search.'%')
            ->orWhere('users.asal_sekolah', 'like', '%'.$this->search.'%')
            ->orWhere('users.prodi', 'like', '%'.$this->search.'%');
    })
    ->paginate(10);
    }
}

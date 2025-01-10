<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Mahasiswa extends Component
{
    public $search = '';  // Properti pencarian

    public function render()
    {
        // Melakukan pencarian berdasarkan input search
        $mahasiswa = User::where('name', 'like', '%'.$this->search.'%')
                    ->orWhere('email', 'like', '%'.$this->search.'%')
                    ->orWhere('nim', 'like', '%'.$this->search.'%')
                    ->orWhere('angkatan', 'like', '%'.$this->search.'%')
                    ->orWhere('asal_sekolah', 'like', '%'.$this->search.'%')
                    ->orWhere('prodi', 'like', '%'.$this->search.'%')
                    ->paginate(10);

        return view('livewire.mahasiswa', [
            'mahasiswa' => $mahasiswa
        ]);
    }
    public function Mahasiswa(){
        $mahasiswa = User::where('name', 'like', '%'.$this->search.'%')
                    ->orWhere('email', 'like', '%'.$this->search.'%')
                    ->orWhere('nim', 'like', '%'.$this->search.'%')
                    ->orWhere('angkatan', 'like', '%'.$this->search.'%')
                    ->orWhere('asal_sekolah', 'like', '%'.$this->search.'%')
                    ->orWhere('prodi', 'like', '%'.$this->search.'%')
                    ->paginate(10);

    }
}

<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Mahasiswa extends Component
{
    use WithPagination;

    public $search = '';  // Properti pencarian
    public $page = 1;
    public $perPage = 10;
    public function render()
{
    // Jika tidak ada pencarian, ambil semua data mahasiswa
    $query = User::query();

    if ($this->search) {
        // Melakukan pencarian berdasarkan input search
        $query->where('name', 'like', '%'.$this->search.'%')
              ->orWhere('email', 'like', '%'.$this->search.'%')
              ->orWhere('nim', 'like', '%'.$this->search.'%')
              ->orWhere('angkatan', 'like', '%'.$this->search.'%')
              ->orWhere('asal_sekolah', 'like', '%'.$this->search.'%')
              ->orWhere('prodi', 'like', '%'.$this->search.'%');
    }

    // Paginate data mahasiswa
    $mahasiswa = $query->paginate($this->perPage);

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

<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Mahasiswa extends Component
{
    use WithPagination;

    public $search = '';
    public $filter = 'all';
    public $page = 1;
    public $perPage = 10;
    protected $paginationTheme = 'bootstrap';
    protected $queryString = [
        'search' => ['except' => ''],
        'filter' => ['except' => 'all'],
        'page' => ['except' => 1],
    ];
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
    if ($this->filter === 'semester-1') {
        $query->where('users.semester', '=', 1);
    } elseif ($this->filter === 'semester-2') {
        $query->where('users.semester', '=', 2);
    } elseif ($this->filter === 'semester-3') {
        $query->where('users.semester', '=', 3);
    } elseif ($this->filter === 'semester-4') {
        $query->where('users.semester', '=', 4);
    } elseif ($this->filter === 'semester-5') {
        $query->where('users.semester', '=', 5);
    } elseif ($this->filter === 'semester-6') {
        $query->where('users.semester', '=', 6);
    } elseif ($this->filter === 'semester-7') {
        $query->where('users.semester', '=', 7);
    } elseif ($this->filter === 'semester-8') {
        $query->where('users.semester', '=', 8);
    } elseif ($this->filter === 'pelaporan_ipk') {
        $query->where('users.pelaporan_ipk', '=', 0);
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
    public function applyFilter($filter)
    {
        $this->filter = $filter;
        $this->resetPage();
    }
}

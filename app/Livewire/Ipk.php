<?php
namespace App\Livewire;

use App\Models\Rekap;
use Livewire\Component;
use Livewire\WithPagination;

class Ipk extends Component
{
    use WithPagination;

    public $search = '';
    public $filter = 'all';
    public $perPage = 40;
    public $page = 1;
    protected $paginationTheme = 'bootstrap';
    protected $queryString = [
        'search' => ['except' => ''],
        'filter' => ['except' => 'all'],
        'page' => ['except' => 1],
    ];

    public function render()
    {
        $query = Rekap::select('rekap.*', 'users.name','users.prodi','users.semester', 'users.nim')
            ->join('users', 'rekap.user_id', '=', 'users.id')
            ->where(function ($q) {
                $q->where('users.nim', 'like', '%' . $this->search . '%')
                    ->orWhere('users.email', 'like', '%' . $this->search . '%')
                    ->orWhere('users.angkatan', 'like', '%' . $this->search . '%')
                    ->orWhere('users.asal_sekolah', 'like', '%' . $this->search . '%')
                    ->orWhere('users.prodi', 'like', '%' . $this->search . '%')
                    ->orWhere('users.semester', 'like', '%' . $this->search . '%');
            });

        if ($this->filter === 'ipkDibawah3') {
            $query->where('rekap.ipk', '<', 3);
        }
        elseif ($this->filter === 'semester-1') {
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
}

        $rekaps = $query->paginate($this->perPage);

        return view('livewire.ipk', ['rekaps' => $rekaps]);
    }

    public function applyFilter($filter)
    {
        $this->filter = $filter;
        $this->resetPage();
    }
}
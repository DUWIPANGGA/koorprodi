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
    protected $paginationTheme = 'bootstrap';
    protected $queryString = [
        'search' => ['except' => ''],
        'filter' => ['except' => 'all'],
        'page' => ['except' => 1],
    ];

    public function render()
    {
        $query = Rekap::select('rekap.*', 'users.name', 'users.prodi', 'users.semester', 'users.nim')
            ->join('users', 'rekap.user_id', '=', 'users.id')
            ->where(function ($q) {
                $q->where('users.nim', 'like', '%' . $this->search . '%')
                    ->orWhere('users.name', 'like', '%' . $this->search . '%')
                    ->orWhere('users.prodi', 'like', '%' . $this->search . '%')
                    ->orWhere('users.semester', 'like', '%' . $this->search . '%');
            });

        switch ($this->filter) {
            case 'all-rekap':
                // No additional filters - show all rekap data
                break;
                
            case 'current-semester':
                $query->whereColumn('rekap.semester', 'users.semester');
                break;
                
            case 'ipkDibawah3':
                $query->where('rekap.IPK', '<', 3);
                break;
                
            case preg_match('/^semester-\d+$/', $this->filter) ? true : false:
                $semester = (int) str_replace('semester-', '', $this->filter);
                $query->where('rekap.semester', $semester)
                      ->whereColumn('rekap.semester', 'users.semester');
                break;
                
            default: // 'all'
                $query->whereNotNull('users.pelaporan_ipk');
                break;
        }

        $rekaps = $query->orderBy('users.prodi')
                       ->orderBy('rekap.semester')
                       ->orderBy('users.name')
                       ->paginate($this->perPage);

        return view('livewire.ipk', compact('rekaps'));
    }

    public function applyFilter($filter)
    {
        $this->filter = $filter;
        $this->resetPage();
    }
}
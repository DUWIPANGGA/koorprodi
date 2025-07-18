<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Domisili;
use Livewire\WithPagination;

class AdminDomisiliTable extends Component
{
    use WithPagination;

    public $search = '';
    public $filter = 'all';
    public $perPage = 10;
    public $sortField = 'created_at';
    public $sortDirection = 'desc';
     public $confirmingRejection = false;
    public $domisiliIdToReject;
    public $keteranganPenolakan;
    public $selectedDomisili = null;
    protected $paginationTheme = 'bootstrap';
    protected $queryString = [
        'search' => ['except' => ''],
        'filter' => ['except' => 'all'],
        'perPage' => ['except' => 10],
        'sortField',
        'sortDirection',
    ];

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }

    public function applyFilter($filter)
    {
        $this->filter = $filter;
        $this->resetPage();
    }

    public function resetFilters()
    {
        $this->reset(['search', 'filter']);
        $this->resetPage();
    }

    public function render()
    {
        $query = Domisili::with(['mahasiswa', 'fotos'])
            ->join('users', 'domisili.mahasiswa_id', '=', 'users.id')
            ->select('domisili.*', 'users.name', 'users.nim', 'users.prodi', 'users.angkatan', 'users.semester')
            ->where(function($q) {
                $q->where('users.name', 'like', '%'.$this->search.'%')
                  ->orWhere('users.nim', 'like', '%'.$this->search.'%')
                  ->orWhere('users.prodi', 'like', '%'.$this->search.'%')

                  ->orWhere('domisili.alamat_lengkap', 'like', '%'.$this->search.'%')
                  ->orWhere('domisili.status', 'like', '%'.$this->search.'%');
            });

        switch ($this->filter) {
            case 'all':
                // No additional filters - show all data
                break;
                
            case 'pending':
                $query->where('domisili.status', 'pending');
                break;
                
            case 'approved':
                $query->where('domisili.status', 'approved');
                break;
                
            case 'rejected':
                $query->where('domisili.status', 'rejected');
                break;
                
            case 'current-semester':
                $query->whereColumn('domisili.semester', 'users.semester');
                break;
                
            case preg_match('/^semester-\d+$/', $this->filter) ? true : false:
                $semester = (int) str_replace('semester-', '', $this->filter);
                $query->where('users.semester', $semester);
                break;
                
            case preg_match('/^angkatan-\d+$/', $this->filter) ? true : false:
                $angkatan = str_replace('angkatan-', '', $this->filter);
                $query->where('users.angkatan', $angkatan);
                break;
                
            case preg_match('/^prodi-.+$/', $this->filter) ? true : false:
                $prodi = str_replace('prodi-', '', $this->filter);
                $query->where('users.prodi', $prodi);
                break;
        }

        $domisili = $query->orderBy($this->sortField, $this->sortDirection)
                         ->paginate($this->perPage);

        $prodiOptions = User::distinct('prodi')->pluck('prodi');
        $angkatanOptions = User::distinct('angkatan')->orderBy('angkatan', 'desc')->pluck('angkatan');

        return view('livewire.admin-domisili-table', [
            'domisili' => $domisili,
            'prodiOptions' => $prodiOptions,
            'angkatanOptions' => $angkatanOptions
        ]);
    }
    public function approve($domisiliId)
    {
        Domisili::findOrFail($domisiliId)->update([
            'status' => 'approved',
            'keterangan' => 'Pengajuan domisili telah disetujui'
        ]);

        session()->flash('message', 'Pengajuan berhasil disetujui');
    }

    public function confirmRejection($domisiliId)
    {
        $this->confirmingRejection = true;
        $this->domisiliIdToReject = $domisiliId;
    }

    public function reject()
    {
        $this->validate([
            'keteranganPenolakan' => 'required|string|max:255'
        ]);

        Domisili::findOrFail($this->domisiliIdToReject)->update([
            'status' => 'rejected',
            'keterangan' => $this->keteranganPenolakan
        ]);

        $this->confirmingRejection = false;
        $this->keteranganPenolakan = '';
        session()->flash('message', 'Pengajuan berhasil ditolak');
    }

    public function showDomisili($domisiliId)
    {
        $this->selectedDomisili = Domisili::with(['mahasiswa', 'fotos'])->findOrFail($domisiliId);
    }

    public function closeDetail()
    {
        $this->selectedDomisili = null;
    }


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingFilter()
    {
        $this->resetPage();
    }
}
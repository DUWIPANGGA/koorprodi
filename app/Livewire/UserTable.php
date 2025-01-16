<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class UserTable extends Component
{
    use WithPagination;

    public $search = '';
    public $page = 1;
    // public $users = [];

    // Menampilkan data pengguna yang sesuai dengan pencarian
    public function render()
    {

        $users = User::where('name', 'like', '%'.$this->search.'%')
                    ->orWhere('email', 'like', '%'.$this->search.'%')
                    ->orWhere('nim', 'like', '%'.$this->search.'%')
                    ->paginate(10);

        return view('livewire.user-table', [
            'users' => $users
        ]);
    }
    public function UserTable()
    {   
        // Filter data berdasarkan input pencarian
        $users = User::query()
            ->where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->get();
    }
    
}

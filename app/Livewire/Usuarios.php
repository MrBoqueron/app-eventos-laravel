<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

use Livewire\WithPagination;
class Usuarios extends Component
{

    use WithPagination;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public $search = '';  
    
    public function render()
    {
        $users = User::where('name', 'like', '%' . $this->search . '%')->paginate(10);
        return view('livewire.usuarios', ['users' => $users]);
    }

    
}

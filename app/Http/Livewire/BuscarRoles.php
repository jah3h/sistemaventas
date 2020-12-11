<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class BuscarRoles extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $roles = Role::where('name', 'LIKE','%'.$this->search.'%')->paginate(10);
        return view('livewire.buscar-roles',['roles'=>$roles]);
    }
}

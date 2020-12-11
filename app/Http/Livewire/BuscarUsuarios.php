<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class BuscarUsuarios extends Component
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
        $search=$this->search;
        $usuarios = User::where('name', 'LIKE','%'.$this->search.'%')
        ->orWhere('email', 'LIKE','%'.$this->search.'%')
        ->orWhereHas('roles', function($query) use($search){
            $query->where('name', 'LIKE','%'.$search.'%');
        })->paginate(10);

        return view('livewire.buscar-usuarios',['usuarios'=>$usuarios]);
    }
}

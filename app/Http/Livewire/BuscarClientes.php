<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use App\Models\Cliente;
use Livewire\Component;

class BuscarClientes extends Component
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
        $clientes = Cliente::where('nombres', 'LIKE','%'.$this->search.'%')
        ->orWhere('dni', 'LIKE','%'.$this->search.'%')
        ->orWhere('telefono', 'LIKE','%'.$this->search.'%')
        ->orWhere('email', 'LIKE','%'.$this->search.'%')
        ->paginate(10);

        return view('livewire.buscar-clientes',['clientes'=>$clientes]);
    }
}

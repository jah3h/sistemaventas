<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use App\Models\Categoria;
use Livewire\Component;

class BuscarCategorias extends Component
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
        return view('livewire.buscar-categorias', [
            'categorias' => Categoria::where('nombre', 'LIKE','%'.$this->search.'%')->paginate(10),
        ]);
    }
}

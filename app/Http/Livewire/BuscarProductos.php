<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;
use Livewire\WithPagination;

class BuscarProductos extends Component
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

        $productos = Producto::where('nombre', 'LIKE','%'.$this->search.'%')
        ->orWhereHas('categoria', function($query) use($search){
            $query->where('nombre', 'LIKE','%'.$search.'%');
        })
        ->orWhereHas('unidadMedida', function($query) use($search){
            $query->where('codigo', 'LIKE','%'.$search.'%');
        })->paginate(10);


        return view('livewire.buscar-productos',['productos'=>$productos]);
    }
}

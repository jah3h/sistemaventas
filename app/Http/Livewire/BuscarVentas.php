<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Venta;
use Livewire\WithPagination;

class BuscarVentas extends Component
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

        $ventas = Venta::where('codigo_comprobante', 'LIKE','%'.$this->search.'%')
        ->orWhereHas('cliente', function($query) use($search){
            $query->where('nombres', 'LIKE','%'.$search.'%');
        })->withTrashed()
        ->paginate(10);

        return view('livewire.buscar-ventas',['ventas'=>$ventas]);
    }
}

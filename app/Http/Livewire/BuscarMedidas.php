<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\UnidadMedida;

class BuscarMedidas extends Component
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

        $unidades = UnidadMedida::where('nombre', 'LIKE','%'.$this->search.'%')->orWhere('codigo', 'LIKE','%'.$this->search.'%')->paginate(10);
        
        return view('livewire.buscar-medidas',['unidades' => $unidades]);
    }
}

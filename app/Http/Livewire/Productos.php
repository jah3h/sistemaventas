<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use App\Models\Venta;
use App\Models\Cliente;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Productos extends Component
{
    public $ordenProductos = [];
    public $productos = [];
    public $subTotal = 0;
    public $impuesto = 0;
    public $total = 0;
    public $clientes;
    public $cliente_id;

    protected $messages = [
        'cliente_id.required'=> 'Seleccione un cliente',
        'ordenProductos.*.producto_id.required' => 'Es necesario seleccionar un producto',
        'ordenProductos.*.cantidad.required' => 'Es necesaria una cantidad',
        'ordenProductos.*.cantidad.gte' => 'La cantidad minima debe ser 1',
        'ordenProductos.*.cantidad.lte' => 'La cantidad maxima debe ser 100',
    ];
    

    public function mount()
    {
        $this->productos = Producto::all();
        $this->clientes = Cliente::all();
        $this->ordenProductos = [
            [
                'producto_id' => '',
                 'cantidad' => 1,
                 'subtotal' => 1
            ]
        ];
    }

    public function addProduct()
    {
        $this->ordenProductos[] =         [
            'producto_id' => '',
            'cantidad' => 1,
            'subtotal' => 1
        ];
    }

    public function removeProduct($index)
    {
        unset($this->ordenProductos[$index]);
        $this->ordenProductos = array_values($this->ordenProductos);
    }


    public function calcularSubtotalPorItem($index){
        foreach ($this->productos as $prod){
            if($prod->id==$this->ordenProductos[$index]['producto_id']){
                $this->ordenProductos[$index]['subtotal']=$this->ordenProductos[$index]['cantidad']*$prod->precio;
                return $this->ordenProductos[$index]['subtotal'];
            }
        }
        
    }


    public function calcularPrecio(){
        $this->subTotal=0;
        foreach($this->ordenProductos as $orden){
          
            foreach ($this->productos as $pr){

                if($pr->id==(int)$orden['producto_id']){
                    $this->subTotal+=(float)$pr->precio*(int)$orden['cantidad'];
                }
            }
        }
        $this->impuesto=(float)$this->subTotal*0.18;
        $this->total=$this->subTotal+$this->impuesto;
        return $this->subTotal;
    }


    protected $rules = [
        
        'cliente_id'=>'required',
        
        'ordenProductos.*.producto_id' => 'required',
        'ordenProductos.*.cantidad' => 'gte:1|lte:100|required',
        'ordenProductos.*.subtotal' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.productos');
    }

    public function submit()
    {
        $validated = $this->validate();
        $subtotal = $this->subTotal;
        $imp = $this->impuesto;
        $total = $this->total;
        

        DB::transaction(function () use ($validated,$total,$subtotal,$imp) {

            $venta = new Venta();

            $venta->codigo_comprobante=$venta->generarCodigo();
            $venta->fecha_venta=Carbon::now()->toDateString();
            $venta->impuesto=$imp;
            $venta->subtotal=$subtotal;
            $venta->total=$total;

            $venta->cliente_id=$validated['cliente_id'];
            $venta->user_id = Auth::user()->id;

            $venta->save();

            //dd($validated['ordenProductos']);

            $i = 0;


            foreach ($validated['ordenProductos'] as $producto) {
                 ++$i;
                $venta->productos()->attach($producto['producto_id'],
                    [
                        'subtotal' => ($producto['subtotal']),
                        'cantidad' => ($producto['cantidad'])
                    ]);
            }

            Log::emergency($i);
        });

        

        return Redirect::route('ventas.index');
    }
}

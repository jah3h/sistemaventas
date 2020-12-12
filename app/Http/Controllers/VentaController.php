<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Producto;
use App\Models\Venta;
use App\Http\Requests\StoreVentaRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Venta::class);

        $ventas = Venta::withTrashed()->get();

        return view('ventas.index',['ventas'=>$ventas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Venta::class);
        $clientes = Cliente::all();
        return view('ventas.create',compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVentaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVentaRequest $request)
    {

        $this->authorize('create', Venta::class);

        $venta = new Venta();
        DB::transaction(function () use ($request,$venta) {
            $venta = Venta::create($request->validated());

            foreach ($request->ordenProductos as $producto) {

                $venta->productos()->attach($producto['producto_id'],
                    [
                        'subtotal' => ($producto['cantidad']*Producto::find($producto['producto_id'])->precio),
                        'cantidad' => ($producto['cantidad'])
                    ]);
            }
        });

        return Redirect::route('ventas.show',['venta'=>$venta]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function show(Venta $venta)
    {
        Log::notice($venta->usuario);
        return view('ventas.show',['venta'=>$venta]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function edit(Venta $venta)
    {
        $this->authorize('update', Venta::class);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venta $venta)
    {
        $this->authorize('update', Venta::class);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venta $venta)
    {
        $this->authorize('delete', Venta::class);

        $venta->delete();

        return redirect()->route('ventas.index')->with('success','La venta se ha cancelado correctamente.');
    }

}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\UnidadMedida;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Producto::class);
        $productos=Producto::all();
        return view('productos.index',['productos'=>$productos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Producto::class);
        $categorias = Categoria::orderBy('nombre')->get();
        $unidadMedidas = UnidadMedida::orderBy('codigo')->get();

        return view('productos.create',['categorias'=>$categorias,'unidadMedidas'=>$unidadMedidas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductoRequest $request)
    {
        $this->authorize('create', Producto::class);
        

       /* $product = new Producto();
        $product->nombre=$validated['nombre'];
        $product->precio=$validated['precio'];
        $product->unidad_medida_id=$validated['unidadMedida'];
        $product->categoria_id=$validated['categoria'];

        $product->save();*/

        Producto::create($request->validated());
        return redirect()->route('productos.index')->with('success','El producto se ha creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        $this->authorize('update', Producto::class);
        $categorias = Categoria::all();
        $unidadMedidas = UnidadMedida::all();
        return view('productos.edit',['producto'=>$producto,'categorias'=>$categorias,'unidadMedidas'=>$unidadMedidas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductoRequest  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductoRequest $request, Producto $producto)
    {
        $this->authorize('update', Producto::class);
        $producto->update($request->validated());
        return redirect()->route('productos.index')->with('success','El producto se ha actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $this->authorize('delete', Producto::class);
        $producto->delete();
        return redirect()->route('productos.index')->with('success','El producto se ha eliminado correctamente.');
    }
}

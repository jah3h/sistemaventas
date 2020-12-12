<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUnidadMedidaRequest;
use App\Http\Requests\UpdateUnidadMedidaRequest;
use App\Models\UnidadMedida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UnidadMedidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', UnidadMedida::class);
        $unidades=UnidadMedida::all();
        
        return view('unidadmedidas.index',['unidades'=>$unidades]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', UnidadMedida::class);
        return view('unidadmedidas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request

     */
    public function store(StoreUnidadMedidaRequest $request)
    {
        $this->authorize('create', UnidadMedida::class);
        UnidadMedida::create($request->validated());
        return redirect()->route('unidadmedidas.index')->with('success','La unidad de medida se ha creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UnidadMedida  $unidadMedida
     * @return \Illuminate\Http\Response
     */
    public function show(UnidadMedida $unidadMedida)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UnidadMedida  $unidadmedida
     * @return \Illuminate\Http\Response
     */
    public function edit(UnidadMedida $unidadmedida)
    {
        $this->authorize('update', UnidadMedida::class);
        return view('unidadmedidas.edit',compact('unidadmedida'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUnidadMedidaRequest  $request
     * @param  \App\Models\UnidadMedida  $unidadMedida
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUnidadMedidaRequest $request, UnidadMedida $unidadmedida)
    {
        $this->authorize('update', UnidadMedida::class);
        $unidadmedida->update($request->validated());
        return redirect()->route('unidadmedidas.index')->with('success','La unidad de medida se ha actualizadp correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UnidadMedida  $unidadmedida
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnidadMedida $unidadmedida)
    {
        $this->authorize('delete', UnidadMedida::class);

        if($unidadmedida->productos()->exists()){
            return redirect()->route('unidadmedidas.index')->with('error','La unidad de medida ha sido asignada a un producto.');
        }else{
            $unidadmedida->delete();
            return redirect()->route('unidadmedidas.index')->with('success','El rol se ha eliminado correctamente.');
        }
        
    }
}

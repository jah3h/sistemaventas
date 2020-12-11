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
        return view('unidadmedidas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request

     */
    public function store(StoreUnidadMedidaRequest $request)
    {
        UnidadMedida::create($request->validated());
        return redirect()->route('unidadmedidas.index');
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
        $unidadmedida->update($request->validated());
        return redirect()->route('unidadmedidas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UnidadMedida  $unidadmedida
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnidadMedida $unidadmedida)
    {
        $unidadmedida->delete();
        return redirect()->route('unidadmedidas.index');
    }
}

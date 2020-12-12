<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCategoriaRequest;
use App\Http\Requests\StoreCategoriaRequest;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Categoria::class);
        $categorias=Categoria::paginate(10);

        return view('categorias.index',['categorias'=>$categorias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Categoria::class);
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *

     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoriaRequest $request)
    {
        $this->authorize('create', Categoria::class);

        $validated= $request->validated();

        if(Categoria::withTrashed()->where('nombre',$validated['nombre'])->count()==1){
            Categoria::withTrashed()->where('nombre',$validated['nombre'])->restore();
        }else{
            Categoria::create($validated);
        }

        return redirect()->route('categorias.index')->with('success','La categoria se ha creado correctamente.');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        $this->authorize('update', Categoria::class);
        return view('categorias.edit',compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoriaRequest $request, Categoria $categoria)
    {
        $this->authorize('update', Categoria::class);
        $categoria->update($request->validated());
        return redirect()->route('categorias.index')->with('success','La categoria se ha actualizado correctamente.');;;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        $this->authorize('delete', Categoria::class);
        
        if($categoria->productos()->exists()){
            return redirect()->route('categorias.index')->with('error','La categoria ha sido asignada a un producto.');
        }else{
            $categoria->delete();
            return redirect()->route('categorias.index')->with('success','La categoria se ha eliminado correctamente.');
        }
        
    }
}

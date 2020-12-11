@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Modificar Producto</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('productos.update',$producto) }}">
                            @method('PUT')
                            @csrf
                            <!--Nombre del Producto -->
                            <div class="form-group row">
                                <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>

                                <div class="col-md-6">
                                    <input 
                                        value="{{$producto->nombre}}"
                                        id="name" 
                                        type="text" 
                                        class="form-control @error('nombre') is-invalid @enderror" 
                                        name="nombre" 
                                        required autofocus>

                                    @error('nombre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                                <!--Precio -->
                            <div class="form-group row">
                                <label for="precio" class="col-md-4 col-form-label text-md-right">Precio</label>

                                <div class="col-md-6">
                                    <input 
                                        value="{{$producto->precio}}"
                                        id="name" 
                                        type="number" 
                                        class="form-control @error('precio') is-invalid @enderror" 
                                        name="precio" 
                                        required autofocus>

                                    @error('precio')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                                <!-- Categoria -->
                                <div class="form-group row">
                                    <label for="categoria" class="col-md-4 col-form-label text-md-right">Categoria</label>
                                    <div class="col-md-6">

                                        <select id="categoria_id" class="form-control @error('categoria_id') is-invalid @enderror" name="categoria_id">

                                            @forelse($categorias as $cat)
                                                @if ($cat->id==$producto->categoria->id)
                                                    <option selected value="{{$cat->id}}">{{$cat->nombre}}</option>
                                                @else
                                                    <option value="{{$cat->id}}">{{$cat->nombre}}</option>
                                                @endif
                                            @empty
                                                <option>No Existe Ninguna Categoria</option>
                                            @endforelse
                                        </select>
                                        @error('categoria_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Unidad de Medida -->
                                <div class="form-group row">
                                    <label for="unidad_medida_id" class="col-md-4 col-form-label text-md-right">Unidad de Medida</label>
                                    <div class="col-md-6">

                                        <select id="unidad_medida_id" class="form-control @error('unidad_medida_id') is-invalid @enderror" name="unidad_medida_id">
                                            @forelse($unidadMedidas as $unidad)
                                                @if ($unidad->id==$producto->unidadMedida->id)
                                                    <option selected value="{{$unidad->id}}">{{$unidad->nombre}}</option>
                                                @else
                                                    <option value="{{$unidad->id}}">{{$unidad->nombre}}</option>
                                                @endif
                                            @empty
                                                <option>No Existe Ninguna Unidad de Medida</option>
                                            @endforelse
                                        </select>

                                        @error('unidad_medida_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group offset-md-4 row ">
                                    <div class="ml-2 ">
                                        <button type="submit" class="btn btn-primary">
                                            Guardar
                                        </button>
                                    </div>
    
                                    <div class=" ml-2 ">
                                        <a href="{{route('productos.index')}}" class="btn btn-secondary">Cancelar</a>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

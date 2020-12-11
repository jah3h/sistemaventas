@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        Productos
                    </div>
                    <div class="card-body">
                        <a href="{{route('productos.create')}}" class="btn btn-primary">Nuevo Producto</a>
                        <br><br>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Categoria</th>
                                <th>Unidad de Medida </th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse ($productos as $producto)
                                <tr>
                                    <td>{{$producto->id}}</td>
                                    <td>{{$producto->nombre}}</td>
                                    <td>{{$producto->precio}}</td>
                                    <td>{{$producto->categoria->nombre}}</td>
                                    <td>
                                        {{$producto->unidadMedida->codigo}}
                                    </td>
                                    <td>
                                        <div class="d-inline-flex">
                                            <a href="{{route('productos.edit',$producto)}}" >
                                                <x-feathericon-edit class="text-secondary"/>
                                            </a>
                                            <form method="POST"
                                                  action="{{route('productos.destroy',$producto)}}">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit"
                                                        onclick="return confirm('Desea  Eliminar?')"
                                                        class="btn btn-link p-0 ml-3 m-0 d-inline-flex">
                                                    <x-feathericon-trash-2 class="text-danger"/>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    No hay productos disponibles.
                                </tr>
                                @endforelse
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

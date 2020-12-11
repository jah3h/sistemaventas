@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center ">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    Lista de Ventas
                </div>
                <div class="card-body">
                    <a href="{{route('ventas.create')}}" class="btn btn-primary">Nueva Venta</a>
                    <br><br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Código de Comprobante</th>
                                <th>Fecha</th>
                                <th>Cliente</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($ventas as $venta)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$venta->codigo_comprobante}}</td>
                                <td>{{$venta->fecha_venta}}</td>
                               
                                <td>
                                    {{$venta->cliente->nombres}}
                                </td>
                               

                                <td>
                                    <div class="d-inline-flex">
                                        <a href="">
                                            <x-feathericon-edit class="text-secondary" />
                                        </a>
                                        <form method="POST" action="">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" onclick="return confirm('Desea  Eliminar?')"
                                                class="btn btn-link p-0 ml-3 m-0 d-inline-flex">
                                                <x-feathericon-trash-2 class="text-danger" />
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-info">No ha realizado aún una venta.</td>
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
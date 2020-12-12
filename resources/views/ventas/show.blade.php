@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Ver Venta</div>

                <div class="card-body">

                    <div class="form-group row">
                        <label for="codigo_comprobante" class="col-md-4 col-form-label text-md-right">Código de
                            Comprobante</label>

                        <div class="col-md-3">
                            <input id="codigo_comprobante" type="text" class="form-control" readonly
                                value="{{$venta->codigo_comprobante}}" name="codigo_comprobante" required autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fecha_venta" class="col-md-4 col-form-label text-md-right">Fecha</label>

                        <div class="col-md-3">
                            <input value="{{$venta->fecha_venta}}" id="name" type="text" class="form-control"
                                name="fecha_venta" readonly required autofocus>
                        </div>
                    </div>

                    <!-- Clientes -->
                    <div class="form-group row">
                        <label for="cliente_id" class="col-md-4 col-form-label text-md-right">Cliente</label>
                        <div class="col-md-6">
                            <input value="{{$venta->cliente->nombres}}" id="cliente_id" type="text" class="form-control"
                                name="cliente_id" readonly required autofocus>
                        </div>
                    </div>

                    <!-- Clientes -->
                    <div class="form-group row">
                        <label for="user_id" class="col-md-4 col-form-label text-md-right">Vendedor</label>
                        <div class="col-md-6">
                            <input value="{{$venta->usuario->name}}" id="user_id" type="text" class="form-control"
                                name="user_id" readonly required autofocus>
                        </div>
                    </div>


                    <!-- PRODUCTOS -->

                    <div class="card">
                        <div class="header">

                        </div>
                        <div class="card-body">
                            <div class="d-flex">


                            </div>
                            <br>
                            <br>
                            <table class="table">
                                <thead>
                                    <tr class="d-flex">
                                        <th class="col-1">#</th>
                                        <th class="col-4">Producto</th>
                                        <th class="col-2">Precio</th>
                                        <th class="col-2">Cantidad</th>
                                        <th class="col-3">Importe</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($venta->productos as $producto)
                                    <tr class="d-flex">
                                        <th scope="row" class="col-1">{{$loop->iteration}}</th>
                                        <td class="col-4">{{$producto->nombre}}</td>
                                        <td class="col-2">S/ {{$producto->precio}} </td>
                                        <td class="col-2">{{$producto->pivot->cantidad}}</td>
                                        <td class="col-3">S/ {{$producto->pivot->subtotal}}</td>
                                    </tr>
                                    @endforeach




                                </tbody>
                            </table>


                        </div>
                    </div>





                    <!--- DETALLES -->
                    <br>
                    <div class="card">
                        <div class="card-header">
                            Detalles
                        </div>
                        <div class="body">
                            <div class="row">

                                <br>
                                <div class="col-md-6 mb-3  ml-4">
                                    <label for="subtotal">Subtotal</label>
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">S/</span>
                                        </div>
                                        <input name="subtotal" value="{{number_format($venta->subtotal,2)}}"
                                            type="number" readonly class="form-control" readonly>

                                    </div>
                                </div>

                                <div class="col-md-5 ">
                                    <label for="impuesto">Impuesto (18%)</label>
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">S/</span>
                                        </div>
                                        <input name="impuesto" value="{{number_format($venta->impuesto,2)}}"
                                            type="number" readonly class="form-control" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 "></div>
                                <div class="col-md-5 mb-3  ml-4">
                                    <label for="total">Total</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text text-success">S/</span>
                                        </div>
                                        <input name="total" value="{{number_format($venta->total,2)}}" type="number"
                                            readonly class="form-control text-success" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- SUbmiT -->
                    <br />
                    <div class="form-group offset-md-4 row ">
                        <div class=" ml-2 ">
                            <a href="{{route('ventas.index')}}" class="btn btn-secondary">Cerrar</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
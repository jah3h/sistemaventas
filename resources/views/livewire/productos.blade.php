<div>

    <form method="POST" wire:submit.prevent="submit">
        @csrf


        <div class="form-group row">
            <label for="codigo_comprobante" class="col-md-4 col-form-label text-md-right">Código de
                Comprobante</label>

            <div class="col-md-3">
                <input id="codigo_comprobante" type="text"
                    class="form-control @error('codigo_comprobante') is-invalid @enderror" readonly
                    value="VNT-XXXXXXXXXX name="codigo_comprobante" required autofocus>

                @error('codigo_comprobante')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="fecha_venta" class="col-md-4 col-form-label text-md-right">Fecha</label>

            <div class="col-md-3">
                <input value="{{\Carbon\Carbon::now()->toDateString()}}" id="name" type="text"
                    class="form-control @error('fecha_venta') is-invalid @enderror" name="fecha_venta" readonly required
                    autofocus>

                @error('fecha_venta')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <!-- Clientes -->
        <div class="form-group row">
            <label for="cliente_id" class="col-md-4 col-form-label text-md-right">Cliente</label>
            <div class="col-md-6">

                <select id="cliente_id" wire:model="cliente_id"
                    class="form-control @error('cliente_id') is-invalid @enderror" name="cliente_id">

                    <option value=""> -- Seleccione un cliente -- </option>
                    @forelse($clientes as $cliente)
                    <option value="{{$cliente->id}}">{{$cliente->nombres}}</option>
                    @empty
                    <option>No Existe Ninguna Cliente</option>
                    @endforelse
                </select>



                @error('cliente_id')
                <span class="error text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror




            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <input value="{{Auth::user()->id}}" id="name" type="hidden"
                    class="form-control @error('user_id') is-invalid @enderror" name="user_id" readonly required
                    autofocus>

                @error('user_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>





        <!--    Agregar Productos       -->
        <div class="card">
            <div class="card-header">
                Productos
            </div>

            <div class="card-body">
                <table class="table" id="products_table">
                    <thead>
                        <tr class="d-flex">
                            <th class="col-6">Producto</th>
                            <th class="col-3">Cantidad</th>
                            <th class="col-2">SubTotal</th>
                            <th class="col-1"></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($ordenProductos as $index => $ordenProducto)
                        <tr class="d-flex">
                            <td class="col-6">
                                <select name="ordenProductos[{{$index}}][producto_id]"
                                    wire:model="ordenProductos.{{$index}}.producto_id"
                                    class="form-control @error('producto') is-invalid @enderror">

                                    <option value="">-- Seleccione un producto --</option>

                                    @foreach ($productos as $producto)

                                    <option value="{{ $producto->id}}">
                                        {{ $producto->nombre }} (S/ {{ number_format($producto->precio, 2) }})
                                    </option>
                                    {{$producto->nombre}}
                                    @endforeach

                                </select>

                                @error('ordenProductos.'.$index.'.producto_id')
                                <span class="error text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </td>

                            <td class="col-3">
                                <input type="number" name="ordenProductos[{{$index}}][cantidad]"
                                    class="form-control @error('cantidad') is-invalid @enderror"
                                    wire:model="ordenProductos.{{$index}}.cantidad" min="1" max="100" />


                                @error('ordenProductos.'.$index.'.cantidad')
                                <span class="error text-danger">

                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </td>
                            <td class="col-2 ">
                                <input type="number" value="{{number_format($this->calcularSubtotalPorItem($index),2)}}"
                                    class="form-control" readonly />
                            </td>


                            <td>
                                <a href="#" wire:click.prevent="removeProduct({{$index}})">
                                    <x-feathericon-trash-2 class="text-danger" />
                                </a>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>

                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-sm btn-secondary" wire:click.prevent="addProduct">
                            + Agregar Producto
                        </button>
                    </div>
                </div>
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
                            <input name="subtotal" value="{{number_format($this->calcularPrecio(),2)}}" type="number" readonly
                                class="form-control" readonly>

                        </div>
                    </div>

                    <div class="col-md-5 ">
                        <label for="impuesto">Impuesto (18%)</label>
                        <div class="input-group ">
                            <div class="input-group-prepend">
                                <span class="input-group-text">S/</span>
                            </div>
                            <input name="impuesto" value="{{number_format($this->impuesto,2) }}" type="number" readonly
                                class="form-control" readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 "></div>
                    <div class="col-md-5 mb-3  ml-4">
                        <label for="total">Importe Total</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text text-success">S/</span>
                            </div>
                            <input name="total" value="{{number_format($this->total,2) }}" type="number" readonly
                                class="form-control text-success" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- SUbmiT -->
        <br />
        <div class="form-group offset-md-4 row ">
            <div class="ml-2 ">
                <button type="submit" class="btn btn-primary">
                    Guardar
                </button>
            </div>

            <div class=" ml-2 ">
                <a href="{{route('ventas.index')}}" class="btn btn-secondary">Cancelar</a>
            </div>
        </div>
    </form>


</div>
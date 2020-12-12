

<div class="card-body">
    
    <div class="d-flex">
        @can('Crear venta')
            <a href="{{route('ventas.create')}}" class="btn btn-primary">Nueva Venta</a>
        @endcan
        <input wire:model="search" type="text" placeholder="Buscar venta..." class="form-control ml-auto col-5" />
    </div>
    
    <br><br>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Código de Comprobante</th>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Estado</th>
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
                    {!! $venta->deleted_at==null?'<p class="text-success">Completado</p>':'<p class="text-danger">Cancelado</p>' !!}
                </td>
                <td>
                    <div class="d-inline-flex">

                        <a href="{{route('ventas.show',$venta)}}" class="mr-3">
                            <x-feathericon-eye class="text-primary" />
                        </a>
                   <!-- @can('Modificar venta')
                        <a href="">
                            <x-feathericon-edit class="text-secondary" />
                        </a>
                    @endcan-->
                    @can('Eliminar venta')
                        <form method="POST" action="{{route('ventas.destroy',$venta)}}">
                            @method('DELETE')
                            @csrf
                            <button type="submit" onclick="return confirm('Desea cancelar la venta?')"
                                class="btn btn-link p-0 ml-3 m-0 d-inline-flex">
                                <x-feathericon-x-square class="text-danger" />
                            </button>
                        </form>
                    @endcan
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
    {{$ventas->links()}}
</div>
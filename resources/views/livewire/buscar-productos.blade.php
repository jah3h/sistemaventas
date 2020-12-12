<div class="card-body">
    <div class="d-flex">
        @can('Crear producto')
            <a href="{{route('productos.create')}}" class="btn btn-primary">Nuevo Producto</a>
        @endcan

        <input wire:model="search" type="text" placeholder="Buscar productos..." class="form-control ml-auto col-5" />
    </div>
    
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
                        @can('Modificar producto')
                            <a href="{{route('productos.edit',$producto)}}" >
                                <x-feathericon-edit class="text-secondary"/>
                            </a>
                        @endcan

                        @can('Eliminar producto')
                        <form method="POST"
                              action="{{route('productos.destroy',$producto)}}">
                            @method('DELETE')
                            @csrf
                            <button type="submit"
                                    onclick="return confirm('¿Desea eliminar el producto?')"
                                    class="btn btn-link p-0 ml-3 m-0 d-inline-flex">
                                <x-feathericon-trash-2 class="text-danger"/>
                            </button>
                        </form>
                        @endcan
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
    {{$productos->links()}}
</div>
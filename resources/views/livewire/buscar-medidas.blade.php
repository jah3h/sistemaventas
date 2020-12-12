<div class="card-body">

    <div class="d-flex">
        @can('Crear unidad de medida')
            <a href="{{route('unidadmedidas.create')}}" class="btn btn-primary">Nueva Unidad de Medida</a>
        @endcan

        <input wire:model="search" type="text" placeholder="Buscar unidades..." class="form-control ml-auto col-5" />
    </div>

    <br><br>
    <table class="table">
        <thead>
            <tr class="d-flex">
                <th class="col-2">Id</th>
                <th class="col-3">Código</th>
                <th class="col-5">Nombre</th>
                <th class="col-2">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($unidades as $unidadmedida)
            <tr class="d-flex">
                <td class="col-2">{{$unidadmedida->id}}</td>
                <td class="col-3">{{$unidadmedida->codigo}}</td>
                <td class="col-5">{{$unidadmedida->nombre}}</td>
                <td class="col-2 d-inline-flex">
                        @can('Modificar unidad de medida')
                            <a href="{{route('unidadmedidas.edit',$unidadmedida)}}">
                                <x-feathericon-edit class="text-secondary" />
                            </a>
                        @endcan

                        @can('Eliminar unidad de medida')
                        <form method="POST" action="{{route('unidadmedidas.destroy',$unidadmedida)}}">
                            @method('DELETE')
                            @csrf
                            <button type="submit" onclick="return confirm('¿Desea Eliminar la Unidad de Medida?')"
                                class="btn btn-link p-0 ml-3 m-0 d-inline-flex">
                                <x-feathericon-trash-2 class="text-danger" />
                            </button>
                        </form>
                        @endcan
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-info">No ha creado aún una unidad de medida.</td>
            </tr>
            @endforelse

        </tbody>
    </table>

    {{$unidades->links()}}
</div>
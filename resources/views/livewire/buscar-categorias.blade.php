<div class="card-body">

    <div class="d-flex">
        
        @can('Crear categoria', Model::class)
            <a href="{{route('categorias.create')}}" class="btn btn-primary mr-3">Nueva Categoria</a>    
        @endcan
        

        <input wire:model="search" type="text" placeholder="Buscar categorias..." class="form-control ml-auto col-5" />
    </div>

    <br><br>
    <table class="table">
        <thead>
            <tr class="d-flex">
                <th class="col-2">Id</th>
                <th class="col-8">Nombre</th>
                <th class="col-2">Opciones</th>
            </tr>
        </thead>
        <tbody>

            @forelse($categorias as $categoria)
            <tr class="d-flex">
                <td class="col-2">{{$loop->iteration}}</td>
                <td class="col-8">{{$categoria->nombre}}</td>
                <td class="col-2 d-inline-flex  ">

                    @can('Modificar categoria')
                        <a class="pr-3" href="{{route('categorias.edit',$categoria)}}">
                            <x-feathericon-edit class="text-secondary" />
                        </a>
                    @endcan


                    @can('Eliminar categoria')
                        <form method="POST" action="{{route('categorias.destroy',$categoria)}}">
                            @method('DELETE')
                            @csrf
                            <button type="submit" onclick="return confirm('Desea Eliminar la Categoria?')"
                                class="btn btn-link p-0 ml-3 m-0 d-inline-flex">
                                <x-feathericon-trash-2 class="text-danger" />
                            </button>
                        </form>
                    @endcan

                </td>

            </tr>
            @empty

            <tr colspan="3">
                <td>No hay Categorias</td>
            </tr>
            @endforelse


        </tbody>
    </table>

    {{$categorias->links()}}

</div>
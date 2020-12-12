<div class="card-body">
    <div class="d-flex">
        @can('Crear cliente')
            <a href="{{route('clientes.create')}}" class="btn btn-primary">Nuevo Cliente</a>
        @endcan
        <input wire:model="search" type="text" placeholder="Buscar clientes..." class="form-control ml-auto col-5" />
    </div>

    <br><br>
    <table class="table">
        <thead>
            <tr class="">
                <th class="">Id</th>
                <th class="">Nombres</th>
                <th class="">DNI</th>
                <th class="">Fecha de Nacimiento</th>
                <th class="">Teléfono</th>
                <th class="">Email</th>
                <th class="">Opciones</th>
            </tr>
        </thead>
        <tbody>

            @forelse($clientes as $cliente)
            <tr class="">
                <td class="">{{$cliente->id}}</td>
                <td class="">{{$cliente->nombres}}</td>
                <td class="">{{$cliente->dni}}</td>
                <td class="">{{$cliente->fecha_nacimiento}}</td>
                <td class="">{{$cliente->telefono}}</td>
                <td class="">{{$cliente->email}}</td>
                <td class="">
                    <div class="d-inline-flex">
                        @can('Modificar cliente')
                            <a href="{{route('clientes.edit',$cliente)}}">
                                <x-feathericon-edit class="text-secondary" />
                            </a>
                        @endcan
                        
                        @can('Eliminar cliente')
                            <form method="POST" action="{{route('clientes.destroy',$cliente->id)}}">
                                @csrf
                                @method('DELETE')

                                <button type="submit" onclick="return confirm('¿Desea Eliminar al cliente?')"
                                    class="btn btn-link p-0 ml-3 m-0 d-inline-flex">
                                    <x-feathericon-trash-2 class="text-danger" />
                                </button>
                            </form>
                        @endcan
                    </div>
                </td>

            </tr>
            @empty
            <tr colspan="5">
                <td>No hay Clientes Registrados</td>
            </tr>
            @endforelse


        </tbody>
    </table>
</div>
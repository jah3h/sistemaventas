<div class="card-body">
    <div class="d-flex">
        @can('Crear rol')
        <a href="{{route('roles.create')}}" class="btn btn-primary">Nuevo Rol</a>
        @endcan

        <input wire:model="search" type="text" placeholder="Buscar roles..." class="form-control ml-auto col-5" />
    </div>
    <br>
    <br>
    <table class="table">
        <thead>
            <tr class="d-flex">
                <th class="col-1"> Id</th>
                <th class="col-3">Rol</th>
                <th class="col-6">Permisos</th>
                <th class="col-2">Opciones</th>
            </tr>
        </thead>
        <tbody>

            @forelse($roles as $rol)
                <tr class="d-flex">
                    <td class="col-1">{{$rol->id}}</td>
                    <td class="col-3">{{$rol->name}}</td>
                    <td class="col-6">
                        @if ($rol->name=='Administrador')
                            Todos los permisos
                        @else
                            @forelse ($rol->permissions as $permiso)
                                @if ($loop->last)
                                    {{$permiso->name}}
                                @else
                                    {{$permiso->name.', '}}
                                @endif
                            @empty
                                --
                            @endforelse
                        @endif
                        

                    </td>
                    <td class="col-2 d-inline-flex"  >
                        @if ($rol->name!='Administrador')
                            @can('Modificar rol')
                                <a href="{{route('roles.edit',$rol)}}">
                                    <x-feathericon-edit class="text-secondary" />
                                </a>
                            @endcan

                            @can('Eliminar rol')
                            <form method="POST" action="{{route('roles.destroy',$rol)}}">
                                @method('DELETE')
                                @csrf
                                <button type="submit" onclick="return confirm('¿Desea Eliminar el Rol?')"
                                    class="btn btn-link p-0 ml-3 m-0 d-inline-flex">
                                    <x-feathericon-trash-2 class="text-danger" />
                                </button>
                            </form>
                            @endcan
                        @endif
                    </td>

                </tr>
                @empty

                <tr>
                    <td>No hay roles</td>
                </tr>
            @endforelse


        </tbody>
    </table>

    {{$roles->links()}}
</div>
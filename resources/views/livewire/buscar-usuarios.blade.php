<div class="card-body">

    <div class="d-flex">
        <a href="{{route('users.create')}}" class="btn btn-primary">Nuevo Usuario</a>
        <input wire:model="search" type="text" placeholder="Buscar unidades..." class="form-control ml-auto col-5" />
    </div>
    
    <br><br>
    <table class="table">
        <thead>
        <tr class="d-flex">
            <th  scope="col" class="col-1">Id</th>
            <th class="col-4">Nombre</th>
            <th class="col-3">Email</th>
            <th class="col-2">Rol</th>
            <th class="col-2">Opciones</th>
        </tr>
        </thead>
        <tbody>

        @foreach($usuarios as $user)
        <tr class="d-flex">
            <th scope="row" class="col-1">{{$user->id}}</td>
            <td class="col-4" >{{$user->name}}</td>
            <td class="col-3">{{$user->email}}</td>
            @forelse ($user->roles as $rol)
            <td class="col-2">{{$rol->name}}</td>
            @empty
            <td class="col-2"> -- </td>
            @endforelse
            
            <td class="col-2 d-inline-flex">
                <a href="{{route('users.reset',$user)}}" class="mr-3">
                    <x-feathericon-key class="text-secondary" />
                </a>
                
                <a href="{{route('users.edit',$user)}}">
                    <x-feathericon-edit class="text-secondary" />
                </a>
                <form method="POST" action="{{route('users.destroy',$user)}}">
                    @method('DELETE')
                    @csrf
                    <button type="submit" onclick="return confirm('Desea Eliminar la Unidad de Medida?')"
                        class="btn btn-link p-0 ml-3     m-0 d-inline-flex">
                        <x-feathericon-trash-2 class="text-danger" />
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{$usuarios->links()}}
</div>
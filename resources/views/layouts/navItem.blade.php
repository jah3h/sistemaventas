@auth
<ul class="navbar-nav mr-auto">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Mantenimiento</a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="{{route('categorias.index')}}">Mantenimiento Categorias</a>
            <a class="dropdown-item" href="{{route('unidadmedidas.index')}}">Mantenimiento Unidad de Medidas</a>
            <a class="dropdown-item" href="{{route('productos.index')}}">Mantenimiento Productos</a>
            <a class="dropdown-item" href="{{route('users.index')}}">Mantenimiento Usuarios</a>
            <a class="dropdown-item" href="{{route('roles.index')}}">Mantenimiento Roles</a>
            <a class="dropdown-item" href="{{route('clientes.index')}}">Mantenimiento Clientes</a>
            <a class="dropdown-item" href="{{route('ventas.index')}}">Mantenimiento Ventas</a>
        </div>
    </li>
</ul>
@endauth

@auth
<ul class="navbar-nav mr-auto">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
            aria-expanded="false">Mantenimiento</a>
        <div class="dropdown-menu">

            @can('Ver cualquier categoria')
                <a class="dropdown-item" href="{{route('categorias.index')}}">Mantenimiento Categorias</a>
            @endcan

            @can('Ver cualquier unidad de medida')
                <a class="dropdown-item" href="{{route('unidadmedidas.index')}}">Mantenimiento Unidad de Medidas</a>
            @endcan

            @can('Ver cualquier producto')
                <a class="dropdown-item" href="{{route('productos.index')}}">Mantenimiento Productos</a>
            @endcan

            @can('Ver cualquier cliente')
                <a class="dropdown-item" href="{{route('clientes.index')}}">Mantenimiento Clientes</a>
            @endcan

            @can('Ver cualquier venta')
                <a class="dropdown-item" href="{{route('ventas.index')}}">Mantenimiento Ventas</a>
            @endcan

            <div class="dropdown-divider"></div>

            @can('Ver cualquier rol')
                <a class="dropdown-item" href="{{route('roles.index')}}">Mantenimiento Roles</a>
            @endcan

            @can('Ver cualquier usuario')
                <a class="dropdown-item" href="{{route('users.index')}}">Mantenimiento Usuarios</a>
            @endcan

        </div>
    </li>
</ul>
@endauth
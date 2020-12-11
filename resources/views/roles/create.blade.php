@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form method="POST" action="{{ route('roles.store') }}">
                @csrf
                <div class="card">
                    <div class="card-header">Nuevo Rol</div>

                    <div class="card-body">



                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" value="{{old('name')}}" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name" required
                                    autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                    </div>
                </div>

                <div class="card mt-2">
                    <div class="card-header">
                        Permisos
                    </div>

                    <div class="card-body">

                 
                        <div class="row">
                            <div class="col-4">
                                <h5>
                                    <strong>
                                        Categorias
                                    </strong>
                                </h5>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permisos[verCualquierCategorias]"
                                    {{ old('permisos.verCualquierCategorias') == 'Ver cualquier categoria' ? 'checked' : '' }} 
                                        value="Ver cualquier categoria" id="verCualquierCategorias">
                                    <label class="form-check-label" for="verCualquierCategorias">
                                        Ver cualquier categoria
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permisos[crearCategorias]"
                                    {{ old('permisos.crearCategorias') == 'Crear categoria' ? 'checked' : '' }} 
                                        value="Crear categoria" id="crearCategorias">
                                    <label class="form-check-label" for="crearCategorias">
                                        Crear categoria
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permisos[modificarCategoria]"
                                    {{ old('permisos.modificarCategoria') == 'Modificar categoria' ? 'checked' : '' }} 
                                        value="Modificar categoria" id="modificarCategoria">
                                    <label class="form-check-label" for="modificarCategoria">
                                        Modificar categoria
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permisos[eliminarCategoria]"
                                    {{ old('permisos.eliminarCategoria') == 'Eliminar categoria' ? 'checked' : '' }} 
                                        value="Eliminar categoria" id="eliminarCategoria">
                                    <label class="form-check-label" for="eliminarCategoria">
                                        Eliminar categoria
                                    </label>
                                </div>
                            </div>

                            <div class="col-4 ">
                                <h5>
                                    <strong>
                                        Unidad de Medidas
                                    </strong>
                                </h5>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permisos[verCualquierUnidadMedida]"
                                    {{ old('permisos.verCualquierUnidadMedida') == 'Ver cualquier unidad de medida' ? 'checked' : '' }} 
                                        value="Ver cualquier unidad de medida" id="verCualquierUnidadMedida">
                                    <label class="form-check-label" for="verCualquierUnidadMedida">
                                        Ver cualquier unidad de medida
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permisos[crearUnidadMedida]"
                                    {{ old('permisos.crearUnidadMedida') == 'Crear unidad de medida' ? 'checked' : '' }} 
                                        value="Crear unidad de medida" id="crearUnidadMedida">
                                    <label class="form-check-label" for="crearUnidadMedida">
                                        Crear unidad de medida
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permisos[modificarUnidadMedida]"
                                    {{ old('permisos.modificarUnidadMedida') == 'Modificar unidad de medida' ? 'checked' : '' }} 
                                        value="Modificar unidad de medida" id="modificarUnidadMedida">
                                    <label class="form-check-label" for="modificarUnidadMedida">
                                        Modificar unidad de medida
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permisos[eliminarUnidadMedida]"
                                    {{ old('permisos.eliminarUnidadMedida') == 'Eliminar unidad de medida' ? 'checked' : '' }} 
                                        value="Eliminar unidad de medida" id="eliminarUnidadMedida">
                                    <label class="form-check-label" for="eliminarUnidadMedida">
                                        Eliminar unidad de medida
                                    </label>
                                </div>
                            </div>

                            <div class="col-4">
                                <h5>
                                    <strong>
                                        Productos
                                    </strong>
                                </h5>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permisos[verCualquierProducto]"
                                    {{ old('permisos.verCualquierProducto') == 'Ver cualquier producto' ? 'checked' : '' }} 
                                        value="Ver cualquier producto" id="verCualquierProducto">
                                    <label class="form-check-label" for="verCualquierProducto">
                                        Ver cualquier producto
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permisos[crearProducto]"
                                    {{ old('permisos.crearProducto') == 'Crear producto' ? 'checked' : '' }} 
                                        value="Crear producto" id="crearProducto">
                                    <label class="form-check-label" for="crearProducto">
                                        Crear producto
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permisos[modificarProducto]"
                                    {{ old('permisos.modificarProducto') == 'Modificar producto' ? 'checked' : '' }} 
                                        value="Modificar producto" id="modificarProducto">
                                    <label class="form-check-label" for="modificarProducto">
                                        Modificar producto
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permisos[eliminarProducto]"
                                    {{ old('permisos.eliminarProducto') == 'Eliminar producto' ? 'checked' : '' }} 
                                        value="Eliminar producto" id="eliminarProducto">
                                    <label class="form-check-label" for="eliminarProducto">
                                        Eliminar producto
                                    </label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>

                        <div class="row">
                            <div class="col-4">
                                <h5>
                                    <strong>
                                        Roles
                                    </strong>
                                </h5>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permisos[verCualquierRol]"
                                    {{ old('permisos.verCualquierRol') == 'Ver cualquier rol' ? 'checked' : '' }} 
                                        value="Ver cualquier rol" id="verCualquierRol">
                                    <label class="form-check-label" for="verCualquierRol">
                                        Ver cualquier rol
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permisos[crearRol]" value="Crear rol"
                                    {{ old('permisos.crearRol') == 'Crear rol' ? 'checked' : '' }} 
                                        id="crearRol">
                                    <label class="form-check-label" for="crearRol">
                                        Crear rol
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permisos[modificarRol]"
                                    {{ old('permisos.modificarRol') == 'Modificar rol' ? 'checked' : '' }} 
                                        value="Modificar rol" id="modificarRol">
                                    <label class="form-check-label" for="modificarRol">
                                        Modificar rol
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permisos[eliminarRol]"
                                    {{ old('permisos.eliminarRol') == 'Eliminar rol' ? 'checked' : '' }} 
                                        value="Eliminar rol" id="eliminarRol">
                                    <label class="form-check-label" for="eliminarRol">
                                        Eliminar rol
                                    </label>
                                </div>
                            </div>

                            <div class="col-4">
                                <h5>
                                    <strong>
                                        Clientes
                                    </strong>
                                </h5>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permisos[verCualquierCliente]"
                                    {{ old('permisos.verCualquierCliente') == 'Ver cualquier cliente' ? 'checked' : '' }} 
                                        value="Ver cualquier cliente" id="verCualquierCliente">
                                    <label class="form-check-label" for="verCualquierCliente">
                                        Ver cualquier cliente
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permisos[crearCliente]"
                                    {{ old('permisos.crearCliente') == 'Crear cliente' ? 'checked' : '' }} 
                                        value="Crear cliente" id="crearCliente">
                                    <label class="form-check-label" for="crearCliente">
                                        Crear cliente
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permisos[modificarCliente]"
                                    {{ old('permisos.modificarCliente') == 'Modificar cliente' ? 'checked' : '' }} 
                                        value="Modificar cliente" id="modificarCliente">
                                    <label class="form-check-label" for="modificarCliente">
                                        Modificar cliente
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permisos[eliminarCliente]"
                                    {{ old('permisos.eliminarCliente') == 'Eliminar cliente' ? 'checked' : '' }} 
                                        value="Eliminar cliente" id="eliminarCliente">
                                    <label class="form-check-label" for="eliminarCliente">
                                        Eliminar cliente
                                    </label>
                                </div>
                            </div>

                            <div class="col-4">
                                <h5>
                                    <strong>
                                        Ventas
                                    </strong>
                                </h5>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permisos[verCualquierVenta]"
                                    {{ old('permisos.verCualquierVenta') == 'Ver cualquier venta' ? 'checked' : '' }} 
                                        value="Ver cualquier venta" id="verCualquierVenta">
                                    <label class="form-check-label" for="verCualquierVenta">
                                        Ver cualquier venta
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permisos[crearVenta]"
                                    {{ old('permisos.crearVenta') == 'Crear venta' ? 'checked' : '' }} 
                                        value="Crear venta" id="crearVenta">
                                    <label class="form-check-label" for="crearVenta">
                                        Crear venta
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permisos[modificarVenta]"
                                    {{ old('permisos.modificarVenta') == 'Modificar venta' ? 'checked' : '' }} 
                                        value="Modificar venta" id="modificarVenta">
                                    <label class="form-check-label" for="modificarVenta">
                                        Modificar venta
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permisos[eliminarVenta]"
                                    {{ old('permisos.eliminarVenta') == 'Eliminar venta' ? 'checked' : '' }} 
                                        value="Eliminar venta" id="eliminarVenta">
                                    <label class="form-check-label" for="eliminarVenta">
                                        Eliminar venta
                                    </label>
                                </div>
                            </div>
                        </div>

                        <br>
                        <br>

                        <div class="row">
                            <div class="col-4">
                                <h5>
                                    <strong>
                                        Usuarios
                                    </strong>
                                </h5>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permisos[verCualquierUsuario]"
                                    {{ old('permisos.verCualquierUsuario') == 'Ver cualquier usuario' ? 'checked' : '' }} 
                                        value="Ver cualquier usuario" id="verCualquierUsuario">
                                    <label class="form-check-label" for="verCualquierUsuario">
                                        Ver cualquier usuario
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input   
                                    {{ old('permisos.crearUsuario') == 'Crear usuario' ? 'checked' : '' }} 
                                    class="form-check-input" type="checkbox" name="permisos[crearUsuario]"
                                        value="Crear usuario" id="crearUsuario">
                                    <label class="form-check-label" for="crearUsuario">
                                        Crear usuario
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permisos[modificarUsuario]"
                                    {{ old('permisos.modificarUsuario') == 'Modificar usuario' ? 'checked' : '' }} 
                                        value="Modificar usuario" id="modificarUsuario">
                                    <label class="form-check-label" for="modificarUsuario">
                                        Modificar usuario
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permisos[eliminarUsuario]"
                                    {{ old('permisos.eliminarUsuario') == 'Eliminar usuario' ? 'checked' : '' }} 
                                        value="Eliminar usuario" id="eliminarUsuario">
                                    <label class="form-check-label" for="eliminarUsuario">
                                        Eliminar usuario
                                    </label>
                                </div>
                            </div>

                            <div class="col-8 d-flex justify-content-center align-items-center">
                                @if ($errors->any())
                                <span class="text-danger " role="alert">
                                    @foreach ($errors->get('permisos') as $error)
                                    <strong> {{ '** '.$error }} </strong>
                                    @endforeach
                                </span>
        
                                @endif
        
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-2">
                    <div class="card-body">
                        <div class="form-group offset-md-4 row ">
                            <div class="ml-2 ">
                                <button type="submit" class="btn btn-primary" onclick="return confirm('Desea Crear el Rol?')">
                                    Guardar
                                </button>
                            </div>

                            <div class=" ml-2 ">
                                <a href="{{route('roles.index')}}" class="btn btn-secondary">Cancelar</a>
                            </div>
                        </div>
                    </div>
                </div>


        </div>
        </form>
    </div>
</div>
@endsection
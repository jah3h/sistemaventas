@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Nuevo Cliente</div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('clientes.store') }}">
                            @csrf

                            <!--   nombres -->
                            <div class="form-group row">
                                <label for="nombres" class="col-md-4 col-form-label text-md-right">Nombres</label>

                                <div class="col-md-7">
                                    <input id="nombres" type="text" class="form-control @error('nombres') is-invalid @enderror" name="nombres" required autofocus>

                                    @error('nombres')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!--   DNi -->
                            <div class="form-group row">
                                <label for="dni" class="col-md-4 col-form-label text-md-right">Dni</label>

                                <div class="col-md-2">
                                    <input 
                                    
                                    id="dni" maxlength="8" type="text" class="form-control @error('dni') is-invalid @enderror" name="dni" required autofocus>

                                    @error('dni')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!--   Fecha de Nacimiento -->
                            <div class="form-group row">
                                <label for="fecha_nacimiento" class="col-md-4 col-form-label text-md-right">Fecha de Nacimiento</label>

                                <div class="col-md-4">
                                    
                                        <input
                                    
                                        id="fecha_nacimiento" type="date" class="form-control @error('fecha_nacimiento') is-invalid @enderror" name="fecha_nacimiento" required autofocus>

                            

                                    @error('fecha_nacimiento')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!--   Email  -->
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!--   telefono -->
                            <div class="form-group row">
                                <label for="telefono" class="col-md-4 col-form-label text-md-right">Teléfono</label>

                                <div class="col-md-3">
                                    <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" required autofocus>

                                    @error('telefono')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group offset-md-4 row ">
                                <div class="ml-2 ">
                                    <button type="submit" class="btn btn-primary">
                                        Guardar
                                    </button>
                                </div>

                                <div class=" ml-2 ">
                                    <a href="{{route('clientes.index')}}" class="btn btn-secondary">Cancelar</a>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Nueva Unidad de Medida</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('unidadmedidas.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="codigo" class="col-md-4 col-form-label text-md-right">Código</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('codigo') is-invalid @enderror" name="codigo" required autofocus>

                                    @error('codigo')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" required autofocus>

                                    @error('nombre')
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
                                    <a href="{{route('unidadmedidas.index')}}" class="btn btn-secondary">Cancelar</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

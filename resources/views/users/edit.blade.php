@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modificar Usuario</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.update',$user) }}">
                        @method('PUT')
                        @csrf
                        <!--   Nombres   -->
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input 
                                id="name" 
                                type="text" 
                                class="form-control @error('name') is-invalid @enderror" 
                                name="name" 
                                value="{{$user->name}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!--   Email   -->
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input 
                                id="email" 
                                type="email" 
                                class="form-control @error('email') is-invalid @enderror" 
                                name="email" 
                                value="{{ $user->email }}" 
                                required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <hr class="featurette-divider">
                        
                        <!-- ROL -->
                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">Rol</label>
                            <div class="col-md-6">
                                <select id="role" class="form-control @error('role') is-invalid @enderror" name="role">
                                    <option value=""> -- Seleccione un rol -- </option>
                                    @forelse($roles as $rol)
                                        @if ($user->hasRole($rol->name))
                                        <option selected value="{{$rol->name}}">{{$rol->name}}</option>
                                        @else
                                        <option value="{{$rol->name}}">{{$rol->name}}</option>
                                        @endif
                                    @empty
                                        <option>No Existe Ninguna Rol</option>
                                    @endforelse
                                </select>
                                @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <br>
                        <br>
                        <!--   Opciones   -->
                        <div class="form-group offset-md-4 row">
                            <div class="ml-2">
                                <button type="submit" class="btn btn-primary">
                                    Guardar
                                </button>
                            </div>

                            <div class=" ml-2 ">
                                <a href="{{route('users.index')}}" class="btn btn-secondary">Cancelar</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center ">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    Lista de Roles
                </div>
                @livewire('buscar-roles')
            </div>
        </div>

    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center ">
        <div class="col-md-12">
            @include('layouts.alerts')
            <div class="card">
                <div class="card-header">
                    Lista de Ventas
                </div>

                
                @livewire('buscar-ventas')

            </div>
        </div>

    </div>
</div>
@endsection
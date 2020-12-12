@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-md-12">
                @include('layouts.alerts')
                <div class="card">
                    <div class="card-header">
                        Unidad de Medidas
                    </div>
                    @livewire('buscar-medidas')
                </div>
            </div>

        </div>
    </div>
@endsection

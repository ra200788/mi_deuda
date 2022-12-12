@extends('layouts.app')

@section('template_title')
    {{ $cliente->name ?? 'Show Cliente' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Detalles del Cliente <strong> {{ $cliente->nombre }} </strong></span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-secondary" href="{{ route('clientes.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body ">

                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $cliente->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Apellidos:</strong>
                            {{ $cliente->apellidos }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $cliente->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Cargo:</strong>
                            {{ $cliente->cargo->name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

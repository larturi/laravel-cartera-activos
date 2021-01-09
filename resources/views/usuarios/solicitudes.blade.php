@extends('adminlte::page')

@section('content')
    <section class="content">

        <div class="row">
            <div class="col">
                <div class="card card-primary">

                    <div class="card-header">
                        <h3 class="card-title">Solicitudes de Usuarios Pendientes de Aprobación</h3>
                    </div>
    
                    <usuarios-solicitud-component/>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
            </div>
        </div>

    </section>
@endsection

@section('css')
    <link rel="stylesheet" href="../../css/app.css">
@stop

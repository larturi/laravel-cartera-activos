@extends('adminlte::page')

@section('content')
    <section class="content">

        <div class="row">
            <div class="col">
                <div class="card card-primary">

                    <div class="card-header">
                        <h3 class="card-title">Buscardor de Usuarios</h3>
                    </div>

                    <usuarios-buscador-component/>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card card-primary">

                    <div class="card-header">
                       <h3 class="card-title">Listado de Usuarios</h3>
                    </div>

                    @if (count($usuarios) == 0)
                        <div class="card-body text-center" style="display: block;">
                            No se han encontrado usuarios
                        </div>
                    @else
                        <usuarios-component
                           :usuarios="{{ json_encode($usuarios) }}"
                        />
                    @endif

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                {{ $usuarios->links() }}
            </div>
        </div>

    </section>
@endsection

@section('css')
    <link rel="stylesheet" href="../../css/app.css">
@stop

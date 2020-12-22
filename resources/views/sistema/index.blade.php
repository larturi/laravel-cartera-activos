@extends('adminlte::page')


@section('content')
    <section class="content">

        <div class="row">
            <div class="col">
                @include('sistema._buscador')
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card card-primary">

                    <div class="card-header">
                       <h3 class="card-title">Cartera de Sistemas</h3>
                    </div>

                    @if (count($sistemas) == 0)
                        <div class="card-body text-center" style="display: block;">
                            No se han encontrado sistemas
                        </div>
                    @else
                        <div class="card-body p-0 table-responsive" style="display: block;">
                            <table class="table table-striped projects">
                                <thead>
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Sigla</th>
                                        <th scope="col">Auth</th>
                                        <th scope="col">Líder</th>
                                        <th scope="col">Cliente</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Criticidad</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sistemas as $sistema)
                                    <tr>
                                        <td>{{ $sistema->nombre }}</td>
                                        <td>{{ $sistema->sigla }}</td>
                                        <td>
                                            <span class="badge badge- badge-success">{{ $sistema->authentication->nombre }}</span>
                                        </td>
                                        <td>{{ $sistema->lider->apellido . ' ' . $sistema->lider->name }}</td>
                                        <td>{{ $sistema->cliente->nombre }}</td>
                                        <td>
                                            @switch($sistema->estado->id)
                                                @case(1)
                                                    <span class="badge badge badge-success">{{ $sistema->estado->nombre }}</span>
                                                    @break
                                                @case(2)
                                                    <span class="badge badge badge-warning">{{ $sistema->estado->nombre }}</span>
                                                    @break
                                                @case(3)
                                                    <span class="badge badge badge-secondary">{{ $sistema->estado->nombre }}</span>
                                                    @break
                                                @case(4)
                                                    <span class="badge badge badge-danger">{{ $sistema->estado->nombre }}</span>
                                                    @break
                                                @default

                                            @endswitch
                                        </td>
                                        <td>
                                            @if ($sistema->criticidad->id == 1)
                                                <span class="badge badge badge-danger">{{ $sistema->criticidad->nombre }}</span>
                                            @else
                                                <span class="badge badge badge-primary">{{ $sistema->criticidad->nombre }}</span>
                                            @endif
                                        </td>
                                        <td>
                                        <a href="/sistemas/{{ $sistema->id }}" class="btn btn-primary btn-sm">Ver</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    @endif

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                {{ $sistemas->links() }}
            </div>
        </div>

    </section>
@endsection

@section('css')
    <link rel="stylesheet" href="../../css/app.css">
@stop

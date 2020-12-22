@extends('adminlte::page')

@section('content')

    <section class="content">

        <div class="container-fluid">
            <div class="row mb-2">
              <div class="col">
                <h3 class="mb-3">{{ $sistema->nombre }}</h3>
              </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-10">
                @include('ux.session-status')
              </div>
        </div>

        <div class="row">
            <div class="col-lg-10">

                <div class="card card-primary card-outline card-tabs">
                    <div class="card-header p-0 pt-1 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-home-tab" data-toggle="pill" href="#custom-tabs-home" role="tab" aria-controls="custom-tabs-home" aria-selected="true">Datos Principales</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-recursos-tab" data-toggle="pill" href="#custom-tabs-recursos" role="tab" aria-controls="custom-tabs-recursos" aria-selected="false">Recursos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-desarrollo-tab" data-toggle="pill" href="#custom-tabs-desarrollo" role="tab" aria-controls="custom-tabs-desarrollo" aria-selected="false">Desarrollo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-documentacion-tab" data-toggle="pill" href="#custom-tabs-documentacion" role="tab" aria-controls="custom-tabs-documentacion" aria-selected="false">Documentación</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-ambientes-tab" data-toggle="pill" href="#custom-tabs-ambientes" role="tab" aria-controls="custom-tabs-ambientes" aria-selected="false">Ambientes</a>
                        </li>
                    </ul>
                    </div>
                    <div class="card-body">
                    <div class="tab-content" id="custom-tabs-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-home" role="tabpanel" aria-labelledby="custom-tabs-home-tab">
                            @include('sistema._cabecera')
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-recursos" role="tabpanel" aria-labelledby="custom-tabs-recursos-tab">
                            @include('sistema._recursos')
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-desarrollo" role="tabpanel" aria-labelledby="custom-tabs-desarrollo-tab">
                            @include('sistema._desarrollo')
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-documentacion" role="tabpanel" aria-labelledby="custom-tabs-documentacion-tab">
                            @include('sistema._documentacion')
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-ambientes" role="tabpanel" aria-labelledby="custom-tabs-ambientes-tab">
                            @include('sistema._ambientes')
                        </div>
                    </div>
                    </div>
                </div>

            </div>
        </div>



    </section>

@endsection

@section('scripts')

@endsection

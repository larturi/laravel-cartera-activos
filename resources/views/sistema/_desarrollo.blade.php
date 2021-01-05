<div class="row">
    {{-- Tecnologias Desarrollo --}}
    <div class="col-lg-4">
        <div class="card card-primary">

            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h6 class="card-title">Tecnologías de Desarrollo</h6>
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive">

                <div class="row">
                    <div class="col">

                        <caracteristicas-component
                            nombre="lenguajes"
                            canedit="{{ Auth::user()->canEdit() }}"
                            :sistema="{{ $sistema->id }}"
                            :caracteristicas="{{ $lenguajes }}"
                            :oldcaracteristicas="{{ json_encode($sistema->lenguajes) }}"
                        ></caracteristicas-component>

                    </div>

                </div>

            </div>

        </div>
    </div>

    {{-- Tecnologias Base de Datos --}}
    <div class="col-lg-4">
        <div class="card card-primary">

            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h6 class="card-title">Bases de Datos</h6>
                    </div>
                </div>

            </div>

            <div class="card-body table-responsive">

                <div class="row">
                    <div class="col">
                        <caracteristicas-component
                            nombre="bases"
                            :sistema="{{ $sistema->id }}"
                            canedit="{{ Auth::user()->canEdit() }}"
                            :caracteristicas="{{ $bases }}"
                            :oldcaracteristicas="{{ json_encode($sistema->bases) }}"
                        ></caracteristicas-component>
                    </div>
                </div>

            </div>

        </div>
    </div>

     {{-- Impacto --}}
    <div class="col-lg-4">
        <div class="card card-primary">

            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h6 class="card-title">Impacto</h6>
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive">

                <div class="row">
                    <div class="col">

                        <caracteristicas-component
                            nombre="impactos"
                            :sistema="{{ $sistema->id }}"
                            canedit="{{ Auth::user()->canEdit() }}"
                            :caracteristicas="{{ $impactos }}"
                            :oldcaracteristicas="{{ json_encode($sistema->impactos) }}"
                        ></caracteristicas-component>

                    </div>

                </div>

            </div>

        </div>
    </div>

    {{-- Checksystem --}}
    <div class="col-12">
        <div class="card card-primary">

            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h6 class="card-title">Checksystem</h6>
                    </div>
                </div>

            </div>

            <div class="card-body">

                <div class="row">
                    <div class="col">
                       <checksystem-component
                         checksystem="{{ $sistema->url_checksystem }}"
                         sistemaid="{{ $sistema->id }}"
                         canedit="{{ Auth::user()->canEdit() }}"
                       >
                       </checksystem-component>
                    </div>
                </div>

            </div>

        </div>
    </div>

    {{-- Relaciones con otros Sistemas (consume) --}}
    <div class="col-12">
        <div class="card card-primary">

            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <h6 class="card-title">Consume Información de Sistemas</h6>
                    </div>
                </div>
            </div>

            <relaciones-component
              :sistema="{{ $sistema }}"
              canedit="{{ Auth::user()->canEdit() }}"
            >
            </relaciones-component>

        </div>
    </div>

    {{-- Control de Versiones --}}
    <div class="col-12">
        <div class="card card-primary">

            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <h6 class="card-title">Control de Versiones</h6>
                    </div>
                </div>
            </div>

            <repositorios-component
              :sistemaid="{{ $sistema->id }}"
              canedit="{{ Auth::user()->canEdit() }}"
            >
            </repositorios-component>

        </div>
    </div>

    {{-- Comentarios --}}
    <div class="col-12">
        <comentarios-component
          :sistema="{{ $sistema }}"
          columna="comentarios_desarrollo"
          placeholder="Ingresar mas información. Por ejemplo, versión mínima requerida del lenguaje, deuda técnica, etc."
          canedit="{{ Auth::user()->canEdit() }}"
        ></comentarios-component>
    </div>

</div>

@section('css')
    <link rel="stylesheet" href="../../css/app.css">
@stop

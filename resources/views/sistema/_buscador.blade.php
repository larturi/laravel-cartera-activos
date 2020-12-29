<div class="card card-primary" id="filterCard">

    <div class="card-header">
       <h3 class="card-title">Filtros de Búsqueda</h3>

       <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" id="btnCollapseFiltros">
               <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>

    <div class="card-body">

        <form action="{{ route('sistemas.buscar') }}"
            method="POST"
            id="formFiltros"
            class="form-group">

            @csrf

            <p class="card-text">

                    <div class="row">

                        {{-- Nombre --}}
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label for="nombre">Nombre:</label>
                                <input id="nombre"
                                    type="text"
                                    placeholder="Nombre del Sistema"
                                    maxlength="50"
                                    class="form-control"
                                    name="nombre"
                                    value="{{  old('nombre') }}"
                                    autocomplete="nombre" autofocus>
                            </div>
                        </div>

                        {{-- Solicitante --}}
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label for="cliente" class="">
                                    Area Solicitante:
                                </label>
                                <select name="cliente_id"
                                        id="cliente_id"
                                        class="custom-select">
                                            <option selected value="">- Seleccionar -</option>

                                            @foreach ($clientes as $cliente)
                                                <option
                                                    {{ old('cliente_id') == $cliente->id ? 'selected' : '' }}
                                                    value="{{ $cliente->id }}"
                                                    >
                                                    {{ $cliente->nombre }}
                                                </option>
                                            @endforeach
                                </select>

                            </div>
                        </div>

                        {{-- Lider --}}
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label for="lider_id">
                                Líder:
                                </label>
                                <select name="lider_id"
                                        id="lider_id"
                                        class="custom-select">
                                            <option selected value="">- Seleccionar -</option>

                                            @foreach ($lideres as $lider)
                                                <option
                                                    {{ old('lider_id') == $lider->id ? 'selected' : '' }}
                                                    value="{{ $lider->id }}"
                                                    >
                                                    {{ $lider->apellido . ', ' .$lider->name }}
                                                </option>
                                            @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- Recurso --}}
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label for="recurso_id">
                                Recurso:
                                </label>
                                <select name="recurso_id"
                                        id="recurso_id"
                                        class="custom-select">
                                            <option selected value="">- Seleccionar -</option>

                                            @foreach ($recursos as $recurso)
                                                <option
                                                    {{ old('recurso_id') == $recurso->id ? 'selected' : '' }}
                                                    value="{{ $recurso->id }}"
                                                    >
                                                    {{ $recurso->apellido . ', ' .$recurso->name }}
                                                </option>
                                            @endforeach
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        {{-- Estado --}}
                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label for="estado_id" class="">
                                Estado:
                                </label>
                                <select name="estado_id"
                                        id="estado_id"
                                        class="custom-select @error('authentication_id') is-invalid @enderror">
                                            <option selected value="">- Seleccionar -</option>

                                            @foreach ($estados as $estado)
                                                <option
                                                    {{ old('estado_id') == $estado->id ? 'selected' : '' }}
                                                    value="{{ $estado->id }}"
                                                    >
                                                    {{ $estado->nombre }}
                                                </option>
                                            @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- Criticidad --}}
                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label for="criticidad_id" class="">
                                Criticidad:
                                </label>
                                <select name="criticidad_id"
                                        id="criticidad_id"
                                        class="custom-select @error('criticidad_id') is-invalid @enderror">
                                            <option selected value="">- Seleccionar -</option>

                                            @foreach ($criticidades as $criticidad)
                                                <option
                                                    {{ old('criticidad_id') == $criticidad->id ? 'selected' : '' }}
                                                    value="{{ $criticidad->id }}"
                                                    >
                                                    {{ $criticidad->nombre }}
                                                </option>
                                            @endforeach
                                </select>

                            </div>
                        </div>

                        {{-- Lenguaje --}}
                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label for="lenguaje" class="">
                                    Lenguaje:
                                </label>
                                <select name="lenguaje_id"
                                        id="lenguaje_id"
                                        class="custom-select">
                                            <option selected value="">- Seleccionar -</option>

                                            @foreach ($lenguajes as $lenguaje)
                                                <option
                                                    {{ old('lenguaje_id') == $lenguaje->id ? 'selected' : '' }}
                                                    value="{{ $lenguaje->id }}"
                                                    >
                                                    {{ $lenguaje->nombre }}
                                                </option>
                                            @endforeach
                                </select>

                            </div>
                        </div>

                        {{-- Motor BD --}}
                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label for="base" class="">
                                    Motor BD:
                                </label>
                                <select name="base_id"
                                        id="base_id"
                                        class="custom-select">
                                            <option selected value="">- Seleccionar -</option>

                                            @foreach ($bases as $base)
                                                <option
                                                    {{ old('base_id') == $base->id ? 'selected' : '' }}
                                                    value="{{ $base->id }}"
                                                    >
                                                    {{ $base->nombre }}
                                                </option>
                                            @endforeach
                                </select>

                            </div>
                        </div>

                        {{-- Login --}}
                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label for="login" class="">
                                    Login:
                                </label>
                                <select name="login_id"
                                        id="login_id"
                                        class="custom-select">
                                            <option selected value="">- Seleccionar -</option>

                                            @foreach ($logins as $login)
                                                <option
                                                    {{ old('login_id') == $login->id ? 'selected' : '' }}
                                                    value="{{ $login->id }}"
                                                    >
                                                    {{ $login->nombre }}
                                                </option>
                                            @endforeach
                                </select>

                            </div>
                        </div>

                        {{-- Impacto --}}
                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label for="impacto" class="">
                                    Impacto:
                                </label>
                                <select name="impacto_id"
                                        id="impacto_id"
                                        class="custom-select">
                                            <option selected value="">- Seleccionar -</option>

                                            @foreach ($impactos as $impacto)
                                                <option
                                                    {{ old('impacto_id') == $impacto->id ? 'selected' : '' }}
                                                    value="{{ $impacto->id }}"
                                                    >
                                                    {{ $impacto->nombre }}
                                                </option>
                                            @endforeach
                                </select>

                            </div>
                        </div>

                    </div>

                    <div class="row float-right">
                        <div class="col-12 mt-2">
                            <button type="button" class="btn btn-secondary btn-sm" id="btnLimpiarFiltros">
                                <i class="fa fa-times"></i>
                                Limpiar
                            </button>

                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-search"></i>
                                Buscar
                            </button>

                            <a href="{{ url('/exports/sistemas') }}" class="btn btn-success btn-sm">
                                <i class="fa fa-file-excel"></i>
                                Exportar
                            </a>

                        </div>
                    </div>

            </p>

        </form>

    </div>

</div>

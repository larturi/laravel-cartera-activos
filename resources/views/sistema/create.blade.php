@extends('adminlte::page')

@section('content')

    <div class="row">
        <div class="col-xl-10">
            <section class="content">
                <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Nuevo Sistema</h3>
                    </div>

                    <form class="form-group"
                          action="{{ route('sistemas.store') }}"
                          method="POST">

                      @csrf

                      <div class="card-body">
                            <div class="card text-left mb-3">
                              <div class="card-body">

                                <p class="card-text">

                                    <div class="row">
                                        {{-- Nombre --}}
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="nombre">Nombre:</label>
                                                <input id="nombre"
                                                    type="text"
                                                    placeholder="Nombre del Sistema"
                                                    maxlength="50"
                                                    class="form-control @error('nombre') is-invalid @enderror"
                                                    name="nombre"
                                                    value="{{  old('nombre') }}"
                                                    autocomplete="nombre" autofocus>
                                                @error('nombre')
                                                    <div class="alert alert-danger mt-2" role="alert">
                                                        <span class="block">{{ $message }}</span>
                                                    </div>
                                                @enderror

                                            </div>
                                        </div>

                                        {{-- Sigla --}}
                                        <div class="col-lg-2">
                                            <div class="mb-3">
                                                <label for="sigla">Sigla:</label>
                                                <input id="sigla"
                                                    type="text"
                                                    placeholder="Sigla"
                                                    maxlength="6"
                                                    class="form-control @error('sigla') is-invalid @enderror"
                                                    name="sigla"
                                                    value="{{  old('sigla') }}"
                                                    autocomplete="sigla" autofocus>
                                                @error('sigla')
                                                    <div class="alert alert-danger mt-2" role="alert">
                                                        <span class="block">{{ $message }}</span>
                                                    </div>
                                                @enderror

                                            </div>
                                        </div>

                                        {{-- Authenticacion --}}
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label for="authentication_id" class="">
                                                Tipo de Autenticación:
                                                </label>
                                                <select name="authentication_id"
                                                        id="authentication_id"
                                                        class="custom-select @error('authentication_id') is-invalid @enderror">
                                                            <option disabled selected value="">- Seleccionar -</option>

                                                            @foreach ($authentications as $authentication)
                                                                <option
                                                                    {{ old('authentication_id') == $authentication->id ? 'selected' : '' }}
                                                                    value="{{ $authentication->id }}"
                                                                    >
                                                                    {{ $authentication->nombre }}
                                                                </option>
                                                            @endforeach
                                                </select>

                                                @error('authentication_id')
                                                    <div class="alert alert-danger mt-2" role="alert">
                                                        <span class="block">{{ $message }}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- Acceso --}}
                                        <div class="col-lg-2">

                                            <label>Tipo de Acceso:</label>

                                            <div class="row mb-3">

                                                <div class="col">
                                                    {{-- Intranet --}}
                                                    <div class="form-check">
                                                        <input class="form-check-input" 
                                                               type="checkbox" 
                                                               value="{{  old('intranet') || 1 }}"
                                                               {{  old('intranet') ? 'checked' : '' }}
                                                               id="intranet" 
                                                               name="intranet"
                                                               >
                                                        <label class="form-check-label" for="intranet">Intranet</label>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    {{-- Internet --}}
                                                    <div class="form-check">
                                                        <input class="form-check-input" 
                                                               type="checkbox" 
                                                               value="{{  old('internet') || 1 }}"
                                                               {{  old('internet') ? 'checked' : '' }}
                                                               id="internet" 
                                                               name="internet">
                                                        <label class="form-check-label" for="internet">Internet</label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                    {{-- Descripcion --}}
                                    <div class="row">
                                        <div class="col mb-3">
                                            <div>
                                                <label for="descripcion">Descripción:</label>
                                                <textarea id="descripcion"
                                                        name="descripcion"
                                                        cols="30"
                                                        rows="3"
                                                        class="form-control @error('descripcion') is-invalid @enderror">{{ old('descripcion') }}
                                                </textarea>
                                                @error('descripcion')
                                                    <div class="alert alert-danger mt-2" role="alert">
                                                        <span class="block">{{ $message }}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        {{-- Estado --}}
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="estado_id" class="">
                                                Estado:
                                                </label>
                                                <select name="estado_id"
                                                        id="estado_id"
                                                        class="custom-select @error('authentication_id') is-invalid @enderror">
                                                            <option disabled selected value="">- Seleccionar -</option>

                                                            @foreach ($estados as $estado)
                                                                <option
                                                                    {{ old('estado_id') == $estado->id ? 'selected' : '' }}
                                                                    value="{{ $estado->id }}"
                                                                    >
                                                                    {{ $estado->nombre }}
                                                                </option>
                                                            @endforeach
                                                </select>

                                                @error('estado_id')
                                                    <div class="alert alert-danger mt-2" role="alert">
                                                        <span class="block">{{ $message }}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- Lider --}}
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="lider_id" class="">
                                                Líder:
                                                </label>
                                                <select name="lider_id"
                                                        id="lider_id"
                                                        class="custom-select @error('lider_id') is-invalid @enderror">
                                                            <option disabled selected value="">- Seleccionar -</option>

                                                            @foreach ($lideres as $lider)
                                                                <option
                                                                    {{ old('lider_id') == $lider->id ? 'selected' : '' }}
                                                                    value="{{ $lider->id }}"
                                                                    >
                                                                    {{ $lider->apellido . ', ' .$lider->name }}
                                                                </option>
                                                            @endforeach
                                                </select>

                                                @error('lider_id')
                                                    <div class="alert alert-danger mt-2" role="alert">
                                                        <span class="block">{{ $message }}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- Fecha Implementacion --}}
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="f_produccion">Fecha Implementación:</label>
                                                <input id="f_produccion"
                                                    type="date"
                                                    placeholder="f_produccion del Sistema"
                                                    class="form-control @error('f_produccion') is-invalid @enderror"
                                                    name="f_produccion"
                                                    value="{{  old('f_produccion') }}"
                                                    autocomplete="f_produccion" autofocus>
                                                @error('f_produccion')
                                                    <div class="alert alert-danger mt-2" role="alert">
                                                        <span class="block">{{ $message }}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            {{-- Criticidad --}}
                                            <div class="mb-3">
                                                <label for="criticidad_id" class="">
                                                Criticidad:
                                                </label>
                                                <select name="criticidad_id"
                                                        id="criticidad_id"
                                                        class="custom-select @error('criticidad_id') is-invalid @enderror">
                                                            <option disabled selected value="">- Seleccionar -</option>

                                                            @foreach ($criticidades as $criticidad)
                                                                <option
                                                                    {{ old('criticidad_id') == $criticidad->id ? 'selected' : '' }}
                                                                    value="{{ $criticidad->id }}"
                                                                    >
                                                                    {{ $criticidad->nombre }}
                                                                </option>
                                                            @endforeach
                                                </select>

                                                @error('criticidad_id')
                                                    <div class="alert alert-danger mt-2" role="alert">
                                                        <span class="block">{{ $message }}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-8">
                                            {{-- Justificacion --}}
                                            <div class="mb-3">
                                                <label for="justificacion_criticidad">Justificar Criticidad:</label>
                                                <textarea id="justificacion_criticidad"
                                                        name="justificacion_criticidad"
                                                        cols="30"
                                                        rows="1"
                                                        class="form-control @error('justificacion_criticidad') is-invalid @enderror">{{ old('justificacion_criticidad') }}</textarea>
                                                @error('justificacion_criticidad')
                                                    <div class="alert alert-danger mt-2" role="alert">
                                                        <span class="block">{{ $message }}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Area Solicitante --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="cliente" class="">
                                                    Area Solicitante:
                                                </label>
                                                <select name="cliente_id"
                                                        id="cliente_id"
                                                        class="custom-select">
                                                            <option disabled selected value="">- Seleccionar -</option>

                                                            @foreach ($clientes as $cliente)
                                                                <option
                                                                    {{ old('cliente_id') == $cliente->id ? 'selected' : '' }}
                                                                    value="{{ $cliente->id }}"
                                                                    >
                                                                    {{ $cliente->nombre }}
                                                                </option>
                                                            @endforeach
                                                </select>

                                                @error('cliente_id')
                                                    <div class="alert alert-danger mt-2" role="alert">
                                                        <span class="block">{{ $message }}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- Datos del Area Solicitante --}}
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label for="cliente_info">Mas información del solicitante:</label>
                                                <textarea id="cliente_info"
                                                        name="cliente_info"
                                                        cols="30"
                                                        rows="4"
                                                        class="form-control @error('cliente_info') is-invalid @enderror">{{ old('cliente_info') }}
                                                </textarea>
                                                @error('cliente_info')
                                                    <div class="alert alert-danger mt-2" role="alert">
                                                        <span class="block">{{ $message }}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </p>

                                <button type="submit" class="btn btn-primary float-right">
                                  Guardar
                                </button>

                              </div>

                            </div>
                      </div>

                    </form>
                 </div>
            </section>
        </div>
    </div>

@endsection

@section('css')
    <link rel="stylesheet" href="../../css/app.css">
@stop


@section('scripts')

@endsection

<div class="row">
    <div class="col">

        <form class="form-group"
                    enctype="multipart/form-data"
                    method="POST"
                    action="{{ route('sistemas.update', $sistema->id) }}">

                @csrf

                @method('PUT')

                <div class="card card-primary">

                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <h6 class="card-title">Datos Principales</h6>
                                </div>
                            </div>

                        </div>

                        <div class="card-body">

                            <div class="row">
                                {{-- Nombre --}}
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="nombre">Nombre:</label>
                                        <input id="nombre"
                                            type="text"
                                            placeholder="Nombre del Sistema"
                                            maxlength="50"
                                            {{ (!Auth::user()->canEdit() ? 'disabled' : '') }}
                                            class="form-control @error('nombre') is-invalid @enderror"
                                            name="nombre"
                                            value="{{ (old('nombre')) ? old('nombre') : $sistema->nombre }}"
                                            autocomplete="nombre" autofocus>
                                        @error('nombre')
                                            <div class="alert alert-danger mt-2" role="alert">
                                                <span class="block">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Sigla --}}
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label for="sigla">Sigla:</label>
                                        <input id="sigla"
                                            type="text"
                                            placeholder="Sigla"
                                            maxlength="6"
                                            {{ (!Auth::user()->canEdit() ? 'disabled' : '') }}
                                            class="form-control @error('sigla') is-invalid @enderror"
                                            name="sigla"
                                            value="{{ (old('sigla')) ? old('sigla') : $sistema->sigla }}"
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
                                        Autenticación:
                                        </label>
                                        <select name="authentication_id"
                                                id="authentication_id"
                                                {{ (!Auth::user()->canEdit() ? 'disabled' : '') }}
                                                class="custom-select">
                                                    <option disabled selected value="">- Seleccionar -</option>

                                                    @foreach ($authentications as $authentication)
                                                        <option
                                                            {{ $sistema->authentication_id == $authentication->id ? 'selected' : '' }}
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
                            </div>

                            {{-- Descripcion --}}
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="descripcion">Descripción:</label>
                                    <textarea id="descripcion"
                                            name="descripcion"
                                            class="form-control @error('descripcion') is-invalid @enderror"
                                            {{ (!Auth::user()->canEdit() ? 'disabled' : '') }}
                                            cols="30"
                                            rows="3"
                                            >{{ (old('descripcion')) ? old('descripcion') : trim($sistema->descripcion) }}</textarea>
                                    @error('descripcion')
                                        <div class="alert alert-danger mt-2" role="alert">
                                            <span class="block">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">

                                {{-- Estado --}}
                                <div class="col-lg-4 mb-3">
                                    <label for="estado_id" class="">
                                    Estado:
                                    </label>
                                    <select name="estado_id"
                                            id="estado_id"
                                            {{ (!Auth::user()->canEdit() ? 'disabled' : '') }}
                                            class="custom-select">
                                                <option disabled selected value="">- Seleccionar -</option>

                                                @foreach ($estados as $estado)
                                                    <option
                                                        {{ $sistema->estado->id == $estado->id ? 'selected' : '' }}
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

                                {{-- Lider --}}
                                <div class="col-lg-4 mb-3">
                                        <label for="lider_id" class="">
                                        Líder:
                                        </label>
                                        <select name="lider_id"
                                                id="lider_id"
                                                {{ (!Auth::user()->canEdit() ? 'disabled' : '') }}
                                                class="custom-select">
                                                    <option disabled selected value="">- Seleccionar -</option>

                                                    @foreach ($lideres as $lider)
                                                        <option
                                                            {{ $sistema->lider_id == $lider->id ? 'selected' : '' }}
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

                                {{-- Fecha Implementacion --}}
                                <div class="col-lg-4 mb-3">
                                    <label for="f_produccion">Fecha Implementacion:</label>
                                    <input id="f_produccion"
                                        type="date"
                                        placeholder="f_produccion del Sistema"
                                        {{ (!Auth::user()->canEdit() ? 'disabled' : '') }}
                                        class="form-control @error('f_produccion') is-invalid @enderror"
                                        name="f_produccion"
                                        value="{{  (old('f_produccion')) ? old('f_produccion') : $sistema->f_produccion }}"
                                        autocomplete="f_produccion" autofocus>
                                    @error('f_produccion')
                                        <div class="alert alert-danger mt-2" role="alert">
                                            <span class="block">{{ $message }}</span>
                                        </div>
                                    @enderror
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
                                                {{ (!Auth::user()->canEdit() ? 'disabled' : '') }}
                                                class="custom-select">
                                                    <option disabled selected value="">- Seleccionar -</option>

                                                    @foreach ($criticidades as $criticidad)
                                                        <option
                                                            {{ $sistema->criticidad_id == $criticidad->id ? 'selected' : '' }}
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
                                                {{ (!Auth::user()->canEdit() ? 'disabled' : '') }}
                                                class="form-control @error('justificacion_criticidad') is-invalid @enderror"
                                                cols="30"
                                                rows="3">{{ (old('justificacion_criticidad')) ? old('justificacion_criticidad') : trim($sistema->justificacion_criticidad) }}</textarea>
                                        @error('justificacion_criticidad')
                                            <div class="alert alert-danger mt-2" role="alert">
                                                <span class="block">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    {{-- Area Solicitante --}}
                                    <div class="mb-3">
                                        <label for="cliente" class="">
                                            Area Solicitante:
                                        </label>
                                        <select name="cliente_id"
                                                id="cliente_id"
                                                {{ (!Auth::user()->canEdit() ? 'disabled' : '') }}
                                                class="custom-select">
                                                    <option disabled selected value="">- Seleccionar -</option>

                                                    @foreach ($clientes as $cliente)
                                                        <option
                                                            {{ $sistema->cliente_id == $cliente->id ? 'selected' : '' }}
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

                                <div class="col-md-8">
                                    {{-- Datos del Area Solicitante --}}
                                    <div class="mb-3">
                                        <label for="cliente_info">Mas información del solicitante:</label>
                                        <textarea id="cliente_info"
                                                name="cliente_info"
                                                {{ (!Auth::user()->canEdit() ? 'disabled' : '') }}
                                                class="form-control @error('cliente_info') is-invalid @enderror"
                                                cols="30"
                                                rows="3"
                                                >{{ (old('cliente_info')) ? old('cliente_info') : $sistema->cliente_info }}
                                        </textarea>
                                        @error('cliente_info')
                                            <div class="alert alert-danger mt-2" role="alert">
                                                <span class="block">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            @if (Auth::user()->canEdit())
                                <button type="submit" class="btn btn-primary btn-block">
                                    Guardar
                                </button>
                            @endif

                        </div>

                </div>

        </form>

    </div>
</div>

@section('css')
    <link rel="stylesheet" href="../../css/app.css">
@stop

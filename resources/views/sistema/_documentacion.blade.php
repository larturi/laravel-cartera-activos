
{{-- Control de Versiones --}}
<div class="col-12">
    <div class="card card-primary">

        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h6 class="card-title">Documentación</h6>
                </div>
            </div>
        </div>

        <documentations-component
            :sistemaid="{{ $sistema->id }}"
            canedit="{{ Auth::user()->canEdit() }}"
            >
        </documentations-component>

    </div>
</div>

{{-- Sucesos --}}
<div class="col-12">
    <div class="card card-primary">

        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h6 class="card-title">Hitos del Sistema</h6>
                </div>
            </div>
        </div>

        <hitos-component
          :sistemaid="{{ $sistema->id }}"
          canedit="{{ Auth::user()->canEdit() }}"
        >
        </hitos-component>

    </div>
</div>

{{-- Comentarios --}}
<div class="col-12">
    <comentarios-component
      :sistema="{{ $sistema }}"
      columna="comentarios_documentacion"
      canedit="{{ Auth::user()->canEdit() }}"
    ></comentarios-component>
</div>




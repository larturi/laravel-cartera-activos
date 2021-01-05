{{-- Ambientes (Servidor) --}}
<div class="col-12">
    <div class="card card-primary">

        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h6 class="card-title">Ambientes</h6>
                </div>
            </div>
        </div>

        <ambientes-component
          :sistemaid="{{ $sistema->id }}"
          canedit="{{ Auth::user()->canEdit() }}"
        ></ambientes-component>

    </div>

</div>

{{-- Comentarios --}}
<div class="col-12">
    <comentarios-component
      :sistema="{{ $sistema }}"
      columna="comentarios_ambientes"
      placeholder="Ingresar mas información..."
      canedit="{{ Auth::user()->canEdit() }}"
    ></comentarios-component>
</div>

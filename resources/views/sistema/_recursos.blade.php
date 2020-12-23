<recursos-component
  :sistema="{{ $sistema }}"
  :lider="{{ $sistema->lider }}"
  canedit="{{ Auth::user()->canEdit() }}"
></recursos-component>

<comentarios-component
    :sistema="{{ $sistema }}"
    columna="comentarios_recursos"
    canedit="{{ Auth::user()->canEdit() }}"
></comentarios-component>

@section('css')
    <link rel="stylesheet" href="../../css/app.css">
@stop

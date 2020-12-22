<recursos-component
  :sistema="{{ $sistema }}"
  :lider="{{ $sistema->lider }}"
  canedit="{{ Auth::user()->canEdit() }}"
>
</recursos-component>

@section('css')
    <link rel="stylesheet" href="../../css/app.css">
@stop

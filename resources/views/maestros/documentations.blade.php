@extends('adminlte::page')

@section('content')
  <maestros-component
      name="documentation"
      pluralname="documentations"
      titulo="Documentos"
      placeholder="Documento"
      description="Desde aqui se puede administrar la documentación requerida de los sistemas."
   >
  </maestros-component>
@endsection

@section('css')
    <link rel="stylesheet" href="../../css/app.css">
@stop

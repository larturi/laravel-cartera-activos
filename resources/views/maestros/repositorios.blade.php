@extends('adminlte::page')

@section('content')
  <maestros-component
      name="repositorio"
      pluralname="repositorios"
      description="Desde aqui se pueden administrar las tecnologias utilizadas para versionado y control de cambios."
   >
  </maestros-component>
@endsection

@section('css')
    <link rel="stylesheet" href="../../css/app.css">
@stop

@extends('adminlte::page')

@section('content')
  <maestros-component
      name="impacto"
      pluralname="impactos"
      titulo="Impacto"
      placeholder="Impacto"
      description="Desde aqui se pueden administrar los valores que indican en que público tiene impacto el sistema"
   >
  </maestros-component>
@endsection

@section('css')
    <link rel="stylesheet" href="../../css/app.css">
@stop


@extends('adminlte::page')

@section('content')
  <maestros-component
      name="criticidad"
      pluralname="criticidad"
      titulo="Niveles de Criticidad"
      placeholder="Nivel de Criticidad"
      description="Desde aqui se pueden administrar los niveles de criticidad de los sistemas"
   >
  </maestros-component>
@endsection

@section('css')
    <link rel="stylesheet" href="../../css/app.css">
@stop

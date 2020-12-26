@extends('adminlte::page')

@section('content')
  <maestros-component
      name="base"
      pluralname="bases"
      titulo="Motores de Base de Datos"
      placeholder="Motor de Base de Datos"
      description="Desde aqui se pueden administrar los motores de bases de datos utilizados"
   >
  </maestros-component>
@endsection

@section('css')
    <link rel="stylesheet" href="../../css/app.css">
@stop


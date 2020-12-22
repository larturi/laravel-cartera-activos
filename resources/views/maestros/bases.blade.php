@extends('adminlte::page')

@section('content')
  <maestros-component
      name="base"
      pluralname="bases"
      description="Desde aqui se pueden administrar los motores de bases de datos utilizados."
   >
  </maestros-component>
@endsection

@section('css')
    <link rel="stylesheet" href="../../css/app.css">
@stop


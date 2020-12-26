@extends('adminlte::page')

@section('content')
  <maestros-component
      name="cliente"
      pluralname="clientes"
      titulo="Clientes"
      placeholder="Cliente"
      description="Desde aqui se pueden administrar las areas cliente de la organización"
   >
  </maestros-component>
@endsection

@section('css')
    <link rel="stylesheet" href="../../css/app.css">
@stop

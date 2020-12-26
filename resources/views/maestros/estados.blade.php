@extends('adminlte::page')

@section('content')
  <maestros-component
      name="estado"
      pluralname="estados"
      titulo="Estados"
      placeholder="Estado"
      description="Desde aqui se pueden administrar los estados de los sistemas."
   >
  </maestros-component>
@endsection

@section('css')
    <link rel="stylesheet" href="../../css/app.css">
@stop

@extends('adminlte::page')

@section('content')
  <maestros-component
      name="perfil"
      pluralname="perfiles"
      readonly="true"
      description="Desde aqui se pueden crear nuevos perfiles de usuario. Los ya existentes no pueden ser editados dado que forman parte de la logica del sistema."
   >
  </maestros-component>
@endsection

@section('css')
    <link rel="stylesheet" href="../../css/app.css">
@stop

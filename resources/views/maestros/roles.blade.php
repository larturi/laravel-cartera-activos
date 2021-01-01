@extends('adminlte::page')

@section('content')
  <maestros-component
      name="role"
      pluralname="roles"
      titulo="Roles"
      placeholder="Rol"
      description="Desde aqui se pueden administrar los roles que ocupan los Recursos de la gerencia de Sistemas"
   >
  </maestros-component>
@endsection

@section('css')
    <link rel="stylesheet" href="../../css/app.css">
@stop

@extends('adminlte::page')

@section('content')
  <maestros-component
      name="lenguaje"
      pluralname="lenguajes"
      titulo="Lenguajes y Tecnologías de Desarrollo"
      placeholder="Lenguaje / Tecnología"
      description="Desde aqui se pueden administrar los lenguajes de programación utilizados"
   >
  </maestros-component>
@endsection

@section('css')
    <link rel="stylesheet" href="../../css/app.css">
@stop

@extends('adminlte::page')

@section('content')
  <maestros-component
      name="lenguaje"
      pluralname="lenguajes"
      description="Desde aqui se pueden administrar los lenguajes de programación utilizados."
   >
  </maestros-component>
@endsection

@section('css')
    <link rel="stylesheet" href="../../css/app.css">
@stop

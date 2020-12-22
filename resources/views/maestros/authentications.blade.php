@extends('adminlte::page')

@section('content')
<section class="content">
    <maestros-component
        name="authentication"
        pluralname="authentications"
        description="Desde aqui se pueden administrar las formas de autenticar que tienen los sistemas."
    >
    </maestros-component>
</section>
@endsection

@section('css')
    <link rel="stylesheet" href="../../css/app.css">
@stop

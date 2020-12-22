@extends('adminlte::page')

@section('content')
<section class="content">
    <maestros-component
        name="ambiente"
        pluralname="ambientes"
        description="Desde aqui se pueden administrar los ambientes de desarrollo de los sistemas"
    >
    </maestros-component>
</section>
@endsection

@section('css')
    <link rel="stylesheet" href="../../css/app.css">
@stop

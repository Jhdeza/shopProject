@extends('adminlte::page')
@section('title', 'Chapintec')

@section('content_header')
<h1 class="text-center text-white mt-2">
    Bienvenido a la Administración de Chapintec
</h1>
<div class="container-fluid vh-100 d-flex  justify-content-center" 
    style="background-image: url('{{ asset("template/assets/images/img/logo_proyecto5.png") }}'); background-size:500px 550px; background-position: center; background-repeat: no-repeat; position: relative;">
      
</div>

@stop

@section('content')
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('icon.png') }}">
@stop

@section('js')
   
@stop
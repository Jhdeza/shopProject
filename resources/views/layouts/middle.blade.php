@extends('adminlte::page')

@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('icon.png') }}">
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-switch@3.4.0/dist/css/bootstrap3/bootstrap-switch.min.css" /> --}}
@endpush

@push('js')
    {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/4.0.0-alpha.1/js/bootstrap-switch.js"></script> --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script defer src="{{asset('images/upload.js')}}" ></script>
@endpush

@include('layouts.partials.config')
@include('layouts.partials.js')
@include('layouts.partials.css')

@section('footer')
    @parent

    <div class="modal" id="modal-generic">

    </div>

   <x-adminlte-modal id="modalPurple" title="Theme Purple" theme="purple"
    icon="fas fa-bolt" size='lg' disable-animations>
    This is a purple theme modal without animations.
    </x-adminlte-modal>

    {{-- <x-adminlte-button label="Open Modal" data-toggle="modal" data-target="#modalPurple" class="bg-purple"/> --}}

@stop


@section('plugins.Datatables', true)
@section('plugins.Select2', true)
@section('plugins.Sweetalert2', true)
@section('plugins.JqueryValidation', true)
@section('plugins.Toastr', true)
@section('plugins.BootstrapSwitch', true)
@section('plugins.Summernote', true)
@section('plugins.Moment', true)
@section('plugins.Daterangepicker', true)
@section('plugins.jFriendly', true)


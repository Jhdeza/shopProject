@extends('adminlte::page')

@section('content_header')

@stop

@section('content')

    {{-- <form action="/target" class="dropzone" id="template"></form> --}}
    <form class="form" method="post" action="{{ route('ofert.update',$ofert->id) }}">
        @csrf
        <div class="card card-primary mt-5 col-8 p-0">
            <div class="card-header ">
                <h3 class="card-title">!!! Make an Ofert</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Nombre:</label>
                    <div class="input-group date ">
                        <input type="text" name="nombre" class="form-control datetimepicker-input" value="{{$ofert->name}}">
                        @error('nombre')
                            <span style="display: block" class="error invalid-feedback ">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <label class="mt-2">Porciento de descuento:</label>
                    <div class="input-group date ">
                        <input type="text" name="descuento" class="form-control datetimepicker-input" value="{{$ofert->percet}}">
                        @error('descuento')
                            <span style="display: block" class="error invalid-feedback ">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mt-2">
                        <label>Rango de fechas:</label>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <input type="text" name="fechas" class="form-control float-right" id="reservation" value="{{$ofert->range}}">
                        </div>
                    </div>

                    <div class="form-group mt-5">
                        <input checked="{{$ofert->active ? "checked" : "" }}" class="mt-5" type="checkbox" name="my-checkbox" id="check" checked
                            data-bootstrap-switch>

                    </div>


                </div>
                <div class="card-footer">
                    <Button class="btn btn-outline-success">Create Ofert</Button>
                </div>

            </div>
        </div>
    </form>
@endsection
@section('css')
    {{-- <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" /> --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/bootstrap-switch@3.4.0/dist/css/bootstrap3/bootstrap-switch.min.css" />
@endsection
@section('js')
    {{-- <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script> --}}
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/4.0.0-alpha.1/js/bootstrap-switch.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#reservation').daterangepicker()
       
            $("input[data-bootstrap-switch]").each(function() {
                let checked = $(this).is(':checked')
                
                $(this).bootstrapSwitch({
                    "State" : checked ,
                    "onText": "Activo",
                    "offText": "Inactivo",
                });
            })

        })
    </script>




@endsection

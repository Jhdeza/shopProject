@extends('adminlte::page')

@section('content_header')

@stop

@section('content')
    <form class="form" method="post" action="{{ route('ofert.store') }}">
        @csrf
        <div class="card card-primary mt-5 col-8 p-0">
            <div class="card-header ">
                <h3 class="card-title">@lang('main.create_ofert')</h3>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-form-label">@lang('main.name')</label>
                    <input type="text" name="nombre" class="form-control">
                    @error('nombre')
                        <span style="display: block" class="error invalid-feedback ">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label class="col-form-label">@lang('main.discount_percent')</label>
                    <input type="text" name="descuento" class="form-control">
                    @error('descuento')
                        <span style="display: block" class="error invalid-feedback ">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-2 row">
                    <label>@lang('main.date_range')</label>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="far fa-calendar-alt"></i>
                            </span>
                        </div>
                        <input type="text" name="fechas" class="form-control float-right" id="date_range">
                    </div>
                </div>
                <div class="form-group mt-5 row">
                    <input class="mt-5" type="checkbox" name="active" id="check"
                        data-bootstrap-switch>
                </div>
            </div>
            <div class="card-footer">
                <Button class="btn btn-outline-success">@lang('main.insert')</Button>
            </div>
        </div>
    </form>
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/bootstrap-switch@3.4.0/dist/css/bootstrap3/bootstrap-switch.min.css" />
@endsection
@section('js')
    
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/4.0.0-alpha.1/js/bootstrap-switch.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>
        $('#date_range').daterangepicker({
            minDate : moment(),
            startDate : moment(),
            endDate : moment().add(7, 'days'),
            locale: {
                format: 'DD/MM/YYYY',
                //applyLabel: 'Aplicar',
                //cancelLabel: 'Cancelar',
                //customRangeLabel: 'Rango personalizado',
            },
        })

        $(document).ready(function() {
            $("input[data-bootstrap-switch]").each(function() {
                $(this).bootstrapSwitch({
                    'state': false,
                    "onText": "Activo",
                    "offText": "Inactivo",
                });
            })
        })
    </script>
@endsection

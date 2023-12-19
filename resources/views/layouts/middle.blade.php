@extends('adminlte::page')

@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-switch@3.4.0/dist/css/bootstrap3/bootstrap-switch.min.css" />
@endpush

@push('js')

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/4.0.0-alpha.1/js/bootstrap-switch.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script defer src="{{asset('images/upload.js')}}" ></script>

    <script>
        $(document).ready(function() {

            /*$("input[data-bootstrap-switch]").each(function() {
                let selected = $(this).is(':checked')
                $(this).bootstrapSwitch({
                    'state': selected ,
                    "onText": "Si",
                    "offText": "No",
                });
            }) */

            $('.cont_upload').upload();

        })
    </script>
    
@endpush

@push('css')

<style>
    .selects span.error{
        position: absolute;
        bottom: -20px;
    }

    /* list table */

    table .list-preview{
        height: 80px;
        max-height: 80px;
        max-width: 80px;
        width: 80px;
    }

    /*end list table */

    /*galery */

    .gen-cont {
        padding-top: 10px;
        padding-left: 10px;
        padding-right: 10px;
        background-color: #ecf0f5;
    }

    .cont_btn_upload {
        margin-bottom: 10px;
    }

    .con_list_imgs .item {
        display: block;
    }

    .con_list_imgs ul li {
        float: left;
        list-style: none;
        min-height: 120px;
    } 
    
    .con_list_imgs ul li img{
        object-fit: cover; /* Cubre el contenedor manteniendo la relación de aspecto */
        object-position: center; /* Centra la imagen dentro del contenedor */
    } 

    .con_list_imgs .card-tools{
        position: absolute;
        right: 10px;
        top: -30px;
    }   

    .con_list_imgs .main .set_main{
        display: none;
    }

    /* end galery /*

</style>
    
@endpush
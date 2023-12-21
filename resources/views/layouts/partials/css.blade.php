@push('css')

<style>
    .selects span.error{
        position: absolute;
        bottom: -20px;
    }

    .select2{
        width: 100%;
    }

    /* select2 correction */

    .select2-selection{
        height: 40px !important;
        background-color: #343a40 !important;
    }

    .select2-selection__arrow{
        height: 40px !important;
    }

    .select2-selection__rendered{
        color: #fff !important;
    }

    /* select2 correction end */

    /* form validation */

    input.invalid-feedback, select.invalid-feedback, textarea.invalid-feedback{
        display: inline;
    }

    /* form validation end */

    .main-footer{
        color: #fff !important;
    }

    /* list table */

    table.table-list .list-preview{
        height: 80px;
        max-height: 80px;
        max-width: 80px;
        width: 80px;
    }

    table.table-list tr td:first-child {
        width: 1%;
    }

    table.table-list #empty-row div {
        background-color: #b1466da7 !important;
    }

    .button-td {
        width: 200px;
        padding-left: 0 !important;
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

    /* end galery */

</style>

@endpush

@push('css')

<style>
    .selects .error{
        position: absolute;
        bottom: -30px;
        left:10px;
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

    .select2-results__option.sub {
        padding-left: 20px !important; 
    }
    .select2-results__option.sub::before {
        content: "--";
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

    /* simple-file */

        .simple-file{
            position: relative;
            border: 2px dashed #ddd !important;  
            height: 200px;
            width: 200px;
        }       

        .simple-file{
            /* border: 2px dashed #ddd !important;  
            height: 200px;
            width: 200px; */

        }

        .simple-file a{
            overflow: hidden;
            position: relative;

        }

        .simple-file img{
            max-width: 180px;
            max-height: 175px;
            object-fit: cover; /* Cubre el contenedor manteniendo la relación de aspecto */
            object-position: center; /* Centra la imagen dentro del contenedor */
            transform: scale(1.2);
        }

        .simple-file .change-btn{
            position: absolute;
            z-index: 200;
            background-color: #212425;
            color: white;
            bottom: -45px;
            right: 45px;
        }

        .simple-file .remove-btn{
            position: absolute;
            z-index: 200;
            color: white;
            bottom: -45px;
            right: 0px;
        }

        /* end simple-file */

</style>

@endpush

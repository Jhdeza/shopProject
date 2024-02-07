@extends('layouts.middle')

@section('content_header')

@stop


@section('content')
    <section class="content">
        <div class="card mt-5">
            <div class="card-header">
                <div class="card-title"><h5>@lang('main.client_list')</h5></div>
            </div>
            <div class="card-body">
                <table id="client-tb" class="table table-striped table-list" style="width: 100%" 
                data-del_title="{{ __('main.sure_delete_clientinfo') }}">
                    <thead>
                        <tr>
                            <th>@lang('main.name') </th>
                            <th>@lang('main.email')</th>
                            <th>@lang('main.client_phone')</th>
                            <th>@lang('main.message')</th>
                            <th>@lang('main.state')</th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

        <div class="modal fade" id="message_modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{ __('main.message') }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
    
                    <div class="modal-body">
                        <div class="form-group row ">
                            <div class="col-12">
                                <input class="form-control" type="text">
                                <textarea class="form-control mt-2" name="" id="" rows="5" readonly> </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
              </div>
           </div>
    </section>
@endsection

@push('js')
    <script>
        var idioma_español = {
                "processing": "Procesando...",
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "emptyTable": "Ningún dato disponible en esta tabla",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "search": "Buscar:",
                "loadingRecords": "Cargando...",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "aria": {
                    "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad",
                    "collection": "Colección",
                    "colvisRestore": "Restaurar visibilidad",
                    "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
                    "copySuccess": {
                        "1": "Copiada 1 fila al portapapeles",
                        "_": "Copiadas %ds fila al portapapeles"
                    },
                    "copyTitle": "Copiar al portapapeles",
                    "csv": "CSV",
                    "excel": "Excel",
                    "pageLength": {
                        "-1": "Mostrar todas las filas",
                        "_": "Mostrar %d filas"
                    },
                    "pdf": "PDF",
                    "print": "Imprimir",
                    "renameState": "Cambiar nombre",
                    "updateState": "Actualizar",
                    "createState": "Crear Estado",
                    "removeAllStates": "Remover Estados",
                    "removeState": "Remover",
                    "savedStates": "Estados Guardados",
                    "stateRestore": "Estado %d"
                },
                "autoFill": {
                    "cancel": "Cancelar",
                    "fill": "Rellene todas las celdas con <i>%d<\/i>",
                    "fillHorizontal": "Rellenar celdas horizontalmente",
                    "fillVertical": "Rellenar celdas verticalmente"
                },
                "decimal": ",",
                "searchBuilder": {
                    "add": "Añadir condición",
                    "button": {
                        "0": "Constructor de búsqueda",
                        "_": "Constructor de búsqueda (%d)"
                    },
                    "clearAll": "Borrar todo",
                    "condition": "Condición",
                    "conditions": {
                        "date": {
                            "before": "Antes",
                            "between": "Entre",
                            "empty": "Vacío",
                            "equals": "Igual a",
                            "notBetween": "No entre",
                            "not": "Diferente de",
                            "after": "Después",
                            "notEmpty": "No Vacío"
                        },
                        "number": {
                            "between": "Entre",
                            "equals": "Igual a",
                            "gt": "Mayor a",
                            "gte": "Mayor o igual a",
                            "lt": "Menor que",
                            "lte": "Menor o igual que",
                            "notBetween": "No entre",
                            "notEmpty": "No vacío",
                            "not": "Diferente de",
                            "empty": "Vacío"
                        },
                        "string": {
                            "contains": "Contiene",
                            "empty": "Vacío",
                            "endsWith": "Termina en",
                            "equals": "Igual a",
                            "startsWith": "Empieza con",
                            "not": "Diferente de",
                            "notContains": "No Contiene",
                            "notStartsWith": "No empieza con",
                            "notEndsWith": "No termina con",
                            "notEmpty": "No Vacío"
                        },
                        "array": {
                            "not": "Diferente de",
                            "equals": "Igual",
                            "empty": "Vacío",
                            "contains": "Contiene",
                            "notEmpty": "No Vacío",
                            "without": "Sin"
                        }
                    },
                    "data": "Data",
                    "deleteTitle": "Eliminar regla de filtrado",
                    "leftTitle": "Criterios anulados",
                    "logicAnd": "Y",
                    "logicOr": "O",
                    "rightTitle": "Criterios de sangría",
                    "title": {
                        "0": "Constructor de búsqueda",
                        "_": "Constructor de búsqueda (%d)"
                    },
                    "value": "Valor"
                },
                "searchPanes": {
                    "clearMessage": "Borrar todo",
                    "collapse": {
                        "0": "Paneles de búsqueda",
                        "_": "Paneles de búsqueda (%d)"
                    },
                    "count": "{total}",
                    "countFiltered": "{shown} ({total})",
                    "emptyPanes": "Sin paneles de búsqueda",
                    "loadMessage": "Cargando paneles de búsqueda",
                    "title": "Filtros Activos - %d",
                    "showMessage": "Mostrar Todo",
                    "collapseMessage": "Colapsar Todo"
                },
                "select": {
                    "cells": {
                        "1": "1 celda seleccionada",
                        "_": "%d celdas seleccionadas"
                    },
                    "columns": {
                        "1": "1 columna seleccionada",
                        "_": "%d columnas seleccionadas"
                    },
                    "rows": {
                        "1": "1 fila seleccionada",
                        "_": "%d filas seleccionadas"
                    }
                },
                "thousands": ".",
                "datetime": {
                    "previous": "Anterior",
                    "hours": "Horas",
                    "minutes": "Minutos",
                    "seconds": "Segundos",
                    "unknown": "-",
                    "amPm": [
                        "AM",
                        "PM"
                    ],
                    "months": {
                        "0": "Enero",
                        "1": "Febrero",
                        "10": "Noviembre",
                        "11": "Diciembre",
                        "2": "Marzo",
                        "3": "Abril",
                        "4": "Mayo",
                        "5": "Junio",
                        "6": "Julio",
                        "7": "Agosto",
                        "8": "Septiembre",
                        "9": "Octubre"
                    },
                    "weekdays": {
                        "0": "Dom",
                        "1": "Lun",
                        "2": "Mar",
                        "4": "Jue",
                        "5": "Vie",
                        "3": "Mié",
                        "6": "Sáb"
                    },
                    "next": "Próximo"
                },
                "editor": {
                    "close": "Cerrar",
                    "create": {
                        "button": "Nuevo",
                        "title": "Crear Nuevo Registro",
                        "submit": "Crear"
                    },
                    "edit": {
                        "button": "Editar",
                        "title": "Editar Registro",
                        "submit": "Actualizar"
                    },
                    "remove": {
                        "button": "Eliminar",
                        "title": "Eliminar Registro",
                        "submit": "Eliminar",
                        "confirm": {
                            "_": "¿Está seguro de que desea eliminar %d filas?",
                            "1": "¿Está seguro de que desea eliminar 1 fila?"
                        }
                    },
                    "error": {
                        "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">Más información&lt;\\\/a&gt;).<\/a>"
                    },
                    "multi": {
                        "title": "Múltiples Valores",
                        "restore": "Deshacer Cambios",
                        "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo.",
                        "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, haga clic o pulse aquí, de lo contrario conservarán sus valores individuales."
                    }
                },
                "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                "stateRestore": {
                    "creationModal": {
                        "button": "Crear",
                        "name": "Nombre:",
                        "order": "Clasificación",
                        "paging": "Paginación",
                        "select": "Seleccionar",
                        "columns": {
                            "search": "Búsqueda de Columna",
                            "visible": "Visibilidad de Columna"
                        },
                        "title": "Crear Nuevo Estado",
                        "toggleLabel": "Incluir:",
                        "scroller": "Posición de desplazamiento",
                        "search": "Búsqueda",
                        "searchBuilder": "Búsqueda avanzada"
                    },
                    "removeJoiner": "y",
                    "removeSubmit": "Eliminar",
                    "renameButton": "Cambiar Nombre",
                    "duplicateError": "Ya existe un Estado con este nombre.",
                    "emptyStates": "No hay Estados guardados",
                    "removeTitle": "Remover Estado",
                    "renameTitle": "Cambiar Nombre Estado",
                    "emptyError": "El nombre no puede estar vacío.",
                    "removeConfirm": "¿Seguro que quiere eliminar %s?",
                    "removeError": "Error al eliminar el Estado",
                    "renameLabel": "Nuevo nombre para %s:"
                },
                "infoThousands": "."
            }


        $(document).ready(function() {
            $.list_tb = $('#client-tb').DataTable({
                language: idioma_español,
                processing: true,
                serverSide: true,
                scrollY: "75vh",
                scrollX: true,
                scrollCollapse: true,
                aaSorting: [],
                ajax: {
                    url: 'client',
                },
                columns: [{
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email_address',
                        name: 'email_address'
                    },
                    {
                        data: 'client_phone',
                        name: 'client_phone'
                    },
                    {
                        data: 'clientmessage',
                        name: 'clientmessage'
                    },
                    {
                        data: 'reading',
                        name: 'reading'
                    },
                    {
                        data: 'buttons',
                        name: 'buttons',
                        orderable: false,
                        searchable: false
                    },
                ],
                initComplete: function() {
                    var table = this.api();
                    if (table.rows().data().length === 0) {
                        $(this).closest('.dataTables_scroll').find('.dataTables_scrollHead').addClass(
                            'd-none')
                    } else {
                        $(this).closest('.dataTables_scroll').find('.dataTables_scrollHead')
                            .removeClass('d-none')
                    }

                    table.on('draw.dt', function() {
                        if (table.rows().data().length === 0) {
                            $(this).closest('.dataTables_scroll').find('.dataTables_scrollHead')
                                .addClass('d-none')
                        } else {
                            $(this).closest('.dataTables_scroll').find('.dataTables_scrollHead')
                                .removeClass('d-none')
                        }
                    });
                },
                fnDrawCallback: function(oSettings) {},
            })
        })


        $('#message_modal').on('shown.bs.modal', function(e) {
            showMessage($(e.relatedTarget))
        })
        showMessage = (el) => {
            $.ajax({
                url: el.data().url,
                type: 'GET',
                dataType: "json",
                success: function(data) {
                    $('#message_modal').find("textarea").val(data.message)
                    $('#message_modal').find("input").val(data.name)

                },
                error: function(error) {
                    console.error(error);
                }
            });
        }

        $(document).ready(function() {
            $(document).on('click','.editState', function() {
               
                var url = $(this).data().url;
             
                $.ajax({
                    
                    url: url,
                    type: 'PATCH',
                    dataType: 'json',
                    data: {

                        _token: $('input[name=_token]').val()
                    },
                    success: function(data) {
                        $.list_tb.ajax.reload()
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
@endpush


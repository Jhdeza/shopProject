@extends('adminlte::page')

@section('content_header')

@stop

@section('content')

<section class="content">

    <div class="card mt-5">
        <div class="card-header">
            <h2 class="card-title">Listado de Ofertas</h2>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
               
            </div>
        </div>
        <div class="card-body p-0" style="display: block;">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th style="width: 1%"> </th>
                        <th style="width: 10%"><h5>Nombre</h5> </th>
                        <th style="width: 10%" >Porciento de descuento</th>
                        <th style="width: 10%">Fecha de inicio</th>
                        <th style="width: 10%">Fecha de Culminación</th>  
                        <th style="width: 10%">Activo</th>              
                        <th class="text-right" style="width: 10%">
                            <a class="btn btn-success btn-sm " href="{{ route('ofert.create') }}">
                                <i class="fas fa-list-alt "> </i> Create</a>

                        </th>
                    </tr>



                </thead>

                <tbody>
                    @php
                        $count = 1;
                    @endphp
                    @foreach ($oferts as $ofert)
                        <tr>
                          
                                <td>{{ $count++ }} </td>
                                <td>{{ $ofert->name }} </td>
                                <td >{{ $ofert->percet }}% </td>
                                <td >{{ $ofert->date_ini }} </td>
                                <td >{{ $ofert->date_end }} </td>
                                <td>
                                    @if ($ofert->active == 1)
                                     Activo
                                     @else 
                                     Inactivo 
                                    @endif
                                </td>
                                
                                                  
                            

                            <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm mr-2  "
                                    href="{{ route('ofert.edit', $ofert->id) }}">
                                    <i class="fas fa-pencil-alt mr-1"></i>Edit</a>

                                <form class="mx-0 d-inline-block "
                                    action="{{ route('ofert.destroy', $ofert->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')


                                    <button type="button" class="btn btn-danger btn-sm delete  " >
                                        <i class="fas fa-trash-alt mr-1"></i>Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</section>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script>
    $(document).on('click', 'button.delete', function(e) {
        e.preventDefault();
        let title = "Estas seguro que desea eliminar la Oferta"
        let form = $(this).closest('form');
        swal({
            title: title,
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((confirmed) => {
            if (confirmed) {
                form.trigger("submit");
            }
        });
    })
</script>
@endsection
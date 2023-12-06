@extends('adminlte::page')

@section('content_header')

@stop

@section('content')

    <section class="content">

        <div class="card mt-5">
            <div class="card-header">
                <h3 class="card-title">Listado de Categorias</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    {{-- <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button> --}}
                </div>
            </div>
            <div class="card-body p-0" style="display: block;">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 1%">

                            </th>
                            <th style="width: 20%">
                                <h3> Categorias </h3>
                            </th>


                            <th class="text-right  " style="width: 5%">
                                <a class="btn btn-success btn-sm " href="{{ route('category.create') }}">
                                    <i class="fas fa-list-alt "> </i> Create</a>

                            </th>
                        </tr>



                    </thead>

                    <tbody>
                        @php
                            $count = 1;
                        @endphp
                        @foreach ($categories as $category)
                            <tr>
                                @if (!$category->parent_id)
                                    <td>{{ $count++ }} </td>
                                @else
                                    <td></td>
                                @endif
                                @if ($category->parent_id)
                                    <td style="padding-left: 35px"> --{{ $category->description }} </td>
                                @else
                                    <td>{{ $category->description }} </td>
                                @endif


                                <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm mr-2  "
                                        href="{{ route('category.edit', $category->id) }}">
                                        <i class="fas fa-pencil-alt mr-1"></i>Edit</a>

                                    <form class="mx-0 d-inline-block "
                                        action="{{ route('category.destroy', $category->id) }}" method="POST">
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
            let title = "Estas seguro que desea eliminar la Categoria"
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

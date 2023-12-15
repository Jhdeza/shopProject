@extends('adminlte::page')

@section('content_header')

@stop

@section('content')
    <section class="content">
        <div class="card mt-5">
            <div class="card-header">
                <div class="card-title">
                    <h5>@lang('main.product_list')</h5>
                </div>
                <a class="btn btn-success btn-sm float-right" href="{{ route('product.create') }}">
                    <i class="fas fa-list-alt "> </i> @lang('main.create')
                </a>
            </div>
            <div class="card-body p-0" style="display: block;">
                <table class="table table-striped projects">
                    @if ($products->isNotEmpty())
                        <thead>
                            <tr>
                                <th></th>
                                <th>@lang('main.imagen_product')</th>
                                <th>@lang('main.name_product') </th>
                                <th>@lang('main.product_description')</th>
                                <th>@lang('main.price')</th>
                                <th>@lang('main.quantity')</th>
                                <th>@lang('main.quantity_alert')</th>
                                <th>@lang('main.category_id')</th>
                                <th>@lang('main.ofert_id')</th>
                                <th>@lang('main.onsigth')</th>
                                <th>@lang('main.onnew')</th>

                                <th></th>
                            </tr>
                        </thead>
                    @endif
                    <tbody>
                        @php
                            $count = 1;
                        @endphp
                        @forelse ($products as $product)
                            <tr>
                                <td>{{ $count++ }} </td>
                                <td></td>
                                <td>{{ $product->name }} </td>
                                <td>{{ $product->description }} </td>
                                <td>{{ $product->price }} </td>
                                <td>{{ $product->quantity }} </td>
                                <td>{{ $product->quantity_alert }} </td>
                                <td>{{ $product->category->description }}</td>
                                <td>{{ $product->ofert?$product->ofert->name:'' }} </td>
                                <td>{{ $product->act_carusel ? 'Si' : 'No' }}</td>
                                <td>{{ $product->is_new ? 'Si' : 'No' }}</td>
                                <td class="project-actions text-right button-td ">
                                    <a class="btn btn-info btn-sm mr-2  " href="{{ route('product.edit', $product->id) }}">
                                        <i class="fas fa-pencil-alt mr-1"></i><span
                                            class="d-none d-xl-inline">@lang('main.edit')</span>
                                    </a>
                                    <form class="mx-0 d-inline-block "
                                        action="{{ route('product.destroy', $product->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm delete  ">
                                            <i class="fas fa-trash-alt mr-1"></i><span
                                                class="d-none d-xl-inline">@lang('main.delete')</span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr id="empty-row">
                                <td class="p-0" colspan="3">
                                    <div class="p-3 m-2">@lang('main.empty_products')</div>
                                </td>
                            </tr>
                        @endforelse
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
            let title = "Estas seguro que desea eliminar el Producto"
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

@section('css')
    <style>
        table tr td:first-child {
            width: 1%;
        }

        table #empty-row div {
            background-color: #b1466da7 !important;
        }

        .button-td {
            width: 200px;
            padding-left: 0 !important;
        }
    </style>
@stop

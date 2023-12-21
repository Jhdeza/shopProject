@extends('layouts.middle')

@section('content_header')

@stop

@section('content')
    <section class="content">
        <div class="card mt-5">
            <div class="card-header">
                <div class="card-title">
                    <h5>@lang('main.product_list')</h5>
                </div>
                <button class="btn btn-success btn-sm float-right btn-modal" data-toggle="modal" data-target="#modal-generic" data-url="{{ route('product.create') }}">
                    <i class="fas fa-list-alt "> </i> @lang('main.create')
                </button>
            </div>
            <div class="card-body">
                <table id="products-tb" class="table table-striped table-list">
                    @if ($products->isNotEmpty())
                        <thead>
                            <tr>
                                <th></th>
                                <th>@lang('main.imagen_product')</th>
                                <th>@lang('main.name_product') </th>
                                {{-- <th>@lang('main.product_description')</th> --}}
                                <th>@lang('main.price')</th>
                                <th>@lang('main.quantity')</th>
                                <th>@lang('main.quantity_alert')</th>
                                <th>@lang('main.category_id')</th>
                                <th>@lang('main.ofert_id')</th>
                                <th>@lang('main.onsigth')</th>
                                <th>@lang('main.onnew')</th>

                                {{-- <th></th> --}}
                            </tr>
                        </thead>
                    @endif
                    {{--<tbody>
                         @php
                            $count = 1;
                        @endphp
                        @forelse ($products as $product)
                            <tr>
                                <td>{{ $count++ }} </td>
                                <td><img class="list-preview" src="{{$product->image}}"></td>
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
                                    <button class="btn btn-info btn-sm mr-2 btn-modal" data-toggle="modal" data-target="#modal-generic" data-url="{{ route('product.edit', $product->id) }}">
                                        <i class="fas fa-pencil-alt mr-1"></i><span
                                            class="d-none d-xl-inline">@lang('main.edit')</span>
                                    </button>
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
                    </tbody>--}}

                </table>
            </div>
        </div>
    </section>
@endsection
@push('js')

<script>
    $(document).ready(function(){
       /*  $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }); */

        $.list_tb = $('#products-tb').DataTable({
            processing: true,
            serverSide: true,
            scrollY: "75vh",
            scrollX: true,
            scrollCollapse: true,
            aaSorting: [[2, 'asc']],
            ajax: {
                url: 'product',
            },
            columns: [
                { data: 'buttons', name: 'buttons', orderable: false, searchable: false },
                { data: 'image', name: 'image', orderable: false, searchable: false },
                { data: 'name', name: 'name' },
                { data: 'price', name: 'price' },
                { data: 'quantity', name: 'quantity' },
                { data: 'quantity_alert', name: 'quantity_alert' },
                { data: 'category', name: 'category' },
                { data: 'ofert', name: 'ofert' },
                { data: 'act_carusel', name: 'act_carusel' },
                { data: 'is_new', name: 'is_new' },

            ]/* ,
            fnDrawCallback: function(oSettings) {
                //__currency_convert_recursively($('#stock_report_table'));
            }, */
        })
    })

</script>
@endpush



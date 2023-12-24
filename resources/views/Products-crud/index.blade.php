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
                <table id="products-tb" class="table table-striped table-list" style="width: 100%">
                    <thead>
                        <tr>
                            <th></th>
                            <th>@lang('main.imagen_product')</th>
                            <th>@lang('main.name_product') </th>
                            <th>@lang('main.price')</th>
                            <th>@lang('main.quantity')</th>
                            <th>@lang('main.quantity_alert')</th>
                            <th>@lang('main.category_id')</th>
                            <th>@lang('main.ofert_id')</th>
                            <th>@lang('main.onsigth')</th>
                            <th>@lang('main.onnew')</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>
@endsection
@push('js')

<script>
    $(document).ready(function(){
        /* $.ajaxSetup({
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

            ],
            initComplete: function () {
                var table = this.api();             

                if (table.rows().data().length === 0) {
                    $('#products-tb').closest('.dataTables_scroll').find('.dataTables_scrollHead').addClass('d-none')
                }
                else{
                    $('#products-tb').closest('.dataTables_scroll').find('.dataTables_scrollHead').removeClass('d-none')
                }

                table.on('draw.dt', function () {
                    if (table.rows().data().length === 0) {
                        $('#products-tb').closest('.dataTables_scroll').find('.dataTables_scrollHead').addClass('d-none')
                    }
                    else{
                        $('#products-tb').closest('.dataTables_scroll').find('.dataTables_scrollHead').removeClass('d-none')
                    }
                });      
            } ,
            fnDrawCallback: function(oSettings) {
                //$('#products-tb').closest('.dataTables_scroll').find('dataTables_scrollHead').addClass('d-none')
                //__currency_convert_recursively($('#stock_report_table'));
            }, 
        })
    })

</script>
@endpush



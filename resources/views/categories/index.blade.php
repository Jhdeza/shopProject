@extends('layouts.middle')

@section('content_header')

@stop

@section('content')
    <section class="content">
        <div class="card mt-5">
            <div class="card-header">
                <div class="card-title">
                    <h5>@lang('main.categories_list')</h5>
                </div>
                <button class="btn btn-success btn-sm float-right btn-modal" data-toggle="modal" data-target="#modal-generic"
                    data-url="{{ route('category.create') }}">
                    <i class="fas fa-list-alt "> </i> @lang('main.create')
                </button>
            </div>
            <div class="card-body">
                <table id="categories-tb" class="table table-striped table-list" style="width: 100%"
                    data-del_title="{{ __('main.sure_delete_cat') }}">
                    <thead>
                        <tr>
                            <th></th>
                            <th>{{ __('main.name') }}</th>
                            <th>{{ __('main.slug') }}</th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script>
        $(document).on('change', '#is_sub', function() {
            toggleCat($(this));
        })

        toggleCat = (el) => {
            if (el.is(':checked'))
                $('#cat-cont').removeClass('d-none');
            else
                $('#cat-cont').addClass('d-none');
        }

        $(document).on('shown.bs.modal', '#modal-generic', function() {
            toggleCat($(this).find('#is_sub'));
        })

        $(document).ready(function() {
                $.list_tb = $('#categories-tb').DataTable({
                    processing: true,
                    serverSide: true,
                    scrollY: "75vh",
                    scrollX: true,
                    scrollCollapse: true,
                    aaSorting: [],
                    ajax: {
                        url: 'category',
                    },
                    columns: [{
                            data: 'buttons',
                            name: 'buttons',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'slug',
                            name: 'slug'
                        },
                        {
                            data: 'image',
                            name: 'image',
                            orderable: false,
                            searchable: false
                        },
                    ],
                    initComplete: function() {
                        var table = this.api();
                        if (table.rows().data().length === 0) {
                            $(this[0]).closest('.dataTables_scroll').find('.dataTables_scrollHead')
                                .addClass('d-none')
                        } else {
                            $(this[0]).closest('.dataTables_scroll').find('.dataTables_scrollHead')
                                .removeClass('d-none')
                        }

                        table.on('draw.dt', function() {
                            if (table.rows().data().length === 0) {
                                $(this[0]).closest('.dataTables_scroll').find(
                                    '.dataTables_scrollHead').addClass('d-none')
                            } else {
                                $(this[0]).closest('.dataTables_scroll').find(
                                    '.dataTables_scrollHead').removeClass('d-none')
                            }
                        });
                    },
                    fnDrawCallback: function(oSettings) {},
                })
            })
        


       
    </script>
@endpush

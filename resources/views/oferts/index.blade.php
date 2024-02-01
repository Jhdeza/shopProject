@extends('layouts.middle')

@section('content_header')

@stop

@section('content')

    <section class="content">
        <div class="card mt-5">
            <div class="card-header">
                <div class="card-title">
                    <h5>@lang('main.ofert_list')</h5>
                </div>
                <button class="btn btn-success btn-sm float-right btn-modal" data-toggle="modal" data-target="#modal-generic"
                    data-url="{{ route('ofert.create') }}">
                    <i class="fas fa-list-alt "> </i> @lang('main.create')
                </button>
            </div>
            <div class="card-body">
                <table id="oferts-tb" class="table table-striped table-list" style="width: 100%"
                    data-del_title="{{ __('main.sure_delete_ofert') }}">
                    <thead>
                        <tr>
                            <th></th>
                            <th>@lang('main.name') </th>
                            <th>@lang('main.discount_percent')</th>
                            <th>@lang('main.date_begin')</th>
                            <th>@lang('main.date_end')</th>
                            <th>@lang('main.state')</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $.list_tb = $('#oferts-tb').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json',
                },
                processing: true,
                serverSide: true,
                scrollY: "75vh",
                scrollX: true,
                scrollCollapse: true,
                aaSorting: [],
                ajax: {
                    url: 'ofert',
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
                        data: 'percent',
                        name: 'percent'
                    },
                    {
                        data: 'date_ini',
                        name: 'date_ini'
                    },
                    {
                        data: 'date_end',
                        name: 'date_end'
                    },
                    {
                        data: 'active',
                        name: 'active'
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
    </script>
@endpush

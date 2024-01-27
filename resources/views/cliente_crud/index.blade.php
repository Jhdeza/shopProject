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
        $(document).ready(function() {
            $.list_tb = $('#client-tb').DataTable({
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


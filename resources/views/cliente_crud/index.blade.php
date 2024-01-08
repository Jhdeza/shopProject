@extends('layouts.middle')

@section('content_header')

@stop

{{-- @section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card mt-5">
                        <div class="card-header">
                            <h3 class="card-title">Informacion de Clientes</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                @if ($clients->isNotEmpty())
                                    <thead>
                                        <tr>
                                            <th>{{ __('main.name') }}</th>
                                            <th>Email</th>
                                            <th>{{ __('main.client_phone') }}</th>
                                            <th>{{ __('main.message') }}</th>
                                            <th>{{ __('main.state') }}</th>

                                        </tr>
                                    </thead>
                                @endif
                                @forelse ($clients as $client)
                                    <tbody>

                                        <tr>
                                            <td>{{ $client->name }}</td>
                                            <td>{{ $client->email_address }}</td>
                                            <td> {{ $client->client_phone }}</td>
                                            <td
                                                style="max-width: 150px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                                {{ $client->message }}</td>
                                            <td>{{ $client->reading ? ' Leido ' : ' No Leido' }}</td>
                                            <td class="project-actions text-right ">
                                                <button type="button" name="editState"
                                                    data-url="{{ route('client.update', $client->id) }}"
                                                    class="btn btn-default btn-sm mr-2   ">
                                                    <i class="fas fa--alt mr-1"></i>
                                                    {{ $client->reading == 0 ? __('main.change_state') : __('main.change_state2') }}
                                                </button>
                                                <a class="btn btn-info btn-sm mr-2  " data-toggle="modal"
                                                    data-target="#message_modal"
                                                    href="{{ route('client.show', $client->id) }}">
                                                    <i class="fas fa-info mr-1"></i>@lang('main.View_message')</a>

                                                <form class="mx-0 d-inline-block "
                                                    action="{{ route('client.destroy', $client->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger btn-sm delete  ">
                                                        <i class="fas fa-trash-alt mr-1"></i>@lang('main.delete')
                                                    </button>
                                                </form>
                                            </td>

                                        </tr>
                                    </tbody>

                                @empty
                                    <tr id="empty-row">
                                        <td class="p-0" colspan="3">
                                            <div class="p-3 m-2">@lang('main.empty_clients')</div>
                                        </td>
                                    </tr>
                                @endforelse
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection --}}
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
                            <th>Email</th>
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


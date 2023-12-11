@extends('adminlte::page')

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
            <div class="card-title">
                <h5>@lang('main.client_list')</h5>
            </div>
        </div>
        <div class="card-body p-0" style="display: block;">
            <table class="table table-responsive table-striped projects">
                @if ($clients->isNotEmpty())
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('main.name') }}</th>
                            <th>Email</th>
                            <th>{{ __('main.client_phone') }}</th>
                            <th>{{ __('main.message') }}</th>
                            <th>{{ __('main.state') }}</th>
                            <th></th>
                        </tr>
                    </thead>
                @endif
                <tbody>
                    @php
                        $count = 1;
                    @endphp
                    @forelse ($clients as $client)
                        <tr>
                            <td>{{ $count++ }} </td>
                            <td>{{ $client->name }}</td>
                            <td>{{ $client->email_address }}</td>
                            <td> {{ $client->client_phone }}</td>
                            <td>
                            <div  style="max-width: 150px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                {{ $client->message }} </div>    
                            </td>                      
                            <td>{{ $client->reading ? ' Leido ' : ' No Leido' }}</td>
                            <td class="project-actions text-right" style="max-width: 170px">
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
                    @empty
                        <tr id="empty-row">
                            <td class="p-0" colspan="3">
                                <div class="p-3 m-2">@lang('main.empty_oferts')</div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
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
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script>
    $(document).on('click', 'button.delete', function(e) {
        e.preventDefault();
        let title = "Estas seguro que desea eliminar la informacion del cliente"
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

    $('#message_modal').on('shown.bs.modal', function(e) {
        showMessage($(e.relatedTarget))
    })
    showMessage = (el) => {
        $.ajax({
            url: el.attr('href'),
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
        $('.btn[name="editState"]').on('click', function() {
            var url = $(this).data().url;

            $.ajax({
                url: url,
                type: 'PATCH',
                dataType: 'json',
                data: {

                    _token: $('input[name=_token]').val()
                },
                success: function(data) {
                    window.location.href = "/client"
                },
                error: function(error) {
                    console.error(error);
                }
            });
        });
    });
</script>
@endsection

@section('css')
<style>
    table tr td:first-child {
        width: 1%;
    }

    table #empty-row div {
        background-color: #240202a7 !important;
    }
</style>
@stop

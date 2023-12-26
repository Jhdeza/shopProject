@extends('layouts.middle')

@section('content_header')

@stop

@section('content')

<section class="content">
    <div class="card mt-5">
        <div class="card-header">
            <div class="card-title"><h5>@lang('main.ofert_list')</h5></div>
            <button class="btn btn-success btn-sm float-right btn-modal" data-toggle="modal" data-target="#modal-generic" data-url="{{ route('ofert.create') }}">
                <i class="fas fa-list-alt "> </i> @lang('main.create')
            </button>
        </div>
        <div class="card-body">
            <table id="oferts-tb" class="table table-striped table-list" style="width: 100%" data-del_title="{{__('main.sure_delete_ofert')}}">
                {{-- @if($oferts->isNotEmpty()) --}}
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
                {{-- @endif --}}
                {{-- <tbody>
                    @php
                        $count = 1;
                    @endphp
                    @forelse ($oferts as $ofert)
                        <tr>                        
                            <td>{{ $count++ }} </td>
                            <td>{{ $ofert->name }} </td>
                            <td >{{ $ofert->percet }}% </td>
                            <td >{{ $ofert->date_ini->format('d/m/Y') }} </td>
                            <td >{{ $ofert->date_end->format('d/m/Y') }} </td>
                            <td>
                                @if ($ofert->active == 1)
                                    @lang('main.active')
                                    @else 
                                    @lang('main.inactive')
                                @endif
                            </td>
                            <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm mr-2  "
                                    href="{{ route('ofert.edit', $ofert->id) }}">
                                    <i class="fas fa-pencil-alt mr-1"></i>@lang('main.edit')
                                </a>
                                <form class="mx-0 d-inline-block "
                                    action="{{ route('ofert.destroy', $ofert->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm delete  " >
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
                </tbody> --}}

            </table>
        </div>
    </div>
</section>
@endsection
@push('js')
    <script>
        $(document).ready(function(){
            $.list_tb = $('#oferts-tb').DataTable({
                processing: true,
                serverSide: true,
                scrollY: "75vh",
                scrollX: true,
                scrollCollapse: true,
                aaSorting: [],
                ajax: {
                    url: 'ofert',
                },
                columns: [
                    { data: 'buttons', name: 'buttons', orderable: false, searchable: false },
                    { data: 'name', name: 'name' },
                    { data: 'percent', name: 'percent' },
                    { data: 'date_ini', name: 'date_ini' },
                    { data: 'date_end', name: 'date_end' },
                    { data: 'active', name: 'active' },
                ],
                initComplete: function () {
                    var table = this.api(); 
                    if (table.rows().data().length === 0) {
                        $(this[0]).closest('.dataTables_scroll').find('.dataTables_scrollHead').addClass('d-none')
                    }
                    else{
                        $(this[0]).closest('.dataTables_scroll').find('.dataTables_scrollHead').removeClass('d-none')
                    }

                    table.on('draw.dt', function () {
                        if (table.rows().data().length === 0) {
                            $(this[0]).closest('.dataTables_scroll').find('.dataTables_scrollHead').addClass('d-none')
                        }
                        else{
                            $(this[0]).closest('.dataTables_scroll').find('.dataTables_scrollHead').removeClass('d-none')
                        }
                    });      
                } ,
                fnDrawCallback: function(oSettings) {
                }, 
            })
        })
    </script>
@endpush

@extends('adminlte::page')

@section('content_header')

@stop

@section('content')

<section class="content">
    <div class="card mt-5">
        <div class="card-header">
            <div class="card-title"><h5>@lang('main.ofert_list')</h5></div>
            <a class="btn btn-success btn-sm float-right" href="{{ route('ofert.create') }}">
                <i class="fas fa-list-alt "> </i> @lang('main.create')
            </a>
        </div>
        <div class="card-body p-0" style="display: block;">
            <table class="table table-striped projects">
                @if($oferts->isNotEmpty())
                    <thead>
                        <tr>
                            <th></th>
                            <th>@lang('main.name') </th>
                            <th>@lang('main.discount_percent')</th>
                            <th>@lang('main.date_begin')</th>
                            <th>@lang('main.date_end')</th>  
                            <th>@lang('main.state')</th>              
                            <th></th>
                        </tr>
                    </thead>
                @endif
                <tbody>
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
        let title = "Estas seguro que desea eliminar la Oferta"
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
        table tr td:first-child{
            width: 1%;        
        }
        table #empty-row div{
            background-color: #b1466da7 !important;
        }
    </style>
@stop
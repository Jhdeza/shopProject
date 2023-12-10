@extends('adminlte::page')

@section('content_header')

@stop

@section('content')

    <section class="content">

        <div class="card mt-5">
            <div class="card-header">
                <div class="card-title"><h4>@lang('main.categories_list')</h4></div>
                <div class="card-tools"><a class="btn btn-success btn-sm " href="{{ route('category.create') }}">
                    <i class="fas fa-list-alt "> </i> @lang('main.create')</a>
                   {{-- s --}}
                    {{-- <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button> --}}
                </div>
            </div>
            <div class="card-body p-0" style="display: block;">
                <table class="table table-striped projects" data-del_message="{{__('main.sure_delete_cat')}}">
                    @if($categories->isNotEmpty())
                        <thead>
                            <tr>
                                <th></th>
                                <th >
                                {{__('main.name')}} 
                                </th>
                                <th class="text-right">
                                </th>
                            </tr>
                        </thead>
                    @endif
                    <tbody>
                        @php
                            $count = 1;
                        @endphp
                        @forelse ($categories as $category)
                            <tr>
                                @if (!$category->parent_id)
                                    <td>{{ $count++ }} </td>
                                @else
                                    <td></td>
                                @endif

                                @if ($category->parent_id)
                                    <td style="padding-left: 35px"> --{{ $category->description }} </td>
                                @else
                                    <td>{{ $category->description }} </td>
                                @endif

                                <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm mr-2  "
                                        href="{{ route('category.edit', $category->id) }}">
                                        <i class="fas fa-pencil-alt mr-1"></i>@lang('main.edit')</a>

                                    <form class="mx-0 d-inline-block "
                                        action="{{ route('category.destroy', $category->id) }}" method="POST">
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
                                    <div class="p-3 m-2">@lang('main.empty_categories')</div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>
    </section>
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

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>
        let title = $('table').data().del_message; 
        $(document).on('click', 'button.delete', function(e) {
            e.preventDefault(); 
            let form = $(this).closest('form')
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

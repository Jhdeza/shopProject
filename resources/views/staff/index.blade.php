@extends('layouts.middle')

@section('content_header')

@stop

@section('content')
    <section class="content">
        <div class="card mt-5">
            <div class="card-header">
                <div class="card-title">
                    <h5>@lang('main.list_team')</h5>
                </div>
                <button class="btn btn-success btn-sm float-right btn-modal" data-toggle="modal" data-target="#modal-generic" data-url="{{ route('staff.create') }}">
                    <i class="fas fa-list-alt "> </i> @lang('main.create')
                </button>
            </div>
            <div class="card-body">
                <table id="staff-tb" class="table table-striped table-list" style="width: 100%">
                    <thead>
                        <tr>
                            <th></th>
                            <th>@lang('main.imagen_staff')</th>
                            <th>@lang('main.name_staff') </th>
                            <th>@lang('main.position')</th>
                            <th>@lang('main.facebook')</th>
                            <th>@lang('main.twitter')</th>
                            <th>@lang('main.instagram')</th>
                            
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

        $.list_tb = $('#staff-tb').DataTable({
            language: Translate,
            processing: true,
            serverSide: true,
            scrollY: "75vh",
            scrollX: true,
            scrollCollapse: true,
            aaSorting: [[2, 'asc']],
            ajax: {
                url: 'staff',
            },
            columns: [
                { data: 'buttons', name: 'buttons', orderable: false, searchable: false },
                { data: 'image', name: 'image', orderable: false, searchable: false },
                { data: 'name', name: 'name' },
                { data: 'position', name: 'position' },
                { data: 'facebook', name: 'facebook' },
                { data: 'Twitter', name: 'Twitter' },
                { data: 'Instagram', name: 'Instagram' },
                

            ],
            initComplete: function () {
                var table = this.api(); 
                if (table.rows().data().length === 0) {
                    $(this).closest('.dataTables_scroll').find('.dataTables_scrollHead').addClass('d-none')
                }
                else{
                    $(this).closest('.dataTables_scroll').find('.dataTables_scrollHead').removeClass('d-none')
                }

                table.on('draw.dt', function () {
                    if (table.rows().data().length === 0) {
                        $(this).closest('.dataTables_scroll').find('.dataTables_scrollHead').addClass('d-none')
                    }
                    else{
                        $(this).closest('.dataTables_scroll').find('.dataTables_scrollHead').removeClass('d-none')
                    }
                });      
            } ,
            fnDrawCallback: function(oSettings) {
            }, 
        })
    })

</script>
@endpush



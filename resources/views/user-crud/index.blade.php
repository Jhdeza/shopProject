@extends('layouts.middle')

@section('content_header')

@stop

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="card">
                <div class="card-header">
                    <h3>{{__('main.User_List')}}</h3>
                </div>
                <div class="card-body">
                    <table class="table table-responsive">
                        <a class= "btn btn-primary mb-1" href="{{ route('my-user.create') }}">{{__('main.Create')}}</a>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                        @foreach ($users as $user)
                            <tr>
                                <td> {{ $loop->index + 1 }}</td>
                                <td> {{ $user->name }}</td>
                                <td> {{ $user->email }}</td>
                                <td><a class="btn btn-primary" href="{{ route('my-user.edit', $user->id) }}"><i
                                            class= "fa fa-edit"></i> {{__('main.Edit')}} </a></td>
                                <td>
                                    <form class="form-delete"
                                        action="{{ route('my-user.destroy', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger " data-user="{{ $user->name }}" type="button"><i
                                                class= "fa fa-trash"></i>
                                                {{__('main.Delete')}}</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>
        $(document).on('click', '.form-delete button', function(e) {
            e.preventDefault();
            let title = "Estas seguro que desea eliminar al usuario " + $(this).data('user')
            let form =$(this).closest('form');
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

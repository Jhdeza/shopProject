@extends('adminlte::page')

@section('content_header')

@stop

@section('content')
    <div class="container">
        <div class="row mt-5 ">
            <div class="col-6">
                <div class="card card-dark ">
                    <div class= "card-header">
                        <h3>@lang('main.contact_information')</h3>
                    </div>
                    <form class="form" method="post" action="{{ route('information.update', $contacts_information->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="card-body">
                            <label class=" col-form-label">Contacto:</label>
                            <div class="form-group row">

                                <input class="form-control " name="name_contact" type="text" placeholder="Name"
                                    value="{{ $contacts_information->name_contact }}">

                            </div>

                            <label class=" col-form-label">Dirección:</label>
                            <div class="form-group row">


                                <input class="form-control" name="address_contacts" type="text"
                                    placeholder="Your Address" value="{{ $contacts_information->address_contacts }}"
                                    required="required">

                            </div>

                            <label class=" col-form-label">Email:</label>
                            <div class="form-group row">


                                <input class="form-control" name="email" type="email" placeholder="Your Email"
                                    value="{{ $contacts_information->email }}" required="required">

                            </div>

                            <label class="c col-form-label">Telefono:</label>
                            <div class="form-group row">

                                <input class="form-control" name="phone_contacts" type="text" placeholder="Your Phone"
                                    value="{{ $contacts_information->phone_contacts }}" required="required">

                            </div>

                            <label class=" col-form-label">Descripción:</label>
                            <div class="form-group message row">

                                <textarea class="form-control" rows="5" name="description" placeholder="About Us">{{ $contacts_information->description }}</textarea>

                            </div>


                            <div class="form-group button row">

                                <input type="button" class="btn btn-primary " value="Editar Información" />

                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>
        $(document).on('click', 'input[type=button]', function(e) {
            e.preventDefault();
            let title = "Estas seguro que desea cambiar la informacion"
             let form =$('form');
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

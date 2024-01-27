@extends('layouts.middle')

@section('content_header')

@stop

@section('content')
    <div class="container">
        <div class="row mt-5 ">
            <div class="col-lg-6 col-12">
                <div class="card card-dark ">
                    <div class= "card-header">
                        <h3>@lang('main.contact_information')</h3>
                    </div>
                    <form  enctype="multipart/form-data" class="form" method="post" action="{{ route('information.update', $contacts_information->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="card-body">
                            <label class=" col-form-label">Contacto:</label>
                            <div class="form-group row">

                                <input class="form-control " name="name_contact" type="text" placeholder="Name"
                                    value="{{ $contacts_information->name_contact }}">
                                    @error('name_contact')
                                    <span style="display: block" class="error invalid-feedback ">
                                        {{$message}}
                                    </span>
                                    @enderror

                            </div>

                            <label class=" col-form-label">Dirección:</label>
                            <div class="form-group row">


                                <input class="form-control" name="address_contacts" type="text"
                                    placeholder="Your Address" value="{{ $contacts_information->address_contacts }}">
                                    @error('address_contacts')
                                    <span style="display: block" class="error invalid-feedback ">
                                        {{$message}}
                                    </span>
                                    @enderror

                            </div>
                           

                            <label class=" col-form-label">Email:</label>
                            <div class="form-group row">


                                <input class="form-control" name="email" type="email" placeholder="Your Email"
                                    value="{{ $contacts_information->email }}" >
                                    @error('email')
                                    <span style="display: block" class="error invalid-feedback ">
                                        {{$message}}
                                    </span>
                                    @enderror
                            </div>

                            <label class="c col-form-label">Telefono:</label>
                            <div class="form-group row">

                                <input class="form-control" name="phone_contacts" type="text" placeholder="Your Phone"
                                    value="{{ $contacts_information->phone_contacts }}">
                                    @error('phone_contacts')
                                    <span style="display: block" class="error invalid-feedback ">
                                        {{$message}}
                                    </span>
                                    @enderror
                            </div>
                            <label class="c col-form-label">Redes Sociales:</label>
                            <div>
                                <div class="form-group row">
                                     <input class="form-control" name="social_facebook" type="text" placeholder="Facebook Link"
                                    value="{{ $contacts_information->social_facebook }}">
                               </div>
                                <div class="form-group row">    
                                    <input class="form-control" name="social_instagram" type="text" placeholder="Instagram Link"
                                    value="{{ $contacts_information->social_instagram }}" >    
                                </div>
                                <div class="form-group row">                                    
                                    <input class="form-control" name="social_twitter" type="text" placeholder="Twitter Link"
                                    value="{{ $contacts_information->social_twitter }}">                                    
                                </div>
                            </div>
                                
                                <label class=" col-form-label">Descripción:</label>
                            <div class="form-group message row">

                                <textarea class="form-control" rows="5" name="description" placeholder="About Us">{{ $contacts_information->description }}</textarea>
                                @error('description')
                                <span style="display: block" class="error invalid-feedback ">
                                    {{$message}}
                                </span>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <div class="form-group">
                                    <x-image :params="[
                                            'type' => 'simple',
                                            'model' => $contacts_information,
                                            'method' => 'imageUrl'
                                        ]"/>
                                </div>
                                
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
@push('js')
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
    <script>

$(document).ready(function() {
                
    $('.file-upload').upload();
            });
    </script>
@endpush

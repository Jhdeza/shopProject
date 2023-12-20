@push('js')

    <script>
        $(document).ready(function() {
            $.modalGeneric = $('#modal-generic')

            $(document).on('click', '.btn-modal', function(e){
                e.stopPropagation();
                e.preventDefault();
                let data = $(this).data()
                let method = data.method??'get'
                $.ajax({
                    url: data.url,
                    method: method,
                    success: function(response){
                        $.modalGeneric.html(response)
                        activatePlugins($.modalGeneric)
                    },
                    error: function(error){

                    }
                })
            })
        })

        $(document).on('click', 'button.delete', function(e) {
            e.preventDefault();
            e.stopPropagation()
            let title = "Estas seguro que desea eliminar el Producto"
            let form = $(this).closest('form');
            new swal({
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

        $(document).on('submit', '.form-generic', function(e){
            e.preventDefault();
            let url = $(this).attr('href')
            let data = $(this).serialize()
            $.ajax({

            })
        })



        activatePlugins = (cont) => {
            if(cont == undefined)
                cont = $('body')

            cont.find("input[data-bootstrap-switch]").each(function() {
                let selected = $(this).is(':checked')
                let data = $(this).data()
                $(this).bootstrapSwitch({
                    'state': selected ,
                    "onText": data.on??'Active',
                    "offText": data.off??'Inactive',
                });
            })

            cont.find('.select2').select2({
                placeholder: 'Select an option',
                dropdownParent: cont
            })

            cont.find('.cont_upload').upload();

            cont.find('form')
                .submit(function(e) {
                    e.preventDefault();
                })
            .validate({
                errorClass: "error invalid-feedback",
                errorPlacement: function(error, element) {
                        // Solo asignar la clase al elemento label
                    if (element.hasClass('select2')) {
                        error.appendTo(element.parent());
                    } else {
                        error.insertAfter(element);
                    }

            },
            /* rules: {
                contact_id: {
                    remote: {
                        url: '/contacts/check-contacts-id',
                        type: 'post',
                        data: {
                            contact_id: function() {
                                return $('#contact_id').val();
                            },
                            hidden_id: function() {
                                if ($('#hidden_id').length) {
                                    return $('#hidden_id').val();
                                } else {
                                    return '';
                                }
                            },
                        },
                    },
                },
            }, */
           /*  messages: {
                contact_id: {
                    remote: LANG.contact_id_already_exists,
                },
            }, */
            submitHandler: function(form) {
                let url = $(form).attr('href')
                let data = $(form).serialize()
                $.ajax({
                    method: $(form).attr('method'),
                    url: url,
                    dataType: 'json',
                    data: $(form).serialize(),
                    beforeSend: function(xhr) {
                        $(form).find('button.btn-outline-success').prop('disabled', true);
                    },
                    success: function(result) {
                        if(result.success){

                        }
                        else{

                        }
                        $(form).find('button.btn-outline-success').prop('disabled', false);
                    },
                    error: function(response){
                        console.log(response)
                        console.log(response.responseJSON.errors)
                        response.responseJSON.errors.forEach(element => {
                            console.log(element)
                        });
                    },
                });
            },
        });

        }

    </script>
@endpush

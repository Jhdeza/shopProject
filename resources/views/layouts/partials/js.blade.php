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

        $('form.form-generic')
        .submit(function(e) {
            e.preventDefault();
        })
        .validate({
            rules: {
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
            },
            messages: {
                contact_id: {
                    remote: LANG.contact_id_already_exists,
                },
            },
            submitHandler: function(form) {
                let url = $(this).attr('href')
                let data = $(this).serialize()
                $.ajax({
                    method: 'POST',
                    url: url,
                    dataType: 'json',
                    data: {
                        contact_id: function() {
                            return $('#hidden_id').val();
                        },
                        mobile_number: function() {
                            return $('#mobile').val();
                        },
                    },
                    beforeSend: function(xhr) {
                        __disable_submit_button($(form).find('button[type="submit"]'));
                    },
                    success: function(result) {
                        if (result.is_mobile_exists == true) {
                            swal({
                                title: LANG.sure,
                                text: result.msg,
                                icon: 'warning',
                                buttons: true,
                                dangerMode: true,
                            }).then(willContinue => {
                                if (willContinue) {
                                    submitQuickAddPurchaseContactForm(form);
                                } else {
                                    $('#mobile').select();
                                }
                            });
                            
                        } else {
                            submitQuickAddPurchaseContactForm(form);
                        }
                    },
                });
            },
        });

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

        }

    </script>
@endpush

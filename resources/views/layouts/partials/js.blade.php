@push('js')

    <script>

        $(document).ready(function() {
            $.modalGeneric = $('#modal-generic')

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

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
                        toastr.error(Config.locales[actLocale].error)
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
            submitHandler: function(form) {
                let url = $(form).attr('action')

                let method = $(form).find('input[name=_method]')?$(form).find('input[name=_method]').val():$(form).attr('method');
                console.log(url, method)
                let params = {
                    method: method??'POST',
                    url: url,
                    dataType: 'json',
                    beforeSend: function(xhr) {
                        $(form).find('button.btn-outline-success').prop('disabled', true);
                    },
                    success: function(result) {
                        if(result.success){
                            if(result.message)
                                toastr.success(result.message);

                        }
                        else{
                            if(result.message)
                                toastr.error(result.message);
                        }
                        $.modalGeneric.modal('hide');
                    },
                    error: function(response){
                        if(response.status = 422){
                            if(response.responseJSON)
                                Object.entries(response.responseJSON.errors).forEach(function([key, value]) {
                                    var errors = {};
                                    errors[key] = value;
                                    $(form).validate().showErrors(errors);
                                });
                            toastr.error(Config.locales[actLocale].error)
                            return ;
                        }
                        toastr.error(Config.locales[actLocale].error)
                    },
                    complete: function(response){
                        $(form).find('button.btn-outline-success').prop('disabled', false);
                        let table = response.table??'list_tb';
                        $[table].ajax.reload()
                    },
                }
                if ($(form).attr('enctype') == 'multipart/form-data'){
                    alert('s');
                    params.data = new FormData(form)
                    params.processData = false
                    params.contentType = false
                }
                else{
                    params.data = $(form).serialize()
                }
                console.log(params)
                $.ajax(params);
            },
        });

        }

    </script>
@endpush

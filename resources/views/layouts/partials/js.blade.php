@push('js')
    <script>
        $(document).ready(function() {
            $.modalGeneric = $('#modal-generic')

            $(document).on('hidden.bs.modal', '#modal-generic', function() {
                $(this).empty()
            })

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '.btn-modal', function(e) {
                e.stopPropagation();
                e.preventDefault();
                let data = $(this).data()
                let method = data.method ?? 'get'
                $.ajax({
                    url: data.url,
                    method: method,
                    success: function(response) {
                        $.modalGeneric.html(response)
                        activatePlugins($.modalGeneric)
                    },
                    error: function(error) {
                        toastr.error(Config.locales[actLocale].error)
                    }
                })
            })
        })

        $(document).on('click', 'button.delete', function(e) {
            e.preventDefault();
            e.stopPropagation()

            let data_table = $($.list_tb.table().node()).data();
            let title = data_table.del_title ?? Config.locales[actLocale].tableDelMessage
            let url = $(this).data().url;


            Swal.fire({
                title: title,
                text: Config.locales[actLocale].tableDelWarningMessage,
                icon: 'warning',
                showCancelButton: true,
                /*  confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33', */
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        method: 'DELETE',
                        success: function(response) {
                            let table = response.table ?? 'list_tb';
                            if (response.success) {
                                if (response.message)
                                    toastr.success(response.message);
                                $[table].ajax.reload()
                            } else toastr.error(response.message)
                        },
                        error: function(error) {
                            toastr.error(Config.locales[actLocale].error)
                        }
                    })
                }
            })
        })

        activatePlugins = (cont) => {
            if (cont == undefined)
                cont = $('body')

            cont.find("input[data-bootstrap-switch]").each(function() {
                let selected = $(this).is(':checked')
                let data = $(this).data()
                $(this).bootstrapSwitch({
                    'state': selected,
                    "onText": data.on ?? 'Active',
                    "offText": data.off ?? 'Inactive',
                });
            })



            cont.find('.select2').select2({
                dropdownParent: cont
            })

            cont.find('.select2-tree').select2({
                templateResult: formatResult,
                escapeMarkup: function(markup) {
                    return markup;
                },
                dropdownParent: cont
            })

            function formatResult(result, container) {
                if ($(result.element).hasClass('sub')) {
                    $(container).addClass('sub');
                } else {
                    $(container).addClass('parent');
                }
                return result.text;
            }

            $(cont).find('.date_range').each(function() {
                let data = $(this).data()
                $(this).daterangepicker({
                    //minDate : moment(),
                    startDate: data.begin ?? moment(),
                    endDate: data.end ?? moment().add(7, 'days'),
                    locale: {
                        format: 'DD/MM/YYYY',
                        //applyLabel: 'Aplicar',
                        //cancelLabel: 'Cancelar',
                        //customRangeLabel: 'Rango personalizado',
                    },
                })
            })

            cont.find('.summernote').summernote({
                height: 200
            });
            $(document).ready(function() {
                $("#name").jFriendly("#slug");
            });
            
            cont.find('.file-upload').upload();

            cont.find('form')
                .submit(function(e) {
                    e.preventDefault();
                })
                .validate({
                    errorClass: "error invalid-feedback",
                    errorPlacement: function(error, element) {
                        if (element.hasClass('select2')) {
                            error.appendTo(element.parent());
                        } else {
                            error.insertAfter(element);
                        }
                    },
                    submitHandler: function(form) {
                        let url = $(form).attr('action')
                        //let method = $(form).find('input[name=_method]').length>0?$(form).find('input[name=_method]').val():$(form).attr('method')
                        let params = {
                            method: 'POST',
                            url: url,
                            dataType: 'json',
                            beforeSend: function(xhr) {
                                $(form).find('button.btn-outline-success').prop('disabled', true);
                            },
                            success: function(result) {
                                if (result.success) {
                                    if (result.message)
                                        toastr.success(result.message);

                                } else {
                                    if (result.message)
                                        toastr.error(result.message);
                                }
                                $.modalGeneric.modal('hide');
                            },
                            error: function(response) {
                                if (response.status = 422) {
                                    if (response.responseJSON)
                                        Object.entries(response.responseJSON.errors).forEach(function([
                                            key, value
                                        ]) {
                                            var errors = {};
                                            errors[key] = value;
                                            $(form).validate().showErrors(errors);
                                        });
                                    toastr.error(Config.locales[actLocale].error)
                                    return;
                                }
                                toastr.error(Config.locales[actLocale].error)
                            },
                            complete: function(response) {
                                $(form).find('button.btn-outline-success').prop('disabled', false);
                                let table = response.table ?? 'list_tb';
                                $[table].ajax.reload()
                            },
                        }
                        if ($(form).find('input[type=file]').length > 0) {
                            params.data = new FormData(form);
                            params.processData = false
                            params.contentType = false
                        } else {
                            params.data = $(form).serialize()
                        }
                        $.ajax(params);
                    },
                });
            
           
        }

        $(document).on('input', '.validate-types', function(e) {
            validate($(this)[0], $(this).data().valType)
        });

        $(document).on('blur', '.check-amount', function(e) {
            if ($(this)[0].value.slice(-1) === '.') {
                $(this)[0].value = $(this)[0].value.slice(0, -1);
            }
        });

        function validate(input, type) {
            let regex = Config.regexs[type];
            if (!regex.test(input.value)) {
                input.value = input.value.slice(0, -1);
            }
        }
    </script>
@endpush

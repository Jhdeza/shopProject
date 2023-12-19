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
                $(this).bootstrapSwitch({
                    'state': selected ,
                    "onText": "Si",
                    "offText": "No",
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

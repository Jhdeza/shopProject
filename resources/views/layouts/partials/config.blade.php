@push('js')

<script>

    const Config = {
        locales : {
            'en' : {
                error : "Something was Wrong!",
                tableDelMessage : "Are you sure?",
                tableDelWarningMessage : "You won't be able to revert this!"
            },
            'es' : {
                error : "Algo ha salido mal!",
                tableDelMessage : "Estás seguro que desea eliminar la fila?",
                tableDelWarningMessage : "No podrá deshacer esta acción"
            }
        },
        regexs : {
            amount : /^\d+(\.\d{0,2})?$/,
            percent : /^0{1}$|^(0\.){1}(\d{1}([1-9]{1})?)?$|^[1-9]\d?(\.\d{0,2})?$|100$/,
            quantity : /^[1-9]{1}[0-9]{0,3}$/,
            quantity_alert : /^[1-9]{1}[0-9]{0,1}$/,
        }
    }

    var actLocale = 'es';

</script>
    
@endpush
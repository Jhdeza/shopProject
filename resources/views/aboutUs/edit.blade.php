@extends('layouts.middle')

@section('content_header')

@stop

@section('content')
    <div class="container">
        <div class="row mt-5 ">
            <div class="col-lg-6 col-12">
                <div class="card card-dark ">
                    <div class= "card-header">
                        <h3>@lang('main.about_us')</h3>
                    </div>
                    <form class="form" method="post" action="
                    @if($about!=null)
                    {{ route('about-us.update', $about->id) }}
                    @else
                    {{ route('about-us.store')}}
                    @endif
                    ">
                        @csrf
                        @if($about!=null)
                        @method('PUT')
                        @endif

                        <div class="card-body">
                            <label class=" col-form-label ">Titulo:</label>
                            <div class="form-group row">

                                <input class="form-control col-xs-12 " name="titulo" type="text" placeholder="Titulo"
                                @if($about!=null) value="{{ $about->titulo }}"
                                @else
                                value=""
                                @endif
                                >

                            </div>

                            <label class=" col-form-label">Extrato:</label>
                            <div class="form-group message row">

                                <textarea class="form-control col-xs-12" rows="5" name="extracto" placeholder="Descripcion empresa">
                                    @if($about!=null)
                                    {{ $about->extracto }}
                                    @else
                                    {{""}}
                                    @endif
                                </textarea>

                            </div>
                            <label class=" col-form-label">Extrato Equipo:</label>
                            <div class="form-group message row">

                                <textarea class="form-control col-xs-12" rows="5" name="extracto_team" placeholder="Descripcion Equipo">
                                    @if($about!=null)
                                    {{ $about->extracto_team }}
                                    @else
                                    {{""}}
                                    @endif
                                </textarea>

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
            let form = $('form');
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

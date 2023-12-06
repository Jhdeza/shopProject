@extends('adminlte::page')

@section('content_header')

@stop

@section('content')
    <div class="container">
        <div class="row mt-5 ">
            <div class="col-6">
                <div class="card card-dark ">
                    <div class= "card-header">
                        <h3>Editar Categoria</h3>
                    </div>
                    <form class="form" method="post" action="{{ route('category.update', $category->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="card-body">
                            <label class=" col-form-label">Descripción:</label>
                            <div class="form-group row">

                                <input class="form-control " name="Categoria" type="text" placeholder="Nombre"
                                    value="{{ $category->description }}">
                                    @error('Categoria')
                                    <span style="display: block" class="error invalid-feedback ">
                                        {{ $message }}
                                    </span>
                                    @enderror
                            </div>

                            
                            <label class="c col-form-label">Categoria:</label>
                            <div class="form-group row">
                                    
                                <select class="form-control" name="parent_id" >

                                    <option value="" selected>All</option>
                                    @foreach($categories as $categ)
                                    <option {{($categ->id == $category->parent_id)?'selected = "selected"':""}} 
                                         value="{{$categ->id}}">{{$categ->description}}</option>
                                    @endforeach
                                </select>

                            </div>

                           

                            <div class="form-group button row">

                                <input type="submit" class="btn btn-primary " value="Editar Categoria" />

                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- @section('js')
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
@endsection --}}

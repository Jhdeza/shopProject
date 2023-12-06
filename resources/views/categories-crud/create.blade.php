@extends('adminlte::page')

@section('content_header')

@stop

@section('content')
    <div class="container">
        <div class="row mt-5 ">
            <div class="col-6">
                <div class="card card-dark ">
                    <div class= "card-header">
                        <h3>Crear Categoria</h3>
                    </div>
                    <form class="form" method="post" action="{{ route('category.store') }}">
                        @csrf
                        

                        <div class="card-body">
                            <label class=" col-form-label">Nombre:</label>
                            <div class="form-group row">

                                <input class="form-control " name="Categoria" type="text" placeholder="Categoria">
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
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->description}}</option>
                                    @endforeach
                                </select>
                                
                            </div>



                            <div class="form-group button row">

                                <input type="submit" class="btn btn-primary " value="Insertar" />

                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

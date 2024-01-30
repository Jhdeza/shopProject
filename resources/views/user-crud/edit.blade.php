@extends('layouts.middle')


    <div class="container">
        <div class="row mt-5 ">
            <div class="col-6">
                <div class="card card-dark ">
                    <div class= "card-header">
                        <h3>Editar Usuario</h3>
                    </div>

                    <form method="POST" class="form-horizontal" action="{{ route('my-user.update', $user->id) }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Email:</label>
                                <div class="col-sm-9">
                                    <input class="form-control " type="text" value="{{ $user->email }}" name="email"
                                        placeholder="Email...">
                                </div>
                                @error('email')
                                    <span style="display: block" class="error invalid-feedback ">
                                        {{$message}}
                                    </span>
                                    @enderror
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" value="{{ $user->name }}" name="name"
                                        placeholder="Nombre...">
                                </div>
                                @error('name')
                                    <span style="display: block" class="error invalid-feedback ">
                                        {{$message}}
                                    </span>
                                    @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-info" type="submit">Cambiar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

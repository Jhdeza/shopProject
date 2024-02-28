@extends('layouts.middle')
@section('content')
    <div class="container">
        <div class="row mt-5 ">
            <div class="col-6">
                <div class="card card-dark ">
                    <div class= "card-header">
                        <h3>{{__('main.AddUser')}}</h3>
                    </div>
                    <form method="POST" class="form-horizontal" action="{{ route('my-user.store') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row mb-0">
                                <label class="col-sm-3 col-form-label pr-0">{{__('main.Email')}}:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="email" placeholder="Email..." >
                                    @error('email')
                                    <span style="display: block" class="error invalid-feedback ">
                                        {{$message}}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group row mb-0">
                                <label class="col-sm-3 col-form-label pr-0">{{__('main.Name')}}:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" placeholder="Nombre...">
                                    @error('name')
                                    <span style="display: block" class="error invalid-feedback ">
                                        {{$message}}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label pr-0">{{__('main.Password')}}:</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                    @error('password')
                                        <span style="display: block" class="error invalid-feedback ">
                                            {{$message}}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <br>
                        <div class="card-footer">
                            <button class="btn btn-info" type="submit">{{__('main.Create')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

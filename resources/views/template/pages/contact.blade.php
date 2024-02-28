@extends('template.template')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">{{ __('main.contactus') }}</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ route('home') }}"><i class="lni lni-home"></i> Home</a></li>
                        <li>{{ __('main.contactus') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section id="contact-us" class="contact-us section">
        <div class="container">
            <div class="contact-head">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h2>{{ __('main.contactus') }}</h2>
                            @foreach ($contacts as $contact)
                                <p>{{ $contact->description }}</p>
                        </div>
                    </div>
                </div>
                <div class="contact-info">
                    <div class="row">
                        <div class="col-lg-4 col-md-12 col-12">
                            <div class="single-info-head">
                                <div class="single-info">
                                    <h3>{{ __('main.callus') }}:</h3>
                                    <div class="d-flex mb-2">
                                        <a href="tel:{{ $commonInfo['contacts']->phone_contacts }}"> <i
                                                class="lni lni-phone"></i></a>
                                        <ul style="margin-left: 10px; margin-top: 5px">
                                            <li>
                                                {{ $contact->phone_contacts }}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="d-flex ">
                                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $commonInfo['contacts']->phone_contacts) }}">
                                            <i class="lni lni-whatsapp"></i> </a>
                                        <ul style="margin-left: 10px; margin-top: 5px">
                                            <li>{{ $contact->phone_contacts }}</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="single-info">
                                    <i class="lni lni-envelope"></i>
                                    <h3>{{ __('main.mailat') }}:</h3>
                                    <ul>
                                        <li><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                                        </li>

                                    </ul>
                                </div>
                                <div class="single-info">
                                    <i class="lni lni-map"></i>
                                    <h3>{{ __('main.address') }}:</h3>
                                    <ul>
                                        <li>{{ $contact->address_contacts }}</li>
                                    </ul>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12 col-12">
                            <div class="contact-form-head">
                                <div class="form-main">
                                    <form class="form" method="post" action="{{ route('client.store') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <input name="name" type="text" placeholder="Nombre"
                                                        value="{{ old('name') }}">
                                                </div>
                                                @error('name')
                                                    <span style="display: block" class="error invalid-feedback ">
                                                        {{ $message }}
                                                    </span>
                                                @enderror

                                            </div>
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <input name="email_address" type="text" placeholder="Email">
                                                </div>
                                                @error('email_address')
                                                    <span style="display: block" class="error invalid-feedback ">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <input name="client_phone" type="text" placeholder="Telefono">
                                                </div>
                                                @error('client_phone')
                                                    <span style="display: block" class="error invalid-feedback ">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group message">
                                                    <textarea name="message" placeholder="Mensaje"></textarea>
                                                </div>
                                                @error('message')
                                                    <span style="display: block" class="error invalid-feedback ">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group button">
                                                    <button type="submit"
                                                        class="btn ">{{ __('main.submitmessage') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

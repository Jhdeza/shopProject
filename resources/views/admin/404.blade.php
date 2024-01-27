
@extends('layouts.middle')

@section('content')

<div class="content-wrapper" style="min-height: 2836.01px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-5">
          <div class="col-sm-6">
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
              <li class="breadcrumb-item active">@lang('main.404page')</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="error-page">
        <h2 class="headline text-warning"> 404</h2>

        <div class="error-content">
          <h3><i class="fas fa-exclamation-triangle text-warning"></i> @lang('main.pagenotfound')</h3>

          <p>
            @lang('main.pageextract')
            <a href="/admin">regresar a la Pagina Principal</a>.
          </p>

          </div>
        <!-- /.error-content -->
      </div>
      @endsection
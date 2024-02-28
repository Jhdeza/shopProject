@extends('template.template')
@section('content')

  <!-- Start Error Area -->
  <div class="error-area">
    <div class="d-table">
      <div class="d-table-cell">
        <div class="container">
          <div class="error-content">
            <h1>404</h1>
            <h2>@lang('main.pagenotfound')</h2>
            <p>@lang('main.pageextract').</p>
            <div class="button">
              <a href="{{ route('home')}}" class="btn">@lang('main.404buttom')</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 @endsection


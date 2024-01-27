@extends('template.template')
@section('content')
    
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">{{__('main.aboutus')}}</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ route('home') }}"><i class="lni lni-home"></i> Home</a></li>
                        <li>{{__('main.aboutus')}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="about-us section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="content-left">
                        <img src="{{asset('template/assets/images/img/proyecto.jpg')}}" alt="foto_front_chapintec">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="content-right">
                        @foreach($abouts as $about)
                        <h2>{{$about->titulo}}</h2>
                        <p>{{$about->extracto}}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="team section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">{{__('main.ourcoreteam')}}</h2>
                        @foreach($abouts as $about)
                        <p class="wow fadeInUp" data-wow-delay=".6s">{{$about->extracto_team}}</p>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row justify-content-center ">
                @foreach($staffs as $staff)
                <div class="col-lg-3 col-md-6 col-12 ">
                    <!-- Start Single Team -->
                    <div class="single-team">
                        <div class="image">
                            @if($staff->image)
                            <img src="{{$staff->image->url}}" alt="#">
                            @else
                            <img src="template/assets/images/img/usuario_general.jpg" alt="#">
                            @endif
                        </div>
                        <div class="content">
                            <div class="info">
                                <h3>{{$staff->name}}</h3>
                                <h5>{{$staff->position}}</h5>                               
                                <ul class="social">
                                    <li><a href={{ $staff->facebook }}><i class="lni lni-facebook-filled"></i></a></li>                                    
                                    <li><a href={{ $staff->Twitter }}><i class="lni lni-twitter-original"></i></a></li>
                                    <li><a href={{ $staff->Instagram }}><i class="lni lni-instagram-original"></i></a></li>
                                </ul>                              
                            </div>
                        </div>
                    </div>                
                </div>
                @endforeach               
                </div>
            </div>
    </section>
    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top">
        <i class="lni lni-chevron-up"></i>
    </a>

    <!-- ========================= JS here ========================= -->
    <script src="{{asset('template/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('template/assets/js/tiny-slider.js')}}"></script>
    <script src="{{asset('template/assets/js/glightbox.min.js')}}"></script>
    <script src="{{asset('template/assets/js/main.js')}}"></script>
    <script type="text/javascript">

        //========= glightbox
        GLightbox({
            'href': 'https://www.youtube.com/watch?v=r44RKWyfcFw&fbclid=IwAR21beSJORalzmzokxDRcGfkZA1AtRTE__l5N4r09HcGS5Y6vOluyouM9EM',
            'type': 'video',
            'source': 'youtube', //vimeo, youtube or local
            'width': 900,
            'autoplayVideos': true,
        });
    </script>
@endsection
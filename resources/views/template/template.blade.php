<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Shop Parts</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.svg" />

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="{{asset('template/assets/css/bootstrap.min.css')}} "/>
    <link rel="stylesheet" href="{{asset('template/assets/css/LineIcons.3.0.css')}} "/>
    <link rel="stylesheet" href="{{asset('template/assets/css/tiny-slider.css')}}" />
    <link rel="stylesheet" href="{{asset('template/assets/css/glightbox.min.css')}}" />
    <link rel="stylesheet" href="{{asset('template/assets/css/main.css')}}" />

</head>

<body>
    <!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- /End Preloader -->

    <!-- Start Header Area -->
    @include('template.partials.navbar')
    <!-- End Header Area -->

    <!-- Start Hero Area -->
   @include('template.partials.slide')
    <!-- End Hero Area -->

    <!-- Start Featured Categories Area -->
    @include('template.partials.categories')
    <!-- End Features Area -->
    
    <!-- Start Trending Product Area -->
    
    @include('template.partials.products')
    <!-- End Trending Product Area -->
    
    <!-- Start Banner Area -->
    
    @include('template.partials.banner')
    <!-- End Banner Area -->
    
    <!-- Start Special Offer -->
    
    @include('template.partials.specialOffer')
    <!-- End Special Offer -->
    
    <!-- Start Home Product List -->
    @include('template.partials.productList')
    
    <!-- End Home Product List -->
    
    <!-- Start Brands Area -->
    
    @include('template.partials.brand')
    <!-- End Brands Area -->
    
    <!-- Start Blog Section Area -->
    
    @include('template.partials.blogsection')
    <!-- End Blog Section Area -->
    
    <!-- Start Shipping Info -->
    
    @include('template.partials.shippinginfo')
    <!-- End Shipping Info -->
    
    <!-- Start Footer Area -->
    
    @include('template.partials.footer')
    <!--/ End Footer Area -->

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
        //========= Hero Slider 
        tns({
            container: '.hero-slider',
            slideBy: 'page',
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 0,
            items: 1,
            nav: false,
            controls: true,
            controlsText: ['<i class="lni lni-chevron-left"></i>', '<i class="lni lni-chevron-right"></i>'],
        });

        //======== Brand Slider
        tns({
            container: '.brands-logo-carousel',
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 15,
            nav: false,
            controls: false,
            responsive: {
                0: {
                    items: 1,
                },
                540: {
                    items: 3,
                },
                768: {
                    items: 5,
                },
                992: {
                    items: 6,
                }
            }
        });

    </script>
    <script>
        const finaleDate = new Date("February 15, 2023 00:00:00").getTime();

        const timer = () => {
            const now = new Date().getTime();
            let diff = finaleDate - now;
            if (diff < 0) {
                document.querySelector('.alert').style.display = 'block';
                document.querySelector('.container').style.display = 'none';
            }

            let days = Math.floor(diff / (1000 * 60 * 60 * 24));
            let hours = Math.floor(diff % (1000 * 60 * 60 * 24) / (1000 * 60 * 60));
            let minutes = Math.floor(diff % (1000 * 60 * 60) / (1000 * 60));
            let seconds = Math.floor(diff % (1000 * 60) / 1000);

            days <= 99 ? days = `0${days}` : days;
            days <= 9 ? days = `00${days}` : days;
            hours <= 9 ? hours = `0${hours}` : hours;
            minutes <= 9 ? minutes = `0${minutes}` : minutes;
            seconds <= 9 ? seconds = `0${seconds}` : seconds;

            document.querySelector('#days').textContent = days;
            document.querySelector('#hours').textContent = hours;
            document.querySelector('#minutes').textContent = minutes;
            document.querySelector('#seconds').textContent = seconds;

        }
        timer();
        setInterval(timer, 1000);
    </script>
</body>

</html>
<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Chapintec | Tu Auto Nuestro Compromiso</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('template/assets/images/icon.png')}}" />
    
    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="{{ asset('template/assets/css/bootstrap.min.css') }} " />
    <link rel="stylesheet" href="{{ asset('template/assets/css/LineIcons.3.0.css') }} " />
    <link rel="stylesheet" href="{{ asset('template/assets/css/tiny-slider.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/assets/css/glightbox.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/assets/css/main.css') }}" />

    <link rel="stylesheet" href="{{ asset('vendor/jquery-ui-1.13.2/jquery-ui.min.css') }}">

</head>

<body>
    

    
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    
    @if (Route::current() && Route::current()->getName() == 'Product-grids' && !Route::current()->hasParameter('slug'))
        
        @include('template.partials.navbargrid')

    @else
        @include('template.partials.navbar')

        
    @endif

    @yield('content')


    <!-- Start Footer Area -->
    @include('template.partials.footer')
    <!--/ End Footer Area -->

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top">
        <i class="lni lni-chevron-up"></i>
    </a>

    <!-- ========================= JS here ========================= -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-ui-1.13.2/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/tiny-slider.js') }}"></script>
    <script src="{{ asset('template/assets/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/main.js') }}"></script>
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




    <script>
        $(document).ready(function() {
            $.input = $('#search');
            $.select = $('#category_id');
            

            $('#searchbtn').on('click', function(e) {
                e.preventDefault();
                orderProduct();
            });
            $('#search').on('input', function() {});

           
            @if (request()->isMethod('post'))
                $('#searchbtn').trigger('click');
            @endif

            $('#sorting').on('change', function() {
                orderProduct();
            });



        });

        function orderProduct() {
            let selectedValue = $.select.val();
            let inputValue = $.input.val();
            let sortValue = $('#sorting').val();

            @php
                $params = [];
                if (isset(Route::current()->parameters['slug'])) {
                    $params['slug'] = Route::current()->parameters['slug'];
                }
                if (isset(Route::current()->parameters['sub_slug'])) {
                    $params['sub_slug'] = Route::current()->parameters['sub_slug'];
                }
            @endphp

            $.ajax({
                method: 'GET',
                url: '{{ route('Product-grids', $params) }}',
                data: {
                    category: selectedValue,
                    filter: inputValue,
                    sort: sortValue,
                },
                dataType: 'json',
                
                    success: function(response) {
                    $('#nav-grid').html(response.grid);
                    $('#nav-list').html(response.list);
                    $('#pagination-info').html(response.pagination_info);
                   
                },
            });
        }






        $(document).on('click', '.pagination a', function(e) {

            e.preventDefault();
            var url = $(this).attr('href');

            $.ajax({
                url: url,
                type: 'GET',
                dataType: "json",
                success: function(response) {

                    $('#nav-grid').html(response.grid);
                    $('#nav-list').html(response.list);
                    $('#pagination').html(response.links);
                    $('#pagination-info').html(response.pagination_info);

                },

            });
        });

        $(document).ready(function() {

            $('.thumbnail').click(function() {
                var thumbnailUrl = $(this).data('image');
                var mainImage = $('#gallery .main-img img');
                $(this).attr('src', mainImage.attr('src')).data('image', mainImage.attr('src'));
                mainImage.attr('src', thumbnailUrl);
            });
        });
    </script>



</body>


</html>

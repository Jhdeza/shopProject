<header class="header navbar-area">
    <div class="header-middle">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-3 col-7">
                    <!-- Start Header Logo -->
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <img src={{ $commonInfo['contacts']->image->url }} alt="Logo">
                    </a>
                </div>
                <div class="col-lg-5 col-md-7 col-xs-3">
                    <!-- Start Main Menu Search -->
                    <div class="main-menu-search">
                        <!-- navbar search start -->
                        <div class="navbar-search search-style-5">
                            <div class="search-select">
                                <div class="select-position">
                                    {!! \App\models\Category::selectHtmlTreeMode($category) !!}
                                </div>
                            </div>
                            <div class="search-input">
                                <input type="text"
                                    @isset($search) value="{{ $search }}" @endisset
                                    id='search' placeholder="">
                            </div>
                            <div class="search-btn">
                                <button id="searchbtn"><i class="lni lni-search-alt"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-2 col-5">
                    <div class="middle-right-area">
                        <div class="nav-hotline">
                            <a href="tel:{{ $commonInfo['contacts']->phone_contacts }}" target="_blank"
                                rel="noopener noreferrer">
                                <i class="lni lni-phone"></i>
                            </a>

                            <h3>LLame Ahora:
                                <span>{{ $commonInfo['contacts']->phone_contacts }}</span>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-6 col-12">
                <div class="nav-inner">

                    <div class="mega-category-menu">
                        <span class="cat-button"><i class="lni lni-menu"></i>{{ __('main.Allcategories') }}</span>
                        <ul class="sub-category">
                            @foreach ($commonInfo['categories'] as $category)
                                <li><a
                                        href="{{ route('Product-grids', ['slug' => $category->slug, 'sub_slug' => null]) }}">
                                        {{ $category->name }}

                                        @if ($category->subcategories->isNotEmpty())
                                            <i class="lni lni-chevron-right"></i>
                                        @endif
                                    </a>
                                    @if ($category->subcategories->isNotEmpty())
                                        <ul class="inner-sub-category">
                                            @foreach ($category->subcategories as $sub)
                                                <li><a
                                                        href="{{ route('Product-grids', ['slug' => $category->slug, 'sub_slug' => $sub->slug]) }}">
                                                        {{ $sub->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ms-auto">
                                <li class="nav-item  ">
                                    <a href="{{ route('home') }}" class="{{ request()->is('home') ? 'active' : '' }}"
                                        aria-label="Toggle navigation">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('Product-grids') }}"
                                        class="{{ request()->is('productGrid') ? 'active' : '' }}"
                                        aria-label="Toggle navigation">{{ __('main.productgrid') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('contact-us') }}"
                                        class="{{ request()->is('contact-us') ? 'active' : '' }}"
                                        aria-label="Toggle navigation">{{ __('main.contactus') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('about-us') }}"
                                        class="{{ request()->is('about-us') ? 'active' : '' }}"
                                        aria-label="Toggle navigation">{{ __('main.aboutus') }}</a>
                                </li>

                            </ul>
                        </div>
                    </nav>

                </div>
            </div>
            <div class="col-lg-5 col-md-6 col-12">
                @if (
                    $commonInfo['contacts']->social_facebook ||
                        $commonInfo['contacts']->social_twitter ||
                        $commonInfo['contacts']->social_instagram)
                    <div class="nav-social">
                        <h5 class="title">{{ __('main.follow_us_on') }}:</h5>
                        <ul>

                            <li>
                                <a href={{ $commonInfo['contacts']->social_facebook }}><i
                                        class="lni lni-facebook-filled"></i></a>
                            </li>

                            <li>
                                <a href={{ $commonInfo['contacts']->social_twitter }}><i
                                        class="lni lni-twitter-original"></i></a>
                            </li>
                            <li>
                                <a href={{ $commonInfo['contacts']->social_instagram }}><i
                                        class="lni lni-instagram-original"></i></a>
                            </li>

                        </ul>
                    </div>
                @endif

            </div>
        </div>
    </div>

</header>

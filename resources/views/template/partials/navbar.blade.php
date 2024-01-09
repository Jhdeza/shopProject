<header class="header navbar-area">
    <!-- Start Topbar -->
    <!-- <div class="topbar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="top-left">
                        <ul class="menu-top-link">
                            <li>
                                <div class="select-position">
                                    <select id="select4">
                                        <option value="0" selected>$ USD</option>
                                        <option value="1">€ EURO</option>
                                        <option value="2">$ CAD</option>
                                        <option value="3">₹ INR</option>
                                        <option value="4">¥ CNY</option>
                                        <option value="5">৳ BDT</option>
                                    </select>
                                </div>
                            </li>
                            <li>
                                <div class="select-position">
                                    <select id="select5">
                                        <option value="0" selected>English</option>
                                        <option value="1">Español</option>
                                        <option value="2">Filipino</option>
                                        <option value="3">Français</option>
                                        <option value="4">العربية</option>
                                        <option value="5">हिन्दी</option>
                                        <option value="6">বাংলা</option>
                                    </select>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="top-middle">
                        <ul class="useful-links">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="about-us.html">About Us</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="top-end">
                        <div class="user">
                            <i class="lni lni-user"></i>
                            Hello
                        </div>
                        <ul class="user-login">
                            <li>
                                <a href="login.html">Sign In</a>
                            </li>
                            <li>
                                <a href="register.html">Register</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- End Topbar -->
    <!-- Start Header Middle -->
    <div class="header-middle">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-3 col-7">
                    <!-- Start Header Logo -->
                    <a class="navbar-brand" href="index.html">
                        <img src="assets/images/logo/logo.svg" alt="Logo">
                    </a>
                    <!-- End Header Logo -->
                </div>
                <div class="col-lg-5 col-md-7 col-xs-3">
                    <!-- Start Main Menu Search -->
                    <div class="main-menu-search">
                        <!-- navbar search start -->
                        <div class="navbar-search search-style-5">
                            <div class="search-select">
                                <div class="select-position">
                                    {!! \App\models\Category::selectHtmlTreeMode() !!}
                                    {{-- <select id="select1">
                                        <option selected>All</option>

                                        @foreach ($commonInfo['categories'] as $category)
                                       <option value="{{ $category->id }} ">{{ $category->name }}</option>

                                        @endforeach
                                        
                                    </select> --}}
                                </div>
                            </div>
                            <div class="search-input">
                                <input type="text" id='search' placeholder="">
                            </div>
                            <div class="search-btn">
                                <button id="searchbtn"><i class="lni lni-search-alt"></i></button>
                            </div>
                        </div>
                        <!-- navbar search Ends -->
                    </div>
                    <!-- End Main Menu Search -->
                </div>
                <div class="col-lg-4 col-md-2 col-5">
                    <div class="middle-right-area">
                        <div class="nav-hotline"> 
                            <i class="lni lni-phone"></i>
                             
                            <h3>LLame Ahora:
                                <span>{{$commonInfo['contacts']->phone_contacts}}</span>
                            </h3> 
                         
                        </div> 
                        {{-- <div class="navbar-cart">
                            <div class="wishlist">
                                <a href="javascript:void(0)">
                                    <i class="lni lni-heart"></i>
                                    <span class="total-items">0</span>
                                </a>
                            </div>
                            <div class="cart-items"> -->
                                <a href="javascript:void(0)" class="main-btn">
                                    <i class="lni lni-cart"></i>
                                    <span class="total-items">2</span>
                                </a> -->
                                Shopping Item -->
                                <div class="shopping-item">
                                    <div class="dropdown-cart-header">
                                        <span>2 Items</span>
                                        <a href="cart.html">View Cart</a>
                                    </div>
                                    <ul class="shopping-list">
                                        <li>
                                            <a href="javascript:void(0)" class="remove" title="Remove this item"><i
                                                    class="lni lni-close"></i></a>
                                            <div class="cart-img-head">
                                                <a class="cart-img" href="product-details.html"><img
                                                        src="assets/images/header/cart-items/item1.jpg"
                                                        alt="#"></a>
                                            </div>

                                            <div class="content">
                                                <h4><a href="product-details.html">
                                                        Apple Watch Series 6</a></h4>
                                                <p class="quantity">1x - <span class="amount">$99.00</span></p>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)" class="remove" title="Remove this item"><i
                                                    class="lni lni-close"></i></a>
                                            <div class="cart-img-head">
                                                <a class="cart-img" href="product-details.html"><img
                                                        src="assets/images/header/cart-items/item2.jpg"
                                                        alt="#"></a>
                                            </div>
                                            <div class="content">
                                                <h4><a href="product-details.html">Wi-Fi Smart Camera</a></h4>
                                                <p class="quantity">1x - <span class="amount">$35.00</span></p>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="bottom">
                                        <div class="total">
                                            <span>Total</span>
                                            <span class="total-amount">$134.00</span>
                                        </div>
                                        <div class="button">
                                            <a href="checkout.html" class="btn animate">Checkout</a>
                                        </div>
                                    </div>
                                </div> -->
                                <!--/ End Shopping Item -->
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Middle -->
    <!-- Start Header Bottom -->
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 col-md-6 col-12">
                <div class="nav-inner">
                    <!-- Start Mega Category Menu -->
                    <div class="mega-category-menu">
                        <span class="cat-button"><i class="lni lni-menu"></i>All Categories</span>
                        <ul class="sub-category">
                            @foreach ($commonInfo['categories'] as $category)
                                <li><a
                                        href="{{ route('Product-grids', ['slug' => $category->slug, 'sub_slug' => null]) }}">{{ $category->name }}
                                        @if ($category->subcategories->isNotEmpty())
                                            <i class="lni lni-chevron-right"></i>
                                        @endif
                                    </a>
                                    @if ($category->subcategories->isNotEmpty())
                                        <ul class="inner-sub-category">
                                            @foreach ($category->subcategories as $sub)
                                                <li><a
                                                        href="{{ route('Product-grids', ['slug' => $category->slug, 'sub_slug' => $sub->slug]) }}">{{ $sub->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- End Mega Category Menu -->
                    <!-- Start Navbar -->
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
                                        aria-label="Toggle navigation">Products</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('contact-us') }}"
                                        class="{{ request()->is('contact-us') ? 'active' : '' }}"
                                        aria-label="Toggle navigation">Contact Us</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('about-us') }}"
                                        class="{{ request()->is('about-us') ? 'active' : '' }}"
                                        aria-label="Toggle navigation">About Us</a>
                                </li>

                            </ul>
                        </div> <!-- navbar collapse -->
                    </nav>
                    <!-- End Navbar -->
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Nav Social -->
                <div class="nav-social">
                    <h5 class="title">Follow Us:</h5>
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
                        {{-- <li>
                            <a href="javascript:void(0)"><i class="lni lni-skype"></i></a>
                        </li> --}}
                    </ul>
                </div>
                <!-- End Nav Social -->
            </div>
        </div>
    </div>
    <!-- End Header Bottom -->
</header>

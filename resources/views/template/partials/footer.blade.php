<footer class="footer">
    <div class="footer-middle">
        <div class="container">
            <div class="bottom-inner">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6 col-12">

                        <div class="single-footer f-contact">
                            <h3>{{ __('main.touch_with_us') }}:</h3>
                            <p class="phone">{{ __('main.phone') }}:
                            <p> {{ $commonInfo['contacts']->phone_contacts }}</p>
                            </p>
                            <ul>
                                <li><span> {{ __('main.MondayFriday') }}</span>{{ __('main.horaLV') }}</li>
                                <li><span> {{ __('main.Saturday') }}</span> {{ __('main.horaS') }}</li>
                            </ul>
                            <p class="mail">
                                <a
                                    href="mailto:{{ $commonInfo['contacts']->email }}">{{ $commonInfo['contacts']->email }}</a>
                            </p>
                        </div>

                    </div>

                    <div class="col-lg-5 col-md-6 col-12">

                        <div class="single-footer f-link">
                            <h3>{{ __('main.information') }}:</h3>
                            <ul>
                                <li><a href="{{ route('about-us') }}">{{ __('main.aboutus') }}</a></li>
                                <li><a href="{{ route('contact-us') }}">{{ __('main.contactus') }}</a></li>

                            </ul>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="inner-content">
                <div class="row align-items-center">

                    <div class="col-lg-6 col-12">
                        <div class="copyright">
                            <p>@lang('main.copyright')<a href="" rel="nofollow"
                                    target="_blank"></a></p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        @if (
                            $commonInfo['contacts']->social_facebook ||
                                $commonInfo['contacts']->social_twitter ||
                                $commonInfo['contacts']->social_instagram)
                            <ul class="socila">
                                <li>
                                    <span>{{ __('main.follow_us_on') }}:</span>
                                </li>
                                @if ($commonInfo['contacts']->social_facebook)
                                    <li><a href="{{ $commonInfo['contacts']->social_facebook }}"><i
                                                class="lni lni-facebook-filled"></i></a></li>
                                @endif
                                @if ($commonInfo['contacts']->social_twitter)
                                    <li><a href="{{ $commonInfo['contacts']->social_twitter }}"><i
                                                class="lni lni-twitter-original"></i></a></li>
                                @endif
                                @if ($commonInfo['contacts']->social_instagram)
                                    <li><a href="{{ $commonInfo['contacts']->social_instagram }}"><i
                                                class="lni lni-instagram"></i></a></li>
                                @endif

                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</footer>

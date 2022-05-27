


    <!-- Footer Section -->
{{--<footer>--}}
{{--    <div class="container">--}}
{{--        <div class="footer-top pt-80 pb-4">--}}
{{--            <div class="logo footer-logo">--}}
{{--                <a href="{{ route('home') }}">--}}
{{--                    <img src="" alt="@lang('logo')">--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <div class="footer__txt">--}}
{{--                <p>--}}
{{--                    {{ __(@$footer->data_values->text) }}--}}
{{--                </p>--}}
{{--            </div>--}}
{{--            <ul class="footer-links">--}}
{{--                <li>--}}
{{--                    <a href="{{ route('home') }}">@lang('Home')</a>--}}
{{--                </li>--}}
{{--                @foreach ($allPolicy as $singlePolicy)--}}
{{--                    <li>--}}
{{--                        <a href="{{ route('policy.page', ['slug'=>slug($singlePolicy->data_values->title), 'id'=>$singlePolicy->id]) }}" target="_blank">--}}
{{--                            {{ __($singlePolicy->data_values->title) }}--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                @endforeach--}}
{{--                <li>--}}
{{--                    <a href="{{ route('contact') }}">@lang('Contact')</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--        <div class="footer-bottom d-flex flex-wrap-reverse justify-content-between align-items-center py-3">--}}
{{--            <div class="copyright">--}}
{{--                {{ __(@$footer->data_values->copy_right_text) }}--}}
{{--            </div>--}}
{{--            <ul class="social-icons">--}}

{{--                @foreach($socialIcons as $icon)--}}
{{--                    <li>--}}
{{--                        <a href="{{ $icon->data_values->url }}" target="_blank">--}}
{{--                            @php--}}
{{--                                echo $icon->data_values->social_icon;--}}
{{--                            @endphp--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                @endforeach--}}

{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</footer>--}}
<!-- Footer Section -->
    @php
        $footer = getContent('footer.content', true);
    @endphp

    @php($gs = \App\Models\GeneralSetting::find(1))
<footer class="footer-section ptb-80 bg_img" data-background="{{asset('assets/frontend')}}/images/bg.jpg">
    <div class="container">
        <div class="footer-inner">
            <div class="row justify-content-center">
                <div class="col-xl-10 text-center">
                    <div class="footer-widget">
                        <div class="footer-logo mb-20">
                            <a class="site-logo" href="index.html">
                                <!-- <h3><span class="text--base">Moco</span>Card</h3> -->
                                <img src="{{asset('assets/frontend')}}/images/logo.png" alt="ligo">
                            </a>
                        </div>
                        @php($allPolicy = getContent('policy_pages.element'))
{{--                        {{dd($allPolicy)}}--}}
                        <ul class="footer-links">
                            @foreach ($allPolicy as $singlePolicy)
                                <li>
                                    <a href="{{ route('policy.page', ['slug'=>slug($singlePolicy->data_values->title), 'id'=>$singlePolicy->id]) }}" target="_blank">
                                        {{ __($singlePolicy->data_values->title) }}
                                    </a>
                                </li>
                            @endforeach
{{--                            <li><a href="#0">Privacy Policy</a></li>--}}
{{--                            <li><a href="#0">Terms & Conditions</a></li>--}}
{{--                            <li><a href="#0">Licenses & Complaints</a></li>--}}
                        </ul>
                        @php(        $socialMedias = getContent('social_icon.element')
 )
                        <div class="social-area">
                            <ul class="footer-social">
                                @foreach($socialMedias as $media)
                                    <li>
                                        <a href="{{ $media->data_values->url }}" class="mt-2" target="_blank">
                                            {!! $media->data_values->social_icon !!}


                                        </a>
                                    </li>
                                @endforeach

{{--                                <li><a href="#0" class="active"><i class="fab fa-twitter"></i></a></li>--}}
{{--                                <li><a href="#0"><i class="fab fa-instagram"></i></a></li>--}}
{{--                                <li><a href="#0"><i class="fab fa-linkedin-in"></i></a></li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="copyright-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12 text-center">
                <div class="copyright">
                    <p>Copyright © <a href="{{url('/')}}" class="text--base fw-bold">{{$gs->sitename}}</a> 2022 All Rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
</div>

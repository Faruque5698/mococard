@extends('frontend.master')

@section('title')
About
@endsection

@section('content')

    
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Banner
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <section class="banner-section contact-us-section">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-xl-12 text-center">
                    <div class="banner-content" data-aos="fade-up" data-aos-duration="1800">
                        <h1 class="title">About Us</h1>
                        <div class="breadcrumb-area">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">About Us</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        End Banner
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    @php
        $about = getContent('about.content', true);
    @endphp
        <!-- About Section -->
{{--    <section class="about-section overlay-hidden">--}}
{{--        <div class="container">--}}
{{--            <div class="row flex-wrap-reverse justify-content-between align-items-center">--}}
{{--                <div class="col-lg-7 col-xl-6 align-self-end">--}}
{{--                    <div class="about-thumb">--}}
{{--                        <img src="" alt="@lang('about')">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-5">--}}
{{--                    <div class="pt-max-lg-0 pb-max-lg-50 pt-60 pb-120">--}}
{{--                        <div class="section__header mb-low">--}}
{{--                            <span class="section__category">{{ __(@$about->data_values->title) }}</span>--}}
{{--                            <h3 class="section__title"></h3>--}}
{{--                            <p class="mb-4">--}}
{{--                                --}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                        <a href="{{ @$about->data_values->button_link }}" class="cmn--btn">--}}
{{--                            {{ __(@$about->data_values->button_text) }}--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <!-- About Section -->

    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Start about
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <section class="about-section pt-120">
        <div class="container">
            <div class="row justify-content-center align-items-center mb-30-none">
                <div class="col-xl-6 col-lg-6 mb-30">
                    <div class="about-thumb2">
                        <img src="{{ getImage('assets/images/frontend/about/' .@$about->data_values->image, '985x700') }}" alt="card">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 mb-30">
                    <div class="about-content">
                        <h1 class="title">
                            {{ __(@$about->data_values->heading) }}
                        </h1>
                        <p>{{ __(@$about->data_values->description) }}
                        </p>
                    </div>
                    <div class="about-btn pt-30">
                        <a class="btn--base"data-bs-toggle="modal" data-bs-target="#exampleModal">Download Now <i class="las la-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        End ABOUT
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
            Start Modal
        ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Download Now...!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @php($gs = \App\Models\GeneralSetting::find(1))
                    <div class="modal-badge d-flex">
                        <a href="{!! $gs->playstore_link !!}" class="download-google-badge">
                            <img src="{{asset('assets/frontend')}}/images/google-play-badge.png" alt="Playstore">
                        </a>
                        <a href="{!! $gs->applestore_link !!}" class="download-apple-badge">
                            <img src="{{asset('assets/frontend')}}/images/app-store-badge.png" alt="Appstore">
                        </a>
                    </div>
                </div>
                <div class="modal-footer me-auto">
                    <p>Make Your Payment Easier.</p>
                </div>
            </div>
        </div>
    </div>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Start Scroll-To-Top
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <a href="#" class="scrollToTop">
        <i class="las la-dot-circle"></i>
        <span>Top</span>
    </a>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        End Scroll-To-Top
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Start Modal
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Download Now...!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-badge d-flex">
                        <a href="https://play.google.com/store/apps" class="download-google-badge">
                            <img src="{{asset('assets/frontend')}}/images/google-play-badge.png" alt="Playstore">
                        </a>
                        <a href="https://apps.apple.com/us/app/apple-store/id375380948?see-all=developer-other-apps" class="download-apple-badge">
                            <img src="{{asset('assets/frontend')}}/images/app-store-badge.png" alt="Appstore">
                        </a>
                    </div>
                </div>
                <div class="modal-footer me-auto">
                    <p>Make Your Payment Easier.</p>
                </div>
            </div>
        </div>
    </div>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        End Modal
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Start Brand
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<!--    <div class="brand-section ptb-100">-->
<!--    <div class="container">-->
<!--        <div class="row justify-content-center">-->
<!--            <div class="col-xl-10 col-md-12">-->
<!--                <div class="brand-wrapper">-->
<!--                    <div class="swiper-wrapper">-->
<!--                         @php($brands = \App\Models\Brand::all() )-->
<!--                        @foreach($brands as $brand)-->
<!--                        <div class="swiper-slide swiper-slide-2">-->
<!--                            <div class="brand-thumb-item">-->
<!--                                <img src="{{asset($brand->logo)}}" alt="brand">-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        @endforeach-->
                        
<!--                    </div>-->
<!--                    <div class="slider-prev">-->
<!--                        <i class="las la-arrow-left"></i>-->
<!--                    </div>-->
<!--                    <div class="slider-next">-->
<!--                        <i class="las la-arrow-right"></i>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--@include('frontend.includes.slider')-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        End Brand
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Start How it works
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <section class="how-it-works-section ptb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 text-center">
                    <div class="section-header">
                        <h2 class="section-title">How Mococard <span>Works?</span></h2>
                        <p>Why Softmine invest is the best choice for investment as compared to others</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mb-30-none">
                <div class="col-xl-3 col-lg-4 col-md-6 mb-30">
                    <div class="how-it-works-item">
                        <div class="how-it-works-thumb">
                            <div class="thumb">1</div>
                        </div>
                        <div class="how-it-works-content">
                            <h3 class="title">Create An Account</h3>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 mb-30">
                    <div class="how-it-works-item">
                        <div class="how-it-works-thumb">
                            <div class="thumb">2</div>
                        </div>
                        <div class="how-it-works-content">
                            <h3 class="title">Choose Plans</h3>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 mb-30">
                    <div class="how-it-works-item">
                        <div class="how-it-works-thumb">
                            <div class="thumb">3</div>
                        </div>
                        <div class="how-it-works-content">
                            <h3 class="title">Get Virtual Card</h3>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 mb-30">
                    <div class="how-it-works-item">
                        <div class="how-it-works-thumb">
                            <div class="thumb">4</div>
                        </div>
                        <div class="how-it-works-content">
                            <h3 class="title">Enjoy & Shopping</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        End How it works
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
@endsection


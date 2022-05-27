@extends('frontend.master')

@section('title')
{{$pageTitle}}
@endsection

@php
$gs = \App\Models\GeneralSetting::find(1);
$banner = \App\Models\Banner::find(1);
@endphp
@section('content')
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Banner
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <section class="banner-section" id="download-app">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 mb-30">
                    <div class="banner-content wow fade-in-left" data-wow-duration="1s" data-wow-delay="1s">
                        <h1 class="cd-headline title loading-bar">
                            <span>Get Your Own</span>
                            <span class="cd-words-wrapper">
                            <b class="is-visible">Virtual</b>
                            <b>Prepaid</b>
                        </span>
                            <span>Credit <span class="g-color">Card!</span></span>
                        </h1>
                        <p>{{$banner->description}}</p>
                        <div class="banner-badge d-flex flex-wrap">
                            <a href="{!! $gs->playstore_link !!}" class="download-google-badge">
                                <img src="{{asset('assets/frontend')}}/images/google-play-badge.png" alt="Playstore">
                            </a>
                            <a href="{!! $gs->applestore_link !!}" class="download-apple-badge">
                                <img src="{{asset('assets/frontend')}}/images/app-store-badge.png" alt="Appstore">
                            </a>
                        </div>
{{--                        <a href="{{route('about_us')}}" class="active-btn">Who We Are <i class="las la-long-arrow-alt-right"></i></a>--}}
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 mb-30">
                    <div class="banner-thumb"><img src="{{asset($banner->image)}}" alt="thumb"></div>
                </div>
            </div>
        </div>
    </section>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        End Banner
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


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
    Start Brand
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div class="brand-section ptb-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-md-12">
                <div class="brand-wrapper">
                    <div class="swiper-wrapper">
                         @php($brands = \App\Models\Brand::all() )
                        @foreach($brands as $brand)
                        <div class="swiper-slide swiper-slide-2">
                            <div class="brand-thumb-item">
                                <img src="{{asset($brand->logo)}}" alt="brand">
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                    <div class="slider-prev">
                        <i class="las la-arrow-left"></i>
                    </div>
                    <div class="slider-next">
                        <i class="las la-arrow-right"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Brand
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
 
   


    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Start Card
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <section class="card-section pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card-content">
                        <span class="sub-title">Easy To Use And hustle Free.</span>
                        <h2 class="title">Stay in Control over your cards and transactions</h2>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto debitis officiis incidunt ratione. A blanditiis rem nam assumenda? Voluptas suscipit architecto sapiente facilis.</p>
                        <div class="card-widget-area">
                            <div class="card-widget d-flex flex-wrap mb-30">
                                <div class="card-ietm">
                                    <i class="lab la-chrome"></i>
                                    <span>Browser Fast</span>
                                </div>
                                <div class="card-ietm">
                                    <i class="las la-cloud-download-alt"></i>
                                    <span> Cloud Download</span>
                                </div>
                            </div>
                            <div class="card-widget d-flex flex-wrap">
                                <div class="card-ietm">
                                    <i class="las la-history"></i>
                                    <span>transactions</span>
                                </div>
                                <div class="card-ietm">
                                    <i class="las la-mobile"></i>
                                    <span> Mobile Download</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-5 col-mb-6">
                    <div class="card-thumb">
                        <img src="assets/images/cards.png" alt="card">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        End Card
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Start about
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

    @php($about = \App\Models\About::find(1))
    @php($users = count(\App\Models\User::all()))
    @php($cards = count(\App\Models\Card::all()))

    <section class="about-section pb-120">
        <div class="container">
            <div class="row justify-content-center mb-30-none">
                <div class="col-xl-6 col-lg-6 col-md-8 mb-30">
                    <div class="about-thumb">
                        <img src="{{asset($about->image)}}" alt="card">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 mb-30">
                    <div class="about-content">
                        <h1 class="title">
                            Now enjoy control shopping experience <span>Here.</span>
                        </h1>
                        <p>
                            {{$about->description}}
                        </p>
                    </div>
                    <div class="about-feature-area d-flex">
                        <div class="feature-card active">
                            <div class="card-icon"><i class="las la-credit-card"></i></div>
                            <div class="content">
                                <div class="card-value">{{$cards}} <span>+</span></div>
                                <p>Credit Appliedt</p>
                            </div>
                        </div>
                        <div class="feature-card">
                            <div class="card-icon"><i class="las la-mobile"></i></div>
                            <div class="content">
                                <div class="card-value">{{$users}} <span>+</span></div>
                                <p>Active User</p>
                            </div>
                        </div>
                    </div>
                    <div class="about-btn">
                        <a class="btn--base" data-bs-toggle="modal" data-bs-target="#exampleModal">Let's Download <i class="las la-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        End ABOUT
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Start About Payment
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div class="payment-section ptb-80">
        <div class="payment-thumb">
            <img src="{{asset('assets/frontend')}}/images/feature.png" alt="payment-img">
        </div>
        <div class="container">
            <div class="row justify-content-end align-items-center">
                <div class="col-lg-6">
                    <div class="payment-content">
                        <h2 class="title">Creating Payment Channel In Global Market !!</h2>
                        <p>“Mococard” is stored on your phone and can be used to pay contactless in stores or online, but has its own unique card number, expiry date, and CVC.</p>
                        <div class="payment-btn">
                            <a class="btn--base" data-bs-toggle="modal" data-bs-target="#exampleModal">Let's Download <i class="las la-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        End About Payment
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

@php($plans = \App\Models\Plan::where('status','=',1)->get())
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Start Plan
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
{{--    <section class="plan-section pt-120">--}}
{{--        <div class="container">--}}
{{--            <div class="row justify-content-center">--}}
{{--                <div class="col-xl-7 text-center">--}}
{{--                    <div class="section-header">--}}
{{--                        <h2 class="section-title">Check Our <span>Packages</span></h2>--}}
{{--                        <p>Lets Download The Application And Get This plan Available For All Android & Ios Users And It's Completely Free To Download..!</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row justify-content-center align-items-center mb-30-none">--}}
{{--                @foreach($plans as $plan)--}}
{{--                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-30">--}}
{{--                    <div class="plan-item">--}}
{{--                        <div class="plan-title">--}}
{{--                            <h5 class="title">{{$plan->name}}</h5>--}}
{{--                        </div>--}}
{{--                        <div class="plan-header">--}}
{{--                            <div class="rates">--}}
{{--                                <span class="price">${{$plan->card_issuance_fee}}</span>--}}
{{--                                <span class="user">Duration after 48 Hours</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="plan-body">--}}
{{--                            <ul class="plan-list">--}}
{{--                                <li class="check"><i class="fa fa-arrow-circle-right"></i> Minimum Deposit: <span>${{$plan->min_load}}</span></li>--}}
{{--                                <li class="check"><i class="fa fa-arrow-circle-right"></i> Maximum Deposit: <span>${{$plan->max_load}}</span></li>--}}
{{--                                <li class="check"><i class="fa fa-arrow-circle-right"></i> Card Load Fee: <span>${{$plan->card_load_fee}}+{{$plan->card_load_fee_percentage}}%</span></li>--}}
{{--                                <li class="check"><i class="fa fa-arrow-circle-right"></i> Deposit Included: <span>YES</span></li>--}}
{{--                                <li class="check"><i class="fa fa-arrow-circle-right"></i> Validity: <span>4 year</span></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="plan-footer">--}}
{{--                            <div class="plan-btn">--}}
{{--                                <a class="btn--base" data-bs-toggle="modal" data-bs-target="#exampleModal">Get This Plan</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                @endforeach--}}
{{--                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-30">--}}
{{--                    <div class="plan-item active">--}}
{{--                        <div class="plan-title">--}}
{{--                            <h5 class="title">Flat</h5>--}}
{{--                        </div>--}}
{{--                        <div class="plan-header">--}}
{{--                            <div class="rates">--}}
{{--                                <span class="price">53%</span>--}}
{{--                                <span class="user">Duration after 48 Hours</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="plan-body">--}}
{{--                            <ul class="plan-list">--}}
{{--                                <li class="check"><i class="fa fa-arrow-circle-right"></i> Minimum Deposit: <span>$60.00</span></li>--}}
{{--                                <li class="check"><i class="fa fa-arrow-circle-right"></i> Maximum Deposit: <span>$60.00</span></li>--}}
{{--                                <li class="check"><i class="fa fa-arrow-circle-right"></i> Deposit Included: <span>YES</span></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="plan-footer">--}}
{{--                            <div class="plan-btn">--}}
{{--                                <a class="btn--base" data-bs-toggle="modal" data-bs-target="#exampleModal">Get This Plan</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-30">--}}
{{--                    <div class="plan-item">--}}
{{--                        <div class="plan-title">--}}
{{--                            <h5 class="title">Value</h5>--}}
{{--                        </div>--}}
{{--                        <div class="plan-header">--}}
{{--                            <div class="rates">--}}
{{--                                <span class="price">65%</span>--}}
{{--                                <span class="user">Duration after 48 Hours</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="plan-body">--}}
{{--                            <ul class="plan-list">--}}
{{--                                <li class="check"><i class="fa fa-arrow-circle-right"></i> Minimum Deposit: <span>$60.00</span></li>--}}
{{--                                <li class="check"><i class="fa fa-arrow-circle-right"></i> Maximum Deposit: <span>$60.00</span></li>--}}
{{--                                <li class="check"><i class="fa fa-arrow-circle-right"></i> Deposit Included: <span>YES</span></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="plan-footer">--}}
{{--                            <div class="plan-btn">--}}
{{--                                <a class="btn--base" data-bs-toggle="modal" data-bs-target="#exampleModal">Get This Plan</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-30">--}}
{{--                    <div class="plan-item">--}}
{{--                        <div class="plan-title">--}}
{{--                            <h5 class="title">Platinum</h5>--}}
{{--                        </div>--}}
{{--                        <div class="plan-header">--}}
{{--                            <div class="rates">--}}
{{--                                <span class="price">98%</span>--}}
{{--                                <span class="user">Duration after 48 Hours</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="plan-body">--}}
{{--                            <ul class="plan-list">--}}
{{--                                <li class="check"><i class="fa fa-arrow-circle-right"></i> Minimum Deposit: <span>$60.00</span></li>--}}
{{--                                <li class="check"><i class="fa fa-arrow-circle-right"></i> Maximum Deposit: <span>$60.00</span></li>--}}
{{--                                <li class="check"><i class="fa fa-arrow-circle-right"></i> Deposit Included: <span>YES</span></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="plan-footer">--}}
{{--                            <div class="plan-btn">--}}
{{--                                <a class="btn--base" data-bs-toggle="modal" data-bs-target="#exampleModal">Get This Plan</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        End Plan
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
    
    @section('js')
    
    <script>
        // slider
var swiper = new Swiper('.brand-wrapper', {
  slidesPerView: 4,
  loop: true,
  navigation: {
    nextEl: '.slider-next',
    prevEl: '.slider-prev',
  },
  speed: 1000,
  breakpoints: {
    991: {
      slidesPerView: 3,
    },
    767: {
      slidesPerView: 3,
    },
    575: {
      slidesPerView: 2,
    },
  }
});
    </script>  
    
    @endsection

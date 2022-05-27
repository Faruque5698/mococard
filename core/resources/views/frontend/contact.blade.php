
@extends('frontend.master')

@section('title')
    About
@endsection
{{--@extends($activeTemplate.'layouts.frontend')--}}

@php
    $contact = getContent('contact_us.content', true);
@endphp

{{--@section('content')--}}
{{--    <!-- Contact Section Starts Here -->--}}
{{--    <section class="contact-section pt-120 pb-60">--}}
{{--        <div class="container">--}}
{{--            <div class="d-flex flex-wrap">--}}
{{--                <div class="contact__wrapper__1 bg--section">--}}
{{--                    <div class="section__header mb-0">--}}
{{--                        <h3 class="section__title">@lang('Send Us Message Now')</h3>--}}
{{--                        <div class="section__shape">--}}
{{--                            <div class="progress-bar progress-bar-striped bg--base progress-bar-animated w-100"></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <form class="contact-form row g-4" method="post" action="">--}}
{{--                        @csrf--}}
{{--                        <div class="col-sm-12">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="name" class="form--label">@lang('Name')</label>--}}
{{--                                <input name="name" id="name" type="text" class="form--control form-control" value="@if(auth()->user()) {{ auth()->user()->fullname }} @else {{ old('name') }} @endif" @if(auth()->user()) readonly @endif required>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-sm-6">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="email" class="form--label">@lang('Email')</label>--}}
{{--                                <input name="email" id="email" type="text" class="form-control form--control" value="@if(auth()->user()) {{ auth()->user()->email }} @else {{old('email')}} @endif" @if(auth()->user()) readonly @endif required>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-sm-6">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="subject" class="form--label">@lang('Subject')</label>--}}
{{--                                <input name="subject" id="subject" type="text" class="form-control form--control" value="{{old('subject')}}" required>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-sm-12">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="message" class="form--label">@lang('Message')</label>--}}
{{--                                <textarea name="message" id="message" wrap="off" class="form-control form--control">{{old('message')}}</textarea>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-sm-12">--}}
{{--                            <div class="form-group m-0 pt-3">--}}
{{--                                <button type="submit" class="cmn--btn">@lang('Send Message')</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--                <div class="contact__wrapper__2">--}}
{{--                    <div class="contact__wrapper__2_inner bg--section p-4 p-xxl-5 h-100">--}}
{{--                        <div class="maps rounded"></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <!-- Contact Section Ends Here -->

{{--    <!-- Branch Section Starts Here -->--}}
{{--    <section class="contact-section pt-60 pb-120">--}}
{{--        <div class="container">--}}
{{--            <div class="row g-4 justify-content-center">--}}
{{--                <div class="col-xl-4 col-md-6">--}}
{{--                    <div class="contact__item bg--section">--}}
{{--                        <div class="contact__icon">--}}
{{--                            <i class="las la-phone"></i>--}}
{{--                        </div>--}}
{{--                        <div class="contact__body">--}}
{{--                            <h6 class="contact__title">@lang('Phone')</h6>--}}
{{--                            <ul class="contact__info">--}}
{{--                                <li>--}}
{{--                                    <a href="Tel:{{ @$contact->data_values->phone }}">--}}
{{--                                        {{ @$contact->data_values->phone }}--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-4 col-md-6">--}}
{{--                    <div class="contact__item bg--section">--}}
{{--                        <div class="contact__icon">--}}
{{--                            <i class="las la-envelope"></i>--}}
{{--                        </div>--}}
{{--                        <div class="contact__body">--}}
{{--                            <h6 class="contact__title">@lang('Email')</h6>--}}
{{--                            <ul class="contact__info">--}}
{{--                                <li>--}}
{{--                                    <a href="mailto:{{ @$contact->data_values->email }}">--}}
{{--                                        {{ @$contact->data_values->email }}--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-4 col-md-6">--}}
{{--                    <div class="contact__item bg--section">--}}
{{--                        <div class="contact__icon">--}}
{{--                            <i class="las la-map-marker"></i>--}}
{{--                        </div>--}}
{{--                        <div class="contact__body">--}}
{{--                            <h6 class="contact__title">@lang('Address')</h6>--}}
{{--                            <ul class="contact__info">--}}
{{--                                <li>--}}
{{--                                    <a href="javascript:void(0)">--}}
{{--                                        {{ __(@$contact->data_values->address) }}--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    <!-- Brance Section Ends Here -->--}}
{{--@endsection--}}

@push('script')
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyCo_pcAdFNbTDCAvMwAD19oRTuEmb9M50c"></script>
    <script src="{{ asset($activeTemplateTrue.'js/map.js') }}"></script>

    <script>

        "use strict";

        var mapOptions = {
            center: new google.maps.LatLng({{ @$contact->data_values->map_latitude }}, {{ @$contact->data_values->map_longitude }}),
            zoom: 10,
            styles: styleArray,
            scrollwheel: false,
            backgroundColor: '#e5ecff',
            mapTypeControl: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var map = new google.maps.Map(document.getElementsByClassName("maps")[0],
            mapOptions);
        var myLatlng = new google.maps.LatLng({{ @$contact->data_values->map_latitude }}, {{ @$contact->data_values->map_longitude }});
        var focusplace = {lat: 55.864237, lng: -4.251806};
        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            icon: {
                url: "{{ asset($activeTemplateTrue.'images/map-marker.png') }}"
            }
        })
    </script>

@endpush

@section('content')
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Banner
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <section class="banner-section contact-us-section">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-xl-12 text-center">
                    <div class="banner-content" data-aos="fade-up" data-aos-duration="1800">
                        <h1 class="title">Contact Us</h1>
                        <div class="breadcrumb-area">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Contact</li>
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
        Start Contact
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <section class="contact-section ptb-80">
        <div class="container">
            <div class="row justify-content-center mb-30-none">
                <div class="col-xl-5 col-lg-5 mb-30">
                    <div class="contact-widget wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".4s">
                        <div class="contact-form-header">
                            <h2 class="title">Request a Contact us</h2>
                            <p>If you have any questions or requests - please contact us with feedback form. The administrator will respond to you
                                within some hours.</p>
                        </div>
                        <span class="loc">Location :</span>
                        <ul class="contact-item-list">
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="las la-map"></i>
                                    <span class="sub-title">{{ __(@$contact->data_values->address) }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="Tel:{{ @$contact->data_values->phone }}">
                                    <i class="las la-phone-volume"></i>
                                    <span class="sub-title">{{ @$contact->data_values->phone }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="mailto:{{ @$contact->data_values->email }}">
                                    <i class="las la-envelope"></i>
                                    <span class="sub-title">{{ @$contact->data_values->email }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
{{--                <form class="contact-form row g-4" method="post" action="">--}}
{{--                    @csrf--}}
{{--                    <div class="col-sm-12">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="name" class="form--label">@lang('Name')</label>--}}
{{--                            <input name="name" id="name" type="text" class="form--control form-control" value="@if(auth()->user()) {{ auth()->user()->fullname }} @else {{ old('name') }} @endif" @if(auth()->user()) readonly @endif required>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-6">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="email" class="form--label">@lang('Email')</label>--}}
{{--                            <input name="email" id="email" type="text" class="form-control form--control" value="@if(auth()->user()) {{ auth()->user()->email }} @else {{old('email')}} @endif" @if(auth()->user()) readonly @endif required>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-6">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="subject" class="form--label">@lang('Subject')</label>--}}
{{--                            <input name="subject" id="subject" type="text" class="form-control form--control" value="{{old('subject')}}" required>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-12">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="message" class="form--label">@lang('Message')</label>--}}
{{--                            <textarea name="message" id="message" wrap="off" class="form-control form--control">{{old('message')}}</textarea>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-12">--}}
{{--                        <div class="form-group m-0 pt-3">--}}
{{--                            <button type="submit" class="cmn--btn">@lang('Send Message')</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}
                <div class="col-xl-7 col-lg-7 mb-30">
                    <div class="contact-form-inner wow fadeInRight" data-wow-duration="1s" data-wow-delay=".4s">
                        <div class="contact-form-area">
                            <form class="contact-form" method="post">
                                @csrf
                                <div class="row justify-content-center mb-10-none">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name" class="form--label">@lang('Name')</label>
                                            <input name="name" id="name" type="text" class="form--control form-control" value="@if(auth()->user()) {{ auth()->user()->fullname }} @else {{ old('name') }} @endif" @if(auth()->user()) readonly @endif required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="email" class="form--label">@lang('Email')</label>
                                            <input name="email" id="email" type="text" class="form-control form--control" value="@if(auth()->user()) {{ auth()->user()->email }} @else {{old('email')}} @endif" @if(auth()->user()) readonly @endif required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="subject" class="form--label">@lang('Subject')</label>
                                            <input name="subject" id="subject" type="text" class="form-control form--control" value="{{old('subject')}}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="message" class="form--label">@lang('Message')</label>
                                            <textarea name="message" id="message" wrap="off" class="form-control form--control">{{old('message')}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 form-group">
                                        <button type="submit" class="btn--base mt-10">Send Message <i class="las la-paper-plane ms-2"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        End Contact
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Start Map
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div class="map-area">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3070.1899657893728!2d90.42380431666383!3d23.779746865573756!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7499f257eab%3A0xe6b4b9eacea70f4a!2sManama+Tower!5e0!3m2!1sen!2sbd!4v1561542597668!5m2!1sen!2sbd"
            style="border:0" allowfullscreen></iframe>
    </div>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        End Map
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
@endsection


@extends('frontend.master')
@section('title')
    {{$pageTitle}}
@endsection

@section('content')

    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        End Brand
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Banner
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <section class="banner-section contact-us-section">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-xl-12 text-center">
                    <div class="banner-content" data-aos="fade-up" data-aos-duration="1800">
                        <h1 class="title">{{$pageTitle}}</h1>
                        <div class="breadcrumb-area">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{$pageTitle}}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
{{--    <section class="about-section pt-120">--}}
        <div class="container">

            @foreach($content->data_values as $c)
                {!! $c !!}
            @endforeach
        </div>
{{--    </section>--}}
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        End ABOUT
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
            Start Modal
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






    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        End How it works
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
@endsection

{{--@section('content')--}}
{{--    @foreach($content->data_values as $c)--}}
{{--        {!! $c !!}--}}
{{--    @endforeach--}}
{{--@endsection--}}

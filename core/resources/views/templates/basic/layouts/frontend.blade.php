<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title> {{ $general->sitename(__($pageTitle)) }}</title>
    @include('partials.seo')

    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/animate.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/line-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/owl.min.css')}}">

    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/nice-select.css')}}">

    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/bootstrap-fileinput.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/main.css')}}">

    <link rel="stylesheet" href="{{ asset($activeTemplateTrue. 'css/color.php?color='.$general->base_color.'&secondColor='.$general->secondary_color) }}">

    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/custom.css')}}">
    <style>
        .plan-item {
            text-align: center;
            border-top: solid 4px #fe8024;
            border-bottom: solid 4px #fe8024;
            box-sizing: border-box;
            padding: 8px 10px 10px 10px;
            border-radius: 30px;
            box-shadow: 0 0 10px -5px rgb(0 0 0 / 50%);
            background: #fff;
        }

        .name {
            background: #FE8024;
            margin: 0 30px 20px 30px;
            border-radius: 0 0 20px 20px;
            position: relative;
        }

        .name h5 {
            color: #081831 !important;
            font-size: 30px;
            padding: 5px;
            position: relative;
            z-index: 2;
        }

        .plan-feature span {
            font-size: 18px;
            color: #6c757d;
        }

        .plan-feature {
            padding: 8px 0;
        }


        /*  buy page  */
        .alert-secondary-custom {
            background: #f9f1fc;
            border-color: #f9f1fc;
            color: #AC39D4;
        }
        .alert-primary-custom {
            background: #d6f0fb;
            border-color: #d6f0fb;
            color: #1EAAE7;
        }

        /* Card List*/
        .virtual-card-tab nav .nav-tabs .nav-link {
            color: #081831;
            font-size: 20px;
            font-weight: 600;
            padding: 10px 30px;
            background: #fff;
            border: none;
            border-radius: 0;
            border-bottom: solid 1px #f0f5fc;
        }

        .virtual-card-tab nav .nav-tabs .nav-link.active {
            background: #ff6a00;
            color: #fff;
        }

        .virtual-card-tab nav .nav-tabs .nav-link:first-child {
            border-radius: 10px 0 0 0;
        }

        .virtual-card-tab nav .nav-tabs .nav-link:last-child {
            border-radius: 0 10px 0 0;
        }

        .virtual-card-tab .tab-content {
            border-radius: 0 10px 10px 10px;
        }

        .virtual-card-tab nav .nav-tabs {
            border-bottom: none;
        }

        .name h5 {
            color: #081831 !important;
            font-size: 30px;
            padding: 5px;
            position: relative;
            z-index: 2;
        }

        .name:after {content: "";width: 20px;height: 20px;background: #fe8024;position: absolute;left: calc(50% - 10px);transform: rotate(45deg);bottom: -10px;z-index: 1;}
        /* Card List*/
    </style>
    @stack('style-lib')

    @stack('style')

</head>

<body id="version">

    @stack('fbComment')

    <div class="preloader">
        <div class="loader-inner">
            <div class="loader-circle">
                <img src="{{asset($activeTemplateTrue.'images/preloader.jpeg')}}" alt="@lang('Preloader')">
            </div>
            <div class="loader-line-mask">
            <div class="loader-line"></div>
            </div>
        </div>
    </div>

    <a href="#0" class="scrollToTop"><i class="las la-angle-up"></i></a>
    <div class="overlay"></div>



    @include($activeTemplate.'partials.header')
    @include($activeTemplate.'partials.banner')

    @yield('content')

    @include($activeTemplate.'partials.footer')

    @php
        $cookie = App\Models\Frontend::where('data_keys','cookie.data')->first();
    @endphp

    <!-- cookies default start -->
    @if(@$cookie->data_values->status && !session('cookie_accepted'))

    <div class="cookies-card bg--default radius--10px text-center style--lg">
      <div class="cookies-card__icon">
        <i class="fas fa-cookie-bite"></i>
      </div>
      <div class="cookies-card__content">
      <h5 class="text-dark mb-2">@lang('Cookie Policy')</h5>
      <p>@php echo @$cookie->data_values->description @endphp</p>
       or <a href="{{ @$cookie->data_values->link }}" target="_blank">@lang('Read Policy')</a>
    </div>
      <div class="cookies-card__btn">
        <a href="{{ route('cookie.accept') }}" class="cookies-btn">@lang('Accept')</a>
      </div>
    </div>
    @endif
    <!-- cookies default end -->

    <script>
        "use strict";
        function setVersion(){
            if(!{{ $general->dark }}){
                $('#version').addClass('light-version');
                $('.logo img').attr('src', '{{getImage(imagePath()['logoIcon']['path'] .'/logo.png')}}');

            }else{
                $('#version').removeClass('light-version');
                $('.logo img').attr('src', '{{getImage(imagePath()['logoIcon']['path'] .'/darkLogo.png')}}');
            }
        }
    </script>

    <script src="{{asset($activeTemplateTrue.'js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset($activeTemplateTrue.'js/bootstrap.min.js')}}"></script>
    <script src="{{asset($activeTemplateTrue.'js/rafcounter.min.js')}}"></script>
    <script src="{{asset($activeTemplateTrue.'js/nice-select.js')}}"></script>
    <script src="{{asset($activeTemplateTrue.'js/owl.min.js')}}"></script>
    <script src="{{asset($activeTemplateTrue.'js/main.js')}}"></script>

    @stack('script-lib')

    @stack('script')

    @include('partials.plugins')

    @include('partials.notify')

    <script>
        $(document).ready(function (){

            "use strict";

            $(".langSel").on("change", function() {
                window.location.href = "{{route('home')}}/change/"+$(this).val() ;
            });

            if(!{{ $general->dark }}){
                $('#version').addClass('light-version');
                $('.logo img').attr('src', '{{getImage(imagePath()['logoIcon']['path'] .'/logo.png')}}');

            }else{
                $('#version').removeClass('light-version');
                $('.logo img').attr('src', '{{getImage(imagePath()['logoIcon']['path'] .'/darkLogo.png')}}');
            }

        });
    </script>
</body>
</html>

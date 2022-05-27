<!DOCTYPE html>
<html lang="en">
@php
$general = \App\Models\GeneralSetting::find(1);
    @endphp
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$general->sitename}} - @yield('title')</title>
    <!-- favicon link -->
    <link rel="shortcut icon" href="{{getImage(imagePath()['logoIcon']['path'] .'/favicon.png')}}" type="image/x-icon">
    <!-- google fonts link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- fontawesome css link -->
    <link rel="stylesheet" href="{{asset('assets/frontend')}}/css/fontawesome-all.min.css">
    <!-- bootstrap css link -->
    <link rel="stylesheet" href="{{asset('assets/frontend')}}/css/bootstrap.min.css">
    <!-- animated headline css -->
    <link rel="stylesheet" href="{{asset('assets/frontend')}}/css/animated-headline.css">
    <!-- line-awesome-icon css -->
    <link rel="stylesheet" href="{{asset('assets/frontend')}}/css/line-awesome.min.css">
    <!-- swiper css -->
    <link rel="stylesheet" href="{{asset('assets/frontend')}}/css/swiper.min.css">
    <!-- animate.css -->
    <link rel="stylesheet" href="{{asset('assets/frontend')}}/css/animate.css">
    <!-- main style css link -->
    <link rel="stylesheet" href="{{asset('assets/frontend')}}/css/style.css">
    <link rel="stylesheet" href="{{asset('assets/frontend')}}/css/card.css">
</head>

<body>

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Preloader
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
@include('frontend.includes.preloader')
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Preloader
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Header
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
@include('frontend.includes.header')
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Header
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

@yield('content')


<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Footer
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
@include('frontend.includes.footer')
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Footer
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->





<!-- jquery -->
<script src="{{asset('assets/frontend')}}/js/jquery-3.5.1.min.js"></script>
<!-- animated headline js -->
<script src="{{asset('assets/frontend')}}/js/animated-headline.js"></script>
<!-- bootstrap js -->
<script src="{{asset('assets/frontend')}}/js/bootstrap.bundle.min.js"></script>
<!-- swiper js -->
<script src="{{asset('assets/frontend')}}/js/swiper.min.js"></script>
<!-- main -->
<script src="{{asset('assets/frontend')}}/js/main.js"></script>

{{--<script src="{{asset($activeTemplateTrue.'js/jquery-3.3.1.min.js')}}"></script>--}}
{{--<script src="{{asset($activeTemplateTrue.'js/bootstrap.min.js')}}"></script>--}}
<script src="{{asset($activeTemplateTrue.'js/rafcounter.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/nice-select.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/owl.min.js')}}"></script>
{{--<script src="{{asset($activeTemplateTrue.'js/main.js')}}"></script>--}}

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

@yield('js')
</body>

</html>

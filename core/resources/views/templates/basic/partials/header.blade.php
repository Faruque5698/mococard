@php
    $header = getContent('header.content', true);
    $socialMedias = getContent('social_icon.element');
@endphp
<!-- Header Section -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <ul class="header-top-area">
                    <li class="me-auto">
                        <ul class="social">
                            @foreach($socialMedias as $media)
                                <li>
                                    <a href="{{ $media->data_values->url }}" target="_blank">
                                        @php
                                            echo $media->data_values->social_icon;
                                        @endphp
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="mail">
                        <i class="las la-phone-alt"></i>
                        <a href="Tel:{{ @$header->data_values->phone }}">{{ @$header->data_values->phone }}</a>
                    </li>
                    <li class="mail">
                        <i class="las la-envelope"></i>
                        <a href="Mailto:{{ @$header->data_values->email }}">{{ @$header->data_values->email }}</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="header-bottom">
            <div class="container">
                <div class="header-wrapper">
                    <div class="logo">
                        <a href="{{ route('home') }}">
                            <img src="" alt="@lang('logo')">
                        </a>
                    </div>
                    <ul class="menu">
                        <li>
                            <a href="{{ route('home') }}">@lang('Home')</a>
                        </li>
                        <li>
                            <a href="{{ route('card') }}">Buy Cards</a>
                        </li>

                        @foreach($pages as $k => $data)
                            <li class="nav-item">
                                <a href="{{route('pages',[$data->slug])}}">
                                    {{__($data->name)}}
                                </a>
                            </li>
                        @endforeach
                        <li>
                            <a href="{{ route('contact') }}">@lang('Contact')</a>
                        </li>
                        <li class="d-md-none">
                            @auth
                                <a href="{{ route('user.home') }}" class="cmn--btn py-0 m-1">@lang('Dashboard')</a>
                            @else
                                <a href="{{ route('user.login') }}" class="cmn--btn py-0 m-1">@lang('Sign in')</a>
                                <a href="{{ route('user.register') }}" class="cmn--btn py-0 m-1">@lang('Register')</a>
                            @endauth
                        </li>
                    </ul>
                    <div class="lang-select">
                        <select class="langSel">
                            @foreach($language as $item)
                                <option value="{{$item->code}}" @if(session('lang') == $item->code) selected  @endif>
                                    {{ __($item->name) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="right-area d-none d-md-flex">
                        @auth
                            <a href="{{ route('user.home') }}" class="cmn--btn py-0 m-1">@lang('Dashboard')</a>
                        @else
                            <a href="{{ route('user.login') }}" class="cmn--btn py-0 m-1">@lang('Sign in')</a>
                            <a href="{{ route('user.register') }}" class="cmn--btn py-0 m-1">@lang('Register')</a>
                        @endauth
                    </div>
                    <div class="header-bar ms-3 me-0">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Section -->

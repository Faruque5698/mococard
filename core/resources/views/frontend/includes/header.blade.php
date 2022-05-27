@php
    $prefix = Request::route()->getPrefix();
       $route = Route::current()->getname();

@endphp

<header class="header-section">
    <div class="header">
        <div class="header-bottom-area">
            <div class="container">
                <div class="header-menu-content">
                    <nav class="navbar navbar-expand-lg p-0">
                        <a class="site-logo" href="{{url('/')}}">
                            <img src="{{getImage(imagePath()['logoIcon']['path'] .'/logo.png')}}" alt="logo">
                        </a>
                        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="fas fa-bars"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav main-menu ms-auto">
                                <li><a href="{{route('home')}}" class="{{($route == 'home')?'active': ''}}">Home</a></li>
                                <li><a href="{{route('about_us')}}"class="{{($route == 'about_us')?'active': ''}}">About Us</a></li>
                                <li><a href="{{route('contact')}}"class="{{($route == 'contact')?'active': ''}}">Contact</a></li>
                            </ul>
                            <div class="header-action">
                                <a class="btn--base" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="las la-download"></i>Download Now</a>
                            </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>

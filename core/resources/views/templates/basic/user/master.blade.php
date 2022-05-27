@php
    $header = getContent('header.content', true);
        $socialMedias = getContent('social_icon.element');

@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $general->sitename($pageTitle ?? '') }}</title>
    <!-- site favicon -->
    <link rel="shortcut icon" type="image/png" href="{{getImage(imagePath()['logoIcon']['path'] .'/favicon.png')}}">
    <!-- google fonts link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- fontawesome css link -->
    <link rel="stylesheet" href="{{asset('assets/assets')}}/css/fontawesome-all.min.css">
    <!-- nice-select.css -->
    <link rel="stylesheet" href="{{asset('assets/assets')}}/css/nice-select.css">
    <!-- bootstrap css link -->
    <link rel="stylesheet" href="{{asset('assets/assets')}}/css/bootstrap.min.css">
    <!-- line-awesome-icon css -->
    <link rel="stylesheet" href="{{asset('assets/assets')}}/css/line-awesome.min.css">
    <!-- animate.css -->
    <link rel="stylesheet" href="{{asset('assets/assets')}}/css/animate.css">
    <!-- main style css link -->
    <link rel="stylesheet" href="{{asset('assets/assets')}}/css/style.css">
</head>
<body>

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Page-wrapper
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div class="page-wrapper">
    <div class="sidebar">
        <div class="sidebar__inner">
            <div class="sidebar-top-inner">
                <div class="sidebar__logo">
                    <a href="" class="sidebar__main-logo">
                        <img src="{{asset('assets/assets')}}/images/logo-white.png" alt="logo">
                    </a>
                    <div class="navbar__left">
                        <button class="navbar__expand pe-3">
                            <i class="las la-bars"></i>
                        </button>
                        <button class="sidebar-mobile-menu">
                            <i class="las la-bars"></i>
                        </button>
                    </div>
                </div>
                <div class="sidebar__menu-wrapper">
                    <ul class="sidebar__menu">
                        <li class="sidebar-menu-item active">
                            <a href="{{ route('user.home') }}">
                                <i class="menu-icon las la-home"></i>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item sidebar-dropdown">
                            <a href="#0">
                                <i class="menu-icon las la-credit-card"></i>
                                <span class="menu-title">Deposit</span>
                            </a>
                            <ul class="sidebar-submenu">
                                <li class="sidebar-menu-item">
                                    <a href="{{ route('user.deposit') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">Deposit</span>
                                    </a>
                                    <a href="{{ route('user.deposit.history') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">Deposit History</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-menu-item">
                            <a href="{{ route('card') }}">
                                <i class="menu-icon las la-shopping-cart"></i>
                                <span class="menu-title">Buy Cards</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item">
                            <a href="{{ route('user.card') }}">
                                <i class="menu-icon las la-id-card"></i>
                                <span class="menu-title">My Cards</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item sidebar-dropdown">
                            <a href="#0">
                                <i class="menu-icon las las la-ticket-alt"></i>
                                <span class="menu-title">Support</span>
                            </a>
                            <ul class="sidebar-submenu">
                                <li class="sidebar-menu-item">
                                    <a href="{{ route('ticket.open') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">New Ticket</span>
                                    </a>
                                    <a href="{{ route('ticket') }}" class="nav-link">
                                        <i class="menu-icon las la-dot-circle"></i>
                                        <span class="menu-title">My Ticket</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-menu-item">
                            <a href="{{ route('user.trx.log') }}">
                                <i class="menu-icon las la-exchange-alt"></i>
                                <span class="menu-title">Transaction</span>
                            </a>
                        </li>

                        <li class="sidebar-menu-item">
                            <a href="{{ route('user.withdraw') }}">
                                <i class="menu-icon las la-money-bill-alt"></i>
{{--                                <i class=""></i>--}}
{{--                                <i class="fa fa-money" aria-hidden="true"></i>--}}
                                <span class="menu-title">Withdraw</span>
                            </a>
                        </li>

                        <li class="sidebar-menu-item">
                            <a href="{{ route('user.logout') }}">
                                <i class="menu-icon las la-sign-out-alt"></i>
                                <span class="menu-title">Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="copyright-wrapper">
                <div class="social-area">
                    <ul class="copyright-social">
                        @foreach($socialMedias as $media)
                            <li>
                                <a href="{{ $media->data_values->url }}" class="mt-2" target="_blank">
                                    @php
                                        echo $media->data_values->social_icon;
                                    @endphp
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="copyright-area">
                    @php($name = \App\Models\GeneralSetting::find(1))
                    <p>Copyright © 2022 <a href="#0" class="text--base">{{$name->sitename}}</a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="main-wrapper">
        <div class="main-body-wrapper">
            <!-- navbar-wrapper-start -->
            <nav class="navbar-wrapper">
                <div class="navbar-wrapper-area">
                    <div class="dashboard-title-part">
                        <h3 class="title">Dashboard</h3>
                    </div>
                    <div class="navbar__right">
                        <ul class="navbar__action-list">
                            <li class="dropdown">
                                <button type="button" class="" data-bs-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
                                <span class="navbar-user">
                                    @php($user = auth()->user())
                                    @if($user->image!=null)
                                    <span class="navbar-user__thumb"><img src="{{asset($user->image)}}" alt="user"></span>
                                    @else
                                    <span class="navbar-user__thumb"><img src="{{asset('assets/assets')}}/images/user.jpg" alt="user"></span>
                                    @endif
                                    <span class="navbar-user__info">
                                    <span class="navbar-user__name">{{$user->username}}</span>
                                    </span>
                                    <span class="icon"><i class="las la-chevron-circle-down"></i></span>
                                </span>
                                </button>
                                <div class="dropdown-menu dropdown-menu--sm p-0 border-0 box--shadow1 dropdown-menu-right">
                                    <a href="{{ route('user.profile.setting') }}"
                                       class="dropdown-menu__item d-flex align-items-center ps-3 pe-3 pt-2 pb-2">
                                        <i class="dropdown-menu__icon las la-user-circle"></i>
                                        <span class="dropdown-menu__caption">Profile</span>
                                    </a>
                                    <a href="{{ route('user.twofactor') }}"
                                       class="dropdown-menu__item d-flex align-items-center ps-3 pe-3 pt-2 pb-2">
                                        <i class="dropdown-menu__icon las la-user-circle"></i>
                                        <span class="dropdown-menu__caption">2fa Sequrity</span>
                                    </a>
                                    <a href="{{ route('user.change.password') }}"
                                       class="dropdown-menu__item d-flex align-items-center ps-3 pe-3 pt-2 pb-2">
                                        <i class="dropdown-menu__icon las la-key"></i>
                                        <span class="dropdown-menu__caption">Change Password</span>
                                    </a>
                                    <a href="{{ route('user.logout') }}"
                                       class="dropdown-menu__item d-flex align-items-center ps-3 pe-3 pt-2 pb-2">
                                        <i class="dropdown-menu__icon las la-sign-out-alt"></i>
                                        <span class="dropdown-menu__caption">Logout</span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- body-wrapper-start -->
            <div class="body-wrapper">
                <div class="dashboard-area">
                    <div class="dashboard-item-area">
                        <div class="row mb-30-none">
                            <div class="col-xl-3 col-lg-4 col-md-6 mb-30">
                                <div class="dashbord-user">
                                    <a href="{{ route('user.trx.log') }}" class="dash-btn">View All</a>
                                    <div class="dashboard-content">
                                        <div class="dashboard-icon-area">
                                            <div class="dashboard-icon base-color">
                                                <i class="las la-wallet"></i>
                                            </div>
                                        </div>
                                        <div class="title">
                                            <span>Balance</span>
                                        </div>
                                        <div class="user-count">
                                            <span>{{ $general->cur_sym }}{{ showAmount($user->balance) }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 mb-30">
                                <div class="dashbord-user">
                                    <a href="{{ route('user.card') }}" class="dash-btn">View All</a>
                                    <div class="dashboard-content">
                                        <div class="dashboard-icon-area">
                                            <div class="dashboard-icon orange-color">
                                                <i class="las la-id-card"></i>
                                            </div>
                                        </div>
                                        <div class="title">
                                            <span>Total Cards</span>
                                        </div>
                                        <div class="user-count">
                                            <span>{{ $countCard }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 mb-30">
                                <div class="dashbord-user">
                                    <a href="{{ route('user.trx.log') }}" class="dash-btn">View All</a>
                                    <div class="dashboard-content">
                                        <div class="dashboard-icon-area">
                                            <div class="dashboard-icon red-color">
                                                <i class="las la-receipt"></i>
                                            </div>
                                        </div>
                                        <div class="title">
                                            <span>Transaction</span>
                                        </div>
                                        <div class="user-count">
                                            <span>${{ $countTrx }} Usd</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 mb-30">
                                <div class="dashbord-user">
                                    <a href="{{ route('ticket') }}" class="dash-btn">View All</a>
                                    <div class="dashboard-content">
                                        <div class="dashboard-icon-area">
                                            <div class="dashboard-icon blue-color">
                                                <i class="las la-ticket-alt"></i>
                                            </div>
                                        </div>
                                        <div class="title">
                                            <span>Total Ticket</span>
                                        </div>
                                        <div class="user-count">
                                            <span>{{ $countTicket }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row mb-30-none mt-2">
                            <div class="col-xl-3 col-lg-4 col-md-6 mb-30 mt-2">
                                <div class="dashbord-user">
                                    <a href="{{ route('user.withdraw') }}" class="dash-btn">Withdraw</a>
                                    <div class="dashboard-content">
                                        <div class="dashboard-icon-area">
                                            <div class="dashboard-icon base-color">
                                                <i class="las la-gift"></i>
                                            </div>
                                        </div>
                                        <div class="title">
                                            <span>Referral Bonus</span>
                                        </div>
                                        <div class="user-count">
                                            <span>{{$refer ?? '0'}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-6 mb-30 mt-2">
                                <div class="dashbord-user">
                                    <a href="{{ route('user.card') }}" class="dash-btn">View All</a>
                                    <div class="dashboard-content">
                                        <div class="dashboard-icon-area">
                                            <div class="dashboard-icon orange-color">
                                                <i class="las la-id-card"></i>
                                            </div>
                                        </div>
                                        <div class="title">
                                            <span>Total Cards</span>
                                        </div>
                                        <div class="user-count">
                                            <span>{{ $countCard }}</span>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            @php($base_url = url('/'))
                            <div class="card ">
                                <div class="card-header"><h3 class="title">Referral URL</h3></div>
                                <div class="card-body">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="copyInput" readonly value="{{$base_url.'/'.'refer/'.auth()->user()->id.'/'.auth()->user()->username}}">
                                        <button onclick="copyFunction()" type="button"
                                                class="btn btn-success">@lang('Copy URL')</button>
                                    </div>

                                </div>
                            </div>


                    </div>
                </div>


                <div class="table-area">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-wrapper">
                                <div class="table-header">
                                    <h3 class="title">Latest Transaction Logs</h3>
                                </div>
                                <table class="custom-table">
                                    <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Trx</th>
                                        <th>Amount</th>
                                        <th>Charge</th>
                                        <th>Amount + Charge</th>
                                        <th>Post Balance</th>
                                        <th>Details</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($latestTrxs as $trx)
                                    <tr>
                                        <td data-label="@lang('Date')">
                                            {{ showDateTime($trx->created_at) }}
                                        </td>
                                        <td data-label="@lang('Trx')">
                                            {{ $trx->trx }}
                                        </td>
                                        <td data-label="@lang('Amount')">
                                            <strong>
                                                {{ showAmount($trx->amount, 2) }}
                                                {{ __($general->cur_text) }}
                                            </strong>
                                        </td>
                                        <td data-label="@lang('Charge')">{{ showAmount($trx->charge) }} {{ __($general->cur_text) }}</td>
                                        <td data-label="@lang('Amount + Charge')">
                                            <strong>
                                                {{ $trx->trx_type }}
                                                {{ showAmount($trx->amount + $trx->charge) }}
                                                {{ __($general->cur_text) }}
                                            </strong>
                                        </td>
                                        <td data-label="@lang('Post Balance')">
                                            <strong>
                                                {{ showAmount($trx->post_balance, 2) }}
                                                {{ __($general->cur_text) }}
                                            </strong>
                                        </td>
                                        <td data-label="@lang('Details')">
                                            {{ __($trx->details) }}
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Page-wrapper
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Bottom-nav
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div class="bottom-nav">
    <a href="{{ route('user.home') }}">
        <i class="las las la-home"></i>
        <p>Dashboard</p>
    </a>
    <a href="{{ route('user.deposit') }}">
        <i class="las la-credit-card"></i>
        <p>Deposit</p>
    </a>
    <a href="{{ route('user.card') }}" class="mid">
        <i class="las la-id-card"></i>
        <p>Card</p>
    </a>
    <a href="{{ route('card') }}">
        <i class="las la-shopping-cart"></i>
        <p>Plan</p>
    </a>
    <a href="{{ route('user.profile.setting') }}">
        <i class="las la-user-circle "></i>
        <p>Profile</p>

    </a>

</div>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Bottom-nav
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->





<!-- jquery -->
<script src="{{asset('assets/assets')}}/js/jquery-3.5.1.min.js"></script>
<!-- bootstrap js -->
<script src="{{asset('assets/assets')}}/js/bootstrap.bundle.min.js"></script>
<!-- nice-select js file -->
<script src="{{asset('assets/assets')}}/js/jquery.nice-select.js"></script>
<!-- main -->
<script src="{{asset('assets/assets')}}/js/main.js"></script>

    <script >
        function copyFunction() {
            var copyText = document.getElementById("copyInput");
            copyText.select();
            document.execCommand("copy");
        }
    </script>

    @include('partials.notify')

    <script>

            (function ($) {
                "use strict";

                $('.deposit').on('click', function () {

                    var selected =  $(".method option:selected");
                    //
                    // if(!selected.val()){
                    //     return false;
                    // }

                    var name = selected.data('name');
                    var currency = selected.data('currency');
                    var method_code = selected.data('method_code');
                    var minAmount = selected.data('min_amount');
                    var maxAmount = selected.data('max_amount');
                    var baseSymbol = "{{$general->cur_text}}";
                    var fixCharge = selected.data('fix_charge');
                    var percentCharge = selected.data('percent_charge');

                    var depositLimit = `@lang('Deposit Limit'): ${minAmount} - ${maxAmount}  ${baseSymbol}`;
                    $('.depositLimit').text(depositLimit);
                    var depositCharge = `@lang('Charge'): ${fixCharge} ${baseSymbol}  ${(0 < percentCharge) ? ' + ' +percentCharge + ' % ' : ''}`;
                    $('.depositCharge').text(depositCharge);
                    $('.method-name').text(`@lang('Payment By ') ${name}`);
                    $('.currency-addon').text(baseSymbol);
                    $('.edit-currency').val(currency);
                    $('.edit-method-code').val(method_code);

                    $('#depositModal').modal('show');

                });

            })(jQuery);

        </script>


</body>
</html>

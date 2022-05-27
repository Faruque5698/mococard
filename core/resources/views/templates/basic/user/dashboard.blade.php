{{--@extends($activeTemplate.'layouts.master')--}}
@extends('templates.basic.user.master')
@section('content')
<!-- Dashboard -->
{{--<div class="container">--}}
{{--    <div class="pb-80">--}}
{{--        <div class="row justify-content-center g-4">--}}
{{--            <div class="col-sm-6 col-lg-4 col-xxl-3">--}}
{{--                <div class="dashboard__item bg--section">--}}
{{--                    <span class="dashboard__icon bg--base">--}}
{{--                        <i class="las la-money-bill-wave"></i>--}}
{{--                    </span>--}}
{{--                    <div class="cont">--}}
{{--                        <div class="dashboard__header">--}}
{{--                            <h6 class="title">{{ $general->cur_sym }}</h6>--}}
{{--                            <a href="{{ route('user.trx.log') }}">--}}
{{--                                <h3 class="title">{{ showAmount($user->balance) }}</h3>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <a href="{{ route('user.trx.log') }}">@lang('Balance')</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-sm-6 col-lg-4 col-xxl-3">--}}
{{--                <div class="dashboard__item bg--section">--}}
{{--                    <span class="dashboard__icon bg--base">--}}
{{--                        <i class="las la-credit-card "></i>--}}
{{--                    </span>--}}
{{--                    <div class="cont">--}}
{{--                        <div class="dashboard__header">--}}
{{--                            <a href="{{ route('user.card') }}">--}}
{{--                                <h3 class="title rafcounter" data-counter-end="{{ $countCard }}">0</h3>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <a href="{{ route('user.card') }}">Cards</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-sm-6 col-lg-4 col-xxl-3">--}}
{{--                <div class="dashboard__item bg--section">--}}
{{--                    <span class="dashboard__icon bg--base">--}}
{{--                        <i class="las la-exchange-alt"></i>--}}
{{--                    </span>--}}
{{--                    <div class="cont">--}}
{{--                        <div class="dashboard__header">--}}
{{--                            <a href="{{ route('user.trx.log') }}">--}}
{{--                                <h3 class="title rafcounter" data-counter-end="{{ $countTrx }}">0</h3>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <a href="{{ route('user.trx.log') }}">@lang('Transaction')</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-sm-6 col-lg-4 col-xxl-3">--}}
{{--                <div class="dashboard__item bg--section">--}}
{{--                    <span class="dashboard__icon bg--base">--}}
{{--                        <i class="las la-ticket-alt"></i>--}}
{{--                    </span>--}}
{{--                    <div class="cont">--}}
{{--                        <div class="dashboard__header">--}}
{{--                            <a href="{{ route('ticket') }}">--}}
{{--                                <h3 class="title rafcounter" data-counter-end="{{ $countTicket }}">0</h3>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <a href="{{ route('ticket') }}">@lang('Ticket')</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <h5 class="title mb-3">@lang('Latest Transaction Logs')</h5>--}}
{{--    <table class="table cmn--table">--}}
{{--        <thead>--}}
{{--            <tr>--}}
{{--                <th>@lang('Date')</th>--}}
{{--                <th>@lang('Trx')</th>--}}
{{--                <th>@lang('Amount')</th>--}}
{{--                <th>@lang('Charge')</th>--}}
{{--                <th>@lang('Amount + Charge')</th>--}}
{{--                <th>@lang('Post Balance')</th>--}}
{{--                <th>@lang('Details')</th>--}}
{{--            </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}
{{--        @forelse($latestTrxs as $trx)--}}
{{--            <tr>--}}
{{--                <td data-label="@lang('Date')">--}}
{{--                   {{ showDateTime($trx->created_at) }}--}}
{{--                </td>--}}
{{--                <td data-label="@lang('Trx')">--}}
{{--                   {{ $trx->trx }}--}}
{{--                </td>--}}
{{--                <td data-label="@lang('Amount')">--}}
{{--                    <strong>--}}
{{--                        {{ showAmount($trx->amount, 2) }}--}}
{{--                        {{ __($general->cur_text) }}--}}
{{--                    </strong>--}}
{{--                </td>--}}
{{--                <td data-label="@lang('Charge')">{{ showAmount($trx->charge) }} {{ __($general->cur_text) }}</td>--}}
{{--                <td data-label="@lang('Amount + Charge')">--}}
{{--                    <strong>--}}
{{--                        {{ $trx->trx_type }}--}}
{{--                        {{ showAmount($trx->amount + $trx->charge) }}--}}
{{--                        {{ __($general->cur_text) }}--}}
{{--                    </strong>--}}
{{--                </td>--}}
{{--                <td data-label="@lang('Post Balance')">--}}
{{--                    <strong>--}}
{{--                        {{ showAmount($trx->post_balance, 2) }}--}}
{{--                        {{ __($general->cur_text) }}--}}
{{--                    </strong>--}}
{{--                </td>--}}
{{--                <td data-label="@lang('Details')">--}}
{{--                    {{ __($trx->details) }}--}}
{{--                </td>--}}
{{--            </tr>--}}
{{--        @empty--}}
{{--            <tr>--}}
{{--                <td colspan="100%">@lang('Data Not Found')</td>--}}
{{--            </tr>--}}
{{--        @endforelse--}}

{{--        </tbody>--}}
{{--    </table>--}}

{{--</div>--}}
<!-- Dashboard -->
@endsection


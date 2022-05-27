@extends($activeTemplate.'layouts.master')
@section('content')

@php($details = \App\Models\Withdrawal::where('trx','=',$response['trx'])->first())

    <div class="payment-section ptb-80">
        <div class="container">


            <form action="{{route('user.withdraw_confirm_done')}}"method="post">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-lg-6 row">
                        <div class="form-group m-1">
                            <label for="">Amount</label>
                            <input type="text" readonly class="form-control" name="amount" value="{{$details->amount}}" >
                        </div>
                        @php($i=0)
                        @foreach(json_decode($details->detail) as $k => $val)
                        <div class="select-item">
                            <label for="">{{$k}}</label>
                            <input type="text"name="{{$k}}" class="form-control" required>
                        </div>
                        @endforeach
                        <div class="select-item">
                            <label for="">Transaction Number</label>
                            <input type="text" name="trx" value="{{$response['trx']}}" readonly class="form-control">
                        </div>
                    </div>

                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="mt-4">
                            <button type="submit" class="cmn--btn deposit w-100 justify-content-center">
                                @lang('Confirm')
                            </button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>


    {{--    <div class="modal fade cmn--modal" id="depositModal">--}}
    {{--        <div class="modal-dialog modal-dialog-centered" role="document">--}}
    {{--            <div class="modal-content">--}}
    {{--                <div class="modal-header">--}}
    {{--                    <strong class="modal-title method-name" id="depositModalLabel"></strong>--}}
    {{--                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
    {{--                </div>--}}
    {{--                <form action="{{route('user.deposit.insert')}}" method="post">--}}
    {{--                    @csrf--}}
    {{--                    <div class="modal-body">--}}
    {{--                        <p class="text--base depositLimit"></p>--}}
    {{--                        <p class="text--base depositCharge"></p>--}}
    {{--                        <div class="form-group">--}}
    {{--                            <input type="hidden" name="currency" class="edit-currency">--}}
    {{--                            <input type="hidden" name="method_code" class="edit-method-code">--}}
    {{--                        </div>--}}
    {{--                        <div class="form-group">--}}
    {{--                            <label class="text--base">@lang('Enter Amount'):</label>--}}
    {{--                            <div class="input-group">--}}
    {{--                                <input id="amount" type="text" class="form-control form--control" name="amount" required  value="{{old('amount')}}">--}}
    {{--                                <span class="input-group-text bg--base">{{__($general->cur_text)}}</span>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <div class="modal-footer">--}}
    {{--                        <button type="button" class="btn btn--md btn--danger" data-bs-dismiss="modal">@lang('Close')</button>--}}
    {{--                        <div class="prevent-double-click">--}}
    {{--                            <button type="submit" class="btn btn--md btn--success">@lang('Confirm')</button>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </form>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

@stop

@push('script')
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
@endpush

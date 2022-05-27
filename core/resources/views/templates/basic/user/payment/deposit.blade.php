@extends($activeTemplate.'layouts.master')

@section('content')
<div class="payment-section ptb-80">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="select-item">
                    <select class="method form--control select-bar m-0">
                        <option value="">
                            @lang('Select Payment Gateway')
                        </option>
                        <option value="">
                            @lang('Current Balance') - {{ showAmount(Auth::user()->balance, 2) }} {{ __($general->cur_text) }}
                        </option>
                        @foreach($gatewayCurrency as $data)
                            <option
                                value="{{$loop->index + 1}}"
                                data-name="{{$data->name}}"
                                data-currency="{{$data->currency}}"
                                data-method_code="{{$data->method_code}}"
                                data-min_amount="{{showAmount($data->min_amount)}}"
                                data-max_amount="{{showAmount($data->max_amount)}}"
                                data-base_symbol="{{$data->baseSymbol()}}"
                                data-fix_charge="{{showAmount($data->fixed_charge)}}"
                                data-percent_charge="{{showAmount($data->percent_charge)}}"
                            >
                                {{__($data->name)}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="mt-4">
                    <button type="submit" class="cmn--btn deposit w-100 justify-content-center">
                        @lang('Pay Now')
                    </button>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="modal fade cmn--modal" id="depositModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <strong class="modal-title method-name" id="depositModalLabel"></strong>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('user.deposit.insert')}}" method="post">
                @csrf
                <div class="modal-body">
                    <p class="text--base depositLimit"></p>
                    <p class="text--base depositCharge"></p>
                    <div class="form-group">
                        <input type="hidden" name="currency" class="edit-currency">
                        <input type="hidden" name="method_code" class="edit-method-code">
                    </div>
                    <div class="form-group">
                        <label class="text--base">@lang('Enter Amount'):</label>
                        <div class="input-group">
                            <input id="amount" type="text" class="form-control form--control" name="amount" required  value="{{old('amount')}}">
                            <span class="input-group-text bg--base">{{__($general->cur_text)}}</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn--md btn--danger" data-bs-dismiss="modal">@lang('Close')</button>
                    <div class="prevent-double-click">
                        <button type="submit" class="btn btn--md btn--success">@lang('Confirm')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@stop

@push('script')
<script>

    (function ($) {
        "use strict";

        $('.deposit').on('click', function () {

            var selected =  $(".method option:selected");

            if(!selected.val()){
                return false;
            }

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


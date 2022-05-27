@extends($activeTemplate.'layouts.master')
@section('content')


    <div class="payment-section ptb-80">
        <div class="container">

            <form action="{{route('user.withdraw_confirm')}}"method="post">
                @csrf
            <div class="row justify-content-center">
                <div class="col-lg-6 row">
                    <div class="select-item">
                        <label for="">Withdraw Method</label>
                        <select class="method form--control select-bar m-0" name="method_code">
                            <option value="">
                                @lang('Select Withdraw Method')
                            </option>
                            <option value="">
                                @lang('Current Balance') - {{ showAmount(Auth::user()->balance, 2) }} {{ __($general->cur_text) }}
                            </option>
                            @foreach($gatewayCurrency as $data)
                                <option value="{{$data->id}}">{{__($data->name)}}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div class="form-group m-1">
                        <label for="">Amount</label>
                        <input type="text" class="form-control" name="amount" required>
                    </div>

                    <div class="select-item">
                        <label for="">Currency</label>
                        <select class="method form--control select-bar m-0 productCategory" id="" name="currency">
                            <option value="">
                                @lang('Select Withdraw Currency')
                            </option>

                            @foreach($currency as $data)
                                <option value="{{$data->code}}">{{__($data->code)}}</option>
                            @endforeach
                        </select>
                    </div>
{{--                    <input type="hidden" name="currency" id="currency">--}}
                </div>
                </div>



            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="mt-4">
                        <button type="submit" class="cmn--btn deposit w-100 justify-content-center">
                            @lang('Withdraw now')
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
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>--}}

    <script type="text/javascript">
        $(document).ready(function () {
            $(document).on('change','.productCategory',function () {
                // console.log('hmm its change')
                var sub_cat=$('select[name="currency_id"]')
                var category_id=$(this).val();
                // console.log(category_id);
                var div=$(this).parent();
                // var op=" ";
                $.ajax({
                    type:'get',
                    url:'{!!URL::to('findsubcategory')!!}',
                    data:{'id':category_id},
                    success:function (data) {
                        // console.log('success');
                        //
                        // console.log(data);
                        // console.log(data.length);
                       // alert(data.currency)
                       //  $('input[name=currency]').val(data.currency);
                        $('#currency').val(data.currency)
                    },
                    error:function () {
                    }
                });
            });
        });
    </script>
@endpush

@extends($activeTemplate.'layouts.master')
@section('content')
    @php($withdraws = \App\Models\Withdrawal::with('method')->where('user_id','=',auth()->user()->id)->get())

{{--    @dd($withdraws)--}}
    <div class="container">
        <div class="row justify-content-center mt-2">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table cmn--table">
                        <thead class="thead-dark">
                        <tr>
                            <th>@lang('Date')</th>
                            <th>@lang('Trx')</th>
                            <th>@lang('Amount')</th>
                            <th>@lang('Charge')</th>
                            <th>@lang('Amount + Charge')</th>
                            <th>@lang('Withdraw Method')</th>
                            <th>@lang('Status')</th>
                        </tr>
                        </thead>
                        <tbody>

                        @forelse($withdraws as $index => $data)
                            <tr>
                                <td data-label="@lang('Date')">
                                    {{ showDateTime($data->created_at) }}
                                </td>
                                <td data-label="@lang('Trx')">{{ $data->trx }}</td>
                                <td data-label="@lang('Amount')">
                                    <strong>
                                        {{ $data->trx_type }}
                                        {{ showAmount($data->amount) }}
                                        {{ __($general->cur_text) }}
                                    </strong>
                                </td>
                                <td data-label="@lang('Charge')">{{ showAmount($data->charge) }} {{ __($general->cur_text) }}</td>
                                <td data-label="@lang('Amount + Charge')">
                                    <strong>
                                        {{ $data->trx_type }}
                                        {{ showAmount($data->amount + $data->charge) }}
                                        {{ __($general->cur_text) }}
                                    </strong>
                                </td>
                                <td data-label="@lang('Post Balance')">
                                    <strong>
                                       {{$data->method->name}}
                                    </strong>
                                </td>
                                @if($data->status == 0)
                                <td data-label="@lang('Status')">Pending</td>
                                @elseif($data->status == 1)
                                    <td data-label="@lang('Status')">Approved</td>
                                @elseif($data->status == 2)
                                    <td data-label="@lang('Status')">Reject</td>
                                @else
                                    <td data-label="@lang('Status')"></td>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td colspan="100%">{{ __($emptyMessage) }}</td>
                            </tr>
                        @endforelse

                        </tbody>
                    </table>
                </div>

{{--                {{$logs->links()}}--}}

            </div>
        </div>
    </div>

@endsection


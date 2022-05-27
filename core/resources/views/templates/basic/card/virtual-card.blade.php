@extends($extends)

@section('content')

    <section class="latest-card-section {{ Auth::user() ? '' : 'pt-80 pb-80' }}">
        <div class="container">
            <div class="row g-3 g-sm-4 justify-content-center card-wrapper">
                @forelse($plans as $plan)
                    <div class="col-md-4 col-lg-3 col-sm-6">
                        <div class="plan-item">
                            <div class="name">
                                <h5>{{ $plan->name }}</h5>
                            </div>
                            <div class="plan-feature">
                                <span>{{__($general->cur_sym)}}{{ $plan->card_issuance_fee }} / Issuance Fee</span>
                            </div>
                            <div class="plan-feature">
                                <span class="text-orange">@if($plan->funding == 1) Reloadable @else Non Reloadable @endif </span> Card
                            </div>
                            <div class="plan-feature">
                                <span>Load Fee ({{__($general->cur_sym)}}{{ $plan->card_load_fee }}+{{ $plan->card_load_fee_percentage }}%)</span>
                            </div>
                            <div class="plan-feature">
                                <span>Min Load {{__($general->cur_sym)}}{{ $plan->min_load }}</span>
                            </div>
                            <div class="plan-feature">
                                <span>Max Load {{__($general->cur_sym)}}{{ $plan->max_load }}</span>
                            </div>
                            <div class="plan-feature">
                                <span>Validity 4 Years</span>
                            </div>
                            <div class="plan-feature">
                                <span> No Monthly Fees</span>
                            </div>
                            <div class="my-4 t">
                                <a href="{{ route('card.select', ['id'=>$plan->id]) }}" class="btn btn--primary">
                                    Buy Now
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <h6 class="text-center">@lang('Data Not Found')!</h6>
                @endforelse
            </div>
        </div>
        {{ \TawkTo::widgetCode('https://tawk.to/chat/6263d7ecb0d10b6f3e6efd69/1g1b06tbq') }}

    </section>

@endsection



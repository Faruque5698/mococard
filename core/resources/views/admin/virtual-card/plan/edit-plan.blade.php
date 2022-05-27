@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="row justify-content-center my-5">
                        <div class="col-md-6">
                            @if(session('error_msg'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error_msg') }}
                            </div>
                            @endif
                            <form action="{{ route('admin.virtualCard.planUpdate',['id'=>$plan->id]) }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" value="{{ $plan->name }}" name="name" id="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="card_issuance_fee">Card Issuance Fee</label>
                                    <input type="number" class="form-control" value="{{ $plan->card_issuance_fee }}" name="card_issuance_fee" id="card_issuance_fee" required>
                                </div>
                                <div class="form-group d-flex">
                                    <div class="mr-2 w-50">
                                        <label for="card_load_fee">Card Load Fee</label>
                                        <input type="number" class="form-control" value="{{ $plan->card_load_fee }}" name="card_load_fee" id="card_load_fee" required>
                                    </div>
                                    <div class="w-50">
                                        <label for="card_load_fee">Percentage</label>
                                        <input type="number" class="form-control" value="{{ $plan->card_load_fee_percentage }}" name="card_load_fee_percentage" id="card_load_fee_percentage" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="min_load">Min Load</label>
                                    <input type="number" class="form-control" value="{{ $plan->min_load }}" name="min_load" id="min_load" required>
                                </div>
                                <div class="form-group">
                                    <label for="min_load">Max Load</label>
                                    <input type="number" class="form-control" value="{{ $plan->max_load }}" name="max_load" id="max_load" required>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn--primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('breadcrumb-plugins')
    <a href="{{ route('admin.virtualCard.plan') }}" class="btn btn-sm btn--primary box--shadow1 text--small addNew">
        <i class="las la-plus"></i>
        All Plan
    </a>
@endpush

@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table--light style--one">
                            <thead>
                            <tr>
                                <th>@lang('SL')</th>
                                <th>User Name</th>
                                <th>Card Number</th>
                                <th>Amount</th>
                                <th>Description</th>
                                <th>Transaction ID</th>
                                <th>Status</th>
                                <th>Created</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($transactions as $row)
                                    <tr>
                                        <td>{{ ($transactions->currentPage()-1) * $transactions->perPage() + $loop->index + 1 }}</td>
                                        <td>{{ $row->user_info->firstname }} {{ $row->user_info->lastname }}</td>
                                        <td>{{ $row->card->card_pan }}</td>
                                        <td>{{ $row->amount }} {{ $row->card->currency }}</td>
                                        <td>{{ $row->description }}</td>
                                        <td>{{ $row->trx }}</td>
                                        <td>{{ $row->status }}</td>
                                        <td>{{ date('d-m-Y H:i:s', strtotime($row->created_at)) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-center py-4">
                    {{ $transactions->links() }}
                </div>
            </div>
        </div>
    </div>


@endsection

@push('breadcrumb-plugins')
    <div class="d-flex align-items-end justify-content-end align-items-xl-center flex-column flex-xl-row flex-wrap">
        <form action="{{ route('admin.filterVirtualTransaction') }}" method="get" class="d-flex justify-content-end align-items-end align-items-xl-center flex-column flex-xl-row  flex-wrap mr-2">
            <div class="form-group mb-1">
                <input type="text" class="form-control datepicker-here bg-white text-dark" data-language="en" name="start_date" @isset($start_date) value="{{ $start_date }}" @endisset placeholder="Star Date" autocomplete="off">
            </div>
            <div class="form-group mb-1 ml-2">
                <input type="text" class="form-control datepicker-here bg-white text-dark" data-language="en" name="end_date" @isset($end_date) value="{{ $end_date }}" @endisset placeholder="End Date" autocomplete="off">
            </div>
            <div class="form-group mb-1 ml-2">
                <button type="submit" class="btn btn--primary box--shadow1 text--small">Filter</button>
            </div>
        </form>
        <a href="{{ route('admin.virtualCard') }}" class="btn btn--primary box--shadow1 text--small addNew mb-1">
            <i class="las la-table"></i>
            @lang('Cards')
        </a>
    </div>
@endpush



@push('script-lib')
    <script src="{{ asset('assets/admin/js/vendor/datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendor/datepicker.en.js') }}"></script>
@endpush
@push('script')
    <script>
        (function($){
            "use strict";
            if(!$('.datepicker-here').val()){
                $('.datepicker-here').datepicker();
            }
        })(jQuery)
    </script>
@endpush

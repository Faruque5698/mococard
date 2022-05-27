@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table--light style--two">
{{--                            @php(dd($transaction))--}}
                            <thead>
                            <tr>
                                <th>@lang('SL')</th>
                                <th>Amount</th>
                                <th>Description</th>
                                <th>Reference</th>
                                <th>Status</th>
                                <th>Created</th>
                            </tr>
                            </thead>
                            @php($i = 1)
                            <tbody>
                                @if(isset($transaction->data) && count($transaction->data))
                                    @foreach($transaction->data as $row)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $row->amount }} {{ $row->currency }}</td>
                                            <td>{{ $row->gateway_reference_details }}</td>
                                            <td>{{ $row->reference }}</td>
                                            <td>{{ $row->status }}</td>
                                            <td>{{ date('d-m-Y H:i:s', strtotime($row->created_at)) }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td class="text-center" colspan="6">{{ $emptyMessage }}</td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
{{--                    {{ $transaction->data->links() }}--}}
                </div>
            </div>
        </div>
    </div>

    {{-- ACTIVATE METHOD MODAL --}}
    <div id="deleteModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Confirmation')!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.card.delete') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <p>@lang('Are you sure to delete this card')?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--dark" data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn--primary">@lang('Delete')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('breadcrumb-plugins')
    <div class="d-flex align-items-end justify-content-end align-items-xl-center flex-column flex-xl-row flex-wrap">
        <form action="{{ route('admin.filterTransactionDetails') }}" method="get" class="d-flex justify-content-end align-items-end align-items-xl-center flex-column flex-xl-row  flex-wrap mr-2">
            <input type="hidden" name="card_id" value="{{ $transaction_id }}">
            <div class="form-group mb-1">
                <input type="text" class="form-control datepicker-here bg-white text-dark" data-language="en" name="start_date" value="{{ date('m/d/Y', strtotime($start_date)) }}" placeholder="Star Date" autocomplete="off">
            </div>
            <div class="form-group mb-1 ml-2">
                <input type="text" class="form-control datepicker-here bg-white text-dark" data-language="en" name="end_date" value="{{ date('m/d/Y', strtotime($end_date)) }}" placeholder="End Date" autocomplete="off">
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

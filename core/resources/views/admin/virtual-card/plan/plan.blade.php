@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                            <tr>
                                <th>@lang('SL')</th>
                                <th>Name</th>
                                <th>Card Issuance Fee</th>
                                <th>Card Load Fee</th>
                                <th>Min Load</th>
                                <th>Max Load</th>
                                <th>Funding</th>
                                <th>Block</th>
                                <th>Terminate</th>
                                <th>Status</th>
                                <th>@lang('Action')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i= 1)
                            @forelse($plans as $plan)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $plan->name }}</td>
                                    <td>{{ __($general->cur_sym) }}{{ $plan->card_issuance_fee }}</td>
                                    <td>{{ __($general->cur_sym) }}{{ $plan->card_load_fee }} ({{ $plan->card_load_fee_percentage }}%)</td>
                                    <td>{{ __($general->cur_sym) }}{{ $plan->min_load }}</td>
                                    <td>{{ __($general->cur_sym) }}{{ $plan->max_load }}</td>
                                    <td>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" @if($plan->funding) checked @endif onchange="ChangeType('funding', {{ $plan->id }})" class="custom-control-input" id="funding-{{ $plan->id }}">
                                            <label class="custom-control-label" for="funding-{{ $plan->id }}"></label>
                                        </div>
                                    </td>
{{--                                    <td>--}}
{{--                                        <div class="custom-control custom-switch">--}}
{{--                                            <input type="checkbox" @if($plan->withdraw) checked @endif  onchange="ChangeType('withdraw', {{ $plan->id }})" class="custom-control-input" id="withdraw-{{ $plan->id }}">--}}
{{--                                            <label class="custom-control-label" for="withdraw-{{ $plan->id }}"></label>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
                                    <td>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" @if($plan->block) checked @endif onchange="ChangeType('block', {{ $plan->id }})" class="custom-control-input" id="block-{{ $plan->id }}">
                                            <label class="custom-control-label" for="block-{{ $plan->id }}"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" @if($plan->terminate) checked @endif onchange="ChangeType('terminate', {{ $plan->id }})" class="custom-control-input" id="terminate-{{ $plan->id }}">
                                            <label class="custom-control-label" for="terminate-{{ $plan->id }}"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" @if($plan->status) checked @endif onchange="ChangeType('status', {{ $plan->id }})" class="custom-control-input" id="status-{{ $plan->id }}">
                                            <label class="custom-control-label" for="status-{{ $plan->id }}"></label>
                                        </div>
                                    </td>

                                    <td data-label="@lang('Action')">
                                        <a href="{{ route('admin.virtualCard.planEdit', $plan->id) }}" class="icon-btn editBtn" data-toggle="tooltip" title="Edit" data-original-title="@lang('Edit')"

                                        >
                                            <i class="las la-edit text--shadow"></i>
                                        </a>

                                        <a href="#" class="icon-btn deleteBtn bg--danger ml-2" data-toggle="tooltip" title="Delete" data-original-title="@lang('Delete')"
                                           data-id="{{ $plan->id }}"
                                        >
                                            <i class="las la-trash text--shadow"></i>
                                        </a>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}!</td>
                                </tr>
                            @endforelse

                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
{{--                <div class="card-footer py-4">--}}
{{--                    {{ paginateLinks($plans) }}--}}
{{--                </div>--}}
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
                <form action="{{ route('admin.virtualCard.planDelete') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <p>@lang('Are you sure to delete this plan')?</p>
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
    <a href="{{ route('admin.virtualCard.planCreate') }}" class="btn btn-sm btn--primary box--shadow1 text--small addNew">
        <i class="las la-plus"></i>
        @lang('Add New')
    </a>
@endpush

@push('script')
    <script>
        (function ($) {
            "use strict";

            $('.deleteBtn').on('click', function () {
                var modal = $('#deleteModal');
                modal.find('input[name=id]').val($(this).data('id'));
                modal.modal('show');
            });

        })(jQuery);

        function ChangeType(type, id){
            var APP_URL = {!! json_encode(url('/')) !!};
            let input = $('#' + type+ '-' + id);
            let status;
            if (input.prop('checked')){
                status = 1;
            }else {
                status = 0;
            }
            $.ajax({
               url: APP_URL+'/admin/virtual-card/plan-type-change',
               type: "post",
               data: {'type':type, 'id': id, status, '_token':$('meta[name=csrf-token]').attr("content")},
               dataType: "json",
               success: function(response){
                   console.log(type + ' changed successfully')
               }
           });
        }
    </script>
@endpush

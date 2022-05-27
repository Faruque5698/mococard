@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--md  table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                            <tr>
                                <th>@lang('SL')</th>
                                <th>@lang('Category')</th>
                                <th>@lang('Sub Category')</th>
                                <th>@lang('Price')</th>
                                <th>@lang('Buyer')</th>
                                <th>@lang('Action')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($cards as $card)
                            <tr>

                                <td data-label="@lang('SL')">
                                    {{ $loop->index + 1 }}
                                </td>

                                <td data-label="@lang('Category')">
                                    <span class="font-weight-bold">
                                        {{ __($card->subCategory->category->name) }}
                                    </span>
                                </td>

                                <td data-label="@lang('Sub Category')">
                                    <span class="font-weight-bold">
                                        {{ __($card->subCategory->name) }}
                                    </span>
                                </td>

                                <td data-label="@lang('Price')">
                                    {{ showAmount($card->subCategory->price, 2) }}
                                    {{ __($general->cur_text) }}
                                </td>

                                <td data-label="@lang('Buyer')">
                                    @if($card->user_id)
                                        <span class="font-weight-bold">
                                            {{@$card->user->fullname}}
                                        </span>
                                        <br>
                                        <span class="small">
                                            <a href="{{ route('admin.users.detail', $card->user_id) }}">
                                                <span>@</span>{{ @$card->user->username }}
                                            </a>
                                        </span>
                                    @else
                                        <span class="badge badge--primary">@lang('N/A')</span>
                                    @endif
                                </td>

                                <td data-label="@lang('Action')">
                                    <a href="{{ route('admin.card.edit.page', $card->id) }}" class="icon-btn editBtn" data-toggle="tooltip" title="Edit" data-original-title="@lang('Edit')"
                                    data-name="{{ $card->name }}"
                                    data-id="{{ $card->id }}"
                                    >
                                        <i class="las la-edit text--shadow"></i>
                                    </a>
                                    @if(!$card->user_id)
                                        <a href="#" class="icon-btn deleteBtn bg--danger ml-2" data-toggle="tooltip" title="Delete" data-original-title="@lang('Delete')"
                                        data-id="{{ $card->id }}"
                                        >
                                            <i class="las la-trash text--shadow"></i>
                                        </a>
                                    @endif
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
                <div class="card-footer py-4">
                    {{ paginateLinks($cards) }}
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
    <a href="{{ route('admin.card.add.page') }}" class="btn btn-sm btn--primary box--shadow1 text--small addNew">
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
    </script>
@endpush

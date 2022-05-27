@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    @if(isset($cards) && count($cards))
                        <div class="table-responsive" style="min-height: 300px">
                            <table class="table table--light style--two">
                                <thead>
                                <tr>
                                    <th>@lang('SL')</th>
                                    <th>Card Name</th>
                                    <th>Card No</th>
                                    <th>Card Type</th>
                                    <th>Currency</th>
                                    <th>Amount</th>
                                    <th>Reloadable</th>
                                    <th>Blocked</th>
                                    <th>Terminated</th>
                                    <th>@lang('Action')</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($cards as $row)
                                        <tr>
                                            <td>
                                                {{ ($cards->currentPage()-1) * $cards->perPage() + $loop->index + 1 }}
                                                <div class="d-none" id="details-{{ $row->card_id }}">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item"><strong>State</strong> : {{ $row->state }}</li>
                                                        <li class="list-group-item"><strong>City</strong> : {{ $row->city }}</li>
                                                        <li class="list-group-item"><strong>Zip Code</strong> : {{ $row->zip_code }}</li>
                                                        <li class="list-group-item"><strong>Address</strong> : {{ $row->address }}</li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td>{{ $row->name_on_card }}</td>
                                            <td>{{ $row->card_pan }}</td>
                                            <td>{{ $row->card_type }}</td>
                                            <td>{{ $row->currency }}</td>
                                            <td>{{ $row->amount }}</td>
                                            <td>
                                                @if($row->funding)
                                                    <i class="fa fa-check"></i>
                                                @else
                                                    <i class="fa fa-times"></i>
                                                @endif
                                            </td>
                                            <td>
                                                @if(!$row->is_active)
                                                    <i class="fa fa-check"></i>
                                                @else
                                                    <i class="fa fa-times"></i>
                                                @endif
                                            </td>
                                            <td>
                                                @if($row->terminate)
                                                    <i class="fa fa-check"></i>
                                                @else
                                                    <i class="fa fa-times"></i>
                                                @endif
                                            </td>
                                            <td data-label="@lang('Action')">
                                                <div class="dropdown">
                                                    <button class="btn btn--primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                                       Action
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <li>
                                                            <a class="dropdown-item" href="{{ route('admin.transactionDetails', ['id'=>$row->card_id]) }}">
                                                                Transactions
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="#" onclick="ShowCardDetails('{{ $row->card_id }}')">
                                                                Card Details
                                                            </a>
                                                        </li>

                                                        @if(!$row->terminate)
                                                        <li>
                                                            <a class="dropdown-item terminated" href="#" data-id="{{ $row->card_id }}">
                                                                Terminate
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item block" href="#" data-id="{{ $row->card_id }}" data-status="@if($row->is_active) block @else unblock @endif">
                                                                @if($row->is_active) Block @else Unblock @endif
                                                            </a>
                                                        </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        @isset($searched)
                            <div class="text-center text-muted p-5"> <h5>Not Found</h5> </div>
                        @endif
                    @endif
                    <div class="p-4 d-flex justify-content-center">
                        {{ $cards->withQueryString()->links() }}
                    </div>
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


{{--    Terminate--}}
    <div id="TerminateModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Confirmation')!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.cardTerminate') }}" method="POST">
                    @csrf
                    <input type="hidden" name="card_id">
                    <div class="modal-body">
                        <p>@lang('Are you sure to terminate this card')?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--dark" data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn--primary">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

{{--    Block--}}

    <div id="BlockModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Confirmation')!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.cardBlock') }}" method="POST">
                    @csrf
                    <input type="hidden" name="status">
                    <input type="hidden" name="card_id">
                    <div class="modal-body">
                        <p>@lang('Are you sure to block this card')?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--dark" data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn--primary">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="detailsModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Card Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-boady" id="modalBody">


                </div>
            </div>
        </div>
    </div>

@endsection
@push('script')
    <script>
        (function ($) {
            "use strict";

            //For Terminate
            $('.terminated').on('click', function () {
                var modal = $('#TerminateModal');
                modal.find('input[name=card_id]').val($(this).data('id'));
                modal.modal('show');
            });

            //For Block
            $('.block').on('click', function () {
                var modal = $('#BlockModal');
                modal.find('input[name=card_id]').val($(this).data('id'));
                modal.find('input[name=status]').val($(this).data('status'));
                modal.modal('show');
            });

        })(jQuery);

        function ShowCardDetails(cardId){
            let cardDetails =  $('#details-'+ cardId).html();
            $('#detailsModal').modal().open;
            $('#modalBody').html(cardDetails);
        }
    </script>
@endpush

@push('breadcrumb-plugins')
    <div class="d-flex align-items-end justify-content-end align-items-xl-center flex-column flex-xl-row flex-wrap">
        <form action="{{ route('admin.filterVirtualCard') }}" method="get" class="d-flex justify-content-end align-items-end align-items-xl-center flex-column flex-xl-row  flex-wrap mr-2">
            <div class="form-group mb-1">
                <input type="text" class="form-control datepicker-here bg-white text-dark" data-language="en" @isset($name) value="{{ $name }}" @endisset name="name" placeholder="Type Name" autocomplete="off">
            </div>
            <div class="form-group mb-1 ml-2">
                <input type="text" class="form-control datepicker-here bg-white text-dark" data-language="en" @isset($card_no) value="{{ $card_no }}" @endisset name="card_no" placeholder="Type Card Number" autocomplete="off">
            </div>
            <div class="form-group mb-1 ml-2">
                <button type="submit" class="btn btn--primary box--shadow1 text--small">Filter</button>
            </div>
        </form>
    </div>
@endpush


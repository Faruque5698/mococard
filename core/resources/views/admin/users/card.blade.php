@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--md  table-responsive" style="min-height: 300px">
                        <table class="table table--light style--two">
                            <thead>
                            <tr>
                                <th>@lang('SL')</th>
                                <th>Card Name</th>
                                <th>Card Type</th>
                                <th>Currency</th>
                                <th>Amount</th>
                                <th>@lang('Action')</th>
                            </tr>
                            </thead>
                            @php($i = 1)
                            <tbody>
                            @foreach($cards as $row)
                                <tr>
                                    <td>
                                        {{ $i++ }}
                                        <div class="d-none" id="details-{{ $row->card_id }}">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item"><strong>State</strong> : {{ $row->state }}</li>
                                                <li class="list-group-item"><strong>City</strong> : {{ $row->city }}</li>
                                                <li class="list-group-item"><strong>Zip Code</strong> : {{ $row->zip_code }}</li>
                                                <li class="list-group-item"><strong>Address</strong> : {{ $row->address_1 }}</li>
                                            </ul>
                                        </div>
                                    </td>
                                    <td>{{ $row->name_on_card }}</td>
                                    <td>{{ $row->card_type }}</td>
                                    <td>{{ $row->currency }}</td>
                                    <td>{{ $row->amount }}</td>
                                    <td data-label="@lang('Action')">
                                        <div class="dropdown">
                                            <button class="btn btn--primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                                Action
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('admin.transactionDetails', ['id'=>$row->card_id, 'start_date'=>$row->created_at]) }}">
                                                        Transactions
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#" onclick="ShowCardDetails('{{ $row->card_id }}')">
                                                        Card Details
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item terminated" href="#" data-id="{{ $row->card_id }}">
                                                        Terminate
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item block" href="#" href="#" data-id="{{ $row->card_id }}" data-status="@if($row->is_active) block @else unblock @endif">
                                                        @if($row->is_active) Block @else Unblock @endif
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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
            //Show Card Details
            function ShowCardDetails(cardId){
                let cardDetails =  $('#details-'+ cardId).html();
                $('#detailsModal').modal().open;
                $('#modalBody').html(cardDetails);
            }

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
    </script>
@endpush


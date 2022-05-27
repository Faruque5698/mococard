@extends($extends)

@section('content')
<div class="container {{ Auth::user() ? '' : 'pt-80 pb-80' }}">
    <div class="message__chatbox bg--section">
        <div class="message__chatbox__header">
            <h5 class="title">
                @if($my_ticket->status == 0)
                    <span class="badge badge--success">@lang('Open')</span>
                @elseif($my_ticket->status == 1)
                    <span class="badge badge--primary">@lang('Answered')</span>
                @elseif($my_ticket->status == 2)
                    <span class="badge badge--warning">@lang('Replied')</span>
                @elseif($my_ticket->status == 3)
                    <span class="badge badge--dark">@lang('Closed')</span>
                @endif
                <span class="text--base">#{{ $my_ticket->ticket }}</span>
            </h5>
            @if($my_ticket->status != 3)
                <a href="#0" class="cmn--btn btn--sm" data-bs-toggle="modal" data-bs-target="#DelModal">@lang('Close')</a>
            @endif
        </div>
        <div class="message__chatbox__body">
            <form class="message__chatbox__form row" method="post" action="{{ route('ticket.reply', $my_ticket->id) }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="replayTicket" value="1">
                <div class="form--group col-sm-12">
                    <textarea class="form-control form--control" name="message"></textarea>
                </div>
                <div class="form--group col-sm-12">
                    <div class="d-flex">
                        <div class="left-group col p-0">
                            <label for="file" class="form--label">@lang('Attachments')</label>
                            <input type="file" class="overflow-hidden form-control form--control mb-2" name="attachments[]" id="inputAttachments">
                            <span class="info fs--14">
                                @lang('Allowed File Extensions'): .@lang('jpg'), .@lang('jpeg'), .@lang('png'), .@lang('pdf'), .@lang('doc'), .@lang('docx')
                            </span>
                        </div>
                        <div class="add-area">
                            <label class="form--label d-block">&nbsp;</label>
                            <button class="cmn--btn btn--sm bg--primary form--control ms-2 ms-md-4 addFile" type="button"><i class="las la-plus"></i></button>
                        </div>
                    </div>
                </div>

                <div id="fileUploadsContainer"></div>

                <div class="form--group col-sm-12 mt-2 mb-0">
                    <button type="submit" class="cmn--btn btn--lg">@lang('Reply')</button>
                </div>
            </form>
        </div>
    </div>

    <div class="message__chatbox bg--section mt-5">
        <div class="message__chatbox__header">
            <h5 class="title">@lang('Conversation')</h5>
        </div>
        <div class="message__chatbox__body">
            <ul class="reply-message-area">
                <li>
                    @foreach($messages as $message)
                        @if($message->admin_id == 0)
                            <li>
                                <div class="reply-item">
                                    <div class="name-area">
                                        <h6 class="title">{{ $message->ticket->name }}</h6>
                                    </div>
                                    <div class="content-area">
                                        <span class="meta-date">
                                            @lang('Posted on') <span class="cl-theme">{{ $message->created_at->format('l, dS F Y @ H:i') }}</span>
                                        </span>
                                        <p>{{$message->message}}</p>
                                        @if($message->attachments()->count() > 0)
                                            <div class="mt-2">
                                                @foreach($message->attachments as $k=> $image)
                                                    <a href="{{route('ticket.download',encrypt($image->id))}}" class="mr-3"><i class="fa fa-file"></i>  @lang('Attachment') {{++$k}} </a>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </li>
                        @else
                            <ul>
                                <li>
                                    <div class="reply-item">
                                        <div class="name-area">
                                            <h6 class="title">{{ $message->admin->name }}</h6>
                                        </div>
                                        <div class="content-area">
                                            <span class="meta-date">
                                                @lang('Posted on'), <span class="cl-theme">{{ $message->created_at->format('l, dS F Y @ H:i') }}</span>
                                            </span>
                                            <p>{{$message->message}}</p>
                                            @if($message->attachments()->count() > 0)
                                                <div class="mt-2">
                                                    @foreach($message->attachments as $k=> $image)
                                                        <a href="{{route('ticket.download',encrypt($image->id))}}" class="mr-3"><i class="fa fa-file"></i>  @lang('Attachment') {{++$k}} </a>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        @endif
                    @endforeach
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="modal fade cmn--modal" id="DelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="post" action="{{ route('ticket.reply', $my_ticket->id) }}">
                @csrf
                <input type="hidden" name="replayTicket" value="2">
                <div class="modal-header">
                    <h5 class="modal-title"> @lang('Confirmation')!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <strong >@lang('Are you sure you want to close this support ticket')?</strong>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn--md btn--danger" data-bs-dismiss="modal">@lang('Close')</button>
                    <button type="submit" class="btn btn--md btn--success">@lang("Confirm")
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('script')
    <script>
        (function ($) {
            "use strict";
            $('.delete-message').on('click', function (e) {
                $('.message_id').val($(this).data('id'));
            });

            $('.addFile').on('click',function(){
                $("#fileUploadsContainer").append(
                    `<div class="form--group col-sm-12">
                    <div class="d-flex">
                        <div class="left-group col p-0">
                            <input type="file" class="overflow-hidden form-control form--control mb-2" name="attachments[]" id="inputAttachments">
                        </div>
                        <div class="add-area">
                            <button class="cmn--btn btn--sm bg-danger form--control ms-2 ms-md-4 remove-btn" type="button"><i class="las la-times"></i></button>
                        </div>
                    </div>
                </div>`
                )
            });

            $(document).on('click','.remove-btn',function(){
                $(this).closest('.form--group').remove();
            });
        })(jQuery);

    </script>
@endpush

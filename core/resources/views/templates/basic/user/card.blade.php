@extends($activeTemplate.'layouts.master')


@section('custom-style')
    <style>
        /* Card List*/
        .virtual-card-tab nav .nav-tabs .nav-link {
            color: #081831;
            font-size: 20px;
            font-weight: 600;
            padding: 10px 30px;
            background: #fff;
            border: none;
            border-radius: 0;
            border-bottom: solid 1px #f0f5fc;
        }

        .virtual-card-tab nav .nav-tabs .nav-link.active {
            background: #ff6a00;
            color: #fff;
        }

        .virtual-card-tab nav .nav-tabs .nav-link:first-child {
            border-radius: 10px 0 0 0;
        }

        .virtual-card-tab nav .nav-tabs .nav-link:last-child {
            border-radius: 0 10px 0 0;
        }

        .virtual-card-tab .tab-content {
            border-radius: 0 10px 10px 10px;
        }

        .virtual-card-tab nav .nav-tabs {
            border-bottom: none;
        }

        /* Card action */
        .card-action {
            position: absolute;
            top: 105%;
            width: 180px;
            display: none;
            z-index: 2000;
        }

        .card-action:before {content: "";width: 10px;height: 10px;position: absolute;left: calc(15% - 5px);z-index: -1;transform: rotate(45deg);top: -5px;background: #c9c9c9;}

        .card-action .list-group .list-group-item {
            padding: 3px 15px;
            cursor: pointer;
            font-weight: 500;
            color: #081831;
            border: none;
            border-bottom: solid 1px #edeaea;
        }

        .card-action .list-group .list-group-item a {
            color: #081831;
        }

        .card-action .list-group .list-group-item:last-child {
            border-bottom: none;
        }

        .card-action .list-group {
            border-radius: 10px;
            box-shadow: 0 0 10px 5px rgb(0 0 0 / 6%);
            border-top: solid 2px #c3c3c3;
        }

        /* copy */
        small.copy {
            background: #444444d6;
            color: #fff;
            padding: 1px 10px;
            border-radius: 20px;
            position: absolute;
            font-size: 12px;
            top: 0px;
            width: 250px;
            left: calc(50% - 125px);
        }

        span.card-no {
            position: relative;
        }

        /* Card List*/
        .virtual-cards {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .virtual-card{
            width: 340px;
            height: 220px;
        //-webkit-perspective: 600px;
        //-moz-perspective: 600px;
        //perspective:600px;
            font-family: 'Graphik';
            margin: 10px;
            border: none;

        }

        .card-part{
            box-shadow: 0 1px 10px 1px rgba(0,0,0,0.3);
            position: absolute;
            z-index: 1000;
            display: inline-block;
            width: 340px;
            height: 220px;
            -webkit-transition: all .5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            -moz-transition: all .5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            -ms-transition: all .5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            -o-transition: all .5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            transition: all .5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            -webkit-transform-style: preserve-3d;
            -moz-transform-style: preserve-3d;
            -webkit-backface-visibility: hidden;
            -moz-backface-visibility: hidden;
        }
        .virtual-bg-newlife{
            background-image:linear-gradient(to right, #43e97b 0%, #38f9d7 100%);
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            border-radius: 8px;
        }
        .virtual-bg-morpheusden{
            background-image:linear-gradient(to top, #30cfd0 0%, #330867 100%);
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            border-radius: 8px;
        }
        .virtual-bg-sharpblues{
            background-image:linear-gradient(to top, #00c6fb 0%, #005bea 100%);
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            border-radius: 8px;
        }
        .virtual-bg-fruitblend{
            background-image:linear-gradient(to right, #f9d423 0%, #ff4e50 100%);
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            border-radius: 8px;
        }
        .virtual-bg-deepblue{
            background-image:linear-gradient(to right, #6a11cb 0%, #2575fc 100%);
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            border-radius: 8px;
        }
        .virtual-bg-fabledsunset{
            background-image:linear-gradient(-225deg, #231557 0%, #44107A 29%, #FF1361 67%, #FFF800 100%);
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            border-radius: 8px;
        }

        .card-front-part{
            padding: 18px;
            -webkit-transform: rotateY(0);
            -moz-transform: rotateY(0);
        }

        .virtual-card-back {
            padding: 18px 0;
            -webkit-transform: rotateY(-180deg);
            -moz-transform: rotateY(-180deg);
        }

        .virtual-card-black-line {
            margin-top: 5px;
            height: 38px;
            background-color: #303030;
        }

        .virtual-card-logo {
            height: 16px;
        }
        .virtual-card-logo2 {
            height: 50px;
        }

        .virtual-card-front-part-logo{
            position: absolute;
            top: 18px;
            right: 18px;
        }
        .virtual-card-front-part-logo2{
            position: absolute;
            bottom: 28px;
            right: 18px;
        }
        .virtual-card-square {
            border-radius: 5px;
            height: 30px;
        }

        .card-number {
            display: block;
            width: 100%;
            word-spacing: 4px;
            font-size: 20px;
            font-weight: 500;
            letter-spacing: 2px;
            color: #fff;
            text-align: center;
            margin-bottom: 20px;
            margin-top: 20px;
        }
        .card-number {
            display: block;
            width: 100%;
            word-spacing: 4px;
            font-size: 20px;
            font-weight: 500;
            letter-spacing: 2px;
            color: #fff;
            text-align: center;
        }

        .virtual-card-space-75 {
            width: 75%;
            float: left;
        }

        .virtual-card-space-25 {
            width: 25%;
            float: left;
        }

        .virtual-card-label {
            font-size: 10px;
            text-transform: uppercase;
            color: rgba(255,255,255,0.8);
            letter-spacing: 1px;
        }

        .virtual-card-info {
            margin-bottom: 0;
            margin-top: 5px;
            font-size: 16px;
            line-height: 18px;
            color: #fff;
        }
        .virtual-card-info2 {
            margin-bottom: 0;
            margin-top: 5px;
            font-size: 13px;
            line-height: 18px;
            color: #fff;
        }
        .virtual-card-back-content {
            padding: 15px 15px 0;
        }
        .virtual-card__secret--last {
            color: #303030;
            text-align: right;
            margin: 0;
            font-size: 14px;
        }

        .virtual-card__secret {
            padding: 5px 12px;
            background-color: #fff;
            position:relative;
        }

        .virtual-card__secret:before{
            content:'';
            position: absolute;
            top: -3px;
            left: -3px;
            height: calc(100% + 6px);
            width: calc(100% - 42px);
            border-radius: 4px;
            background: repeating-linear-gradient(45deg, #ededed, #ededed 5px, #f9f9f9 5px, #f9f9f9 10px);
        }

        .virtual-card-back-logo {
            position: absolute;
            bottom: 15px;
            right: 15px;
        }
        .virtual-card-back-logo2 {
            position: absolute;
            bottom: 25px;
            right: 15px;
        }

        .virtual-card-back-square {
            position: absolute;
            bottom: 15px;
            left: 15px;
        }
        .virtual-card:hover .card-front-part {
            -webkit-transform: rotateY(180deg);
            -moz-transform: rotateY(180deg);

        }

        .virtual-card:hover .virtual-card-back {
            -webkit-transform: rotateY(0deg);
            -moz-transform: rotateY(0deg);
        }
    </style>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center mt-2">
        <div class="col-md-12">
            <div class="virtual-card-tab">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="card-tab" data-bs-toggle="tab" data-bs-target="#card" type="button" role="tab" aria-controls="card" aria-selected="true">Cards</button>
                        <button class="nav-link" id="card-list-tab" data-bs-toggle="tab" data-bs-target="#card-list" type="button" role="tab" aria-controls="card-list" aria-selected="false">Card List</button>
                    </div>
                </nav>
                <div class="tab-content p-4 bg-white" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="card" role="tabpanel" aria-labelledby="card-tab">
                        <div class="virtual-cards">
                            @foreach($cards as $card)
                                <div class="card virtual-card">
                                    <div>
                                    <div class="card-front-part card-part {{ $card->bg }}">
                                        <img class="virtual-card-square" src="{{ asset('assets/images/frontend/card/card-logo.png') }}">
                                        <div class="virtual-card-front-part-logo virtual-card-logo text-white"> @if($card->live_amount) {{ $card->live_amount }} @else {{ $card->amount }} @endif  {{ $card->currency }} </div>

                                        <p class="card-number mb-0"><img class="virtual-card-logo2 mb-0 pb-0" src="{{ asset('assets/images/frontend/card/silver.png') }}"><span class="card-number-make">{{ $card->card_pan }}</span></p>
                                        <div class="virtual-card-space-75 mt-5">
                                            <span class="virtual-card-label">VALID TILL <span class="virtual-card-info2">{{ $card->expiration }}</span></span>
                                            <p class="virtual-card-info">{{ $card->name_on_card }}</p>
                                        </div>
                                        <div class="virtual-card-space-25">
                                            <img class="virtual-card-front-part-logo2 virtual-card-logo" src="{{ asset('assets/images/frontend/card/mastercard.png') }}">
                                        </div>
                                    </div>

                                    <div class="virtual-card-back card-part {{ $card->bg }}">
                                        <div class="virtual-card-black-line"></div>
                                        <div class="virtual-card-back-content">
                                            <div class="virtual-card__secret">
                                                <p class="virtual-card__secret--last">{{ $card->cvv }}</p>
                                            </div>
                                            <img class="virtual-card-back-square virtual-card-square" src="{{ asset('assets/images/frontend/card/card-logo.png') }}">
                                            <div class="virtual-card-back-logo2 virtual-card-logo">
                                                <span class="badge badge-pill badge-success">
                                                    @if(!$card->terminate)
                                                        @if($card->is_active)
                                                            Active
                                                        @else
                                                            Blocked
                                                        @endif
                                                    @else
                                                        Terminated
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    </div>

                                    <div class="card-action" style="display: none">
                                        <ul class="list-group">
                                            <li class="list-group-item"><a class="w-100" href="{{ route('user.card.transaction', ['id' => $card->card_id ]) }}">Transactions</a></li>
                                            <li class="list-group-item" onclick="ShowCardDetails('{{ $card->card_id }}')">Card Details</li>
                                            @if(!$card->terminate)
                                                <li  class="list-group-item"><a class="deleteBtn w-100" href="#" data-id="{{ $card->card_id }}">Terminate</a></li>
                                                @if($card->funding)
                                                    <li class="list-group-item"><a class="w-100" href="{{ route('user.card.reload', ['id' => $card->id ]) }}">Reload</a></li>
                                                @endif
                                            @endif

                                        </ul>
                                    </div>

                                    <div class="d-none" id="details-{{ $card->card_id }}">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><strong>State</strong> : {{ $card->state }}</li>
                                            <li class="list-group-item"><strong>City</strong> : {{ $card->city }}</li>
                                            <li class="list-group-item"><strong>Zip Code</strong> : {{ $card->zip_code }}</li>
                                            <li class="list-group-item"><strong>Address</strong> : {{ $card->address }}</li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="card-list" role="tabpanel" aria-labelledby="card-list-tab">
                        <div class="table-responsive" style="min-height: 500px;">
                            <table class="table cmn--table">
                                <thead class="thead-dark">
                                <tr>
                                    <th>Sl</th>
                                    <th>Card Name</th>
                                    <th>Card No</th>
                                    <th>Amount</th>
                                    <th>Reloadable</th>
                                    <th>Expiration</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i = 1)
                                @forelse($cards as $row)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $row->name_on_card }}</td>
                                        <td><span class="card-no">{{ $row->card_pan }}</span></td>
                                        <td>@if($card->live_amount) {{ $card->live_amount }} @else {{ $card->amount }} @endif  {{ $card->currency }} </td>
                                        <td>@if($row->funding) <i class="fa fa-check"></i> @else <i class="fa fa-times"></i> @endif</td>
                                        <td>{{ $row->expiration }}</td>
                                        <td>
                                            @if(!$card->terminate)
                                                @if($card->is_active)
                                                    <span class="text-success">Active</span>
                                                @else
                                                    <span class="text-danger">Blocked</span>
                                                @endif
                                            @else
                                                <span class="text-danger">Terminated</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <a href="#" class="btn btn--primary dropdown-toggle custom-drop-event">
                                                    Action
                                                </a>
                                                <ul class="dropdown-menu d-none">
                                                    <li><a class="dropdown-item" href="{{ route('user.card.transaction', ['id' => $card->card_id ]) }}">Transactions</a></li>
                                                    <li><a class="dropdown-item" href="#" onclick="ShowCardDetails('{{ $row->card_id }}')">Card Details</a></li>

                                                    @if(!$card->terminate)
                                                        <li><a class="dropdown-item terminated deleteBtn" href="#" data-id="{{ $row->card_id }}">Terminate</a></li>
                                                        @if($card->funding)
                                                        <li><a class="dropdown-item block" href="{{ route('user.card.reload', ['id' => $row->id ]) }}" data-id="{{ $row->id }}">Reload</a></li>
                                                        @endif
                                                    @endif
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="100%">@lang('Data Not Found')!</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="detailsModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Card Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalBody">


            </div>
        </div>
    </div>
</div>
<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">@lang('Confirmation')!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('user.card.terminate.card') }}" method="POST">
                @csrf
                <input type="hidden" name="card_id">
                <div class="modal-body">
                    <p>@lang('Are you sure to terminate this card')?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('Close')</button>
                    <button type="submit" class="btn btn--primary">Terminate</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('script')
    <script>
        ;(function ($){
            $("window").ready(function (){
                $(".card-number-make").each(function(){
                    let cardNo = $(this).text()
                    let cn = cardNo.match(/.{1,4}/g);
                    $(this).html(cn.join(' '))
                });

                // copy to clipboard
                $('.card-no').click(function (){
                    var text = $(this).text();
                    let _this = $(this);
                    navigator.clipboard.writeText(text).then(function() {
                        $(_this).parent().css('position', 'relative').append('<small class="copy">Copying to clipboard was successful!</small>');

                       // select text
                        var sel, range;
                        var el = $(_this)[0];
                        if (window.getSelection && document.createRange) { //Browser compatibility
                            sel = window.getSelection();
                            if(sel.toString() == ''){ //no text selection
                                window.setTimeout(function(){
                                    range = document.createRange(); //range object
                                    range.selectNodeContents(el); //sets Range
                                    sel.removeAllRanges(); //remove all ranges from selection
                                    sel.addRange(range);//add Range to a Selection.
                                },1);
                            }
                        }else if (document.selection) { //older ie
                            sel = document.selection.createRange();
                            if(sel.text == ''){ //no text selection
                                range = document.body.createTextRange();//Creates TextRange object
                                range.moveToElementText(el);//sets Range
                                range.select(); //make selection.
                            }
                        }

                        setTimeout(function (){
                            $(_this).parent().removeAttr('style').find('.copy').remove();
                        }, 2000)

                    }, function(err) {
                        console.error('Async: Could not copy text: ', err);
                    });
                })

                //card action menu
                $('.virtual-card').click(function (){
                    //$(this).find('.card-action').slideToggle();
                    let card = $(this).find('.card-action');
                    if (card.css('display') == 'none'){
                        card.css('display', 'block');
                    }else{
                        card.css('display', 'none');
                    }
                })

                // Dropdown menu
                $('.custom-drop-event').click( function (e){
                    e.preventDefault();
                    if ($(this).parent().find('.dropdown-menu').hasClass('d-none')){
                        $(this).parent().find('.dropdown-menu').removeClass('d-none')
                        $(this).parent().find('.dropdown-menu').addClass('d-block')
                    }else{
                        $(this).parent().find('.dropdown-menu').removeClass('d-block')
                        $(this).parent().find('.dropdown-menu').addClass('d-none')
                    }
                });

                $(document).on('click', function (e) {
                    if ($(e.target).closest(".custom-drop-event").length === 0) {
                        $(".dropdown-menu").each(function (){
                            $(this).addClass('d-none');
                        })
                    }
                });

                $('.deleteBtn').on('click', function () {
                    var modal = $('#deleteModal');
                    modal.find('input[name=card_id]').val($(this).data('id'));
                    modal.modal('show');
                });
            })
        }(jQuery));

        // show card details
        function ShowCardDetails(cardId){
            let cardDetails =  $('#details-'+ cardId).html();
            $('#detailsModal').modal('show');
            $('#modalBody').html(cardDetails);
        }

    </script>
@endpush

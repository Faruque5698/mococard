
@extends('admin.layouts.app')

@section('panel')
    <div class="row mb-none-30">
        <div class="col-lg-12 col-md-12 mb-30">
            <div class="card">
                <div class="card-body">
                    @php($refer = \App\Models\RefferBonusSettings::find(1))
                    <form action="{{route('admin.save.referral')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-bold "> @lang('Referral Bonus') </label>
                                    <input class="form-control form-control-lg " type="text" name="refer_bonus" value="{{$refer -> refer_by_bonus}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="form-control-label font-weight-bold">@lang('Charge')</label>
                                    <input class="form-control form-control-lg" type="text" name="new_user_bonus" value="{{$refer -> new_user_bonus}}">
                                </div>
                            </div>



                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn--primary btn-block btn-lg">@lang('Update')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')


@endpush

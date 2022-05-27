@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form action="{{ route('admin.cardApi.template.setting') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="mb-4">SECRET KEY</label>
                                <input type="text" required class="form-control" name="secret_key" value="{{ $api->secret_key }}"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="mb-4">SECRET HASH</label>
                                <input type="text" required class="form-control" name="secret_hash" value="{{ $api->secret_hash }}"/>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-block btn--primary mr-2">@lang('Update')</button>
                    </div>
                </form>
            </div><!-- card end -->
        </div>
    </div>

@endsection

@extends('admin.layouts.app')
@section('panel')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <form action="{{ route('admin.card.add') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col-lg-6 form-group">
                            <label for="sub_category">@lang('Sub Category')</label>
                            <select name="sub_category" class="select2-basic" required>
                                @foreach ($subCategories as $subCategory)
                                    <option value="{{ $subCategory->id }}">{{ __($subCategory->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3 offset">
                            <label>&nbsp;</label>
                            <button type="button" class="btn btn--success w-100 addBtn"> <i class="la la-plus"></i> @lang('Add New Card')</button>
                        </div>
                    </div>
                    <div class="row base-area">

                        <div class="col-md-6 mt-5">

                            <div class="card border--primary">
                                <div class="card-body">
                                    <div class="text-right">
                                        <span class="badge badge--primary">
                                            @lang('Minimum One Card Required')
                                        </span>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="wef">@lang('Card Image (optional)')</label>
                                                <input type="file" class="form-control" name="image[]">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                            <div class="form-group">
                                                <textarea rows="2" class="form-control border-radius-5" name="details[]" placeholder="@lang('Card Details')">{{ old('details') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn--primary btn-block">@lang('Save')</button>
                </div>
            </form>
        </div><!-- card end -->
    </div>
</div>

@endsection

@push('breadcrumb-plugins')
    <a href="{{ route('admin.card.index') }}" class="btn btn-sm btn--primary box--shadow1 text--small">
        <i class="la la-fw la-backward"></i> @lang('Go Back')
    </a>
@endpush

@push('script')
    <script>
        (function ($) {

            "use strict";

            let newCard = `
                <div class="col-md-6 mt-5">
                    <div class="card border--primary">
                        <div class="card-body">
                            <div class="text-right">
                                <span class="badge removeBtn badge--danger cursor">
                                    <i class="fas fa-times"></i>
                                </span>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="wef">@lang('Card Image (optional)')</label>
                                        <input type="file" class="form-control" name="image[]">
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <div class="form-group">
                                        <textarea rows="2" class="form-control border-radius-5" name="details[]" placeholder="@lang('Card Details')">{{ old('details') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;

            $('.addBtn').on('click', ()=>{
                $('.base-area').append(newCard);
            });

            $(document).on('click', '.removeBtn', function () {
                $(this).closest('.col-md-6').remove();
            });

        })(jQuery);
    </script>
@endpush



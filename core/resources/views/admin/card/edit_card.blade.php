@extends('admin.layouts.app')
@section('panel')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <form action="{{ route('admin.card.edit') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $card->id }}">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col-lg-12 form-group">
                            <label for="sub_category">@lang('Sub Category')</label>
                            <select name="sub_category" class="select2-basic" required>
                                @foreach($subCategories as $subCategory)
                                    <option value="{{ $subCategory->id }}" {{ $subCategory->id == $card->sub_category_id ? 'selected' : null }}>
                                        {{ __($subCategory->name) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-8">
                            <div class="card border--primary h-100">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="wef">@lang('Card Image (optional)')</label>
                                                <input type="file" class="form-control" name="image">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                            <div class="form-group">
                                                <textarea rows="6" class="form-control border-radius-5" name="details" placeholder="@lang('Card Details')">{{ $card->details }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if($card->image)
                            <div class="col-md-4 mt-md-0 mt-4">
                                <div class="image-upload">
                                    <div class="thumb">
                                        <div class="avatar-preview">
                                            <div class="profilePicPreview" style="background-image: url({{ getImage(imagePath()['card']['path'].'/'.$card->image,imagePath()['card']['path']) }})">
                                                <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>

                @if($card->user_id == 0)
                    <div class="card-footer">
                        <button type="submit" class="btn btn--primary btn-block">@lang('Update')</button>
                    </div>
                @endif

            </form>
        </div><!-- card end -->
    </div>
</div>

@endsection

@push('breadcrumb-plugins')
    <a href="{{ URL::previous() }}" class="btn btn-sm btn--primary box--shadow1 text--small">
        <i class="la la-fw la-backward"></i> @lang('Go Back')
    </a>
@endpush

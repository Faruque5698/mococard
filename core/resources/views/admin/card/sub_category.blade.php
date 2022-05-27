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
                                <th>@lang('Category Name')</th>
                                <th>@lang('Sub Category')</th>
                                <th>@lang('Price')</th>
                                <th>@lang('Total')</th>
                                <th>@lang('Sold')</th>
                                <th>@lang('Available')</th>
                                <th>@lang('Action')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($subCategories as $subCategory)
                            <tr>

                                <td data-label="@lang('SL')">
                                    {{ $loop->index + 1 }}
                                </td>

                                <td data-label="@lang('Category Name')">
                                    <span class="font-weight-bold">
                                        {{ __($subCategory->category->name) }}
                                    </span>
                                </td>

                                <td data-label="@lang('Sub Category')">
                                    {{ __($subCategory->name) }}
                                </td>

                                <td data-label="@lang('Price')">
                                    <span class="font-weight-bold">
                                        {{ showAmount($subCategory->price, 2) }}
                                        {{ __($general->cur_text) }}
                                    </span>
                                </td>

                                <td data-label="@lang('Total')">
                                    {{ $subCategory->card->count() }}
                                    @lang('PS')
                                </td>

                                <td data-label="@lang('Sold')">
                                    {{ $subCategory->card->where('user_id', '!=', 0)->count() }}
                                    @lang('PS')
                                </td>

                                <td data-label="@lang('Available')">
                                    {{ $subCategory->card->where('user_id', 0)->count() }}
                                    @lang('PS')
                                </td>

                                <td data-label="@lang('Action')">
                                    <a href="#" class="icon-btn editBtn" data-toggle="tooltip" title="" data-original-title="@lang('Edit')"
                                    data-name="{{ $subCategory->name }}"
                                    data-id="{{ $subCategory->id }}"
                                    data-price="{{ getAmount($subCategory->price, 2) }}"
                                    data-category="{{ $subCategory->category_id }}"
                                    data-image='{{ getImage(imagePath()["sub_category"]["path"]."/".$subCategory->image)}}'
                                    >
                                        <i class="las la-edit text--shadow"></i>
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
                <div class="card-footer py-4">
                    {{ paginateLinks($subCategories) }}
                </div>
            </div>
        </div>
    </div>

    {{-- ADD METHOD MODAL --}}
    <div id="addModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Add New Sub Category')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.add.sub.category') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12 form-group">
                                <label for="name">@lang('Category Name')</label>
                                <select name="category_id" id="category_id" class="select2-basic" required>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ __($category->name) }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-12 form-group">
                                <label for="name">@lang('Sub Category Name')</label>
                                <input type="text" name="name" id="name" class="form-control" oninput="charRemaining('nameSpan', this.value, 191)" required>
                                <span id="nameSpan" class="remaining">
                                    191 @lang('characters remaining')
                                </span>
                            </div>

                            <div class="col-lg-12 form-group">
                                <label for="name">@lang('Price')</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="price" aria-label="price" aria-describedby="basic-addon1" required>
                                    <div class="input-group-append">
                                      <span class="input-group-text" id="basic-addon1">
                                          {{ __($general->cur_text) }}
                                      </span>
                                    </div>
                                  </div>
                            </div>

                            <div class="col-lg-12 form-group mt-3">
                                <div class="image-upload">
                                    <div class="thumb">
                                        <div class="avatar-preview">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="profilePicPreview" id="display_image">
                                                        <span class="size_mention"></span>
                                                        <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="avatar-edit mt-35px">
                                            <input type="file" class="profilePicUpload" id="profilePicUpload" accept=".png, .jpg, .jpeg" name="image">
                                            <label for="profilePicUpload" id='image_btn' class="bg-primary">@lang('Select Image') </label>
                                            @lang('Supproted image .jpeg, .png, .jpg, 1438x905')
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--dark" data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn--primary">@lang('Save')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- ADD METHOD MODAL --}}
    <div id="editModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Edit Sub Category')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.edit.sub.category') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12 form-group">
                                <label for="name">@lang('Category Name')</label>
                                <select name="category_id" class="select2-basic" required>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ __($category->name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-12 form-group">
                                <label for="editName">@lang('Sub Category Name')</label>
                                <input type="text" name="name" class="form-control" oninput="charRemaining('editNameSpan', this.value, 191)" required>
                                <span id="editNameSpan" class="remaining">
                                    <span class="char">191</span> @lang('characters remaining')
                                </span>
                            </div>
                            <input type="hidden" name="id">
                            <div class="col-lg-12 form-group">
                                <label for="name">@lang('Price')</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="price" aria-label="price" aria-describedby="basic-addon1" required>
                                    <div class="input-group-append">
                                      <span class="input-group-text" id="basic-addon1">
                                          {{ __($general->cur_text) }}
                                      </span>
                                    </div>
                                  </div>
                            </div>

                            <div class="col-lg-12 form-group mt-3">
                                <div class="image-upload">
                                    <div class="thumb">
                                        <div class="avatar-preview">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="profilePicPreview" id="display_image">
                                                        <span class="size_mention"></span>
                                                        <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="avatar-edit mt-35px">
                                            <input type="file" class="profilePicUpload" id="profilePicUpload2" accept=".png, .jpg, .jpeg" name="image">
                                            <label for="profilePicUpload2" id='image_btn' class="bg-primary">@lang('Select Image') </label>
                                            @lang('Supproted image .jpeg, .png, .jpg, 1438x905')
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--dark" data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn--primary">@lang('Update')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('breadcrumb-plugins')
    <button class="btn btn-sm btn--primary box--shadow1 text--small addNew" type="submit">
        <i class="las la-plus"></i>
        @lang('Add New')
    </button>
@endpush

@push('script-lib')
    <script src="{{ asset('assets/common/common.js') }}"></script>
@endpush

@push('script')
    <script>
        (function ($) {
            "use strict";

            $('#display_image').hide();

            $('#image_btn').on('click', function() {
                var classNmae = $('#display_image').attr('class');
                if(classNmae != 'profilePicPreview has-image'){
                    $('#display_image').hide();
                }else{
                    $('#display_image').show();
                }
            });

            $('.remove-image').on('click', function(){
                $('.profilePicPreview').hide();
            });

            $('.addNew').on('click', function () {
                var modal = $('#addModal');
                modal.find('.method-name').text($(this).data('name'));
                modal.find('input[name=id]').val($(this).data('id'));
                modal.modal('show');
            });

            $('.editBtn').on('click', function () {
                var modal = $('#editModal');
                modal.find('input[name=name]').val($(this).data('name'));
                modal.find('input[name=id]').val($(this).data('id'));
                modal.find('input[name=price]').val($(this).data('price'));
                modal.find('select[name=category_id]').val($(this).data('category')).select2();
                modal.find('.profilePicPreview').attr('style','background-image:url('+$(this).data("image")+')');

                let length = parseInt($(this).data('name').length);
                modal.find('.char').text(191-length);

                modal.modal('show');
            });

        })(jQuery);
    </script>
@endpush

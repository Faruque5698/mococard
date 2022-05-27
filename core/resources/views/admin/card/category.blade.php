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
                                <th>@lang('Status')</th>
                                <th>@lang('Featured')</th>
                                <th>@lang('Action')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($categories as $category)
                            <tr>

                                <td data-label="@lang('SL')">
                                    {{ $loop->index + 1 }}
                                </td>

                                <td data-label="@lang('Category Name')">
                                    <span class="font-weight-bold">
                                        {{ __($category->name) }}
                                    </span>
                                </td>

                                <td data-label="@lang('Status')">
                                    @if($category->status == 1)
                                        <span class="badge badge--success">
                                            @lang('Enable')
                                        </span>
                                    @else
                                        <span class="badge badge--warning">
                                            @lang('Disable')
                                        </span>
                                    @endif
                                </td>

                                <td data-label="@lang('Featured')">
                                    @if($category->featured == 1)
                                        <span class="badge badge--success">
                                            @lang('Featured')
                                        </span>
                                    @else
                                        <span class="badge badge--warning">
                                            @lang('Non Featured')
                                        </span>
                                    @endif
                                </td>

                                <td data-label="@lang('Action')">
                                    <a href="#" class="icon-btn editBtn" data-toggle="tooltip" title="" data-original-title="@lang('Edit')"
                                    data-name="{{ $category->name }}"
                                    data-id="{{ $category->id }}"
                                    data-status='{{ $category->status }}'
                                    data-image='{{ getImage(imagePath()["category"]["path"]."/".$category->image)}}'
                                    >
                                        <i class="las la-edit text--shadow"></i>
                                    </a>

                                    @if($category->featured == 1)
                                        <a href="javascript:void(0)" class="icon-btn btn--danger deactivateBtn  ml-1" data-toggle="tooltip" data-original-title="@lang('Non Featured')" data-id="{{ $category->id }}" data-name="{{ __($category->name) }}">
                                            <i class="la la-eye-slash"></i>
                                        </a>
                                    @else
                                        <a href="javascript:void(0)" class="icon-btn btn--success activateBtn  ml-1"
                                            data-toggle="tooltip" data-original-title="@lang('Featured')"
                                            data-id="{{ $category->id }}" data-name="{{ __($category->name) }}">
                                            <i class="la la-eye"></i>
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
                    {{ paginateLinks($categories) }}
                </div>
            </div>
        </div>
    </div>

    {{-- ADD METHOD MODAL --}}
    <div id="addModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Add New Category')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.add.category') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12 form-group">
                                <label for="name">@lang('Category Name')</label>
                                <input type="text" name="name" id="name" class="form-control" oninput="charRemaining('nameSpan', this.value, 191)" required>
                                <span id="nameSpan" class="remaining">
                                    191 @lang('characters remaining')
                                </span>
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
                                            <input type="file" class="profilePicUpload" id="profilePicUpload" accept=".png, .jpg, .jpeg" name="image" required>
                                            <label for="profilePicUpload" id='image_btn' class="bg-primary">@lang('Select Category Image') </label>
                                            @lang('Supproted image .jpeg, .png, .jpg, 1438x905')
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="status">@lang('Status')</label>
                                    <input type="checkbox" data-width="100%" data-size="large" data-onstyle="-success" data-offstyle="-danger" data-toggle="toggle" id="status" data-on="@lang('Enable')" data-off="@lang('Disable')" name="status">
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

    {{-- EDIT METHOD MODAL --}}
    <div id="editModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Edit Category')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.edit.category') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12 form-group">
                                <label for="editName">@lang('Category Name')</label>
                                <input type="text" name="name" id="editName" class="form-control" oninput="charRemaining('editNameSpan', this.value, 191)" required>
                                <span id="editNameSpan" class="remaining">
                                    <span class="char">191</span> @lang('characters remaining')
                                </span>
                            </div>
                            <input type="hidden" name="id">
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
                                            <label for="profilePicUpload2" id='image_btn' class="bg-primary">@lang('Select Category Image') </label>
                                            @lang('Supproted image .jpeg, .png, .jpg, 1438x905')
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="edit_status">@lang('Status')</label>
                                    <input type="checkbox" data-width="100%" data-size="large" data-onstyle="-success" data-offstyle="-danger" data-toggle="toggle" id="edit_status" data-on="@lang('Enable')" data-off="@lang('Disable')" name="status">
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

    {{-- ACTIVATE METHOD MODAL --}}
    <div id="activateModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Confirmation')!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.featured.category') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <p>@lang('Are you sure to featured') <span class="font-weight-bold method-name"></span>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--dark" data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn--primary">@lang('Confirm')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- DEACTIVATE METHOD MODAL --}}
    <div id="deactivateModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Confirmation')!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.featured.category') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <p>@lang('Are you sure to non featured') <span class="font-weight-bold method-name"></span>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--dark" data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn--danger">@lang('Confirm')</button>
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
                modal.find('.profilePicPreview').attr('style','background-image:url('+$(this).data("image")+')');

                if($(this).data('status') == 1){
                    $('#edit_status').parent('div').removeClass('off');
                    $('#edit_status').prop('checked', true);
                }else{
                    $('#edit_status').parent('div').addClass('off');
                    $('#edit_status').prop('checked', false);
                }
                console.log($(this).data('status'));
                let length = parseInt($(this).data('name').length);
                modal.find('.char').text(191-length);

                modal.modal('show');
            });

            $('.activateBtn').on('click', function () {
                var modal = $('#activateModal');
                modal.find('.method-name').text($(this).data('name'));
                modal.find('input[name=id]').val($(this).data('id'));
                modal.modal('show');
            });

            $('.deactivateBtn').on('click', function () {
                var modal = $('#deactivateModal');
                modal.find('.method-name').text($(this).data('name'));
                modal.find('input[name=id]').val($(this).data('id'))
                modal.modal('show');
            });

        })(jQuery);
    </script>
@endpush

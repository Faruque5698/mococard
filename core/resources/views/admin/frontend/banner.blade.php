@extends('admin.layouts.app')
@section('panel')
    <div class="main-content">
        <section class="section">
{{--@php($banner = \App\Models\Banner::find(1))--}}
            <div class="card">
                <form action="{{route('admin.frontend.save_banner')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">

                        <div class="form-group">
                            <label class="control-label" for="app_name">Description</label>
                            <textarea
                                class="form-control"
                                type="text"
                                placeholder="Enter Description"
                                rows="6"
                                cols="12"
                                id="app_name"
                                name="description"

                            > {{ $banner->description?? '' }}</textarea>
                        </div>
                        {{--                    <div class="form-group">--}}
                        {{--                        <label>Radio Streaming Url</label>--}}
                        {{--                        <input--}}
                        {{--                            class="form-control"--}}
                        {{--                            type="text"--}}
                        {{--                            placeholder="Enter radio streaming url"--}}
                        {{--                            id="radio_streaming_url"--}}
                        {{--                            name="radio_streaming_url"--}}
                        {{--                            value="{{ $settings->radio_streaming_url??'' }}"--}}
                        {{--                        />--}}
                        {{--                    </div>--}}
                        {{--                    <div class="form-group">--}}
                        {{--                        <label>Metadata Link</label>--}}
                        {{--                        <input--}}
                        {{--                            class="form-control"--}}
                        {{--                            type="text"--}}
                        {{--                            placeholder="Enter metadata link"--}}
                        {{--                            id="metadata_link"--}}
                        {{--                            name="metadata_link"--}}
                        {{--                            value="{{$settings->metadata_link??''}}"--}}
                        {{--                        />--}}
                        {{--                    </div>--}}

                        <div class="row">
                            <div class="form-group col-6 offset-4">
                                <div class="image-upload">
                                    <div class="thumb">
                                        <div class="avatar-preview">
                                            <div class="row">
                                                <div class=" text-center">

                                                    @if (!empty($banner->image))
                                                        <img class="img-thumbnail"
                                                             src="{{asset($banner->image)}}"
                                                             id="logo" style="width: 700px; height: 350px;">
                                                    @else
                                                        <img src="{{ asset('assets/image/default.jpg')}}" id="logo" style="width: 600px; height: 300px;">
                                                    @endif
                                                    <div class="avatar-edit">
                                                        <input type="file" class="profilePicUpload" id="profilePicUpload1"  name="image" onchange="loadFile(event,'logo')">
                                                        <label for="profilePicUpload1" class="bg-success text-light">@lang('Logo') </label>
{{--                                                        <span class="font-weight-bold text-danger small">Size should be 512 X 512 </span>--}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button  class="btn btn-primary btn-block">Save Changes</button>
                    </div>
                </form>
            </div>
        </section>
    </div>

    {{-- if section element end --}}


@endsection

@push('script-lib')
    <script src="{{ asset('assets/admin/js/bootstrap-iconpicker.bundle.min.js') }}"></script>
@endpush


@push('script')
    <script>
        loadFile = function(event, id) {
            var output = document.getElementById(id);
            output.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
    <script>
        (function ($) {
            "use strict";
            $('.removeBtn').on('click', function () {
                var modal = $('#removeModal');
                modal.find('input[name=id]').val($(this).data('id'))
                modal.modal('show');
            });

            $('.addBtn').on('click', function () {
                var modal = $('#addModal');
                modal.modal('show');
            });

            $('.updateBtn').on('click', function () {
                var modal = $('#updateBtn');
                modal.find('input[name=id]').val($(this).data('id'));

                var obj = $(this).data('all');
                var images = $(this).data('images');
                if (images) {
                    for (var i = 0; i < images.length; i++) {
                        var imgloc = images[i];
                        $(`.imageModalUpdate${i}`).css("background-image", "url(" + imgloc + ")");
                    }
                }
                $.each(obj, function (index, value) {
                    modal.find('[name=' + index + ']').val(value);
                });

                modal.modal('show');
            });

            $('#updateBtn').on('shown.bs.modal', function (e) {
                $(document).off('focusin.modal');
            });
            $('#addModal').on('shown.bs.modal', function (e) {
                $(document).off('focusin.modal');
            });

            $('.iconPicker').iconpicker().on('change', function (e) {
                $(this).parent().siblings('.icon').val(`<i class="${e.icon}"></i>`);
            });
        })(jQuery);
    </script>

@endpush

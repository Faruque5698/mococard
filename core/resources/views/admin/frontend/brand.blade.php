@extends('admin.layouts.app')
@section('panel')

    {{-- if section element end --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="text-right">
                        <a  class="btn btn-info mb-2 " data-toggle="modal" data-target="#addModal" style="color: white">Add Brands</a>
@php($brands = \App\Models\Brand::all())
                    </div>
                    <div class="table-responsive--md  table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                            <tr>
                                <th>@lang('Title')</th>
                                <th>@lang('Logo')</th>
                                <th>@lang('Description')</th>
                                <th>@lang('Action')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($brands as $brand)
                                <tr>
                                    <td data-label="@lang('Title')">
                                        <span class="font-weight-bold">{{$brand->title}}</span>
                                        <br>
                                        <span class="small">
                                    </span>
                                    </td>


                                    <td data-label="@lang('Logo')">
                                        <img src="{{asset($brand->logo)}}" width="100px" height="100px" alt="">
                                    </td>
                                    <td data-label="@lang('description')">
                                        {{$brand->description}}
                                    </td>


                                    <td data-label="@lang('Action')">
                                        <a href="" class="icon-btn mr-2" data-toggle="modal" data-target="#editModal_{{$brand->id}}">
                                            <i class="las la-edit btn--primary text--shadow "></i>
                                        </a>

                                        <div class="modal fade" id="editModal_{{$brand->id}}" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="addModalLabel">Add Social Icon</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('admin.frontend.brand_update')}}" id="AddSocialIconForm" method="POST" enctype="multipart/form-data">
                                                            @csrf
{{--@php($base_url = url('/'))--}}
                                                            <div class="form-group">

                                                                <input class="form-control" type="text" id="name" name="title" required value="{{ $brand->title }}" placeholder="Enter Brand title"  />
                                                                <input type="hidden" name="id" value="{{$brand->id}}">
                                                            </div>
                                                            <div class="form-group">

                                                                <input class="form-control" type="file" id="icon" name="logo" required />
                                                                <img class="float-left mt-2 mb-2" src="{{asset($brand->logo)}}" alt="" width="200px" height="200px">
                                                            </div>
                                                            <div class="form-group">

                                                                <input class="form-control" type="text" id="url" name="description" required value="{{ $brand->description }}" placeholder="Enter Description url" />
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="{{route('admin.frontend.brand_delete',['id'=>$brand->id])}}" class="icon-btn" >
                                            <i class="las la-trash btn--danger text--shadow"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty

                            @endforelse

                            </tbody>
                        </table>
                        <!-- table end -->
                    </div>
                </div>
                <div class="card-footer py-4">
{{--                    {{ paginateLinks($users) }}--}}
                </div>
            </div>
        </div>
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Add Social Icon</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('admin.frontend.brand_save')}}" id="AddSocialIconForm" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{--@php($base_url = url('/'))--}}
                            <div class="form-group">

                                <input class="form-control" type="text" id="name" name="title" required value="" placeholder="Enter Brand title"  />
                            </div>
                            <div class="form-group">

                                <input class="form-control" type="file" id="icon" name="logo" required />
{{--                                <img class="float-left mt-2 mb-2" src="{{asset($brand->logo)}}" alt="" width="200px" height="200px">--}}
                            </div>
                            <div class="form-group">

                                <input class="form-control" type="text" id="url" name="description" required value="" placeholder="Enter Description url" />
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

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

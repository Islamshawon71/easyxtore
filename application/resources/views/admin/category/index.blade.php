@extends('layouts.app')
@section('content')
    <div class="row mt-3">
        <div class="col-12">
            <div class="row mb-2">
                <div class="col-md-6">
                    <h4 class="page-title mt-0 d-inline">Total <span class="total">0</span> Category </h4>
                </div>
                <div class="col-md-6">
                    <div class="text-md-right">
                        <button type="button" class="btn btn-blue btn-add btn-xs waves-effect waves-light float-right add"><i class="mdi mdi-plus-circle mr-1"></i> Add New Category</button>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <table id="table" class="table activate-select dt-responsive nowrap w-100">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category Image</th>
                            <th>Category Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div id="modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fullWidthModalLabel" aria-hidden="true" >
        <div class="modal-dialog modal-full-width">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="fullWidthModalLabel">Store</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body p-3">

                    <div class="form-group mb-3">
                        <label for="CategoryName">Category Name <span class="text-danger">*</span></label>
                        <input type="text" id="CategoryName" class="form-control" >
                    </div>
                    <div class="form-group mb-3">
                        <label for="CategorySlug">Category Slug <span class="text-danger">*</span></label>
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend">{{ url('/') }}/</span>
                            <input type="text" id="CategorySlug" class="form-control">
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="product-category">Image</label>
                        <form action="{{ url('admin/category/image') }}" method="post" id="dropzone" enctype="multipart/form-data">
                            @csrf
                            <div class="fallback">
                                <input name="file" type="file"/>
                            </div>
                            <div class="dz-message needsclick">
                                <i class="h1 text-muted dripicons-cloud-upload"></i>
                                <h3>Drop files here or click to upload.</h3>
                                <span class="text-muted font-13">(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</span>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm waves-effect" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-info btn-sm waves-effect waves-light" id="submit">Save changes</button>
                    <input type="hidden" id="id">
                </div>
            </div>
        </div>
    </div>

@endsection
@push('js')


    <script>
        $(document).ready(function(){

            var categoryImage = '';
            $("#dropzone").dropzone({
                addRemoveLinks: true,
                maxFiles: 1, //change limit as per your requirements
                dictMaxFilesExceeded: "Maximum upload limit reached",
                acceptedFiles: "image/*",
                dictInvalidFileType: "upload only JPG/PNG",
                init: function () {
                    $(this.element).addClass("dropzone");
                    this.on("success", function (file, response) {
                        if(response.status == 'success'){
                            categoryImage =  response.url;
                            toastr.success('Image Uploade Successfull');
                        }else{
                            toastr.error('Image Uploade Failed !');
                        }
                    });
                    this.on('addedfile', function(file) {
                        if (this.files.length > 1) {
                            this.removeFile(this.files[0]);
                        }
                    });
                }
            });
            var token = $("input[name='_token']").val();
            var table = $("#table").DataTable({
                ajax: "{{url('admin/category/get')}}",
                pageLength: 50,
                ordering: false,
                columns: [
                    {data: "id"},
                    {data: "image"},
                    {data: "CategoryName"},
                    {data: "status"},
                    {data: "action"}
                ],
                drawCallback:function(){
                    $(".dataTables_paginate > .pagination").addClass("pagination-sm")
                },
                footerCallback : function ( row, data, start, end, display ) {
                    var api = this.api();
                    var numRows = api.rows( ).count();
                    $('.total').empty().append(numRows);
                }
            });

            $(document).on("click", ".add", function () {
                var modal = $('#modal');
                modal.find('.modal-title').text('Add New Category');
                modal.find('.modal-footer .btn-info').text('Save');
                modal.find('.modal-footer .btn-info').val('Save');
                modal.modal('show');
            });

            $(document).on("click", "#submit", function (e) {
                var type = $(this).val();
                var CategoryName = $('#CategoryName');
                var CategorySlug = $('#CategorySlug');
                var id = $('#id').val();
                var count = 0;
                if (!CategoryName.val()) {
                    CategoryName.addClass("parsley-error");
                    toastr.error('Category Name should not empty !');
                    count++;
                }
                if (!CategorySlug.val()) {
                    CategorySlug.addClass("parsley-error");
                    toastr.error('Category Slug should not empty !');
                    count++;
                }
                if(count>0){
                    return;
                }
                // Add Data
                if (type === 'Save') {
                    $.ajax({
                        type: "post",
                        url: "{{url('admin/category')}}",
                        data: {
                            'CategoryName': CategoryName.val(),
                            'CategorySlug': CategorySlug.val(),
                            'categoryImage': categoryImage,
                            '_token': token
                        },
                        success: function (response) {
                            if (response['status'] === 'success') {
                                toastr.success(response["message"]);
                                $('#modal').modal('toggle');
                                table.ajax.reload();
                            } else {
                                if (response['status'] === 'failed') {
                                    toastr.error(response["message"]);
                                } else {
                                    toastr.error('Something wrong ! Please try again.');
                                }
                            }
                        }
                    });
                    return;
                }
                // ID check
                if (!id) {
                    toastr.error('Something wrong ! Please try again.');
                    return;
                }
                // Update data
                if (type === 'Update') {
                    $.ajax({
                        type: "PUT",
                        url: "{{url('admin/city')}}/" + cityID,
                        data: {
                            'courierID': courierID.val(),
                            'cityName': cityName.val(),
                            '_token': token
                        },
                        success: function (response) {
                            var data = JSON.parse(response);
                            if (data['status'] === 'success') {
                                toastr.success(data["message"]);
                                $('.modal').modal('toggle');
                                table.ajax.reload();
                            } else {
                                if (data['status'] === 'failed') {
                                    toastr.error(data["message"]);
                                } else {
                                    toastr.error('Something wrong ! Please try again.');
                                }

                            }

                        }
                    });
                }
            });

            $(document).on('click', '.btn-status', function () {
                var status = $(this).attr('data-status');
                var id = $(this).val();
                $.ajax({
                    type: "post",
                    url: "{{url('admin/category/status')}}",
                    data: {
                        'status': status,
                        'id': id,
                        '_token': token
                    },
                    success: function (data) {
                        if (data['status'] === 'success') {
                            toastr.success(data["message"]);
                            table.ajax.reload();
                        } else {
                            if (data['status'] === 'failed') {
                                toastr.error(data["message"]);
                            } else {
                                toastr.error('Something wrong ! Please try again.');
                            }
                        }
                    }
                });
            });

            $(document).on("click", ".btn-delete", function () {
                var id = $(this).val();

                Swal.fire({
                    title:"Are you sure?",
                    text:"You won't be able to revert this!",
                    type:"warning",
                    showCancelButton:!0,
                    confirmButtonColor:"#3085d6"
                    ,cancelButtonColor:"#d33"
                    ,confirmButtonText:"Yes, delete it!"
                }).then(  function(t){
                    if(t.value){
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': token
                            },
                            type: "DELETE",
                            url: "{{url('admin/category/')}}/" + id,
                            data: {
                                '_token': token
                            },
                            contentType: "application/json",
                            success: function (response) {
                                var data = JSON.parse(response);
                                if (data['status'] === 'success') {
                                    toastr.success(data["message"]);
                                    table.ajax.reload();
                                } else {
                                    if (data['status'] === 'failed') {
                                        toastr.error(data["message"]);
                                    } else {
                                        toastr.error('Something wrong ! Please try again.');
                                    }
                                }
                            }
                        });
                    }
                })

            });




        });
    </script>
@endpush

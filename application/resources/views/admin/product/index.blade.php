@extends('layouts.app')
@section('content')
    <div class="row mt-3">
        <div class="col-12">
            <div class="row mb-2">
                <div class="col-md-6">
                    <h4 class="page-title mt-0 d-inline">Total <span class="total">0</span> Product </h4>
                </div>
                <div class="col-md-6">
                    <div class="text-md-right">
                        <button type="button" class="btn btn-blue btn-add btn-xs waves-effect waves-light float-right add"><i class="mdi mdi-plus-circle mr-1"></i> Add New Product</button>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <table id="table" class="table activate-select dt-responsive nowrap w-100">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product Image</th>
                            <th>Product Name</th>
                            <th>Product SKU</th>
                            <th>Product Regular Price</th>
                            <th>Product Sale Price</th>
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
                    <div class="row">
                        <div class="col-lg-6">
                                <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">General</h5>

                                <div class="form-group mb-3">
                                    <label for="ProductName">Product Name <span class="text-danger">*</span></label>
                                    <input type="text" id="ProductName" class="form-control" >
                                </div>
                                <div class="form-group mb-3">
                                    <label for="ProductSlug">Product Slug <span class="text-danger">*</span></label>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend">{{ url('/') }}/</span>
                                        <input type="text" id="ProductSlug" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                <label for="ProductSku">Product Code <span class="text-danger">*</span></label>
                                <input type="text" id="ProductSku" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="ProductDetails">Product Description <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="ProductDetails" rows="5" ></textarea>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">Product Images</h5>
                            <div class="form-group mb-3">
                                <label for="ProductRegularPrice">Regular Price <span class="text-danger">*</span></label>
                                <input type="number" id="ProductRegularPrice" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="ProductSalePrice">Sale Price <span class="text-danger">*</span></label>
                                <input type="number" id="ProductSalePrice" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="ProductCategory">Categories <span class="text-danger">*</span></label>
                                <select class="form-control" id="ProductCategory" data-toggle="select2" multiple="multiple" data-placeholder="Choose ...">
                                    <option>Select</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="product-category">Image Gallery</label>
                            <form action="{{ url('admin/product/image') }}" method="post" id="dropzone" enctype="multipart/form-data">
                                    @csrf
                                    <div class="fallback">
                                        <input name="file" type="file" multiple />
                                        <input type="hidden" id="images">
                                    </div>
                                    <div class="dz-message needsclick">
                                        <i class="h1 text-muted dripicons-cloud-upload"></i>
                                        <h3>Drop files here or click to upload.</h3>
                                        <span class="text-muted font-13">(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</span>
                                    </div>
                                </form>
                            </div>
                        </div>
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
            $("#ProductDetails").summernote({height:180,minHeight:null,maxHeight:null,focus:!1});

            Dropzone.autoDiscover = false;
            $("#dropzone").sortable({
                change: function (event, ui) {
                    ui.placeholder.css({visibility: 'visible', border: '1px solid #337ab7' });
                }
            });
            var productImage = new Array;
            var i = 0;
            $("#dropzone").dropzone({
                addRemoveLinks: true,
                maxFiles: 10, //change limit as per your requirements
                dictMaxFilesExceeded: "Maximum upload limit reached",
                acceptedFiles: "image/*",
                dictInvalidFileType: "upload only JPG/PNG",
                init: function () {
                    $(this.element).addClass("dropzone");
                    this.on("success", function (file, response) {
                        if(response.status == 'success'){
                            productImage[i] = {
                                "serverFileName": response.url,
                                "fileName": response.url,
                                "fileId": i
                            };
                            i += 1;
                            toastr.success('Image Uploade Successfull');
                        }else{
                            toastr.error('Image Uploade Failed !');
                        }
                    });
                    this.on("removedfile", function (file) {
                        var rmvFile = "";
                        for (var f = 0; f < productImage.length; f++) {
                            if (productImage[f].fileName == file.name) {
                                rmvFile = productImage[f].serverFileName;
                            }
                        }

                        if (rmvFile) {
                            $.ajax({
                                url: path, //your php file path to remove specified image
                                type: "POST",
                                data: {
                                    filenamenew: rmvFile,
                                    type: 'delete',
                                },
                            });
                        }
                    });
                    this.on('drop', function(file) {
                        console.log('File',file)
                    });
                }
            });
            var token = $("input[name='_token']").val();
            var table = $("#table").DataTable({
                ajax: "{{url('admin/product/get')}}",
                pageLength: 50,
                ordering: false,
                columns: [
                    {data: "id"},
                    {data: "image"},
                    {data: "ProductName"},
                    {data: "ProductSku"},
                    {data: "ProductRegularPrice"},
                    {data: "ProductSalePrice"},
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
                modal.find('.modal-title').text('Add New Product');
                modal.find('.modal-footer .btn-info').text('Save');
                modal.find('.modal-footer .btn-info').val('Save');
                modal.modal('show');
            });

            $(document).on("click", "#submit", function (e) {
                var type = $(this).val();
                var ProductName = $('#ProductName');
                var ProductSlug = $('#ProductSlug');
                var ProductCategory = $('#ProductCategory');
                var ProductDetails = $('.note-editable');
                var ProductSku = $('#ProductSku');
                var ProductRegularPrice = $('#ProductRegularPrice');
                var ProductSalePrice = $('#ProductSalePrice');
                var id = $('#id').val();
                var count = 0;
                if (!ProductName.val()) {
                    ProductName.addClass("parsley-error");
                    toastr.error('Product Name should not empty !');
                    count++;
                }
                if (!ProductSlug.val()) {
                    ProductSlug.addClass("parsley-error");
                    toastr.error('Product Slug should not empty !');
                    count++;
                }
                if (!ProductSku.val()) {
                    ProductSku.addClass("parsley-error");
                    toastr.error('Product Sku should not empty !');
                    count++;
                }
                if (!ProductRegularPrice.val()) {
                    ProductRegularPrice.addClass("parsley-error");
                    toastr.error('Product Regular Price should not empty !');
                    count++;
                }
                if (!ProductSalePrice.val()) {
                    ProductSalePrice.addClass("parsley-error");
                    toastr.error('Product Sale Price should not empty !');
                    count++;
                }
                if (!ProductCategory.val()) {
                    ProductCategory.addClass("parsley-error");
                    toastr.error('Product Category should not empty !');
                    count++;
                }
                if (!ProductDetails.text()) {
                    toastr.error('Product Details should not empty !');
                    ProductDetails.addClass("parsley-error");
                    count++;
                }
                if (productImage.length == 0) {
                    toastr.error('Product Image should not empty !');
                    count++;
                }
                if(count>0){
                    return;
                }
                // Add Data
                if (type === 'Save') {
                    $.ajax({
                        type: "post",
                        url: "{{url('admin/product')}}",
                        data: {
                            'ProductName': ProductName.val(),
                            'ProductSlug': ProductSlug.val(),
                            'ProductDetails': ProductDetails.text(),
                            'ProductSku': ProductSku.val(),
                            'ProductRegularPrice': ProductRegularPrice.val(),
                            'ProductSalePrice': ProductSalePrice.val(),
                            'ProductCategory': ProductCategory.val(),
                            'productImage': productImage,
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

            $("#ProductCategory").select2({
                placeholder: "Select a Courier",
                ajax: {
                    type: "post",
                    url:'{{url('admin/product/category')}}',
                    data: {
                        '_token': token
                    },
                    processResults: function (data) {
                        var data = $.parseJSON(data);
                        return {
                            results: data
                        };
                    }
                }
            });


        });
    </script>
@endpush

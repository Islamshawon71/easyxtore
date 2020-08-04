@extends('layouts.app')
@push('css')

@endpush
@section('content')
    <div class="row mt-3">
        <div class="col-12">
            <div class="row mb-2">
                <div class="col-md-6">
                    <h4 class="page-title mt-0 d-inline">Total <span class="total">1</span> Store </h4>
                </div>
                <div class="col-md-6">
                    <div class="text-md-right">
                        <button type="button" class="btn btn-blue btn-add btn-xs waves-effect waves-light float-right add"><i class="mdi mdi-plus-circle mr-1"></i> Add New Sore</button>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <table id="table" class="table activate-select dt-responsive nowrap w-100">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Store Name</th>
                            <th>Store Link</th>
                            <th>Store Details</th>
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
    <div id="modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Store</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body p-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="storeName" class="control-label">Store Name</label>
                                <input type="text" class="form-control" id="storeName">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="storeUrl" class="control-label">Store URL</label>
                                <input type="text" class="form-control" id="storeUrl">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group no-margin">
                                <label for="storeDetails" class="control-label">Store Details</label>
                                <div id="summernote-basic"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="storeID">
                    <button type="button" class="btn btn-secondary btn-sm waves-effect" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-info btn-sm waves-effect waves-light" id="submit">Save changes</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('js')

    <script>
        $(document).ready(function(){

            var table = $("#table").DataTable({
                ajax: "{{url('admin/store/get')}}",
                pageLength: 50,
                ordering: false,
                columns: [
                    {data: "id"},
                    {data: "storeName"},
                    {data: "storeUrl"},
                    {data: "storeDetails"},
                    {
                        data: null,
                        render: function (data) {
                            return '<button type="button" value="' + data.id + '" class="btn btn-edit btn-xs btn-info"> <i class="mdi mdi-square-edit-outline"></i></button>'
                                + '<button type="button" value="' + data.id + '"class="btn btn-danger btn-delete btn-xs ml-2"  ><i class="mdi mdi-delete"></i></button>';
                        }
                    }
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
                modal.find('.modal-title').text('Add New Store');
                modal.find('.modal-footer .btn-info').text('Save');
                modal.find('.modal-footer .btn-info').val('Save');
                modal.modal('show');
            });

            $(document).on("click", "#submit", function (e) {

                var type = $(this).val();
                var storeName = $('#storeName');
                var storeUrl = $('#storeUrl');
                var storeDetails = $('#summernote-basic');
                var storeID = $('#storeID').val();
                var count = 0;
                if (!storeName.val()) {
                    storeName.addClass("parsley-error");
                    toastr.error('Store Name should not empty !');
                    count++;
                }
                if (!storeUrl.val()) {
                    toastr.error('Store URL should not empty !');
                    storeUrl.addClass("parsley-error");
                    count++;
                }
                if (!storeDetails.text()) {
                    toastr.error('Store Details should not empty !');
                    storeDetails.addClass("parsley-error");
                    count++;
                }
                if(count>0){
                    return;
                }else{
                    storeName.addClass("parsley-error");
                    storeUrl.addClass("parsley-error");
                    storeDetails.addClass("parsley-error");
                }

                // Add Data
                if (type === 'Save') {
                    $.ajax({
                        type: "post",
                        url: "{{url('admin/store')}}",
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
                    return;
                }
                // ID check
                if (!cityID) {
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




        });
    </script>
@endpush

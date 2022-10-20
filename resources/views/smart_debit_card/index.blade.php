@extends('layouts.layout')

<<<<<<< HEAD
@section('title', 'Smart Debit Card')
=======
@section('title', 'Language')
>>>>>>> ad409a9f89911670dcd7251ff5812c40d9696ea8

@section('addcss')
<link rel="stylesheet" href="{{asset("public/assets/modules/datatables/datatables.min.css")}}">
<link rel="stylesheet" href="{{asset("public/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css")}}">
<link rel="stylesheet" href="{{asset("public/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css")}}">
<style>

#saveBtn:disabled {
  background: #999;
  color: #555;
  cursor: not-allowed;
  border: 1px solid #999999;
}

</style>
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="col-lg-12">
                @php
                $routeName = explode('.', \Request::route()->getName());
                @endphp
<<<<<<< HEAD
                <h1>Smart Debit Card</h1>
=======
                <h1>Coupons QR Management</h1>
>>>>>>> ad409a9f89911670dcd7251ff5812c40d9696ea8
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body" style="padding: 0px">
                        <div id="accordion">
                            <div class="accordion">
                                <div class="accordion-header collapsed" role="button" data-toggle="collapse" data-target="#panel-body-1" aria-expanded="false">
                                    <h4>Filter</h4>
                                </div>
                                <div class="accordion-body collapse" id="panel-body-1" data-parent="#accordion">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
<<<<<<< HEAD
                                                <input type="text" placeholder="Name" name="name" id="name" class="form-control">
=======
                                                <input type="text" placeholder="Coupon Code" name="coupon_code" id="coupon_code" class="form-control">
>>>>>>> ad409a9f89911670dcd7251ff5812c40d9696ea8
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
<<<<<<< HEAD
                                                <input type="text" placeholder="Email" name="email" id="email" class="form-control">
=======
                                                <input type="text" placeholder="Coupon Title" name="coupon_title" id="coupon_title" class="form-control">
>>>>>>> ad409a9f89911670dcd7251ff5812c40d9696ea8
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <input type="button" name="resetfilter" value="Reset Filter" id="reset-filter" class="btn btn-light float-right reset_filter">
                                            <input type="button" name="filter" value="Filter" id="apply-filter" class="btn btn-primary float-right search_filter" style="margin-right: 15px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="datatable">
                                <thead>
                                    <tr>
<<<<<<< HEAD
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                        <th>Edit</th>
=======
                                        <th>Coupon Code</th>
                                        <th>Coupon Title</th>
                                        <th>Qrcode Url</th>
                                        <th>Qrcode</th>
>>>>>>> ad409a9f89911670dcd7251ff5812c40d9696ea8
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<<<<<<< HEAD
<!-- edit status -->
<div class="modal fade" id="edit_status" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New Categories </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="" id="smart_form" novalidate="" action="{{route("smart-debit-card.store")}}" enctype="multipart/form-data" method="POST">
                <input type="hidden" name="id" id="id" >
                    @csrf
                    <div class="row">
                        <div class="col-sm-12" class="form-group">
                            <label>Status</label>
                            <select name="status"  id="s_status" class="form-control" required="">
                                <option value="" >Select Status</option>
                                <option value="Pending">Pending</option>
                                <option value="Verified">Verified</option>
                                <option value="Cancelled">Cancelled</option>
                            </select>
                            <span class="text-danger">
                                <strong id="status-error"></strong>
                            </span>
                        </div>
                    </div>
                    <div class="modal-footer text-right">
                        <button type="button" class="btn btn-primary" id="saveBtn" name="btnsave" >Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
=======
>>>>>>> ad409a9f89911670dcd7251ff5812c40d9696ea8
@endsection

@section('addjs')
<script src="{{asset("public/assets/modules/datatables/datatables.min.js")}}"></script>
<script src="{{asset("public/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js")}}"></script>
<script src="{{asset("public/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js")}}"></script>
<script src="{{asset("public/assets/modules/jquery-ui/jquery-ui.min.js")}}"></script>

<script type="text/javascript">
<<<<<<< HEAD
    var controller_url = "{{route('smart-debit-card.index')}}";

    
    $('body').on('click', '.edit_data_button', function () {
        var smart_card_id = $(this).data('id');

        $.get('smart-debit-card/'+smart_card_id+'/edit', function (data) 
        {
            $('#edit_status').modal('show');
            $('#id').val(data.id);
            $('#s_status').val(data.status);
        })
    });

    $('#saveBtn').click(function (e) {
        e.preventDefault();

        $.ajax({
          data: $('#smart_form').serialize(),
          type: "POST",
          dataType: 'json',
      
            success: function (data) 
            {
                if(data.success){

                    $('#smart_form').trigger("reset");
                    $('#edit_status').modal('hide');
                    jQuery(data_table).DataTable().draw();

                    setTimeout(function () {
                        swal(data.message, {
                            icon: 'success',
                        });
                    });
                } else {
                    $( '#status-error').html( data.errors.status );
                }
            },
            error: function (data) {
                console.log('Error:', data);
                $('#saveBtn').html('Save Changes');
            }
        });
    });
=======
    var controller_url = "{{route('coupons-qr.index')}}";
>>>>>>> ad409a9f89911670dcd7251ff5812c40d9696ea8
</script>


<!-- Page Specific JS File -->
<<<<<<< HEAD
<script src="{{asset("public/assets/pages-js/smart_debit_card/index.js?v=1.1")}}"></script>
=======
<script src="{{asset("public/assets/pages-js/coupon_qrcode/index.js")}}"></script>
>>>>>>> ad409a9f89911670dcd7251ff5812c40d9696ea8
@endsection
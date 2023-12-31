@extends('layouts.layout')

@section('title', 'Public Feed')

@section('addcss')
<link rel="stylesheet" href="{{asset("public/assets/modules/datatables/datatables.min.css")}}">
<link rel="stylesheet" href="{{asset("public/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css")}}">
<link rel="stylesheet" href="{{asset("public/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css")}}">
<link rel="stylesheet" href="{{asset("public/css/style.css")}}">
@endsection

@section('content')
@php
$module_permissions = Session::get("user_access_permission");
$module_permission = !empty($module_permissions['public_feed']) ? $module_permissions['public_feed'] : array();
@endphp
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="col-lg-12">
                <h1>Public Feed</h1>
                <?php 
                $pemission = in_array("create", $module_permission)  ? 'true' : 'false';
                if($pemission == 'true') { ?>
                  <a href="{{route("public_feed.create")}}" class="float-right btn btn-primary">Add New</a>
                <?php }?>
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
                                                <input type="text" placeholder="Public Feed Title" name="public_feed_title" id="public_feed_title" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <select class="form-control" id="status" name="status">
                                                    <option value="">Status (All)</option>
                                                    <option value="1">Active</option>
                                                    <option value="2">In Active</option>
                                                </select>
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
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Comment Report</th>
                                        <th>Comment</th>
                                        <th>Like</th>
                                        <th>Edit</th>
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

<!-- report modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="report_title">Public Feed Report</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="view-reports">
        </div>
      </div>
      <div class="overlay">
        <div class="cv-spinner">
          <span class="spinner-new"></span>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- comment modal -->
<div class="modal fade" id="comment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="comment_title">Public Feed Comment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div id="view-comments">
            </div>
      </div>
      <div class="overlay">
        <div class="cv-spinner">
          <span class="spinner-new"></span>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- like modal -->
<div class="modal fade" id="like" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="like_title">Public Feed Like</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div id="view-likes">
            </div>
      </div>
      <div class="overlay">
        <div class="cv-spinner">
          <span class="spinner-new"></span>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('addjs')
<script src="{{asset("public/assets/modules/datatables/datatables.min.js")}}"></script>
<script src="{{asset("public/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js")}}"></script>
<script src="{{asset("public/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js")}}"></script>
<script src="{{asset("public/assets/modules/jquery-ui/jquery-ui.min.js")}}"></script>

<script type="text/javascript">
var controller_url = "{{route('public_feed.index')}}";
var module_permission = {!! json_encode(array_values($module_permission)) !!};
</script>

<!-- Page Specific JS File -->
<script src="{{asset("public/assets/pages-js/publicfeed/index.js")}}"></script>

<script>
    //block user
    jQuery(document).on('click', '.block_user', function () 
    {
      var id = jQuery(this).attr('data-id');
      var block_flag = jQuery(this).attr('data-flag');
      var target = $(this).attr("href");
      var token = jQuery("#csrf-token").prop("content");

      if (block_flag == 1) {
          var block_title = 'Are you sure you want to block this record?';
          var block_text = 'Once blocked, you will not be able to recover this data!';
      } else {
          var block_title = 'Are you sure you want to unblock this record?';
          var block_text = 'Once unblocked, you will not be able to recover this data!';
      }

      if (!isNaN(id)) {
          swal({
              title: block_title,
              text: block_text,
              icon: 'warning',
              buttons: true,
              dangerMode: true,
          }).then(function(willDelete) {
              if (willDelete) {
                  jQuery.ajax({
                      "url": controller_url + '/block_user',
                      type: "POST",
                      data: {
                          'id': id,
                          '_token': token,
                          'block_flag':block_flag,
                      },
                      dataType: 'json',
                      cache: false,
                      
                      success: function (response) {
                          if (response.success == true) {
                              iziToast.success({
                                  message: response.message,
                                  position: 'topRight'
                              });
                          } else {
                              iziToast.error({
                                  message: response.message,
                                  position: 'topRight'
                              });
                          }
                          $("#myModal").modal("hide"); 
                      }
                  })
              }
          });
      }
    });
</script>
@endsection
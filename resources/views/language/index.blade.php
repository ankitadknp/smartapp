@extends('layouts.layout')

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
                <h1>Language</h1>
                <a href="#" class="float-right btn btn-primary add_language">Add New</a>
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
                                                <input type="text" placeholder="Language Name" name="language_name" id="language_name" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <input type="text" placeholder="Language Code" name="language_code" id="language_code" class="form-control">
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
                                        <th>Language Name</th>
                                        <th>Language Code</th>
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

<!-- add language -->
<div class="modal fade" id="add_language" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New Language </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('errors.require')
                <form class="" id="language_form" novalidate="" action="{{route("language.store")}}" enctype="multipart/form-data" method="POST">
                <input type="hidden" name="language_id" id="language_id" >
                    @csrf
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label>Language Name</label>
                                <input type="text" name="language_name" id="lan_name" placeholder="Language Name"  class="form-control" >
                                <span class="text-danger">
                                    <strong id="name-error"></strong>
                                </span>
                            </div>

                            <div class="col-sm-12 form-group">
                                <label>Language Code</label>
                                <input type="text" placeholder="Language Code" name="language_code" class="form-control" required="" id="lan_code" >
                                <span class="text-danger">
                                    <strong id="code-error"></strong>
                                </span>
                            </div>
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
@endsection

@section('addjs')
<script src="{{asset("public/assets/modules/datatables/datatables.min.js")}}"></script>
<script src="{{asset("public/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js")}}"></script>
<script src="{{asset("public/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js")}}"></script>
<script src="{{asset("public/assets/modules/jquery-ui/jquery-ui.min.js")}}"></script>

<script type="text/javascript">
    var controller_url = "{{route('language.index')}}";

    $(".add_language").click(function(){
        $('#language_id').val('');
        $('#language_form').trigger("reset");
        $('#saveBtn').html("Save");
        $('#exampleModalLongTitle').html("Add Language");
        $('#add_language').modal('show');
        $( '#name-error').html( "" );
        $( '#code-error').html( "" );
    });

    $('body').on('click', '.edit_language', function () {
        var language_id = $(this).data('id');
        $( '#name-error').html( "" );
        $( '#code-error').html( "" );

        $.get('language/'+language_id+'/edit', function (data) {
            $('#exampleModalLongTitle').html("Edit Language");
            $('#saveBtn').html("Update");
            $('#add_language').modal('show');
            $('#language_id').val(data.language_id);
            $('#lan_name').val(data.language_name);
            $('#lan_code').val(data.language_code);
        })
    });

    $('#saveBtn').click(function (e) {
        e.preventDefault();

        $.ajax({
          data: $('#language_form').serialize(),
          url: "",
          type: "POST",
          dataType: 'json',
      
            success: function (data) 
            {
                
                if(data.success){

                    $('#language_form').trigger("reset");
                    $('#add_language').modal('hide');
                    jQuery(data_table).DataTable().draw();
                    // $('#datatable').DataTable().draw();

                    setTimeout(function () {
                        swal(data.message, {
                            icon: 'success',
                        });
                    });
                } else {
                    $( '#name-error').html( data.errors.language_name );
                    $( '#code-error').html( data.errors.language_code );
                }
            },
            error: function (data) {
                console.log('Error:', data);
                $('#saveBtn').html('Save Changes');
            }
        });
    });
  
</script>


<!-- Page Specific JS File -->
<script src="{{asset("public/assets/pages-js/language/index.js")}}"></script>
@endsection
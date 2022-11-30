@extends('layouts.layout')

@section('title', 'Location')

@section('addcss')
<link rel="stylesheet" href="{{asset("public/assets/modules/datatables/datatables.min.css")}}">
<link rel="stylesheet" href="{{asset("public/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css")}}">
<link rel="stylesheet" href="{{asset("public/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css")}}">
@endsection

@section('content')
@php
$module_permissions = Session::get("user_access_permission");
$module_permission = !empty($module_permissions['locations']) ? $module_permissions['locations'] : array();
@endphp
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="col-lg-12">
                <h1>Location</h1>
                <?php 
                $pemission = in_array("create", $module_permission) ? 'true' : 'false';
                if($pemission == 'true') { ?>
                    <a href="#" class="float-right btn btn-primary add_location">Add New</a>
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
                                                <input type="text" placeholder="City Area" name="city_area" id="city_area" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <input type="text" placeholder="Area Code" name="area_code" id="area_code" class="form-control">
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
                                        <th>City Area</th>
                                        <th>Area Code</th>
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
<div class="modal fade" id="add_location" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New Location </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('errors.require')
                <form class="" id="location_form" novalidate="" action="{{route("locations.store")}}" enctype="multipart/form-data" method="POST">
                <input type="hidden" name="id" id="id" >
                    @csrf
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label>City Area</label>
                                <input type="text" name="city_area" id="c_area" placeholder="City Area"  class="form-control" >
                                <span class="text-danger">
                                    <strong id="area-error"></strong>
                                </span>
                            </div>

                            <div class="col-sm-12 form-group">
                                <label>City Area(Arabic)</label>
                                <input type="text" name="city_area_ab" id="city_area_ab" placeholder="City Area(Arabic)"  class="form-control" >
                                <span class="text-danger">
                                    <strong id="city-area-ab-error"></strong>
                                </span>
                            </div>

                            <div class="col-sm-12 form-group">
                                <label>City Area(Hebrew)</label>
                                <input type="text" name="city_area_he" id="city_area_he" placeholder="City Area(Hebrew)"  class="form-control" >
                                <span class="text-danger">
                                    <strong id="city-area-he-error"></strong>
                                </span>
                            </div>

                            <div class="col-sm-12 form-group">
                                <label>Area Code</label>
                                <input type="text" placeholder="Area Code" name="area_code" class="form-control" required="" id="code" >
                                <span class="text-danger">
                                    <strong id="code-error"></strong>
                                </span>
                            </div>

                            <div class="col-sm-12 form-group">
                                <label>Locations</label>
                                <input type="text" placeholder="Locations" name="locations" class="form-control" required="" id="locations" >
                                <input type="hidden" value="" name="latitude" id="store_lat">
                                <input type="hidden" value="" name="longitude" id="store_long">
                                <span class="text-danger">
                                    <strong id="locations-error"></strong>
                                </span>
                            </div>

                            <div id="map"></div>
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
    var controller_url = "{{route('locations.index')}}";
    var module_permission = {!! json_encode(array_values($module_permission)) !!};
</script>


<!-- Page Specific JS File -->
<script src="{{asset("public/assets/pages-js/locations/index.js")}}"></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAt0zJDmrcOEodYpDgG_Dj4NVHPDCC34hc&libraries=places&callback=initAutocomplete" async defer></script> -->
<script src="{{asset("public/assets/pages-js/locations/add.js")}}"></script>


<script>
    //google map location
    // var placeSearch, autocomplete;
    // var componentForm = {
    //     street_number: 'long_name',
    //     route: 'long_name',
    //     locality: 'long_name',
    //     sublocality_level_1: 'long_name',
    //     sublocality_level_2: 'long_name',
    //     administrative_area_level_1: 'long_name',
    //     administrative_area_level_2: 'long_name',
    //     country: 'long_name',
    //     postal_code: 'short_name'
    // };

    // function initAutocomplete() {
    //     // Create the autocomplete object, restricting the search to geographical
    //     // location types.
    //     var adddata = document.getElementById('locations');
    //     autocomplete = new google.maps.places.Autocomplete((adddata),
    //         {types: ['geocode']});

    //     // When the user selects an address from the dropdown, populate the address
    //     // fields in the form.
    //     autocomplete.addListener('place_changed', fillInAddress);
    // }

    // function fillInAddress() {
    //     // Get the place details from the autocomplete object.
    //     var place = autocomplete.getPlace();

    //     var lat = place.geometry.location.lat();
    //     var lng = place.geometry.location.lng();
    //     $('#store_lat').val(lat);
    //     $('#store_long').val(lng);

    //     // Get each component of the address from the place details
    //     // and fill the corresponding field on the form.
    //     for (var i = 0; i < place.address_components.length; i++) {
    //         var addressType = place.address_components[i].types[0];
    //         if (componentForm[addressType]) {
    //             var val = place.address_components[i][componentForm[addressType]];
    //             document.getElementById(addressType).value = val;
    //         }
    //     }
    // }
//end google map location

</script>
@endsection
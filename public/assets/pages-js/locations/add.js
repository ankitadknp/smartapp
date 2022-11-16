$(".add_location").click(function(){
    $('#id').val('');
    $('#location_form').trigger("reset");
    $('#saveBtn').html("Save");
    $('#exampleModalLongTitle').html("Add Location");
    $('#add_location').modal('show');
    $( '#area-error').html( "" );
    $( '#city-area-ab-error').html( "" );
    $( '#city-area-he-error').html( "" );
    $( '#code-error').html( "" );
    $( '#locations-error').html( "" );
});

$('body').on('click', '.edit_location', function () {
    var location_id = $(this).data('id');
    $( '#area-error').html( "" );
    $( '#city-area-ab-error').html( "" );
    $( '#city-area-he-error').html( "" );
    $( '#code-error').html( "" );
    $( '#locations-error').html( "" );

    $.get('locations/'+location_id+'/edit', function (data) {
        $('#exampleModalLongTitle').html("Edit Location");
        $('#saveBtn').html("Update");
        $('#add_location').modal('show');
        $('#id').val(data.id);
        $('#c_area').val(data.city_area);
        $('#city_area_ab').val(data.city_area_ab);
        $('#city_area_he').val(data.city_area_he);
        $('#code').val(data.area_code);
        // $('#locations').val(data.language_code);
    })
});

$('#saveBtn').click(function (e) {
    e.preventDefault();

    $.ajax({
        data: $('#location_form').serialize(),
        url: "",
        type: "POST",
        dataType: 'json',
        success: function (data) 
        {
            if(data.success){

                $('#location_form').trigger("reset");
                $('#add_location').modal('hide');
                jQuery(data_table).DataTable().draw();

                setTimeout(function () {
                    swal(data.message, {
                        icon: 'success',
                    });
                });
            } else {
                $( '#area-error').html( data.errors.city_area );
                $( '#city-area-ab-error').html( data.errors.city_area_ab);
                $( '#city-area-he-error').html( data.errors.city_area_he);
                $( '#code-error').html( data.errors.area_code);
            }
        },
        error: function (data) {
            console.log('Error:', data);
            $('#saveBtn').html('Save Changes');
        }
    });
});


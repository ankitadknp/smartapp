$(".add_client").click(function(){
    $('#user_id').val('');
    $('#client_form').trigger("reset");
    $('#saveBtn').html("Save");
    $('#exampleModalLongTitle').html("Add Client");
    $('#add_client').modal('show');
    $('#name_error').html( "" );
    $('#last_name_error').html( "" );
    $('#email_error').html( "" );
    $('#pwd_error').html( "" );
    $('#con_pwd_error').html( "" );
    $('#phone_error').html( "" );
    $('#id_number_error').html( "" );
    $('#marital_status_error').html( "" );
    $('#education_level_error').html( "" );
    $('#business_sector_error').html( "" );
    $('#no_of_child_error').html( "" );
    $('#occupation_error').html( "" );
    $('#street_address_name_error').html( "" );
    $('#street_number_error').html( "" );
    $('#district_error').html( "" );
    $('#house_number_error').html( "" );
    $('#city_error').html( "" );
});

$('body').on('click', '.edit_client', function () 
{
    var user_id = $(this).data('id');
    $('#client_form').trigger("reset");
    $('#saveBtn').html("Save");
    $('#exampleModalLongTitle').html("Add Client");
    $('#add_client').modal('show');
    $('#name_error').html( "" );
    $('#last_name_error').html( "" );
    $('#email_error').html( "" );
    $('#pwd_error').html( "" );
    $('#con_pwd_error').html( "" );
    $('#phone_error').html( "" );
    $('#id_number_error').html( "" );
    $('#marital_status_error').html( "" );
    $('#education_level_error').html( "" );
    $('#business_sector_error').html( "" );
    $('#no_of_child_error').html( "" );
    $('#occupation_error').html( "" );
    $('#street_address_name_error').html( "" );
    $('#street_number_error').html( "" );
    $('#district_error').html( "" );
    $('#house_number_error').html( "" );
    $('#city_error').html( "" );

    $.get('client/'+user_id+'/edit', function (data) 
    {
        $('.password').hide();
        $('.con_password').hide();
        $('#exampleModalLongTitle').html("Edit Client");
        $('#saveBtn').html("Update");
        $('#add_client').modal('show');
        $('#user_id').val(data.id);
        $('#f_name').val(data.first_name);
        $('#l_name').val(data.last_name);
        $('#email_id').val(data.email);
        $('#phone').val(data.phone_number);
        $('#id_number').val(data.id_number);
        $('#marital_status').val(data.marital_status);
        $('#education_level').val(data.education_level);
        $('#business_sector').val(data.business_sector);
        $('#no_of_child').val(data.no_of_child);
        $('#occupation').val(data.occupation);
        $('#street_address_name').val(data.street_address_name);
        $('#street_number').val(data.street_number);
        $('#district').val(data.district);
        $('#house_number').val(data.house_number);
        $('#city').val(data.city);
    })
});

$('#saveBtn').click(function (e) {
    e.preventDefault();

    $.ajax({
      data: $('#client_form').serialize(),
      type: "POST",
      dataType: 'json',
  
        success: function (data) 
        {
            if(data.success){

                $('#client_form').trigger("reset");
                $('#add_client').modal('hide');
                jQuery(data_table).DataTable().draw();

                setTimeout(function () {
                    swal(data.message, {
                        icon: 'success',
                    });
                });
            } else {
                $('#name_error').html( data.errors.first_name );
                $('#last_name_error').html( data.errors.last_name );
                $('#email_error').html( data.errors.email );
                $('#pwd_error').html( data.errors.password );
                $('#con_pwd_error').html( data.errors.password_confirmation );
                $('#phone_error').html( data.errors.phone_number );
                $('#id_number_error').html( data.errors.id_number );
                $('#marital_status_error').html( data.errors.marital_status );
                $('#education_level_error').html( data.errors.education_level );
                $('#business_sector_error').html( data.errors.business_sector );
                $('#no_of_child_error').html( data.errors.no_of_child );
                $('#occupation_error').html( data.errors.occupation );
                $('#street_address_name_error').html( data.errors.street_address_name );
                $('#street_number_error').html( data.errors.street_number );
                $('#district_error').html( data.errors.district );
                $('#house_number_error').html( data.errors.house_number );
                $('#city_error').html( data.errors.city );
            }
        },
        error: function (data) {
            console.log('Error:', data);
            $('#saveBtn').html('Save Changes');
        }
    });
});
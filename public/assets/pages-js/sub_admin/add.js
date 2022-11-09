$(".add_admin").click(function(){
    $('#user_id').val('');
    $('.password').show();
    $('#sub_admin_form').trigger("reset");
    $('#saveBtn').html("Save");
    $('#exampleModalLongTitle').html("Add Sub Admin");
    $('#add_sub_admin').modal('show');
    return false;
});

$('body').on('click', '.edit_sub_admin', function () {
    var user_id = $(this).data('id');
    $( '#email-error' ).html("" );
    $( '#pwd-error' ).html("");
    $( '#last-name-error' ).html("");
    $( '#first-name-error' ).html("");

    $.get('sub_admin/'+user_id+'/edit', function (data) {
        $('#exampleModalLongTitle').html("Edit Sub Admin");
        $('#saveBtn').html("Update");
        $('#add_sub_admin').modal('show');
        $('.password').hide();
        $('#user_id').val(data.id);
        $('#first_name').val(data.first_name);
        $('#last_name').val(data.last_name);
        $('#mail').val(data.email);
    })
});

$('#saveBtn').click(function (e) {
    e.preventDefault();

    $.ajax({
      data: $('#sub_admin_form').serialize(),
      type: "POST",
      dataType: 'json',
        success: function (data) 
        {
            if(data.success) {
                $(this).html('Sending..');
                $('#sub_admin_form').trigger("reset");
                $('#add_sub_admin').modal('hide');
            
                jQuery(data_table).DataTable().draw();

                setTimeout(function () {
                    swal(data.message, {
                        icon: 'success',
                    });
                });
            } else {
                $( '#email-error' ).html( data.errors.email );
                $( '#pwd-error' ).html( data.errors.password );
                $( '#last-name-error' ).html( data.errors.last_name );
                $( '#first-name-error' ).html( data.errors.first_name);
            }
        },
        error: function (data) {
            console.log('Error:', data);
            $('#saveBtn').html('Save Changes');
        }
    });
});
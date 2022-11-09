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

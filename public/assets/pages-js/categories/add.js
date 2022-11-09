$(".add_category").click(function(){
    $('#category_id').val('');
    $('#custom_form').trigger("reset");
    $('#saveBtn').html("Save");
    $('#exampleModalLongTitle').html("Add Categories");
    $('#add_category').modal('show');
    $( '#name-error').html( "" );
    $( '#type-error').html( "" );
    $( '#name-ab-error').html( "" );
    $( '#name-he-error').html( "" );
});

$('body').on('click', '.edit_category', function () {
    var category_id = $(this).data('id');
    $( '#name-error').html( "" );
    $( '#type-error').html( "" );
    $( '#name-ab-error').html( "" );
    $( '#name-he-error').html( "" );

    $.get('categories/'+category_id+'/edit', function (data) {
        $('#exampleModalLongTitle').html("Edit Categories");
        $('#saveBtn').html("Update");
        $('#add_category').modal('show');
        $('#category_id').val(data.category_id);
        $('#cat_name').val(data.category_name);
        $('#cat_name_ab').val(data.category_name_ab);
        $('#cat_name_he').val(data.category_name_he);
        $('#c_type').val(data.type);
    })
});

$('#saveBtn').click(function (e) {
    e.preventDefault();

    $.ajax({
      data: $('#custom_form').serialize(),
      type: "POST",
      dataType: 'json',
  
        success: function (data) 
        {
            if(data.success){

                $('#custom_form').trigger("reset");
                $('#add_category').modal('hide');
                jQuery(data_table).DataTable().draw();

                setTimeout(function () {
                    swal(data.message, {
                        icon: 'success',
                    });
                });
            } else {
                $( '#name-error').html( data.errors.category_name );
                $( '#type-error').html( data.errors.type );
                $( '#name-ab-error').html( data.errors.category_name_ab );
                $( '#name-he-error').html( data.errors.category_name_he );
            }
        },
        error: function (data) {
            console.log('Error:', data);
            $('#saveBtn').html('Save Changes');
        }
    });
});
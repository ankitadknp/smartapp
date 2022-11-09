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
$(".add_cms").click(function(){
    $('#id').val('');
    $('#cms_form').trigger("reset");
    $('#saveBtn').html("Save");
    $('#exampleModalLongTitle').html("Add CMS Pages");
    $('#add_cms').modal('show');
    $( '#title-error').html( "" );
    $( '#title_ab_error').html( "" );
    $( '#title_he_error').html( "" );
    $( '#content_error').html( "" );
    $( '#content_ab_error').html( "" );
    $( '#content_he_error').html( "" );
});

$('body').on('click', '.edit_category', function () {
    var id = $(this).data('id');
    $( '#title-error').html( "" );
    $( '#title_ab_error').html( "" );
    $( '#title_he_error').html( "" );
    $( '#content_error').html( "" );
    $( '#content_ab_error').html( "" );
    $( '#content_he_error').html( "" );

    $.get('cms_pages/'+id+'/edit', function (data) {
        $('#exampleModalLongTitle').html("Edit CMS Pages");
        $('#saveBtn').html("Update");
        $('#id').val(data.id);
        $('#c_title').val(data.title);
        $('#title_ab').val(data.title_ab);
        $('#title_he').val(data.title_he);
        CKEDITOR.instances['content'].setData(data.content)
        CKEDITOR.instances['content_ab'].setData(data.content_ab)
        CKEDITOR.instances['content_he'].setData(data.content_he)
    })
});

$('#saveBtn').click(function (e) {
    e.preventDefault();

    var id = $('#id').val();
    var title = $('#c_title').val();
    var title_ab = $('#title_ab').val();
    var title_he = $('#title_he').val();
    var content = CKEDITOR.instances['content'].getData();
    var content_ab = CKEDITOR.instances['content_ab'].getData();
    var content_he = CKEDITOR.instances['content_he'].getData();
    
    var parameters =
    {
        id:id,
        title:title,
        title_ab:title_ab,
        title_he:title_he,
        content:content,
        content_ab:content_ab,
        content_he:content_he,
    } 

    $.ajax({
      url: controller_url + '/store',
      data: parameters,
      type: "POST",
      dataType: 'json',
      cache : false,
        success: function (data) 
        {
            if(data.success){

                $('#cms_form').trigger("reset");
                $('#add_cms').modal('hide');
                jQuery(data_table).DataTable().draw();

                setTimeout(function () {
                    swal(data.message, {
                        icon: 'success',
                    });
                });
            } else {
                $( '#title_error').html( data.errors.title );
                $( '#title_ab_error').html( data.errors.title_ab );
                $( '#title_he_error').html( data.errors.title_he );
                $( '#content_error').html( data.errors.content );
                $( '#content_ab_error').html( data.errors.content_ab );
                $( '#content_he_error').html( data.errors.content_he );
            }
        },
        error: function (data) {
            console.log('Error:', data);
            $('#saveBtn').html('Save Changes');
        }
    });
});






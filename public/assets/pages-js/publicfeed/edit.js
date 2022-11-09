CKEDITOR.replace('ckeditor_he', {
    filebrowserUploadUrl: "{{route('ck.upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});
CKEDITOR.replace('ckeditor_ab', {
    filebrowserUploadUrl: "{{route('ck.upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});
CKEDITOR.replace('ckeditor', {
    filebrowserUploadUrl: "{{route('ck.upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});

CKEDITOR.on("instanceReady", function(event) {
    event.editor.on("beforeCommandExec", function(event) {
        // Show the paste dialog for the paste buttons and right-click paste
        if (event.data.name == "paste") {
            event.editor._.forcePasteDialog = true;
        }
        // Don't show the paste dialog for Ctrl+Shift+V
        if (event.data.name == "pastetext" && event.data.commandData.from == "keystrokeHandler") {
            event.cancel();
        }
    })
});

//delete image
jQuery(document).on('click', '.delete_data_button', function () 
{
    var result = confirm("Are you sure you want to remove this Image ?");
    if (result) {
        var id = jQuery(this).attr('data-id');
        jQuery.ajax({
            "url": controller_url + '/image_delete',
            type: "POST",
            data: {
                'id': id,
            },
            dataType: 'json',
            cache: false,
            success: function (response) {
                if (response.success == true) {
                    location.reload();
                } else {
                    setTimeout(function () {
                        iziToast.error({
                            message: response.message,
                            position: 'topRight'
                        });
                    });
                }
            }
        })
    }
});

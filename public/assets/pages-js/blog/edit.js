CKEDITOR.replace('ckeditor_he', {
    filebrowserUploadUrl: "{{route('ck.upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
});
CKEDITOR.replace('ckeditor_ab', {
    filebrowserUploadUrl: "{{route('ck.upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form',
    contentsLangDirection: "rtl"
});
CKEDITOR.replace('ckeditor', {
    filebrowserUploadUrl: "{{route('ck.upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form',
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
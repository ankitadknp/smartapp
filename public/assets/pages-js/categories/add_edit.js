jQuery(document).ready(function () {
    jQuery("#custom_form").validate({
        rules: {
            category_name: {
                required: true,
            }
        },
        messages: {
        },
        errorPlacement: function (error, element) {
            jQuery(element).addClass('is-invalid');
        },
    });
});
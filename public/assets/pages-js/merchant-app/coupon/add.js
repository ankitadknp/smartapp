$('.select_user').click( function() {
    var path = user_url;

    $( "#user" ).autocomplete({
        source: function( request, response ) {
            $.ajax({
            url: path,
            type: 'GET',
            dataType: "json",
            data: {
                search: request.term
            },
            success: function( data ) {
                response( data );
            }
            });
        },
        select: function (event, ui) {
            $('#user').val(ui.item.label);
            $('#user_id').val(ui.item.id);
            console.log(ui.item); 
            return false;
        }
    });
});

$('.select_coupon').click( function() {
    var path = coupon_url;

    $( "#coupon" ).autocomplete({
        source: function( request, response ) {
            $.ajax({
            url: path,
            type: 'GET',
            dataType: "json",
            data: {
                search: request.term
            },
            success: function( data ) {
                response( data );
            }
            });
        },
        select: function (event, ui) {
            $('#coupon').val(ui.item.label);
            $('#coupon_id').val(ui.item.coupon_id);
            console.log(ui.item); 
            return false;
        }
    });
});
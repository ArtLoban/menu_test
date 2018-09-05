/* Add Items to the Cart */

$(document).ready(function() {
    $('.minus').click(function () {
        var $input = $(this).parent().find('input');
        var count = parseInt($input.val()) - 1;
        count = count < 1 ? 1 : count;
        $input.val(count);
        $input.change();
        return false;
    });

    $('.plus').click(function () {
        var $input = $(this).parent().find('input');
        $input.val(parseInt($input.val()) + 1);
        $input.change();
        return false;
    });
});

/*  AJAX request  */
$(function() {
    $('form.dish-order').submit(function (event) {
        var url = $(this).attr('action');
        var dishId = $(this).find('.dishId').val();
        var dishQuantity = $(this).find('.dish-quantity').val();

        // console.log(dishId);
        // console.log(dishQuantity);

        event.preventDefault();

        $.ajax({
            url: url,
            type: 'POST',
            // dataType: 'html',
            data: {dishId: dishId, dishQuantity: dishQuantity},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        .done(function (data) {
            console.log(data);
            console.log([dishId, dishQuantity]);
        })
        .fail(function () {
            console.log("error");
        })
    })
});

/* CART */

$(document).ready(function() {

    /* Set rates + misc */
    var fadeTime = 300;

    /* Assign actions */
    $('.product-quantity input').change( function() {
        updateQuantity(this);
    });

    $('.product-removal button').click( function() {
        removeItem(this);
    });



    /* Remove item from cart */
    function removeItem(removeButton)
    {
        /* Remove row from DOM and recalc cart total */
        var productRow = $(removeButton).parent().parent();
        productRow.slideUp(fadeTime, function() {
            productRow.remove();
            // recalculateCart();
        });
    }

});
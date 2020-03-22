$(document).ready(function(){
    $('a[href=#buy]').click(function(e){
        e.preventDefault();
        let productId = $(this).data('product-id');
        $.arcticmodal({
            closeOnOverlayClick: false,
            type: 'ajax',
            url: '/buy-window/' + productId,
        });
    });
});

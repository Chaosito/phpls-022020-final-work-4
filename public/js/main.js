$(document).ready(function(){
    $('a[href=#buy]').click(function(e){
        e.preventDefault();
        let productId = $(this).data('product-id');
        $.arcticmodal({
            type: 'ajax',
            url: '/buy-window/' + productId,
        });
    });
});
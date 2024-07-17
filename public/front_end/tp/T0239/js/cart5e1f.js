$(document).ready(function () {
    $('.remove_cart').click(function () {
        var Pid = $(this).attr("data-id");
        if (confirm(msgRemoveCartItem + ' ?') == true) {
            removeCart(Pid, true, null);
        }
    });

    $('.item-quantity').change(function () {
        var max = parseInt($(this).attr('max')),
            psId = $(this).attr('data-id'),
            qty = parseInt($(this).val());
        if(qty>0){
            if(qty>max){
                alert('bạn chỉ có thể mua tối đa '+max+'sản phẩm');
                qty=max;
            }
            jsPostQty(psId,qty);
        }else {
            alert('bạn chỉ có thể mua tối thiểu 1 sản phẩm');
            location.reload();
        }
    });

    $(".number-minus").on('click', function(){
        var val = $(this).parent().find('.item-quantity').val()*1;
        var psId = $(this).parent().find('.item-quantity').data('id');
        if(val > 1){
            $(this).parent().find('.item-quantity').val(val - 1);
            var quantity = parseInt(val - 1);
            jsPostQty(psId,quantity);
        }
        else {
            alert('Bạn chỉ có thể mua tối thiểu 1 sản phẩm')
        }
    });
    $(".number-plus").on('click', function(){
        var max = $(this).parent().find('.item-quantity').attr('max')*1;
        var val = $(this).parent().find('.item-quantity').val()*1;
        var psId = $(this).parent().find('.item-quantity').data('id');
        if(val < max){
            $(this).parent().find('.item-quantity').val(val + 1);
            var quantity = parseInt(val+1);
            jsPostQty(psId,quantity);
        }
        else {
            alert('Bạn chỉ có thể mua tối đa '+max+' sản phẩm')
        }
    });
});
function jsPostQty(psId,quantity) {
    var products = [{
        'id':psId,
        'quantity':quantity
    }];
    addToCart(products, 2, function (rs) {
        location.reload();
    });
}

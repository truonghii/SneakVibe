$(document).ready(function () {
    var $storeId = $('#checkStoreId').val();
    $('.detail-product_big-Slide>div').slick({
        infinite: false,
        asNavFor: '.detail-product_small-Slide',
        speed: 1000,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: '<button type="button" class="slick-prev d-block p-0 position-absolute border-0"><i class="fas fa-chevron-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next d-block p-0 position-absolute border-0"><i class="fas fa-chevron-right"></i></button>'
    });

    if ($('.detail-product_small-Slide').length) {
        $('.detail-product_small-Slide').slick({
            infinite: false,
            dotsClass: 'mb-0 p-0 slick-dots position-absolute d-flex',
            focusOnSelect: true,
            speed: 1000,
            slidesToShow: 4,
            slidesToScroll: 1,
            prevArrow: '<button type="button" class="slick-prev d-block p-0 position-absolute border-0"><i class="fas fa-chevron-left"></i></button>',
            nextArrow: '<button type="button" class="slick-next d-block p-0 position-absolute border-0"><i class="fas fa-chevron-right"></i></button>'
        });
    }
    if(in_array($storeId, [66532,15113])) {
        $('.detail-product_big-Slide>div').slick('slickGoTo', 1);
    }
    $(".item-thumb").click(function () {
        slideIndex = $(this).index();
        $('.detail-product_big-Slide>div').slick('slickGoTo', slideIndex);
        $('.item-thumb').removeClass('slick-current');
        $(this).addClass('slick-current');
    });
    if(!in_array($storeId, [66532])) {
        $('.open-tabs').click(function () {
            if ($(this).parent().hasClass('active')) {
                $(this).parent().removeClass('active');
                $(this).next().slideUp();
            } else {
                $('.tab-item').removeClass('active');
                $('.tab-item .content-tab').slideUp();
                $(this).parent().addClass('active');
                $(this).next().slideToggle();

            }
        });
    }
    if(in_array($storeId, [66532])) {
        $('.content-tab iframe').parent().addClass('active');
    }
    if($('.product-related').length){
        $('.product-related .content').slick({
            infinite: true,
            speed: 1000,
            slidesToShow: 5,
            slidesToScroll: 1,
            prevArrow: '<button type="button" class="slick-prev border-0 d-block p-0 position-absolute"><i class="fas fa-chevron-left"></i></button>',
            nextArrow: '<button type="button" class="slick-next border-0 d-block p-0 position-absolute"><i class="fas fa-chevron-right"></i></button>',
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3
                    },
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2
                    },
                }
            ]
        });
    }
    var timer;
    $("#quantity").keyup(function () {
        $("#quantity-fixed").val($(this).val())
        clearTimeout(timer);
        timer = setTimeout(alertMax, 500)
    });
    $("#quantity-fixed").keyup(function () {
        $("#quantity").val($(this).val())
        clearTimeout(timer);
        timer = setTimeout(alertMax, 500)
    });

    $(".number-minus").click(function () {
        var qtt = $("#quantity").val() * 1;
        var min = $("#quantity").attr('min') * 1;
        if (qtt > min) {
            $('#quantity').val(qtt - 1);
            $('#quantity-fixed').val(qtt - 1);
        } else {
            alert('Bạn chỉ có thể mua ít nhât ' + min + ' sản phẩm')
            $('#quantity').val(min);
            $('#quantity-fixed').val(min);
        }
    });
    $(".number-plus").click(function () {
        var qtt = $("#quantity").val() * 1;
        var max = $("#quantity").attr('max') * 1;
        if (qtt < max) {
            $('#quantity').val(qtt + 1);
            $('#quantity-fixed').val(qtt + 1);
        } else if (qtt > 1 && qtt > max) {
            alert('Bạn chỉ có thể mua nhiều nhât ' + max + ' sản phẩm');
            $('#quantity').val(max);
            $('#quantity-fixed').val(max);
        }
    });

    $('.add-to-cart').click(function () {
        var t = $(this);
        var mes = $('#dialogMessage');
        if (t.attr('ck') == 1) {
            var products = [], ps = {};
            ps['id'] = t.attr('selId');
            ps['quantity'] = $('#quantity').val();
            products.push(ps);
            addToCart(products, 1, function (rs) {
                if (rs.status == 1) {
                    ajaxLoadView({
                        view: 'countCart',
                        onSuccess: function (rs) {
                            $('.count-cart').html(rs);
                        }
                    });
                    ajaxLoadView({
                        view: 'cartHeader',
                        onSuccess: function (rs) {
                            $('.cart-small__content').html(rs);
                        }
                    });
                    alert('Thêm vào giỏ hàng thành công !');
                } else {
                    alert(rs.messages);
                }
            });
        }else{
            alert('Chọn các tùy chọn cho sản phẩm trước khi cho sản phẩm vào giỏ hàng của bạn.');
        }
    });
    $('.quick-to-cart').click(function () {
        var t = $(this);
        var mes = $('#dialogMessage');
        if (t.attr('ck') == 1) {
            var products = [], ps = {};
            ps['id'] = t.attr('selId');
            ps['quantity'] = $('#quantity').val();
            products.push(ps);
            addToCart(products, 1, function (rs) {
                if (rs.status == 1) {
                    ajaxLoadView({
                        view: 'countCart',
                        onSuccess: function (rs) {
                            $('.count-cart').html(rs);
                        }
                    });
                    ajaxLoadView({
                        view: 'cartHeader',
                        onSuccess: function (rs) {
                            $('.cart-small__content').html(rs);
                        }
                    });
                    window.location.href = '/cart/checkout';
                } else {
                    alert(rs.messages);
                }
            });
        }else{
            alert('Chọn các tùy chọn cho sản phẩm trước khi cho sản phẩm vào giỏ hàng của bạn.');
        }
    });

    $('.group-buy__fixed .add-to-cart').on('click', function () {
        if (  $('.add-to-cart').attr('ck') == 0) {
            $('html,body').animate({
                scrollTop: $('.product-infomation').offset().top - 100
            }, 'slow');
        }
    });

    $('.size a').click(function () {
        var t = $(this), size = $('.size a'), qty = $('#quantity'), atc = $('.add-to-cart,.quick-to-cart');
        if (!t.hasClass('active')) {
            size.removeClass('active');
            if ($('.color').length && !$('.color a.active').length) {
                size.attr('title', 'Vui lòng chọn màu trước!');
                $('#quantity,#quantity-fixed').val(1);
            } else {
                if (t.attr('qty')) {
                    t.addClass('active');
                    qty.attr('max', t.attr('qty'));
                    atc.attr('selid', t.attr('selid')).removeAttr('title').attr('ck', 1).removeClass('unsel').addClass('active');
                    renderPrice(t.attr('price'),t.attr('oldPrice'),t.attr('data-code'),t.attr('moneydiscount'));
                    $('#quantity,#quantity-fixed').val(1);
                }
            }
        }
    });

    $('.color a').click(function () {
        var t = $(this), size = $('.size a'), qty = $('#quantity'), atc = $('.add-to-cart,.quick-to-cart'), attrs = {};
        if(in_array($storeId, [33854, 15113])) {
            var src = $(this).attr('data-src');
            $('.detail-product_big-Slide img').attr("src", src);
        }
        if (!t.hasClass('active')) {
            $('.color a').removeClass('active');
            if (size.length > 1) {
                size.removeClass('active deactive');
                size.removeAttr('title');
                t.addClass('active');
                atc.removeClass('active').attr('title', 'Vui lòng chọn kích cỡ !');
                attrs[$('.color').attr('column')] = t.attr('value');
                size.each(function () {
                    var t = $(this);
                    attrs[$('.size').attr('column')] = t.attr('value');
                    $.post(
                        '/product/child?psId=' + $('.add-to-cart').attr('psid'),
                        {'attrs': attrs},
                        function (rs) {
                            if (rs.code == 1) {
                                if (rs.data.available <= 0) {
                                    t.addClass('deactive').attr('title', msgOutofStock).removeAttr('qtt');
                                } else {
                                    t.attr('qty', rs.data.available).attr('selId', rs.data.id);
                                    t.attr('price', rs.data.price).attr('oldprice', rs.data.oldPrice).attr('data-code', rs.data.code).attr('moneyDiscount',rs.data.moneyDiscount);
                                }
                            } else {
                                t.addClass('deactive').attr('title', 'Sản phẩm tạm thời hết hàng!').removeAttr('qty');
                            }
                        },
                        'json'
                    );
                });

            } else {
                if (t.attr('qty')) {
                    t.addClass('active');
                    atc.attr('selId', t.attr('selId')).removeAttr('title').attr('ck', 1).removeClass('unsel').addClass('active');
                    renderPrice(t.attr('price'),t.attr('oldPrice'),t.attr('data-code'),t.attr('moneydiscount'));
                    $('#quantity,#quantity-fixed').val(1);
                }
            }
        } else {
            if (size.length == 0) {
                atc.attr('selId', t.attr('selId')).removeAttr('title').attr('ck', 1).removeClass('unsel').addClass('active');
            }
        }

        if(in_array($storeId, [66532,142650, 146054,62506])) {
            var pIdsAttr = (t.attr('data-pIds')).split(',');
            var ps = [];
            ps.push({id: pIdsAttr, code: 1, storeId: $storeId});
            if (ps.length) {
                getallchildimg(ps, function (rs) {
                    if (rs.images.length > 0) {
                        var img_slide_main = $('.detail-product_big-Slide>div');
                        var img_slide_nav = $('.detail-product_small-Slide');
                        img_slide_main.slick('unslick').empty();
                        img_slide_nav.slick('unslick').empty();
                        $.each(rs.images, function (vl) {
                            img_slide_main.append();
                            img_slide_nav.append();
                            img_slide_main.append('' +
                                '<div class="">\n' +
                                '<a href="' + rs.images[vl] + '" class="d-block position-relative" data-fancybox="gallery"\n' +
                                'rel="group">\n' +
                                '<img data-sizes="auto" class="lazyload" src="/img/lazyLoading.gif"\n' +
                                'data-src="' + rs.images[vl] + '"\n' +
                                'alt="image">\n' +
                                '<button class="openZoom position-absolute p-0 rounded-circle text-center">\n' +
                                '<i class="fas fa-expand-alt"></i>\n' +
                                '</button>\n' +
                                '</a>\n' +
                                '</div>' +
                                '');
                            img_slide_nav.append('' +
                                '<div class="item-thumb">\n' +
                                '<a href="javascript:" class="d-block position-relative">\n' +
                                '<img class="position-absolute"\n' +
                                'src="' + rs.images[vl] + '"\n' +
                                'alt="image">\n' +
                                '</a>\n' +
                                '</div>' +
                                '');
                        });
                        $('.detail-product_big-Slide>div:not(.sale)').slick({
                            infinite: false,
                            asNavFor: '.detail-product_small-Slide',
                            speed: 1000,
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            prevArrow: '<button type="button" class="slick-prev d-block p-0 position-absolute border-0"><i class="fas fa-chevron-left"></i></button>',
                            nextArrow: '<button type="button" class="slick-next d-block p-0 position-absolute border-0"><i class="fas fa-chevron-right"></i></button>'
                        });

                        if ($('.detail-product_small-Slide').length) {
                            $('.detail-product_small-Slide').slick({
                                infinite: false,
                                dotsClass: 'mb-0 p-0 slick-dots position-absolute d-flex',
                                focusOnSelect: true,
                                speed: 1000,
                                slidesToShow: 4,
                                slidesToScroll: 1,
                                prevArrow: '<button type="button" class="slick-prev d-block p-0 position-absolute border-0"><i class="fas fa-chevron-left"></i></button>',
                                nextArrow: '<button type="button" class="slick-next d-block p-0 position-absolute border-0"><i class="fas fa-chevron-right"></i></button>'
                            });
                        }
                        $(".item-thumb").click(function () {
                            slideIndex = $(this).index();
                            $('.detail-product_big-Slide>div:not(.sale)').slick('slickGoTo', slideIndex);
                            $('.item-thumb').removeClass('slick-current');
                            $(this).addClass('slick-current');
                        });
                    }
                });
            }
        }
    });

    checkInv();

    globalBuyBtnScrollFunc();

    $("#send_contact").on('click', function () {


        var t = $(this);
        var $formcontact = $("#contactIndex");
        var content = t.parents('.form-lien-he').find('input[name="product"]').val() + ' --- ' + t.parents(".form-lien-he").find('textarea[name="content"]').val();
        var data = $formcontact.serialize() + '&content=' + content;
        if ($formcontact.validationEngine('validate')) {
            $.post('/contact/contacts', data,
                function (rs) {
                    if (rs.code == 1) {
                        alert(rs.message);
                        // location.reload();
                    } else {
                        alert(rs.message);
                    }
                }
            );
        }


        // if ($formcontact.validationEngine('validate')) {
        //     $.post('/contact/contacts', $formcontact.serialize(),
        //         function (rs) {
        //             if (rs.code == 1) {
        //                 alert(rs.message);
        //                 // location.reload();
        //             } else {
        //                 alert(rs.message);
        //             }
        //         }
        //     );
        // }
    });
    
});

function alertMax() {
    if ($("#quantity").val() * 1 > $("#quantity").attr("max") * 1) {
        alert("Bạn chỉ mua được tối đa " + $("#quantity").attr("max") + " sản phẩm!");
        $("#quantity").val($("#quantity").attr("max"));
        $("#quantity-fixed").val($("#quantity").attr("max"));
    }
    if ($("#quantity-fixed").val() * 1 > $("#quantity").attr("max") * 1) {
        alert("Bạn chỉ mua được tối đa " + $("#quantity").attr("max") + " sản phẩm!");
        $("#quantity").val($("#quantity").attr("max"));
        $("#quantity-fixed").val($("#quantity").attr("max"));
    }
}

function globalBuyBtnScrollFunc() {
    var $area = $('.group-buy__fixed');
    var $item = $('.group-buy');
    var pdFooter = $area.outerHeight();
    $(window).scroll(function(){
        try {
            var iCurrentHeightPos = $(this).scrollTop() + $(this).height(),
                iButtonHeightPos = $item.offset().top - $('.header-content ').outerHeight();
            if (iCurrentHeightPos > iButtonHeightPos || iButtonHeightPos < $(this).scrollTop() + $item.height()) {
                if (iButtonHeightPos < $(this).scrollTop() - $item.height()) {
                    $('footer').css('padding-bottom',pdFooter);
                    $area.addClass('active');
                } else {
                    $area.removeClass('active');
                }
            } else {
                $('footer').css('padding-bottom',0);
                $area.addClass('active');
            }
        } catch(e) { }
    });
}

function checkInv() {
    var req = $('.req').length, attrs = {}, atc = $('.add-to-cart,.quick-to-cart'),
        qtt = $('#quantity');
    if (req == 1) {
        if ($('.color').length) {
            if ($('.color a.active').length) {
                attrs[$('.color').attr('column')] = $('.color a.active').attr('value');
                $.post(
                    '/product/child?psId=' + atc.attr('psid'),
                    {'attrs': attrs},
                    function (rs) {
                        if (rs.code == 1) {
                            qtt.attr('max', rs.data.available);
                            atc.attr('selId', rs.data.id).removeAttr('title').attr('ck', 1).removeClass('unsel').addClass('active');
                            if(rs.data.available > 0){
                                atc.addClass('active');
                            }
                        } else {
                            atc.attr('title', msgOutofStock);
                        }
                    },
                    'json'
                );

            } else {
                $('.color a').each(function () {
                    var t = $(this);
                    attrs[$('.color').attr('column')] = t.attr('value');
                    $.post(
                        '/product/child?psId=' + atc.attr('psid'),
                        {'attrs': attrs},
                        function (rs) {
                            if (rs.code == 1) {
                                t.attr('qty', rs.data.available).attr('selId', rs.data.id);
                                t.attr('price', rs.data.price).attr('oldprice', rs.data.oldPrice).attr('data-code', rs.data.code).attr('moneyDiscount',rs.data.moneyDiscount);
                            } else {
                                t.addClass('deactive').attr('title', msgOutofStock);
                            }
                        },
                        'json'
                    );
                });
            }
        } else {
            if ($('.size a.active').length) {
                attrs[$('.size').attr('column')] = $('.size a.active').attr('value');
                $.post(
                    '/product/child?psId=' + atc.attr('psid'),
                    {'attrs': attrs},
                    function (rs) {
                        if (rs.code == 1) {
                            qtt.attr('max', rs.data.available);
                            atc.attr('selId', rs.data.id).removeAttr('title').attr('ck', 1).removeClass('unsel');
                            if(rs.data.available > 0){
                                atc.addClass('active');
                            }
                            // checkMax();
                        } else {
                            atc.attr('title', msgOutofStock);
                        }
                    },
                    'json'
                );
            } else {
                $('.size a').each(function () {
                    var t = $(this);
                    attrs[$('.size').attr('column')] = t.attr('value');
                    $.post(
                        '/product/child?psId=' + atc.attr('psid'),
                        {'attrs': attrs},
                        function (rs) {
                            console.log(rs);
                            if (rs.code == 1) {
                                if (rs.data.available > 0) {
                                    t.attr('qty', rs.data.available).attr('selId', rs.data.id);
                                    t.attr('price', rs.data.price).attr('oldprice', rs.data.oldPrice).attr('data-code', rs.data.code).attr('moneyDiscount',rs.data.moneyDiscount);
                                } else {
                                    t.addClass('deactive').attr('title', msgOutofStock);
                                }
                            } else {
                                t.addClass('deactive').attr('title', msgOutofStock);
                            }
                        },
                        'json'
                    );
                });
            }
        }

        return false;
    }
    if (req > 1) {
        var colorAt = $('.color a.active'), sizeAt = $('.size a.active');
        if (colorAt.length && sizeAt.length) {
            attrs[$('.color').attr('column')] = colorAt.attr('value');
            attrs[$('.size').attr('column')] = sizeAt.attr('value');
            $.post(
                '/product/child?psId=' + atc.attr('psid'),
                {'attrs': attrs},
                function (rs) {
                    console.log(rs);
                    if (rs.code == 1) {
                        if (rs.data.available < 0) {
                            sizeAt.addClass('deactive').attr('title', msgOutofStock);
                        } else {
                            qtt.attr('max', rs.data.available);
                            atc.attr('selId', rs.data.id).removeAttr('title').attr('ck', 1).removeClass('unsel').addClass('active');
                        }
                    } else {
                        atc.attr('title', msgOutofStock);
                    }
                },
                'json'
            );

            return false;
        }
        if (colorAt.length && !sizeAt.length) {
            attrs[$('.color').attr('column')] = colorAt.attr('value');
            $('.size a').each(function () {
                var t = $(this);
                attrs[$('.size').attr('column')] = t.attr('value');
                $.post(
                    '/product/child?psId=' + atc.attr('psid'),
                    {'attrs': attrs},
                    function (rs) {
                        if (rs.code == 1) {
                            if (rs.data.available <= 0) {
                                t.addClass('deactive').attr('title', msgOutofStock);
                            } else {
                                t.attr('qty', rs.data.available).attr('selId', rs.data.id);
                                t.attr('price', rs.data.price).attr('oldprice', rs.data.oldPrice).attr('data-code', rs.data.code).attr('moneyDiscount',rs.data.moneyDiscount);
                            }
                        } else {
                            t.addClass('deactive').attr('title', msgOutofStock);
                        }
                    },
                    'json'
                );
            });
            return false;
        }
        if (!colorAt.length && sizeAt.length) {
            attrs[$('.size').attr('column')] = sizeAt.attr('value');
            $('.color a').each(function () {
                var t = $(this);
                attrs[$('.color').attr('column')] = t.attr('value');
                $.post(
                    '/product/child?psId=' + atc.attr('psid'),
                    {'attrs': attrs},
                    function (rs) {
                        if (rs.code == 1) {
                            if (rs.data.available <= 0) {
                                t.addClass('deactive').attr('title', msgOutofStock);
                            } else {
                                t.attr('qty', rs.data.available).attr('selId', rs.data.id);
                                t.attr('price', rs.data.price).attr('oldprice', rs.data.oldPrice).attr('data-code', rs.data.code).attr('moneyDiscount',rs.data.moneyDiscount);
                            }
                        } else {
                            t.addClass('deactive').attr('title', msgOutofStock);
                        }
                    },
                    'json'
                );
            });
            return false;
        }
        else {
            $('.size a').attr('title','Vui lòng chọn màu trước');
        }
    }
}

function renderPrice($price,$priceOld,$code,$discount){
    // var n = $('.detail-product-name a'),
    var $spPrice = $('.price-box .pro-price .number'),
        $spOld = $('.price-box .price-old .number'),
        $spcode = $('.product_meta .pro-code');

    if ($code){
        $spcode.html($code);
    }else{
        $spcode.html('');
    }

    if($price <= 0 ){
        $spPrice.html('Liên hệ');
        if($priceOld<=0){
            $spOld.html('');
            $('.price-box .price-old').addClass('d-none');
        }
        $('.price-box .curent').addClass('d-none');
    }else if ($discount > 0){
        $spPrice.html($.number($price,0,',','.'));
        $spOld.html($.number((Number($price) + Number($discount)),0,',','.'));
        $('.price-box .price-old').removeClass('d-none');
        $('.price-box .curent').removeClass('d-none');
    }else {
        $('.price-box .curent').removeClass('d-none');
        if ($priceOld > 0) {
            $('.price-box .price-old').removeClass('d-none');
            $spOld.html($.number($priceOld,0,',','.'));
        }else{
            $spOld.html('');
            $('.price-box .price-old').addClass('d-none');
        }
        $spPrice.html($.number($price,0,',','.'));
    }

}

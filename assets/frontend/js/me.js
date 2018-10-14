$('#owl-single-product-thumbnails .item a:nth-last-child(1)').addClass('active');


// Fancybox 
function FancyPromocion() {
    if ($(".fancybox-promocion").length) {
        $(".fancybox-promocion").fancybox({
            openEffect: 'elastic',
            closeEffect: 'elastic',
            helpers: {
                overlay: {
                    css: {
                        'background': 'rgba(0, 0, 0, 0.6)'
                    }
                }
            }
        });
    };
}

jQuery(document).on('ready', function() {
    (function($) {
        FancyPromocion();
    })(jQuery);
});
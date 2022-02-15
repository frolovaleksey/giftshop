jQuery(function(){
	initProduct();
	initComment();
});

function initProduct() {

    if (jQuery('.product_slider').length) {
        jQuery('.product_slider').slick({
            slidesToScroll: 1,
            rows: 0,
            slidesToShow: 3,
            prevArrow: '<button class="slick-prev"><i class="fa fa-angle-left prev"></i></button>',
            nextArrow: '<button class="slick-next"><i class="fa fa-angle-right next"></i></button>',
            infinite: false,
            adaptiveHeight: true,
            autoplaySpeed: 5000,
            speed: 1000,
            responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToScroll: 1,
                    slidesToShow: 2
                }
            }, {
                breakpoint: 560,
                settings: {
                    slidesToScroll: 1,
                    slidesToShow: 1
                }
            }]
        });
    }


    if (jQuery('.featured-products').length) {
        jQuery('.featured-products').slick({
            slidesToShow: 2,
            arrows: true,
            adaptiveHeight: true,
            responsive: [
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ],
            prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-arrow-left"></i></button>',
            nextArrow: '<button type="button" class="slick-next"><i class="fas fa-arrow-right"></i></button>'
        });
    }
}

function initComment() {
    if ( !jQuery('.comment-pagination').length) {
        return;
    }

    let pageLink = jQuery('.comment-pagination').find('.page-link');
    let commentsHolder = jQuery('#reviews').find('.comments_holder');

    pageLink.on( 'click', function(event) {
        event.preventDefault();

        commentsHolder.html('<img src="'+loader_url+'">');

        jQuery.ajax({
            type: "GET",
            url: jQuery(this).attr('href'),
            success: function (response) {
                commentsHolder.html(response);
                initComment();
            },

            statusCode: gsStatusCodes,
        });
    });
}

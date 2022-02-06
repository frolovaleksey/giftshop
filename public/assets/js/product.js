jQuery(function(){
	initProduct();
});

function initProduct() {

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

jQuery(function(){
    initCardCarousel();
});

function initCardCarousel() {

    jQuery('#cartlist').on('shown.bs.collapse', function () {
        jQuery('div.carousel_card').scrollGallery({
            mask: 'div.gmask',
            slider: '.slideset',
            slides: '.slide',
            currentNumber: 'span.cur-num',
            totalNumber: 'span.all-num',
            disableWhileAnimating: true,
            generatePagination: 'div.pagination',
            circularRotation: true,
            pauseOnHover: false,
            autoRotation: false,
            maskAutoSize: false,
            switchTime: 2000,
            animSpeed: 600,
            step: 1
        });
    })

    jQuery('#cartlist').on('hidden.bs.collapse', function () {
        jQuery('div.carousel_card').unbind().scrollGallery();
        jQuery('.carousel_card .btn-prev').unbind('click');
        jQuery('.carousel_card .btn-next').unbind('click');
    })
}

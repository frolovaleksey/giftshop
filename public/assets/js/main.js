var gsStatusCodes = {
    403: function(response) {
        bb_dont_have_perrmissions();
    },
    500: function(response) {
        bb_ajax_error();
    },
    422: function(response) {

        var errors = response['responseJSON']['errors'];

        var txt = '';
        for (var key in errors) {
            txt = txt + ajax_errors_keys[key] +':' + errors[key];
        }
        alert(txt);
    }
};

function bb_dont_have_perrmissions(){
    alert('User does not have the right permissions.');
}

function bb_ajax_error(){
    alert('Internal error');
}

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

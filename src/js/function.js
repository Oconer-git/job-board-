

$('#fox-popup-triger').on('click', function () {
    $('.fox-popup-wrap').fadeIn(100);
    $("body").css("overflow", "hidden");
    return false;
});
$('.fox-close-btn').on('click', function () {
    $('.fox-popup-wrap').hide();
    $("body").css("overflow", "auto");
    return false;
});


/*$(".contactForm").hide();

$( ".btn-ctt" ).click(function() {

    $('.contactForm').toggle();
});*/
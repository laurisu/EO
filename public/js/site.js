$(function () {
    $(".offer-previw-btn").click(function (e) {
        e.preventDefault();
        $("#menu").toggleClass("preview-offer");
    });
    $("#menu a").click(function (event) {
        event.preventDefault();
        if ($(this).next('ul').length) {
            $(this).next().toggle('fast');
            $(this).children('i:last-child').toggleClass('fa-caret-down fa-caret-left');
        }
    });
});
//   $('.offer-preview').click(function (){
//       console.log('Click');
//        $('.offer-preview').toggle('slide');
//   }); 

    // Hide menu once we know its width
//    $('.offer-preview-button').click(function () {
//        var prev = '.offer-preview';
//        if ($(prev).css('right') === '5px') {
//            $(prev).animate({right: '-500px'});
//        } else {
//            $(prev).animate({right: '5px'});
//        }
//        ;
//    });
    

//    $("#button").click(function () {
//
//        // Set the effect type
//        var effect = 'slide';
//
//        // Set the options for the effect type chosen
//        var options = {direction: 'right'};
//
//        // Set the duration (default: 400 milliseconds)
//        var duration = 700;
//
//        $('#offer').toggle(effect, options, duration);
//    });
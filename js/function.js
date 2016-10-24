$(document).ready(function () {

    /*Main slider*/
    $(function () {
        $(".rslides").responsiveSlides({
            auto: false, // Boolean: Animate automatically, true or false
            speed: 500, // Integer: Speed of the transition, in milliseconds
            timeout: 4000, // Integer: Time between slide transitions, in milliseconds
            pager: false, // Boolean: Show pager, true or false
            nav: true, // Boolean: Show navigation, true or false
            random: false, // Boolean: Randomize the order of the slides, true or false
            pause: false, // Boolean: Pause on hover, true or false
            pauseControls: true, // Boolean: Pause when hovering controls, true or false
            prevText: "Previous", // String: Text for the "previous" button
            nextText: "Next", // String: Text for the "next" button
            maxwidth: "", // Integer: Max-width of the slideshow, in pixels
            navContainer: "", // Selector: Where controls should be appended to, default is after the 'ul'
            manualControls: "", // Selector: Declare custom pager navigation
            namespace: "rslides", // String: Change the default namespace used
            before: function () {}, // Function: Before callback
            after: function () {} // Function: After callback
        });
    });
    /*.Main slider*/
    
    /*Slider mini*/
    var smallImg = $('#sliderMini .small img');
    var mainImg = $('#sliderMini .main img');
    smallImg.on("click", function () {
        var _this = $(this);
       $('#sliderMini .main').addClass('loading');
        var preloadedImg = new Image();
        preloadedImg.alt = '';
        preloadedImg.src = $(this).attr('data-src');
        preloadedImg.onload = function() {
             $('#sliderMini .main').removeClass('loading');
             $(mainImg).attr('src', $(_this).attr('data-src'));
        }
        
    });
    /*Slider mini*/
});
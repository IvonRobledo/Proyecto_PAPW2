(function($) {
    "use strict"; // Start of use strict

   

    // Highlight the top nav as scrolling occurs
    $('body').scrollspy({
        target: '.navbar-fixed-top',
        offset: 50
    });

    // Closes the Responsive Menu on Menu Item Click
    $('.navbar-collapse ul li:not(.dropdown) a').click(function() {
        $('.navbar-toggle:visible').click();
    });

    // Offset for Main Navigation
    $('#mainNav').affix({
        offset: {
            top: 100
        }
    })


})(jQuery); // End of use strict

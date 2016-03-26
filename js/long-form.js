/**
 * Created by pchotrani on 17/03/16.
 */
/*
function orient() {
    if (window.orientation == 0 || window.orientation == 180) {
        $("body").attr("class", "portrait");
        orientation = 'portrait';

        return false;
    }
    else if (window.orientation == 90 || window.orientation == -90) {
        $("body").attr("class", "landscape");
        orientation = 'landscape';

        return false;
    }
}

/!* Call orientation function on page load *!/
$(function(){
    orient($("span.cd-dot").removeClass("active-dot"));
});

/!* Call orientation function on orientation change *!/
$(window).bind( 'orientationchange', function(e){
    orient();
});*/


$(window).scroll(function(){
    var scroll = $(window).scrollTop();
    $("span.cd-label").css("opacity", 1 - scroll / 400);

    //When it goes past the header.
    if (scroll >= 400 ) {
        $("span.cd-dot").removeClass("active-dot", 1000);
        $("span.cd-dot, span.cd-label").hover(
            function(){
                $('span.cd-dot').addClass('active-dot')
                $('span.cd-label').addClass('active')
            },
            function(){
                $('span.cd-dot').removeClass('active-dot')
                $('span.cd-label').removeClass('active')
            }
        )
    }
    //When going back to the top.
    else if ( scroll < 400 ) {
        $("span.cd-dot").addClass("active-dot", 1000);
    }
});


//aligns 2 images side by side.
$(document).ready(function() {
    $('figure').has('img.alignright').wrap('<div class="col-md-6"></div>');
});

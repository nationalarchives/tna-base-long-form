/**
 * Created by pchotrani on 17/03/16.
 */

$(document).ready(function(){
    /*Navigation ON / OFF States*/
    /*$(window).scroll(function(){
        if ($(window).scrollTop() > 50){
            $('.cd-label').stop().animate({"opacity":"0"},100);
            $(".cd-label").mouseover(function() {
                $('.cd-label').css("opacity", "1");
            })
            $(".cd-dot").mouseover(function() {
                $('.cd-label').css("opacity", "1");
            })
            $("#top-menu").hover(function() {
                $('#top-menu').css("opacity", "1");
            })
            $("#top-menu").mouseleave(function() {
                $('.cd-label').css("opacity", "0");
            })
            $(".cd-label").click(function() {
                $('.cd-label').css("opacity", "1");
            });
            $(".cd-dot").click(function() {
                $('.cd-label').css("opacity", "1");
            });
        }
        if ($(window).scrollTop() < 50){
            $('.cd-label').stop().animate({"opacity":"1"},100);
        }
    });*/
    /*End Navigation ON / OFF States*/


    // $sections incleudes all of the container sections that relate to menu items.
    var $sections = $('.cd-section');

    // The user scrolls
    $(window).scroll(function(){

        // currentScroll is the number of pixels the window has been scrolled
        var currentScroll = $(this).scrollTop();

        // $currentSection is somewhere to place the section we must be looking at
        var $currentSection = $(this);

        // We check the position of each of the sections compared to the windows scroll positon
        $sections.each(function(){
            // sectionPosition is the position down the page in px of the current section we are testing
            var sectionPosition = $(this).offset().top;

            // If the sectionPosition is less the the currentScroll position the section we are testing has moved above the window edge.
            // the -1 is so that it includes the section 1px before the section leave the top of the window.
            if( sectionPosition - 1 < currentScroll ){
                // We have either read the section or are currently reading the section so we'll call it our current section
                $currentSection = $(this);

                // If the next section has also been read or we are currently reading it we will overwrite this value again. This will leave us with the LAST section that passed.
            }

            // This is the bit of code that uses the currentSection as its source of ID
            var id = $currentSection.attr("id");
            $('.sub-menu').removeClass('is-selected');
            $("[href=#"+id+"]").addClass('is-selected');
        })

    });
    /*Lazy loading script*/
    $("div.lazy").lazyload({
        effect : "fadeIn"
    });

    $("img.lazy").lazyload({
        effect : "fadeIn"
    });
    /*END Lazy loading script*/

    /*Scroll to script*/
    $(".sub-menu").click(function(e) {
        e.preventDefault();
        var link = $(this).attr('href');
        $('html, body').animate({
            scrollTop: $(link).offset().top
        }, 1000);
    });
    /*END Scroll to script*/
});
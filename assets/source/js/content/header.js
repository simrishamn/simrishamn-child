
// Search trigger in navbar should only be visible on scroll
// (Unless screen is smaller than desktop)
$(window).on("scroll", function(){
    if($(window).scrollTop() < 130 && $(window).width() > 768) {
        $('#nav-search').css('visibility', 'hidden');
    } else {
        $('#nav-search').css('visibility', 'visible');
    }
});

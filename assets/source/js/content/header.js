
// Search trigger in navbar should only be visible on scroll
$(window).on("scroll", function(){
    if($(window).scrollTop() < 130) {
        $('#nav-search').css('visibility', 'hidden');
    } else {
        $('#nav-search').css('visibility', 'visible');
    }
});

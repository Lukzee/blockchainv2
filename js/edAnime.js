// a_ed_box section icons
$(".a_ed_box").hover(
    function () {
        $(this).find('.fa').addClass("barrelRoll");
        $(this).find('.txt').css('color', 'red');
        $(this).find('.txt').addClass("bounceIn");
    },
    function () {
        $(this).find('.fa').removeClass("barrelRoll");
        $(this).find('.txt').css('color', 'black');
        $(this).find('.txt').removeClass("bounceIn");
    }
);

// Home logo
$(".logo_c").hover(
    function () {
        $(this).find('img').removeClass();
    },
    function () {
        $(this).find('img').addClass("zoomer");
    }
);
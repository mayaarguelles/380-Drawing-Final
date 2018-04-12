$('.toolBar>ul>li').click(function() {
    if ($(this).attr('class') == 'active') {
        $(this).removeClass('active');
    } else {
        $('.active').removeClass('active');
        $(this).addClass('active');
    }
});
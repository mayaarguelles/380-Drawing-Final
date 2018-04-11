$('form').on('submit', function(e) {
    e.preventDefault();
    $.post($(this).attr('action'), $(this).serialize());
    //console.log($(this).serialize());
});

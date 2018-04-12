$('form').on('submit', function(e) {
    e.preventDefault();
    if ($(this).children().children('#msg').length != 0) {
        if ($(this).children('#msg').val == "") {
            alert("Enter a message");
        } else {
            $.post($(this).attr('action'), $(this).serialize());
            var msg = $('#msg').val();
            
            $('#msgTarget').children().children('.msgBody').text(msg);
            $('#msgTarget').clone().removeAttr('id').prependTo('#themessages');
        }
    } else {
        $.post($(this).attr('action'), $(this).serialize());
    }
});

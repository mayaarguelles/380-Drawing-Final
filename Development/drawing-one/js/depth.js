var depthimg;
var posx;
var posy;
var preview = false;
var depthStrength = 15;


$(window).on('mousemove', function(e) {
    $('canvas').each( function() {
        //$(this).css('transform','translate('+($(this).attr('depth')*e.pageX)/(strength)+'px, '+($(this).attr('depth')*e.pageY)/(strength)+'px)');
        deptheffect(e, $(this));
    });
})

function deptheffect(e, target) {
    var posxadjusted = e.pageX - (window.innerWidth / 2);
    var posyadjusted = e.pageY - (window.innerHeight / 2);
    var depth = $(target).attr('depth');
    
    $(target).css('transform','translate(' + (depth * posxadjusted) / depthStrength + 'px, ' + (depth * posyadjusted) / depthStrength + 'px)');
}
var depthimg;
var posx;
var posy;
var preview = false;
var strength = 15;

// Randomize depths and positions of accent images
$('.accents img').each( function() {
    // Randomize depth, hinging on the size of the image (bigger images appear closer to the screen, smaller images are further);
    depthimg = ((Math.random()*2)*$(this).width())/(strength*6);
    
    // Randomize position from -10 to 110% (stretches out of screen so that the image appears continous / 'bleeds' even at max angles)
    posx = (Math.random()*120)-10;
    posy = (Math.random()*120)-10;
    
    // Determine z index based on width of image (bigger images appear closer to the screen, smaller images are further);
    zindex = $(this).width()*10;
    
    $(this).attr('depth', depthimg);
    $(this).css('z-index',(1/depthimg)*100);
    $(this).css('left',posx+'vw');
    $(this).css('top',posy+'vh');
    $(this).css('z-index',zindex);
    
});


$(window).on('mousemove', function(e) {
    $('.accents img').each( function() {
        //$(this).css('transform','translate('+($(this).attr('depth')*e.pageX)/(strength)+'px, '+($(this).attr('depth')*e.pageY)/(strength)+'px)');
        deptheffect(e, $(this));
    });
})

function deptheffect(e, target) {
    var posxadjusted = e.pageX - (window.innerWidth / 2);
    var posyadjusted = e.pageY - (window.innerHeight / 2);
    var depth = $(target).attr('depth');
    
    $(target).css('transform','translate(' + (depth * posxadjusted) / strength + 'px, ' + (depth * posyadjusted) / strength + 'px) scale(0.5)');
}

var music = document.getElementById('flowersmp3');

music.addEventListener('load', function() {
    music.play();
});

$('.player div').on('click', function() {
    $('.player div').addClass('off');
    $(this).removeClass('off');
});

$('.play').on('click', function() {
    music.play();
});

$('.pause').on('click', function() {
    music.pause();
});

$('.stop').on('click', function() {
    music.pause();
    music.currentTime = 0;
});

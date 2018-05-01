var windowHeight = window.innerHeight;
var gate = true;

window.addEventListener('mousemove', function(e) {
    if ( gate ) {
        
    } else {
        let posY = e.clientY;
        let sector = Math.floor((posY / windowHeight) * 11);
        console.log(sector);
        
        $('g').hide();
        $('g').eq(sector).show();
    }
});

document.querySelector('.container').addEventListener('click', function() {
    if ( gate ) {
        $('g').hide();
    } else {
        $('g').show();
    }
    
    $('#view-all').toggleClass('active');
    $('#view-slices').toggleClass('active');
    gate = !gate;
})
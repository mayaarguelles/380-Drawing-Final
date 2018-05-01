$('#terminal').hide();
$('#chat').hide();
$('#friends').hide();
$('#folder').hide();

$('.toolbar>ul>li').click(function() {
    if ($(this).attr('class') == 'active') {
        $(this).removeClass('active');
    } else {
        $('.active').removeClass('active');
        $(this).addClass('active');
    }
});

$('#drive-icon').click(function() {
    $('#terminal').toggle();
});

$('#chat-icon').click(function() {
    $('#chat').toggle();
    $('#friends').toggle();
});

$('#folder-icon').click(function() {
    $('#folder').toggle();
});

$('#music-icon').click(function() {
    $('#music').toggle();
});

// following w3school's guide: https://www.w3schools.com/howto/howto_js_draggable.asp
draggable(document.getElementById('chat'));
draggable(document.getElementById('friends'));
draggable(document.getElementById('folder'));
draggable(document.getElementById('terminal'));
draggable(document.getElementById('music'));


function draggable(drag) {
    var pos1 = 0, pos2 = 0, initX = 0, initY = 0;
    document.getElementById(drag.id + "bar").onmousedown = dragMouseDown; 

  function dragMouseDown(e) {
    e = e || window.event;
    // get the mouse cursor position at startup:
    initX = e.clientX;
    initY = e.clientY;
    document.onmouseup = closeDragElement;
    // call a function whenever the cursor moves:
    document.onmousemove = elementDrag;
  }

  function elementDrag(e) {
    e = e || window.event;
    // calculate the new cursor position:
    pos1 = initX - e.clientX;
    pos2 = initY - e.clientY;
    initX = e.clientX;
    initY = e.clientY;
    // set the element's new position:
    drag.style.top = (drag.offsetTop - pos2) + "px";
    drag.style.left = (drag.offsetLeft - pos1) + "px";
  }

  function closeDragElement() {
    document.onmouseup = null;
    document.onmousemove = null;
  }
}

window.addEventListener('load', updateMusic);

function updateMusic() {
    var audio = document.querySelector('#bg');
    let cur = Math.floor(audio.currentTime) / Math.floor(audio.duration);
    $('.progress-bar').css("width", cur+"%");
    setTimeout(1000, updateMusic);
}

$('#pause').click(function() {
    document.querySelector('#bg').pause();
});

$('#play').click(function() {
    document.querySelector('#bg').play();
});
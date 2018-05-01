var canvas = document.querySelector('canvas');
var context = canvas.getContext('2d');
var src = document.querySelector('source');
var video = document.querySelector('video');
var animation;

const hueStart = 159;
const hueEnd = 327;
const satStart =80;
const satEnd = 28;
const lightStart = 27;
const lightEnd = 94;

const hueRange = hueEnd - hueStart;
const satRange = satStart - satEnd;
const lightRange = lightEnd - lightStart;

function setup() {
    if (document.cookie.includes("off=true")) {
        off();
    } else {
        draw();
    }
}

function off() {
    var buttons = document.querySelectorAll('h6');
    for (var i = 0; i < buttons.length; i++) {
        buttons[i].style.display = "none";
    }
    context.font = "10px Arial"
    context.fillStyle = "#f4c5d4";
    context.fillText("THERE'S NOTHING HERE", 35, 20, 60);
}

function draw() {
    var img = document.querySelector('#src');
    
    context.clearRect(0,0,132,126);
    context.drawImage(img, 0,0,132,126);
    var data = context.getImageData(0,0, 132, 126 );
    var pixelData = data.data;
    
    canvas.style.background = 'rgb('+pixelData[0]+','+pixelData[1]+','+pixelData[2]+')';
    
    for (var y = 0; y < (data.height); y++) {
        for (var x = 0; x < (data.width); x++) {
            var index = (x + y * data.width) * 4;
            let avg = ((pixelData[index] + pixelData[index + 1] + pixelData[index + 1])/3)/255;
            
            let hue = hueStart + (hueRange * avg);
            let sat = satStart - (satRange * avg);
            let light = lightStart + (lightRange * avg);
            
            context.fillStyle = "hsl("+hue+","+sat+"%,"+light+"%)";
            context.fillRect(x, y,1,1);
        }
    }
    
    //context.putImageData(data,0,0);
    
    animation = requestAnimationFrame(draw);
}


window.addEventListener('load', setup);
document.querySelector('#water').addEventListener('click', function() {
    src.src = "img/water-1.mp4";
    video.load();
    video.play();
});
document.querySelector('#touch').addEventListener('click', function() {
    src.src = "img/touch-1.mp4";
    video.load();
    video.play();
});

document.querySelector('#off').addEventListener('click', function() {
    cancelAnimationFrame(animation);
    context.fillStyle = '#0d4631';
    context.fillRect(0,0,132,126);
    document.cookie = "off=true;max-age=31536000;"
});

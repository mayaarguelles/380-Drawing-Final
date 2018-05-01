// UNCOMMENT FOR WEBCAM CAPABILITIES
const video = document.querySelector('video');

const constraints = {
  video: true
};

function handleSuccess(stream) {
    video.srcObject = stream;
    setup();
}

function handleError(err) {
    if(err === PERMISSION_DENIED) {
      alert("Please grant access to webcam for the full experience!");
    }
}

navigator.mediaDevices.getUserMedia(constraints).
              then(handleSuccess).catch(handleError);

///////
var canvas = document.querySelector('canvas');
var context = canvas.getContext('2d');

var referenceWidth = window.innerWidth;
var referenceHeight = window.innerHeight;
const scale = window.devicePixelRatio;
const strength = 1; // add twice as many pixels to the canvas to help with text hinting (currently turned off)
const detail = 5; // the higher the detail, the less pixels of the image will be rendered, so less text nodes will be drawn
const imgAdjuster = 0.9;
var imgWidth = referenceWidth / detail;

const thresholdOneLower = 10;
const thresholdOneUpper = 40;

const thresholdTwoLower = 41;
const thresholdTwoUpper = 60;

const thresholdThreeLower = 100;
const thresholdThreeUpper = 140;
var thresholdThreeGate = false;

const thresholdFourLower = 180;
const thresholdFourUpper = 200;
var thresholdFourGate = false;

var rawMessages = document.querySelector('.messages').textContent;
var rawMessagesArray = rawMessages.split(' ');
var messageIndex = 0;
var messagesArrayBuffer = [];
var messagesArray = "";

var imageElement = document.querySelector('img');
var images = ['test4.gif', 'test.jpeg', 'test5.gif'];
var imgArrIndex = 0;

var imgOrigWidth = 640;
var imgOrigHeight = 480;
//var imgOrigWidth = document.querySelector('img').width;
//var imgOrigHeight = document.querySelector('img').height;

var animation;

for (var i = 0; i < rawMessagesArray.length; i++) {
    if (rawMessagesArray[i].length == 0) {
    } else {
        messagesArrayBuffer[messageIndex] = rawMessagesArray[i];
        messageIndex++;
    }
}

for (var i = 0; i < messagesArrayBuffer.length; i ++) {
    messagesArray += messagesArrayBuffer[i];
}

messageIndex = 0;

function setup() {
    cancelAnimationFrame(animation);
    
    referenceWidth = window.innerWidth;
    referenceHeight = window.innerHeight;
    imgWidth = referenceWidth / detail;
    
    // set the display scale
    canvas.style.width = referenceWidth + 'px';
    canvas.style.height = referenceHeight + 'px';
    
    
    canvas.width = referenceWidth * scale * strength;
    canvas.height = referenceHeight * scale * strength;
    

    context.scale(scale * strength, scale * strength);
    context.font = 'Arial';
    
    //context.fillStyle = '#0e4632';
    context.fillStyle = '#f4c5d4';    
    
    draw();
}

function draw() {
    //var img = new Image(); // create an img element
    //img.src = 'img/test.jpeg';
    
    var img = document.querySelector('video');
    
    context.drawImage(img, 0, 0, imgWidth/2, ((imgWidth/imgOrigWidth)*imgOrigHeight)/2 );
    
    var data = context.getImageData(0,0, imgWidth/2, ((imgWidth/imgOrigWidth)*imgOrigHeight)/2 );
    var pixelData = data.data;
    
    context.clearRect(0,0,referenceWidth,referenceHeight);
    context.beginPath();
    
    for (var y = 0; y < (data.height); y++) {
        for (var x = 0; x < (data.width); x++) {
            var index = (x + y * data.width) * 4;
            var avg = (pixelData[index] + pixelData[index + 1] + pixelData[index + 2]) / 3;
            //var offset = Math.floor(Math.random()*3);
            var offset = 400 - referenceWidth/8;
            
            if ( thresholdOneLower <= avg && avg <= thresholdOneUpper)  {
                let randomizer = Math.random();
                if (randomizer < 0.05 || randomizer < 1) {
                    context.font = '10px Arial';
                    write(x,y,data);
                    messageIndex++;
                }
            }
            
            if ( thresholdTwoLower <= avg && avg <= thresholdTwoUpper)  {
                let randomizer = Math.random();
                if (randomizer < 0.45 || randomizer < 1) {
                    context.font = '8px Arial';
                    write(x,y,data);
                    messageIndex++;
                }
            }
            
            if ( thresholdThreeLower <= avg && avg <= thresholdThreeUpper)  {
                if (!thresholdThreeGate) {
                    context.font = '6px Arial';
                    write(x,y,data);
                    //thresholdThreeGate = true;
                    messageIndex++;
                }
            } else if (thresholdThreeGate) {
                context.font = '6px Arial';
                write(x,y,data);
                thresholdThreeGate = false;
                messageIndex++;
            }
            
            if ( thresholdFourLower <= avg && avg <= thresholdFourUpper)  {
                if (!thresholdFourGate) {
                    context.font = '3px Arial';
                    write(x,y,data);
                    //thresholdFourGate = true;
                    messageIndex++;
                }
            } else if (thresholdFourGate) {
                thresholdFourGate = false;
                context.font = '3px Arial';
                write(x,y,data);
                messageIndex++;
            }
        }
        
    }
    
    setTimeout( function() {
        animation = requestAnimationFrame(draw);
    }, 50);
}

function write(x,y,data) {
    if (referenceWidth >= referenceHeight) {
        context.fillText(messagesArray[messageIndex % messagesArray.length], (x / data.width) * referenceWidth, (y / data.width) * referenceWidth);
    } else {
        context.fillText(messagesArray[messageIndex % messagesArray.length], (x / data.height) * referenceHeight, (y / data.height) * referenceHeight);
    }
}

function slideshow() {
    imageElement.src = 'img/' + images[imgArrIndex % 3];
    imgArrIndex++;
    setTimeout( function() {
        slideshow();
    }, 4500);
}

//window.addEventListener('load', setup);
window.addEventListener('load', slideshow(0));
window.addEventListener('resize', setup);
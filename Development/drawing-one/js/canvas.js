var canvas = document.querySelector('canvas');
var context = canvas.getContext('2d');

var referenceWidth = window.innerWidth;
var referenceHeight = window.innerHeight;
const scale = window.devicePixelRatio;
const strength = 1; // add twice as many pixels to the canvas to help with text hinting (currently turned off)
const detail = 6; // the higher the detail, the less pixels of the image will be rendered, so less text nodes will be drawn
const imgWidth = referenceWidth / detail;

const thresholdOneLower = 20;
const thresholdOneUpper = 40;
const thresholdTwoLower = 41;
const thresholdTwoUpper = 60;
const thresholdThreeLower = 100;
const thresholdThreeUpper = 120;
const thresholdFourLower = 180;
const thresholdFourUpper = 200;

function setup() {
    // set the display scale
    canvas.style.width = referenceWidth + 'px';
    canvas.style.height = referenceHeight + 'px';
    
    
    canvas.width = referenceWidth * scale * strength;
    canvas.height = referenceHeight * scale * strength;

    context.scale(scale * strength, scale * strength);
    context.font = 'Arial';
    
    draw();
}

function draw() {
    var img = new Image(); // create an img element
    img.src = 'img/test.jpeg';
    
    context.drawImage(img, 0, 0, imgWidth, (imgWidth/img.width)*img.height );
    
    var data = context.getImageData(0,0, imgWidth, (imgWidth/img.width)*img.height );
    var pixelData = data.data;
    
    context.clearRect(0,0,referenceHeight,referenceWidth);
    
    for (var y = 0; y < (data.height); y++) {
        for (var x = 0; x < (data.width); x++) {
            var index = (x + y * data.width) * 4;
            var avg = (pixelData[index] + pixelData[index + 1] + pixelData[index + 2]) / 3;
            if ( thresholdOneLower <= avg && avg <= thresholdOneUpper)  {
                context.font = '14px Arial';
                context.fillText('1', x * detail, (y * detail) - (referenceHeight/2));
            }
            if ( thresholdTwoLower <= avg && avg <= thresholdTwoUpper)  {
                context.font = '10px Arial';
                context.fillText('2', x * detail, (y * detail) - (referenceHeight/2));
            }
            if ( thresholdThreeLower <= avg && avg <= thresholdThreeUpper)  {
                context.font = '6px Arial';
                context.fillText('3', x * detail, (y * detail) - (referenceHeight/2));
            }
            if ( thresholdFourLower <= avg && avg <= thresholdFourUpper)  {
                context.font = '3px Arial';
                context.fillText('4', x * detail, (y * detail) - (referenceHeight/2));
            }
        }
    }
}

window.addEventListener('load', setup);
# 380 Drawing | Final Project
A project by Maya Arguelles for [380 Drawing on the Web](https://cs.nyu.edu/courses/spring18/CSCI-UA.0380-002/).
[Project link](https://i6.cims.nyu.edu/~ga1110/380_drawing/projects/final/)

# Project Outline
In this project, I want to use the visual language of the digital age to highlight our human relationships with technology. I want to stray away from achieving photorealistic results with artificial means, and instead, embrace and expose the means of production. I want the project to feel unabashedly digital, but still intimate, personal, and familiar.

## Landing page / navigation
For the landing page and main navigation of the project I want to create a fake operating system in the browser and mediate all interactivity and navigation through that space. Each individual drawing will be treated like a 'shortcut' on a desktop, or a file. For the message capture functionality of the first drawing, the form will be styled like a messaging application. To make the environment feel more full and real (like taking a glimpse into someone's real computer) I want to populate the main navigation with links and images that are not the drawings themselves, or add some 'easter eggs' of interactivity or little widgets to make the site seem more like a full environment.


## Drawing One

The first drawing will be sort of a "deepening" of the [first project][first-project] I did for this class, where a face was formed out of an abstract formation of characters and images. For this final project, I want to create a similar visual end result, but instead of hardcoding the image, I want to generate an image programmatically by parsing pixel information of images through a canvas element to generate abstracted images with text. I also want this drawing to encourage, if not require, participation. The text will not be randomized &mdash; instead, the homepage will feature a "chat" interface that allows visitors to submit messages to be stored server-side and included in the drawing.

### Planned Implementation
#### Resources to be used
* Canvas (2D)
* Javascript
* AJAX
* PHP
* CSS transforms

#### General spec
The page itself will consist, structurally, of 4 full bleed canvas elements, a list of messages pulled in with PHP to be written to the canvas, as well as a video / image for the canvas to read from (or, perhaps, if time / capabilities allow, the image will be taken from user webcam input). The image will be made by reading the image / video / input into one canvas, reading the image data and iterating over each pixel checking for different "thresholds" of lightness (averaging the first 3 values of every 4 items in the array). If a certain threshold is found in a certain pixel, the canvas will draw a new text element to the appropriate location on the corresponding canvas (each of the 4 canvases will correspond to a certain threshold of light). Then, using the same effect used for the [first project][first-project], each canvas will be transformed with CSS relative to the mouse position with javascript. 

The navigation to this drawing will either be accompanied with or unlocked by participating in the chat module, which is essentially just a form that takes a name and a message and writes it to a faux-database with PHP (just a plain text file &mdash; this project isn't that secure) with AJAX, instead of redirecting to a PHP form intake page in order for the chat module to feel more 'native', and less like a form.


## Drawing Two

For the second drawing, I want to again expand [another project][catfish] that I did for another class, but use digital means to enhance the visual impact / message of the project. For this project, I used messages I had received from someone who had catfished me as content for a magazine styled after a young girl's diary to highlight the intimate moments in the constructed relationship. For this drawing, I want to also use messages as "found objects" to form the background of the drawing, either hardcoded or also captured at the landing page, and then overlay the messages with some hand-drawn animated SVG elements, as well as "teardrops" [(example)](https://www.instagram.com/p/BesspPlhpat/?taken-by=baugasm) drawn to a canvas element with WebGL that refract the background content. I also want this drawing to be a one-time event &mdash; once viewed, the visitor will get a cookie that prevents them from viewing the drawing again in order to highlight the fleeting / temporal nature of online interactions.

### Planned Implementation
#### Resources to be used
* Canvas (WebGL)
* Three.js
* [Noise.js][noise.js]
* Javascript
* SVG
* CSS animation

#### General spec
The background (text content) of the drawing will be just hardcoded with HTML and CSS. 

The SVG elements will be a sort of composite of 2 layers &mdash; the top layer will just be a simple path defining the shape of an element along the path it will be drawn in, which will be animated in with stroke-dash-offset and CSS animations. The second layer of each element will be more complex, allowing for more 'texture' and precision in its shape to create a more organic feeling than a fixed width stroke. This layer will be used as a clipping mask for the first layer, so that the SVG element can be both animated in while still mainting geometric complexity. 

The "teardrops" will be animated three.js geometries that have their vertices updated with a perlin noise algorithm / simplex noise from [Noise.js][noise.js] to create a natural flow and movement. The refraction effect will most likely come from a three.js shader (likey the [Fresnel](https://threejs.org/examples/webgl_materials_shaders_fresnel.html) shader), where the background content, saved as an image (probably just created with Photoshop / some other image editing software rather than read live) is used as an environment map instead of an actual environment.

## Drawing Three
On a less melodramatic note, I want the third drawing to bring a little more humor into the site. The third drawing will be like a "mood ring", where the user just starts typing and every time a space is entered, either a random SVG emoticon is printed or a random gif is pulled in, based on the "mood" "detected" (randomized) by Javascript.

### Planned Implementation
#### Resources to be used
* Javascript
* SVG

### General spec
The entire page will just be a text input that the user will type into. Using Javascript's keydown listener, whenever the space bar is pressed there will be a random chance for an SVG icon to be printed, or for a random gif (or maybe a search with the prior word using Giphy's gif search API) will be printed right next to the word inline.


## Credits
The current background music of the landing page is a loop from Cyprien Gaillard's [Nightlife](https://vimeo.com/157578391) exhibit, which samples Alton Ellis's [Black Man's World](https://itunes.apple.com/us/album/black-mans-world-aka-black-man-white-man/1145661718?i=1145662556).

All Windows 98 OS elements referenced from [Graphical User Interface Gallery Guidebook](https://guidebookgallery.org/screenshots/win98).

Most gifs sourced from [Gifcities](https://gifcities.org).


[first-project]:(http://i6.cims.nyu.edu/~ga1110/380_drawing/projects/htmlcss/)
[catfish]:(https://www.behance.net/gallery/60073585/Catfish)
[noise.js]:(https://github.com/josephg/noisejs)
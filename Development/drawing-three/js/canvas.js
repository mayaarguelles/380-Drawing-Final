// basic scene variables
var camera, scene, renderer, controls;

// animation variables 
var animation, material;
var wires = true;

function init() {
    cancelAnimationFrame(animation);
    
    // initialize the scene, full browser width
    scene = new THREE.Scene();
    var width = window.innerWidth/2; // set inside init() function to allow window to resize
    var height = window.innerHeight;

    // camera
    camera = new THREE.PerspectiveCamera(45, width/height, 0.1, 25000);
    camera.position.set(0, 200, 1700);
    scene.add(camera);

    // lights
    var light = new THREE.DirectionalLight(0xffffff, 1); // color, intensity
    light.position.set(1, 1, 1); // location x, y, z
    scene.add(light);
    
    var spotlight = new THREE.SpotLight(0xffff00, 0.8, 2000);
    spotlight.position.set(500, 1000, 500);
    spotlight.castShadow = true;

    spotlight.shadow.mapSize.width = 2048;
    spotlight.shadow.mapSize.height = 2048;

    // perspective shadow camera frustum near parameter
    spotlight.shadow.camera.near = 500;
    // perspective shadow camera frustum far parameter
    spotlight.shadow.camera.far = 2000;
    // perspective shadow camera frustum field of view parameter
    spotlight.shadow.camera.fov = 45;

    scene.add(spotlight);
    
    var hemi = new THREE.HemisphereLight(0xffffff, 0x0C056D, 0.6);
    scene.add(hemi);
    
    
    
    // cubemap textures
    var path = 'img/box/';
    var format = '.jpg';
    var urls = [
    path + 'posx' + format, path + 'negx' + format,
    path + 'posy' + format, path + 'negy' + format,
    path + 'posz' + format, path + 'negz' + format
    ];

    // new cubemap!
    scene.background = new THREE.CubeTextureLoader().load(urls);

    material = new THREE.MeshStandardMaterial({ envMap: scene.background, side: THREE.DoubleSide, transparent: true, opacity: 0.3});

    var loader = new THREE.BufferGeometryLoader();

    loader.load('data/final-extrude3.json', function(modelGeometry) {

        var bust = new THREE.Mesh(modelGeometry, material);
        
        bust.scale.set(100, 100, 100);
        bust.rotation.y = Math.PI / 4;
        bust.castShadows = true;
        bust.receiveShadows = true;
        
        scene.add(bust);
    });

    renderer = new THREE.WebGLRenderer({alpha: 1, antialias: false});
    renderer.setSize(width, height);
    renderer.shadowMap.enabled = true;
    controls = new THREE.OrbitControls(camera, renderer.domElement);

    document.body.appendChild(renderer.domElement);
    document.querySelector('canvas').addEventListener('click', wireframe);
    
    animation = animate();
}

function animate() {
    animation = requestAnimationFrame(animate);
    renderer.render(scene, camera);
    controls.update();
}

function wireframe() {
    if ( wires ) {
        material.wireframe = true;
    } else {
        material.wireframe = false;
    }
    
    $('#render').toggleClass('active');
    $('#wireframe').toggleClass('active');
    wires = !wires;
}

window.addEventListener('load', init);
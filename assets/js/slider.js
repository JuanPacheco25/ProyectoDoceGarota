let slide = document.querySelectorAll('.slide');
var current = 0;

function cls() {
    for(let i = 0; i < slide.length; i++){
        slide[i].style.display = 'none';
    }
}

function next() {
    cls();
    if(current === slide.length-1) current = -1;
    current++;
    slide[current].style.display = 'block';
}

function prev() {
    cls();
    if(current === 0) current = slide.length;
    current--;
    slide[current].style.display = 'block';
}

function start() {
    cls();
    slide[current].style.display = 'block';
}

function autoSlide() {
    next(); 
}

start();


setInterval(autoSlide, 5000);

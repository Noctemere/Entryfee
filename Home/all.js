document.addEventListener("DOMContentLoaded", function() {
    const menuButton = getElementById("main-nav");
    const navMenu = document.querySelector('.nav-menu');

    menuButton.addEventListener('click', function() {
        navMenu.classList.toggle('active');
    });

    document.querySelectorAll('.dropdown').forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            const subMenu = this.nextElementSibling;
            subMenu.classList.toggle('active');
        });
    });
});

document.querySelector('.nav-menu-btn').addEventListener('click', function() {
    document.querySelector('.nav-menu').classList.toggle('active');
});

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    document.getElementById("main-nav").style.background = "white";
    document.getElementById("main-nav").style.boxShadow = "0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12)";
    document.getElementById("main-nav").style.padding = "5px 10px";
    document.getElementById("nav-logo").style.fontSize = "15px";
  } else {
    document.getElementById("main-nav").style.background = "none";
    document.getElementById("main-nav").style.boxShadow = "none";
    document.getElementById("main-nav").style.padding = "10px 10px";
    document.getElementById("nav-logo").style.fontSize = "35px";
  }
}

function menuFunction() {
    var i = document.getElementById("navMenu");
    if(i.className === "nav-menu") {
        i.className += " responsive";
    } else {
        i.className = "nav-menu";
    }
}

const homeSection = document.getElementById('homeSection');

window.addEventListener('scroll', function() {
    let scrollDelay = window.scrollY * 0.5;
    homeSection.style.backgroundPosition = `center ${-scrollDelay}px`;
});

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("slider");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}

const appear = document.querySelector('.appear'); 
const cb = function(entries){
  entries.forEach(entry => {
    if(entry.isIntersecting){
      entry.target.classList.add('inview');
    }else{
      entry.target.classList.remove('inview');
    }
  });
}
const io = new IntersectionObserver(cb);
io.observe(appear);

const items = document.querySelectorAll('.appear2');

const active = function(entries){
    entries.forEach(entry => {
        if(entry.isIntersecting){
        entry.target.classList.add('inview2'); 
        }else{
            entry.target.classList.remove('inview2'); 
        }
    });
}
const io2 = new IntersectionObserver(active);
 for(let i=0; i < items.length; i++){
    io2.observe(items[i]);
}

function menuFunction() {
  var x = document.getElementById("navMenu");
  if (x.className === "nav-menu") {
      x.className += " responsive";
  } else {
      x.className = "nav-menu";
  }
}

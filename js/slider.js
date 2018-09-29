/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var slideIndex = 1;
var slideIndexRev = 1;



 showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("articles-item");
  var dots = document.getElementsByClassName("slider-toggle");
  if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none"; 
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].classList.remove('slider-toggle-active');
      dots[i].className = dots[i].className.replace(" slider-toggle-notActive", "");
      
    }
    
    if(window.matchMedia('(min-width: 768px)').matches)
{
  for(var i = 0; i < slides.length; i++) {
      slides[i].style.display = "flex";
  } 
}
    
  slides[slideIndex-1].style.display = "flex";
  dots[slideIndex-1].className += " slider-toggle-active";
} 


showSlidesRev(slideIndexRev);

function plusSlidesRev(n) {
  showSlidesRev(slideIndexRev += n);
}

function currentSlideRev(n) {
  showSlidesRev(slideIndexRev = n);
}

function showSlidesRev(n) {
  var i;
  var slides = document.getElementsByClassName("reviews-item");
  var dots = document.getElementsByClassName("slider-rev-toggle");
  if (n > slides.length) {slideIndexRev = 1;}
    if (n < 1) {slideIndexRev = slides.length;}
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none"; 
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].classList.remove('slider-rev-toggle-active');
      dots[i].className = dots[i].className.replace(" slider-rev-toggle-notActive", "");
      
    }
    
    
    
  slides[slideIndexRev-1].style.display = "flex";
  dots[slideIndexRev-1].className += " slider-rev-toggle-active";
} 
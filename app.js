const hero = document.querySelector(".hero");
const slider = document.querySelector(".slider");
const logo = document.querySelector("#logo");
const hamburger = document.querySelector(".hamburger");
const headline = document.querySelector(".headline");
const modalBtn = document.querySelector(".modal-btn");
const modalBg = document.querySelector(".modal-bg");
const modalClose = document.querySelector(".modal-close");

const tl = new TimelineMax();

tl.fromTo(
  hero,
  1,
  {height: "0%"},
  {height: "80%", ease: Power2.easeInOut }
).fromTo(
  hero,
  1.2,
  {width: "80%"},
  {width: "60%", ease: Power2.easeInOut }
).fromTo(
  slider,
  1.2,
  {x: "-100%"},
  {x: "0%", ease: Power2.easeInOut},
  "-=1.2"
).fromTo(
  logo,
  0.5,
  {opacity: 0, x: 30},
  {opacity: 1, x: 0},
  "-=0.5"
).fromTo(
  hamburger,
  0.5,
  {opacity: 0, x: 30},
  {opacity: 1, x: 0},
  "-=0.5"
).fromTo(
  headline,
  0.5,
  {opacity: 0, x: 30},
  {opacity: 1, x: 0},
  "-=0.5");
  
modalBtn.addEventListener('click', function() {
  modalBg.classList.add("menu-active");
});
modalClose.addEventListener('click', function() {
  modalBg.classList.remove("menu-active");
});
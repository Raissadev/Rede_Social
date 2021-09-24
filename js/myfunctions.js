 var toggleMenu = document.querySelectorAll('.menuAside'),
    asideMobile = document.querySelector('.aside');

for(var i = 0; i < toggleMenu.length; i++){
    toggleMenu[i].addEventListener('click', menuAction);
}

function menuAction(){
    if(asideMobile.classList.contains('hide')){
        asideMobile.classList.remove('hide');
    }else{
        asideMobile.classList.add('hide')
    }
}

/* */
var toggleAside = document.querySelectorAll('.toggleAside'),
asideinfosDicesUser = document.querySelector('aside.infosDicesUser');

for(var i = 0; i < toggleAside.length; i++){
toggleAside[i].addEventListener('click', asideAction);
}

function asideAction(){
if(asideinfosDicesUser.classList.contains('hide')){
    asideinfosDicesUser .classList.remove('hide');
}else{
    asideinfosDicesUser.classList.add('hide')
}
}
/* */
const sliderElm = document.querySelector(".listRooms ul");
const btnLeft = document.querySelector(".arrowLeft");
const btnRight = document.querySelector(".arrowRight");

const numberSliderBoxs = sliderElm.children.length;
let idxCurrentSlide = 0;

function moveSlider() {
  let leftMargin = (sliderElm.clientWidth / numberSliderBoxs) * idxCurrentSlide;
  sliderElm.style.marginLeft = -leftMargin + "px";
  console.log(sliderElm.clientWidth, leftMargin);
}
function moveLeft() {
  if (idxCurrentSlide === 0) idxCurrentSlide = numberSliderBoxs - 1;
  else idxCurrentSlide--;

  moveSlider();
}
function moveRight() {
  if (idxCurrentSlide === numberSliderBoxs - 1) idxCurrentSlide = 0;
  else idxCurrentSlide++;

  moveSlider();
}
btnLeft.addEventListener("click", moveLeft);
btnRight.addEventListener("click", moveRight);
window.addEventListener("resize", moveSlider);

/* */

const tabs = document.querySelectorAll(".tab");
const contents = document.querySelectorAll(".contentUsers");

for (let i = 0; i < tabs.length; i++) {
	tabs[i].addEventListener("click", () => {
		for (let r = 0; r < contents.length; r++) {
			contents[r].classList.remove("contentActive");
		}
		for (let rr = 0; rr < tabs.length; rr++) {
			tabs[rr].classList.remove("activeNav");
		}
		contents[i].classList.add("contentActive");
		tabs[i].classList.add("activeNav");
	});
}

/* */



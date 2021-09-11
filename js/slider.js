const nextEl = document.querySelector('.arrowLeft');
const previousEl = document.querySelector('.arrowRight');
const sliderEl = document.querySelector('.slidAuto');
const imgWidth = sliderEl.offsetWidth;

nextEl.addEventListener('click', onNextClick);
previousEl.addEventListener('click', onPreviousClick);

function onNextClick(){
    const imgWidth = sliderEl.offsetWidth;
    sliderEl.scrollLeft += imgWidth;
}
function onPreviousClick(){
    const imgWidth = sliderEl.offsetWidth;
    sliderEl.scrollLeft -= imgWidth;
}





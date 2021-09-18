feather.replace();

const mainContent = document.getElementById('mainContent');
const toogleMenu = document.querySelectorAll('.btnIconClick');
const asidePainel    = document.querySelector('.asidePainel');

for (var i = 0; i < toogleMenu.length; i++){
    toogleMenu[i].addEventListener('click', menuAction);
}

document.addEventListener('keyup', function(e){
    if(e.keyCode == 27) {
        if(asidePainel.classList.contains('showMenu')){
            menuAction();
        }
    }
});

function menuAction() {
    if(asidePainel.classList.contains('showMenu')){
        asidePainel.classList.remove('showMenu');
        mainContent.style.gridTemplateColumns = '20% 80%';
    }
    else {
        asidePainel.classList.add('showMenu');
        mainContent.style.gridTemplateColumns = '100%';
    }
}

const darkTheme = document.getElementById('themeDark');
const lightTheme = document.getElementById('themeLight');
darkTheme.addEventListener('click', (e)=>{
    document.documentElement.setAttribute('data-theme','light');
    darkTheme.style.display= "none";
    lightTheme.style.display= "flex";
});
lightTheme.addEventListener('click', (e)=>{
    document.documentElement.setAttribute('data-theme','dark');
    darkTheme.style.display= "flex";
    lightTheme.style.display= "none";
});

const bodyContents = document.getElementById('bodyContents');
bodyContents.addEventListener("touchstart", (e)=>{
    asidePainel.style.display = "none";
});


const myLi = document.querySelectorAll(".myLi")
for (var i = 0; i < document.links.length; i++) {
    if (document.links[i].href == document.URL) {
        document.links[i].parentElement.className = 'active';
    }
}

setTimeout(function(){
    if(boxResult.style.display = 'block'){
    let boxResult = document.getElementById("boxResult");
    boxResult.style.display = 'none';
    }}, 3000);
setTimeout(function(){
    if(boxAttention.style.display = 'block'){
    let boxAttention = document.getElementById("boxAttention");
    boxAttention.style.display = 'none';
    }}, 3000);



var cardToggleInfos = document.querySelector('.cardToggleInfos');
let cardToggleFiles = document.querySelector('.cardToggleFiles');
let cardOpenFiles = document.querySelector('.cardOpenFiles');
let cardOpenInfos = document.querySelector('.cardOpenInfos');
let cardOpenCadastro = document.querySelector('.cardOpenCadastro');
let cardToggleCadastro = document.querySelector('.cardToggleCadastro');


if(cardToggleInfos.show = true){
    cardToggleFiles.hidden = true;
    cardToggleCadastro.hidden = true;
}if(cardToggleFiles.show = true){
    cardToggleFiles.hidden = true;
    cardToggleCadastro.hidden = true;
}if(cardToggleCadastro.show = true){
    cardToggleFiles.hidden = true;
    cardToggleInfos.hidden = true;
}
cardToggleInfos.style.display = 'block';
cardOpenFiles.addEventListener('click', (e)=>{
    cardToggleInfos.style.display = 'none';
    cardToggleCadastro.style.display = 'none';
    cardToggleFiles.style.display = 'block';
    cardOpenFiles.classList.add("active");
    cardOpenInfos.classList.remove("active");
    cardOpenCadastro.classList.remove("active");
});
cardOpenInfos.addEventListener('click', (e)=>{
    cardToggleFiles.style.display = 'none';
    cardToggleCadastro.style.display = 'none';
    cardToggleInfos.style.display = 'block';
    cardOpenInfos.classList.add("active");
    cardOpenFiles.classList.remove("active");
    cardOpenCadastro.classList.remove("active");
});
cardOpenCadastro.addEventListener('click', (e)=>{
    cardToggleFiles.style.display = 'none';
    cardToggleInfos.style.display = 'none';
    cardToggleCadastro.style.display = 'block';
    cardOpenCadastro.classList.add("active");
    cardOpenFiles.classList.remove("active");
    cardOpenInfos.classList.remove("active");
});


const nextEl = document.getElementById('proximo');
const previousEl = document.getElementById('anterior');
const sliderEl = document.getElementById('slider');
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







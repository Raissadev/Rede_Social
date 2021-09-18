var toggleMenu = document.querySelectorAll('.menuMobile'),
    asideMobile = document.querySelector('header .row div.itemsMenu');

for (var i = 0; i < toggleMenu.length; i++){
    toggleMenu[i].addEventListener('click', menuAction);
}

function menuAction(){
    if(asideMobile.classList.contains('showMenu')){
        asideMobile.classList.remove('showMenu');
    }else{
        asideMobile.classList.add('showMenu');
    }
}
var acc = document.getElementsByClassName("accordion");
var panel = document.getElementsByClassName('panel');

for (var i = 0; i < acc.length; i++) {
    acc[i].onclick = function() {
        var setClasses = !this.classList.contains('active');
        setClass(acc, 'active', 'remove');
        setClass(panel, 'show', 'remove');

        if (setClasses) {
            this.classList.toggle("active");
            this.nextElementSibling.classList.toggle("show");
        }
    }
}

function setClass(els, className, fnName) {
    for (var i = 0; i < els.length; i++) {
        els[i].classList[fnName](className);
    }
}

feather.replace();

    let searchCard = document.getElementById('searchCard');
    let searchContent = document.getElementById('searchContent');
    let xClose = document.querySelector('.closeContent');

    searchContent.style.display = 'none';
        searchCard.addEventListener('click', (e)=>{
        if(searchContent.style.display === 'none'){
                searchContent.style.display = 'flex';
                xClose.addEventListener('click', (e)=>{
                    searchContent.style.display = 'none';
                });
            }
        else if(searchContent.style.display === 'flex'){
                searchContent.style.display = 'none';
        }
    });
    
    



    let btnSidebar = document.getElementById("btnSidebar");
    let navSidebar = document.getElementById("navSidebar");
    let navOne =  document.querySelector(".myNav");

    if(window.matchMedia("(max-width: 780px)").matches) {
        navSidebar.hidden = true;
    }else {
        navSidebar.hidden = false;
    }
    navSidebar.hidden === false;
    btnSidebar.addEventListener('click', (e)=>{
    if(navSidebar.hidden === false){
            navSidebar.hidden = true;
            navOne.classList.remove("grid-9x1");
    }
    else if(navSidebar.hidden === true){
            navSidebar.hidden = false;
            navOne.classList.add("grid-9x1");
    }
});


let contentFilters = document.getElementById('contentFilters');
let btnFilter = document.getElementById('btnFilter');
let closeFilter = document.getElementById('closeFilter');

contentFilters.style.display = 'none';
    btnFilter.addEventListener('click', (e)=>{
    if(contentFilters.style.display === 'none'){
            contentFilters.style.display = 'flex';
            closeFilter.addEventListener('click', (e)=>{
                contentFilters.style.display = 'none';
            });
        }
    else if(contentFilters.style.display === 'flex'){
            contentFilters.style.display = 'none';
    }
});



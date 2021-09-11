let btnOne = document.querySelector('.btnOne');
let btnTwo = document.querySelector('.btnTwo');
let cardOne = document.querySelector('.cardOne');
let cardTwo = document.querySelector('.cardTwo');

    btnOne.addEventListener('click', (e)=>{
        cardOne.classList.add('cardActive');
        cardTwo.classList.remove('cardActive');
    });
    btnTwo.addEventListener('click', (e)=>{
        cardOne.classList.remove('cardActive');
        cardTwo.classList.add('cardActive');
    });


    


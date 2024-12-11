/*====================================
// Filename : menuMobile.js
// Description : toutes les scripts pour faire marcher le menu et la barre de navigation en version mobile
// Author : Samit Adelyar
====================================*/

//variables
const Header = document.getElementById('header');
const toggleMenu = document.getElementById('selectionneMenu');
const btnMobile = document.getElementsByClassName('btnMobile');
const menuPrev = document.getElementsByClassName('mobile-menu')

//eventListener
window.addEventListener('scroll', shrinkTop);
toggleMenu.addEventListener('click', showMenu);
menuPrev[0].addEventListener('click', hideMenu)


let lastScrollY = 0; 
const minPosY = 60; 
const marge = 5; 

// permet de faire reduire ou augmenter la taille en y de la barre de navigation 
function shrinkTop() {

  if (window.scrollY > minPosY + marge) {
    if (lastScrollY <= minPosY + marge) {
      Header.classList.add('shrink');
    }
  } else if (window.scrollY < minPosY - marge) {
    if (lastScrollY >= minPosY - marge) {
      Header.classList.remove('shrink'); 
    }
  }
  lastScrollY = window.scrollY;

}

//show la side bar
function showMenu(){
  
   document.getElementsByTagName("body")[0].classList.add("hideScroll");
    header.classList.add("hidden");
    menuPrev[0].classList.remove("hidden");

    for(let i =0 , l = btnMobile.length; i< l; i++){
        btnMobile[i].classList.remove("hidden");
    }
    window.scrollTo(0, 0);
    setTimeout(() => {
        menuPrev[0].classList.toggle('open');
      }, 0.3);
}

//hide sideBar
function hideMenu() {
    menuPrev[0].classList.toggle('open');
    Header.classList.remove("hidden");
    menuPrev[0].classList.add("hidden");
    for(let i = 0, l = btnMobile.length; i< l; i++){
        btnMobile[i].classList.add("hidden");
    }
    document.getElementsByTagName("body")[0].classList.remove("hideScroll");
}

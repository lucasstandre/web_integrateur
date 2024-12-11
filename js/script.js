document.addEventListener('DOMContentLoaded', () => {
  const slider = document.querySelector('.slider');
  const sliderContainer = document.querySelector('.slider-container');
  const slides = document.querySelectorAll('.slide');
  const prevBtn = document.querySelector('.prev');
  const nextBtn = document.querySelector('.next');
  const checkbox = document.getElementById('checkbox');
  const filterBtn = document.getElementById('filter-btn');
  const filterModal = document.querySelector('.filter-modal');
  let visibleSlides = slides.length; // prend les slide au debut et les diminue selon le filtre

  let currentIndex = 0;
  let servernbr = 0;
  let slideWidth = slides[0].offsetWidth + 20; // 20px de margin
  nextBtn.addEventListener('click', next);
  prevBtn.addEventListener('click', prev);
  checkbox.addEventListener('change', toggleFilter);
  filterBtn.addEventListener('click', applyFilter);

  const comparerButtons = document.querySelectorAll('.comparer-btn');
    comparerButtons.forEach(button => {
        button.addEventListener('click', () => {
            const id = button.getAttribute('data-id');
            handleComparer(id, button);
        });
    });
  updateArrows();
  function next() {
      currentIndex++;
      updateSlider();
      updateArrows();
}

  function prev() {
      currentIndex--;
      updateSlider();
      updateArrows();
  }

  function updateSlider() {
      slider.style.transform = `translateX(-${currentIndex * slideWidth}px)`; // truc cool pour slider
  }

  function updateArrows() {
      if(currentIndex === 0) {
          prevBtn.classList.add('hidden');
      }
      else {
          prevBtn.classList.remove('hidden');
      }      
      if(currentIndex === visibleSlides - 2) {
          nextBtn.classList.add('hidden');
      }
      else {
          nextBtn.classList.remove('hidden');
      }
  }

  // Filter 
  function toggleFilter() {
      const filterContent = document.querySelector('.filter-content');
      const sliderContainer = document.querySelector('.slider-container');
     // const filterModal = document.querySelector('.filter-modal');
      if (checkbox.checked) {
          filterContent.classList.remove('hidden');
          //sliderContainer.classList.add('filter-open'); // rajoute le filter open comme ca ca prend 70% moins de place
          window.scrollTo({ //scroll en bas
              top: document.documentElement.scrollHeight,
              behavior: 'smooth' //cool
          });
      } 
      else {
          filterContent.classList.add('hidden');
          sliderContainer.classList.remove('filter-open');

      }
  }

  function applyFilter() {
       visibleSlides = 0; // les slide visible
      const totalSlides = slides.length; 
      const brand = document.getElementById('brand').value;
      const minPrice = parseFloat(document.getElementById('min-price').value) || 0;
      const maxPrice = parseFloat(document.getElementById('max-price').value) || Infinity;
      let hasVisibleSlides = false;
     

      slides.forEach(slide => {
     
          const slideBrand = slide.dataset.brand;
          const slidePrice = parseFloat(slide.dataset.price);
          
          const brandMatch = brand === 'all' || slideBrand === brand;
          const priceMatch = slidePrice >= minPrice && slidePrice <= maxPrice;

          if (brandMatch && priceMatch) {
              slide.classList.remove('hidden');
              hasVisibleSlides = true;
              visibleSlides++;
          }
          else {
              slide.classList.add('hidden');
          }
          

      });
      console.log('Visible slides:', visibleSlides);
      console.log('Total slides:', totalSlides);
    if (hasVisibleSlides) {
      sliderContainer.classList.remove('hidden');
      currentIndex = 0;
          if (visibleSlides === 1) {
          prevBtn.classList.add('hidden');
          nextBtn.classList.add('hidden');
      } else {
          prevBtn.classList.add('hidden');
          nextBtn.classList.remove('hidden');
      }
  } else {
      sliderContainer.classList.add('hidden');
  }

      updateSlider();
      updateArrows();
  }
  function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    let expires = "expires="+ d.toUTCString();
    document.cookie = `${cname}=${cvalue};${expires};path=/`;
}

function getCookie(cname) {
    let name = `${cname}=`;
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let c of ca) {
        c = c.trim();
        if (c.indexOf(name) === 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function deleteCookie(cname) {
    setCookie(cname, '', -1);
}

function handleComparer(id, button) {
  let comparerCookie = getCookie('comparer'); // prend les cookie
  let comparerArray = [];

  if (comparerCookie) { // si il y a des cookies
      
          comparerArray = JSON.parse(comparerCookie);
         // voit que cest bien un array
          if (!Array.isArray(comparerArray)) {
              comparerArray = [];
          }
      } 
  
  
  // enleve les double de array (fous code)
  comparerArray = comparerArray.filter(item => item !== id);
  
  if (comparerArray.length < 2) {
    //push le nouveau
    comparerArray.push(id);
    setCookie('comparer', JSON.stringify(comparerArray), 1); // set les cookies

    updateAllButtons(comparerArray) // update le button pour mettre genre 1/2
    
    if (comparerArray.length === 2) {
        window.location.href = 'comparaison.php'; // go to comparaison
    } else {
        alert('Produit' + $ + ' ajouté au comparateur!');
    }
} else {
    // si c full remplace le dernier par lui que tu vient de mettre
    comparerArray.pop();
    comparerArray.push(id);
    setCookie('comparer', JSON.stringify(comparerArray), 1);

    updateAllButtons(comparerArray); // update le button pour mettre genre 1/2

    window.location.href = 'comparaison.php'; // go to comparaison
}

  
  // si le cookie est plus gros que 2 (par normal)
  if (comparerArray.length > 2) {
      comparerArray = comparerArray.slice(0, 2); // prend juste les 2 premier
      setCookie('comparer', JSON.stringify(comparerArray), 1);
      updateAllButtons(comparerArray); // update le button pour mettre genre 1/2
  }
}
/*
function updateButton(button, count) {
      switch (count) {
          case 0:
              button.setAttribute('data-content', 'Ajouter');
              break;
          case 1:
              button.setAttribute('data-content', '1/2');
              break;
          case 2:
              button.setAttribute('data-content', '2/2');
              break;
          default:
              // Invalid state, reset
              button.setAttribute('data-content', 'Ajouter');
              break;
      }
  }
*/
  function updateAllButtons(comparerArray) {
    const comparerButtons = document.querySelectorAll('.comparer-btn'); // va les get
    console.log(comparerArray.length);
    comparerButtons.forEach(button => {
       const buttonId = button.getAttribute('data-id');
       console.log(buttonId);
         if (comparerArray.length === 1) {
            button.setAttribute('data-content', '1/2');
            //console.log('1/2');
        }
        else if (comparerArray.length === 2) {
            button.setAttribute('data-content', '2/2');
            //console.log('1/2');
        }
     else {
        button.setAttribute('data-content', 'Ajouter');
      //  console.log('Ajouter');
    }
    });
  }
    const initialComparer = getCookie('comparer');
    if (initialComparer) {
      const comparerArray = JSON.parse(initialComparer); // reprend larray initial et la compare
      updateAllButtons(comparerArray);
    }

 });
/*
document.getElementById("btn-Couleur").addEventListener("click", modeCouleur);
function modeCouleur(){
    let div = document.getElementById("comparaison").children;
    
    for(let i = 0; i <div.length; i++) { 
        let tr = div[i].children[0].children;
        for(let i = 0; i <tr.length; i++) {
            if(tr[i].classList.contains("couleur")){
                let td = tr[i].children;
                let nb1 = Number(td[0].innerHTML);
                let nb2 = Number(td[2].innerHTML);
                if(nb1 > nb2){
                    td[0].classList.toggle("vert");
                    td[2].classList.toggle("rouge");
                }else if(nb2 > nb1){
                    td[2].classList.toggle("vert");
                    td[0].classList.toggle("rouge");
                }else{
                    td[2].classList.toggle("gray");
                    td[0].classList.toggle("gray");
                }
            }
        }
    }
  
} A FAIRE
*/
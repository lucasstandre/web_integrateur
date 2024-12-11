document.addEventListener('DOMContentLoaded', () => {
if (document.URL.includes("inventaire.php")) {
  const slider = document.querySelector('.slider');
  const sliderContainer = document.querySelector('.slider-container');
  const slides = document.querySelectorAll('.slide');
  const prevBtn = document.querySelector('.prev');
  const nextBtn = document.querySelector('.next');
  const checkbox = document.getElementById('checkbox');
  const filterBtn = document.getElementById('filter-btn');
  let visibleSlides = slides.length; // prend les slide au debut et les diminue selon le filtre

  let currentIndex = 0;
  let servernbr = 0;
  let slideWidth = slides[0].offsetWidth + 20; // 20px de margin
  nextBtn.addEventListener('click', next);
  prevBtn.addEventListener('click', prev);
  checkbox.addEventListener('change', toggleFilter);
  filterBtn.addEventListener('click', applyFilter);

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
      if(currentIndex === visibleSlides - 1) {
          nextBtn.classList.add('hidden');
      }
      else {
          nextBtn.classList.remove('hidden');
      }
  }

  // Filter 
  function toggleFilter() {
      const filterContent = document.querySelector('.filter-content');

      if (checkbox.checked) {
          filterContent.classList.remove('hidden');
          window.scrollTo({ //scroll en bas
              top: document.documentElement.scrollHeight,
              behavior: 'smooth' //cool
          });
      } 
      else {
          filterContent.classList.add('hidden');
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

      currentIndex = 0;
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

window.comparer = function(id){
  let comparerCookie = getCookie('comparer'); // Correct variable name
  let comparerArray = [];
  
  if (comparerCookie) { // Use comparerCookie instead of comparerData
      try {
          comparerArray = JSON.parse(comparerCookie);
          // Ensure it's an array
          if (!Array.isArray(comparerArray)) {
              comparerArray = [];
          }
      } catch (e) {
          comparerArray = [];
      }
  }
  
  // Remove duplicate if id already exists
  comparerArray = comparerArray.filter(item => item !== id);
  
  if (comparerArray.length === 0) {
      // No items in comparer, add the first item
      comparerArray.push(id);
      setCookie('comparer', JSON.stringify(comparerArray), 1); // 1 day expiry
      updateButtonContent(id, comparerArray.length);
      // Optionally: window.location.reload();
      alert('Produit ajouté au comparateur!');
  } else if (comparerArray.length === 1) {
      // One item in comparer, add the second and redirect
      comparerArray.push(id);
      setCookie('comparer', JSON.stringify(comparerArray), 1);
      updateButtonContent(id, comparerArray.length);
      // Redirect to comparaison.php
      window.location.href = 'comparaison.php';
  } else if (comparerArray.length >= 2) {
      // Already two items, replace the last one with the new id and redirect
      comparerArray.pop(); // Remove last item
      comparerArray.push(id); // Add new item
      setCookie('comparer', JSON.stringify(comparerArray), 1);
      updateButtonContent(id, comparerArray.length);
      // Redirect to comparaison.php
      window.location.href = 'comparaison.php';
  }
  
  // Handle invalid cookie states (e.g., more than 2 items)
  if (comparerArray.length > 2) {
      comparerArray = comparerArray.slice(0, 2); // Keep only first two items
      setCookie('comparer', JSON.stringify(comparerArray), 1);
      // Update buttons accordingly
      comparerArray.forEach(comparerId => {
          updateButtonContent(comparerId, comparerArray.length);
      });
  }
}
function updateButtonContent(id, count) {
  // Select the specific comparer button based on ID
  const button = document.querySelector(`.button_Inventaire.type1[onclick="comparer(${id})"]`);
  if (button) {
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
}
(function initializeComparer() {
  const comparerData = getCookie('comparer');
  let comparerArray = [];

  if (comparerData) {
      try {
          comparerArray = JSON.parse(comparerData);
          if (!Array.isArray(comparerArray)) {
              comparerArray = [];
          }
      } catch (e) {
          comparerArray = [];
      }
  }

  // Update all comparer buttons based on comparerArray
  comparerArray.forEach(id => {
      updateButtonContent(id, comparerArray.length);
  });

  // Handle invalid comparer states
  if (comparerArray.length > 2) {
      comparerArray = comparerArray.slice(0, 2);
      setCookie('comparer', JSON.stringify(comparerArray), 1);
      // Update buttons accordingly
      comparerArray.forEach(id => {
          updateButtonContent(id, comparerArray.length);
      });
  }
})();}
if (document.URL.includes("inventaire.php")) {
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
}}});

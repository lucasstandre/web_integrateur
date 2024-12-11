document.addEventListener('DOMContentLoaded', () => {
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
      slider.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
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


});

// script.js
class Slider {
  constructor() {
      // Initialize DOM elements and state
      this.slider = document.querySelector('.slider');
      this.prevBtn = document.querySelector('.prev');
      this.nextBtn = document.querySelector('.next');
      this.checkbox = document.getElementById('checkbox');
      this.filterBtn = document.getElementById('filter-btn');
      this.slides = document.querySelectorAll('.slide');
      this.currentIndex = 0;
      this.slideWidth = this.slides[0].offsetWidth + 20;
      
      this.init();
  }

  init() {
      this.setupClones();
      this.setupControls();
      this.bindEvents();
  }

  setupClones() {
      const clones = this.slider.querySelectorAll('.clone');
      clones.forEach(clone => clone.remove());

      this.slides = this.slider.querySelectorAll('.slide:not(.hidden)');
      
      if (this.slides.length > 0) {
          this.slideWidth = this.slides[0].offsetWidth + 20;
          const firstClone = this.slides[0].cloneNode(true);
          const lastClone = this.slides[this.slides.length - 1].cloneNode(true);
          
          firstClone.classList.add('clone');
          lastClone.classList.add('clone');
          
          this.slider.appendChild(firstClone);
          this.slider.insertBefore(lastClone, this.slides[0]);
          
          this.resetPosition();
      }
  }

  setupControls() {
      const hasMultipleSlides = this.slides.length > 1;
      this.prevBtn.style.visibility = hasMultipleSlides ? 'visible' : 'hidden';
      this.nextBtn.style.visibility = hasMultipleSlides ? 'visible' : 'hidden';
  }

  bindEvents() {
      this.nextBtn.addEventListener('click', () => this.slideNext());
      this.prevBtn.addEventListener('click', () => this.slidePrev());
      this.checkbox.addEventListener('change', () => this.toggleFilter());
      this.filterBtn.addEventListener('click', () => this.applyFilters());
  }

  slideNext() {
      this.currentIndex++;
      this.slide();
      if (this.currentIndex >= this.slides.length) {
          this.resetToStart();
      }
  }

  slidePrev() {
      this.currentIndex--;
      this.slide();
      if (this.currentIndex < 0) {
          this.resetToEnd();
      }
  }

  slide() {
      this.slider.style.transition = 'transform 0.5s ease-in-out';
      this.slider.style.transform = `translateX(-${this.slideWidth * (this.currentIndex + 1)}px)`;
  }

  resetPosition() {
      this.currentIndex = 0;
      this.slider.style.transition = 'none';
      this.slider.style.transform = `translateX(-${this.slideWidth}px)`;
  }

  resetToStart() {
      setTimeout(() => {
          this.slider.style.transition = 'none';
          this.currentIndex = 0;
          this.slider.style.transform = `translateX(-${this.slideWidth}px)`;
      }, 500);
  }

  resetToEnd() {
      setTimeout(() => {
          this.slider.style.transition = 'none';
          this.currentIndex = this.slides.length - 1;
          this.slider.style.transform = `translateX(-${this.slideWidth * (this.currentIndex + 1)}px)`;
      }, 500);
  }

  toggleFilter() {
      const filterContent = document.querySelector('.filter-content');
      if (this.checkbox.checked) {
          filterContent.classList.remove('hidden');
          window.scrollTo({
              top: document.documentElement.scrollHeight,
              behavior: 'smooth'
          });
      } else {
          filterContent.classList.add('hidden');
      }
  }

  applyFilters() {
      const brand = document.getElementById('brand').value;
      const minPrice = parseFloat(document.getElementById('min-price').value) || 0;
      const maxPrice = parseFloat(document.getElementById('max-price').value) || Infinity;

      this.slides.forEach(slide => {
          const slideBrand = slide.dataset.brand;
          const slidePrice = parseFloat(slide.dataset.price);
          
          const brandMatch = brand === 'all' || slideBrand === brand;
          const priceMatch = slidePrice >= minPrice && (maxPrice === Infinity || slidePrice <= maxPrice);

          slide.classList.toggle('hidden', !(brandMatch && priceMatch));
      });

      this.setupClones();
  }
}

// Initialize slider when DOM is ready
document.addEventListener('DOMContentLoaded', () => new Slider());
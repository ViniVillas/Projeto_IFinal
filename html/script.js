let currentSlide = 0;

function showSlide(index) {
  const slides = document.querySelectorAll('.car-info');
  const totalSlides = slides.length;

  // Ajusta o índice do slide atual
  if (index >= totalSlides) {
    currentSlide = 0;
  } else if (index < 0) {
    currentSlide = totalSlides - 1;
  } else {
    currentSlide = index;
  }

  // Move os slides
  const offset = -currentSlide * 100;
  document.querySelector('.slides').style.transform = `translateX(${offset}%)`;
}

function nextSlide() {
  showSlide(currentSlide + 1);
}

function prevSlide() {
  showSlide(currentSlide - 1);
}

// Inicializa o carrossel
showSlide(0);

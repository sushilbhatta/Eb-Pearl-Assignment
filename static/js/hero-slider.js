document.addEventListener("DOMContentLoaded", () => {
  const slider = document.querySelector(".slider");
  const slides = document.querySelectorAll(".slide");
  const dots = document.querySelectorAll(".dot");
  let currentIndex = 0;
  const totalSlides = slides.length;

  // Function to update slider position
  function updateSlider() {
    slider.style.transform = `translateX(-${currentIndex * 100}%)`;
    dots.forEach((dot) => dot.classList.remove("active"));
    dots[currentIndex].classList.add("active");
  }

  function nextSlide() {
    currentIndex = (currentIndex + 1) % totalSlides;
    updateSlider();
  }

  // Dot navigation
  dots.forEach((dot) => {
    dot.addEventListener("click", () => {
      currentIndex = parseInt(dot.getAttribute("data-index"));
      updateSlider();
      clearInterval(autoSlideInterval);
      autoSlideInterval = setInterval(nextSlide, 5000); // Restart
    });
  });

  let autoSlideInterval = setInterval(nextSlide, 5000);

  updateSlider();
});
